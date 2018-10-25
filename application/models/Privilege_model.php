<?php

// Class containing database CRUD functions related to Challenges
class Privilege_model extends CI_Model{

    //get all accounts' information regarding to privilege
    public function get_privilege_information() {
        $this->db->select('account_id, privilege, email_address, name, preferred_name');
        $this->db->from('account');
        $this->db->order_by('privilege','asc');

        $query = $this->db->get();
        if($query){
            return $query->result();
        }else {
            return false;
        }
    }

    //update privilege of a specific account id
    public function update_privilege() {
        $data = array(
            'privilege' => $this->input->post('privilege')
        );

        $query = $this->db->where('account_id',(int)$this->input->post('id'))->update('account',$data);
        if($query){
            return true;
        }else{
            return false;
        }
    }
}