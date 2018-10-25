<?php

//Class containing functions for database CRUD operations related to information shown on the Dashboard
class Dashboard_model extends CI_Model {

    //Returns challenges that a user is registered for.
    public function load_registered_challenges($email) {
        $this->db->select('challenge.challenge_id,challenge.name,challenge.image_url, region.name as region_name');
        $this->db->from('challenge');
        $this->db->join('project_challenge','project_challenge.challenge_id = challenge.challenge_id');
        $this->db->join('project','project.project_id = project_challenge.project_id');
        $this->db->join('team','team.team_id = project.team_id');
        $this->db->join('account','account.team_id = team.team_id');
        $this->db->join('region','region.region_id = challenge.region');
        $this->db->where('account.email_address',$email);
        $this->db->distinct();
        $query = $this->db->get();
        $result = $query->result();
        if(isset($result)){
            return  $result;
        }else{
            return false;
        }

    }

    public function load_registered_events($email) {
        $this->db->select('type as eventType, event_date as eventDate, child.name as eventSelfRegion, parent.name as eventParentRegion,
		state_event.state_event_id as id, event_location.name as event_location');
        $this->db->from('state_event');
        $this->db->join('event_location','state_event.event_location_id = event_location.event_location_id');
        $this->db->join('region as child','event_location.event_region = child.region_id');
        $this->db->join('region as parent','child.parent_region = parent.region_id');
        $this->db->join('state_event_register','state_event_register.state_event_id = state_event.state_event_id');
        $this->db->join('account','account.account_id = state_event_register.account_id');
        $this->db->where('account.email_address',$email);
        $this->db->order_by('eventDate','asc');
        $this->db->order_by('eventParentRegion','asc');
        $this->db->order_by('eventSelfRegion','asc');
        $this->db->order_by('eventType','asc');
        $query = $this->db->get();

        $result = $query->result();
        if(isset($result)){
            return  $result;
        }else{
            return false;
        }
    }

    public function load_registered_datasets($email) {

        $this->db->select('dataset_name,  region.name as regionName, dataset.dataset_id');
        $this->db->from('dataset');
        $this->db->join('region','dataset.region_id = region.region_id');
        $this->db->join('project_dataset','project_dataset.dataset_id = dataset.dataset_id');
        $this->db->join('project','project.project_id = project_dataset.project_id');
        $this->db->join('team','team.team_id = project.team_id');
        $this->db->join('account','account.team_id = team.team_id');
        $this->db->where('account.email_address',$email);
        $this->db->order_by('dataset_name','asc');
        $this->db->order_by('regionName','asc');
        $query = $this->db->get();
        $result = $query->result();
        if(isset($result)){
            return  $result;
        }else{
            return false;
        }
    }

    //Returns projects that a user is participating in.
    public function load_registered_projects($email){
        $this->db->select('project_id,title,thumbnail_image, team.name as team_name');
        $this->db->from('project');
        $this->db->join('account','account.team_id = project.team_id');
        $this->db->join('team','account.team_id = team.team_id');
        $this->db->where('account.email_address',$email);
        $query = $this->db->get();
        $result = $query->result();
        if(isset($result)){
            return  $result;
        }else{
            return false;
        }
    }

    public function load_registered_team($email){

        $this->db->select('account.team_id, team.name');
        $this->db->from('account');
        $this->db->join('team','team.team_id = account.team_id');
        $this->db->where('email_address',$email);
        $query = $this->db->get();
        $row = $query->row();
        if(isset($row)){
            $this->db->select('COUNT(account.account_id) as number');
            $this->db->from('account');
            $this->db->where('team_id ',$row->team_id);
            $query = $this->db->get();
            $data = $query->row();
            $data->name = $row->name;
            $data->id = $row->team_id;
            return $data;
        }else{
            return false;
        }
    }

    public function get_privilege($email){
        $this->db->select('account.privilege');
        $this->db->from('account');
        $this->db->where('email_address',$email);
        $query = $this->db->get();
        $result = $query->result();
        foreach($result as $row){
          $privilege = $row;
        }
        if(isset($result)){
            return  $privilege;
        }else{
            return false;
        }
    }
}
