<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Coordinator extends CI_Controller {
        public function __construct()
        {
                parent::__construct();
                
                $this->load->model('users_model');
                $this->load->model('offers_model');
                
        }
	
        public function Tasks()
	{       
            if(($this->session->userdata('logged_in') == TRUE)&&($this->session->userdata('Type')=="coordinator"))
            {
                $this->load->view('Dashboard/stylesheets');
                $this->load->view('Templates/navigation');
                $UsersOfCoordinator=$this->users_model->GetUsersOfCoordinator($this->session->userdata('ID'));
                //print_r($UsersOfCoordinator);
                $AllTakenOffers=$this->offers_model->GetAllTakenOffers();
                $offerscount=0;
                $matchescount=0;
                
                foreach ($AllTakenOffers as $AllTakenOffer) {
                    
                    foreach ($UsersOfCoordinator as $UserOfCoordinator) {
                        
                        
                        if($AllTakenOffer['MatchBy'] == $UserOfCoordinator['ID'])
                        {
                            $Tasks['Tasks']['Offers'][$offerscount]=$AllTakenOffer;
                            $offerscount++;
                        }
                        if($AllTakenOffer['TakenBy'] == $UserOfCoordinator['ID'])
                        {
                            $Tasks['Tasks']['Matches'][$matchescount]=$AllTakenOffer;
                            $matchescount++;
                        }
                        
                        
                    }
                    
                }
                
                $this->load->view('Coordinator/Tasks',$Tasks);
                $this->load->view('Dashboard/scripts');
            }
            else
            {
                redirect(base_url().'index.php/User/LogIn');
            }
		
	}
        
        public function MembershipRequests() {
            if(($this->session->userdata('logged_in') == TRUE)&&($this->session->userdata('Type')=="coordinator"))
            {
                $this->load->view('Dashboard/stylesheets');
                $this->load->view('Templates/navigation');
                $MembershipRequests['MembershipRequests']= $this->users_model->GetMembershipRequests($this->session->userdata('ID'));
                
                $this->load->view('Coordinator/MembershipRequests',$MembershipRequests);
                $this->load->view('Dashboard/scripts');
            }
            else
            {
                redirect(base_url().'index.php/User/LogIn');
            }
        }
        
        public function ManageMembers() {
            if(($this->session->userdata('logged_in') == TRUE)&&($this->session->userdata('Type')=="coordinator"))
            {
                $this->load->view('Dashboard/stylesheets');
                $this->load->view('Templates/navigation');
                $Members['Members']= $this->users_model->GetMembersOfCoordinator($this->session->userdata('ID'));
                
                $this->load->view('Coordinator/ManageMembers',$Members);
                $this->load->view('Dashboard/scripts');
            }
            else
            {
                redirect(base_url().'index.php/User/LogIn');
            }
        }
}