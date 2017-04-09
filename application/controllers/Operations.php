<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Operations extends CI_Controller {

	public function __construct()
        {
                parent::__construct();
                $this->load->model('offers_model');
                $this->load->model('users_model');
                
        }
        
	public function MakeOffer()
	{       
		$this->load->view('Templates/stylesheets');
                $this->load->view('Templates/navigation');
                if ($_SERVER['REQUEST_METHOD']=='POST')
                {
                    $this->offers_model->AddOffer("0",  $this->input->post("points"),$this->input->post("rate"),$this->input->post("team"),  $this->session->userdata('ID'));
                    redirect(base_url().'index.php/User/Dashboard?notify=offer successfully placed');
                    
                }
                $this->load->view('Operations/MakeOffer');
                $this->load->view('Templates/scripts');
	}
        
        public function Match($offerID)
	{       
            if($this->session->userdata('logged_in'))
            {
                $this->offers_model->AcceptOffer($offerID,  $this->session->userdata('ID'));
                redirect(base_url().'index.php/User/Matches');
            }
	}
        
        public function ConfirmUser($UserID) {
            if(($this->session->userdata('logged_in'))&&($this->session->userdata('Type'))=='coordinator')
            {
                $this->users_model->AcceptUser($UserID,$this->session->userdata('ID'));
                redirect(base_url().'index.php/Coordinator/MembershipRequests');
            }
        }
        
        public function KickUser($UserID) {
            if(($this->session->userdata('logged_in'))&&($this->session->userdata('Type'))=='coordinator')
            {
                $this->users_model->KickUser($UserID,$this->session->userdata('ID'));
                redirect(base_url().'index.php/Coordinator/MembershipRequests');
            }
        }
}
