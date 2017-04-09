<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
        public function __construct()
        {
                parent::__construct();
                
                $this->load->model('users_model');
                $this->load->model('offers_model');
                
        }
	
	public function LogIn()
	{       
		$this->load->view('LogIn/stylesheets');
                $this->load->view('LogIn/LogIn');
                if ($_SERVER['REQUEST_METHOD']=='POST')
                {
                    if($this->users_model->LogInUser($this->input->post('UserName'),$this->input->post('Password')))
                    {
                        $sessiondata=$this->users_model->GetUserSessionData($this->input->post('UserName'));
                        $session = array(
                                    'ID'  => $sessiondata['ID'],
                                    'UserName'  => $sessiondata['UserName'],
                                    'Type'  => $sessiondata['Type'],
                                    'logged_in' => TRUE
                                    );

                        $this->session->set_userdata($session);
                        if($this->session->userdata('Type') == "normal" )
                        {
                            redirect(base_url().'index.php/User/Dashboard');
                        }
                        else if($this->session->userdata('Type') == "coordinator" )
                        {
                            redirect(base_url().'index.php/Coordinator/Tasks');
                        }
                        elseif (($this->session->userdata('Type') == "worker" )) 
                        {
                            redirect(base_url().'index.php/Worker/Assignments');
                        }
                    }
                    else 
                    {
                        echo 'fuck off asshole';
                    }
                }
                $this->load->view('LogIn/scripts');
	}
        
        public function Register()
	{       
            if($this->session->userdata('logged_in') == FALSE)
            {
                $this->load->view('LogIn/stylesheets');
                $this->load->view('LogIn/Register');
                if ($_SERVER['REQUEST_METHOD']=='POST')
                {
                    $this->users_model->AddUser($this->input->post('UserName'),  $this->input->post('Password'), $this->input->post('By'));
                    redirect(base_url().'index.php/User/LogIn?msg="Registered Successfully"');
                }
                
                $this->load->view('LogIn/scripts');
            }
		
	}
        
        public function LogOut() {
            if($this->session->userdata('logged_in'))
            {
                $this->session->sess_destroy();
            }
            redirect(base_url().'index.php/User/LogIn');
            
        }
        
        public function Dashboard() {
            if($this->session->userdata('logged_in'))
            {
                $this->load->view('Dashboard/stylesheets');
                $this->load->view('Templates/navigation');
                $Offers['Offers']=$this->offers_model->GetOffers();
                $this->load->view('Dashboard/Dashboard',$Offers);
                $this->load->view('Dashboard/scripts');
            }
            else
            {
                redirect(base_url().'index.php/User/LogIn');
            }
            
        }
        
        public function Offers() {
            if($this->session->userdata('logged_in'))
            {
                $this->load->view('Dashboard/stylesheets');
                $this->load->view('Templates/navigation');
                $Offers['Offers']=$this->offers_model->GetOffersOfUser($this->session->userdata('ID'));
                //print_r($Offers['Offers']);
                $this->load->view('User/Offers',$Offers);
                $this->load->view('Dashboard/scripts');
            }
            else
            {
                redirect(base_url().'index.php/User/LogIn');
            }
            
        }
        
        public function Matches() {
            if($this->session->userdata('logged_in'))
            {
                $this->load->view('Dashboard/stylesheets');
                $this->load->view('Templates/navigation');
                $Matches['Matches']=$this->offers_model->GetMatchesOfUser($this->session->userdata('ID'));
                //print_r($Offers['Offers']);
                $this->load->view('User/Matches',$Matches);
                $this->load->view('Dashboard/scripts');
            }
            else
            {
                redirect(base_url().'index.php/User/LogIn');
            }
            
        }
        
        
}
