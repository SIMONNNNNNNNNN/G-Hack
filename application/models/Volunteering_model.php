<?php

// This class contains functions for CRUD operations related to Volunteering system.
class Volunteering_model extends CI_Model {

    //Returns basic information of all volunteering positions
    public function get_position_information () {

        $this->db->select('volunteering_position_id as id, role, region.name as regionName, available_number, description');
        $this->db->from('volunteering_position');
        $this->db->join('region','volunteering_position.region_id = region.region_id');
        $this->db->order_by('region.region_id','asc');
        $query = $this->db->get();
        return $query->result();
    }

    // Return volunteering position by a given volunteering position id
    public function get_position_information_by_num($num){
        $this->db->select('volunteering_position_id as id, role, region_id, available_number, description');
        $this->db->from('volunteering_position');
        $this->db->where('volunteering_position_id',$num);
        $query = $this->db->get();
        return $query->row();
    }

    // Update a volunteering position information of a specifc position id
    public function update_position_information(){
        $data = array(
            'role' => $this->input->post('role'),
            'region_id' => $this->input->post('region_id'),
            'available_number' => $this->input->post('available_number'),
            'description' => $this->input->post('description')
        );

        $query = $this->db->where('volunteering_position_id',$this->input->post('id'))
            ->update('volunteering_position',$data);

        if(isset($query)){
            return true;
        }else{
            return false;
        }
    }

    // Create new volunteering position
    public function new_position(){
        $data = array(
            'role' => $this->input->post('role'),
            'region_id' => $this->input->post('region_id'),
            'available_number' => $this->input->post('available_number'),
            'description' => $this->input->post('description')
        );

        $query = $this->db->insert('volunteering_position',$data);
        if(isset($query)){
            return true;
        }else{
            return false;
        }
    }

    //Return all applications of volunteering positions
    public function get_applications() {
        $this->db->select("volunteer_id,account.name as name, account.email_address as email, role,region.name as regionName, region.region_id as region_id, application_status");
        $this->db->from('volunteering_account');
        $this->db->join('volunteering_position','volunteering_position.volunteering_position_id = volunteering_account.volunteer_position');
        $this->db->join('account','account.account_id = volunteering_account.account_id');
        $this->db->join('region','region.region_id = volunteering_position.region_id');
        $query = $this->db->get();
        return $query->result();

    }

    //get applications of a given account
    public function get_applications_by_account(){
        $this->db->select("volunteer_id,account.name as name, account.email_address as email, role,region.name as regionName, region.region_id as region_id, application_status");
        $this->db->from('volunteering_account');
        $this->db->join('volunteering_position','volunteering_position.volunteering_position_id = volunteering_account.volunteer_position');
        $this->db->join('account','account.account_id = volunteering_account.account_id');
        $this->db->join('region','region.region_id = volunteering_position.region_id');
        $this->db->where('account.email_address',$_SESSION['email']);
        $query = $this->db->get();
        return $query->result();
    }

    //get application detail of a specific volunteer id
    public function get_application_detail($volunteer_id){
        $this->db->select("volunteer_id,account.name as name, account.email_address as email, role,region.name as regionName, region.region_id as region_id, application_status, availability, previous_govhack_experience, apply_reason");
        $this->db->from('volunteering_account');
        $this->db->join('volunteering_position','volunteering_position.volunteering_position_id = volunteering_account.volunteer_position');
        $this->db->join('account','account.account_id = volunteering_account.account_id');
        $this->db->join('region','region.region_id = volunteering_position.region_id');
        $this->db->where('volunteer_id',$volunteer_id);
        $query = $this->db->get();
        return $query->row();
    }

    //update volunteering application's status
    public function updateStates(){
        $data = array(
            'application_status' => $this->input->post('status')
        );

        $query = $this->db->where('volunteer_id',(int)$this->input->post('id'))->update('volunteering_account',$data);
        if(isset($query)){
            return true;
        }else{
            return false;
        }

    }

    //create new application for the current logged-in user
    public function newApplication() {

        $this->db->select('account_id');
        $this->db->from('account');
        $this->db->where('email_address',$_SESSION['email']);
        $query = $this->db->get();
        $account_id = $query->row();
        $data = array(
            'account_id' => $account_id->account_id,
            'volunteer_position' => $this->input->post('id'),
            'application_status' => 'submitted',
            'previous_experience' => $this->input->post('previous_experience'),
            'availability' => $this->input->post('availability'),
            'previous_govhack_experience' => $this->input->post('previous_govhack_experience'),
            'apply_reason' => $this->input->post('apply_reason'),

        );
        $this->db->insert('volunteering_account',$data);

    }



}
?>
