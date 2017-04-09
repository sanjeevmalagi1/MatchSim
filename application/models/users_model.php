<?php

class users_model extends CI_Model {

        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->database();
        }
        
        
        public function LogInUser($UserName,$Password) {
            $encPassword=  md5($Password);
            $this->db->select('Password,Hash')->where('UserName',$UserName);
            $query = $this->db->get('users');
            $result=$query->row_array();
            
            if($result)
            {
                if(($encPassword === $result['Password'])&&($result['Hash'] != 0))
                {
                    return TRUE;
                }
                else 
                {
                    return FALSE;
                }
            }
            else
            {
                return FALSE;
            }
        }
        
        public function GetUserSessionData($UserName) {
            $this->db->where('UserName', $UserName);    
            $query = $this->db->get('users');
            $result = $query->row_array();
            return $result;
        }
        
        public function AddUser($UserName,$Password,$By) {
            $data=array(
                'UserName' => $UserName,
                'Password' => md5($Password),
                'ReferedBy' => $By
            );
            $this->db->insert('users',$data);
        }
        
        public function GetUsersOfCoordinator($CoordinatorID) {
            $this->db->where('ReferedBy', $CoordinatorID);    
            $this->db->select('ID');
            $query = $this->db->get('users');
            $result = $query->result_array();
            return $result;
        }
        
        public function GetNameFromID($UserID) {
            $this->db->where('ID', $UserID);    
            $this->db->select('UserName');
            $query = $this->db->get('users');
            $result = $query->row_array();
            return $result['UserName'];
        }
        
        public function GetMembershipRequests($CoordinatorID) {
            $conditions=array(
                'ReferedBy' => $CoordinatorID,
                'Hash' => '0'
            );
            $this->db->where($conditions);
            $query = $this->db->get('users');
            $result = $query->result_array();
            return $result;
        }
        
        public function AcceptUser($UserID,$CoordinatorID) {
            $conditions=array(
                'ID' => $UserID,
                'ReferedBy' => $CoordinatorID
            );
            $this->db->where($conditions);
            $this->db->set('Hash','1');
            $this->db->update('users');
            
        }
        
        public function GetMembersOfCoordinator($CoordinatorID) {
            $conditions=array(
                'ReferedBy' => $CoordinatorID,
                'Hash' => '1',
                'ID !=' => $CoordinatorID
            );
            $this->db->where($conditions);
            $query = $this->db->get('users');
            $result = $query->result_array();
            return $result;
        }
        
        public function KickUser($UserID,$CoordinatorID) {
            $conditions=array(
                'ID' => $UserID,
                'ReferedBy' => $CoordinatorID
            );
            $this->db->where($conditions);
            $this->db->set('Hash','0');
            $this->db->update('users');
            
        }
}