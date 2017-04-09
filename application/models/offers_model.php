<?php

class offers_model extends CI_Model {

        public function __construct()
        {
                parent::__construct();
                $this->load->database();
        }
        
        public function AddOffer($MatchID,$MatchPts,$Rate,$MatchOn,$UserID)
        {
            $data=array(
                'MatchID' => $MatchID,
                'MatchPts' => $MatchPts,
                'Rate' => $Rate,
                'MatchOn' => $MatchOn,
                'MatchBy' => $UserID
            );
            $this->db->insert('offers',$data);
        }
        
        public function GetOffers() {
            $this->db->where('TakenBy', '0');
            $query = $this->db->get('offers');
            $result = $query->result_array();
            return $result;
        }
        
        public function GetOffersOfUser($UserID){
            $this->db->where('MatchBy', $UserID);
            $query = $this->db->get('offers');
            $result = $query->result_array();
            return $result;
        }
        
        public function GetMatchesOfUser($UserID){
            $this->db->where('TakenBy', $UserID);
            $query = $this->db->get('offers');
            $result = $query->result_array();
            return $result;
        }
        
        public function AcceptOffer($OfferID,$UserID)
        {
            $conditions=array(
                'ID' => $OfferID,
                'MatchBy !=' => $UserID
            );
            $this->db->set('TakenBy',$UserID);
            $this->db->where($conditions);
            $this->db->update('offers'); 
        }
        
        public function GetAllTakenOffers() {
            $conditions=array(
                'TakenBy !=' => '0'
            );
            $this->db->where($conditions);
            $query = $this->db->get('offers');
            $result = $query->result_array();
            return $result; 
        }
        
        
        
       
}