<?php

// Class containing database CRUD functions related to Challenges
class Challenge_model extends CI_Model{

    // Returns information of all Challenges in the db.
    public function get_challenge() {

        $query = $this->db->select('challenge_id, region, region.name as region_name, challenge.name as name,short_description,image_url')
            ->from('challenge')
            ->join('region','region.region_id = region')
            ->order_by('name','asc')
            ->order_by('region_name','asc')
            ->get();
        $result = $query->result();
        if(isset($result)){
            return $result;
        }
    }

    // Returns information on a particular challenge based on challenge_id.
    public function get_challenge_detail($challenge_id){
        $query = $this->db->select('challenge.*, region.name as region_name')
            ->join('region','region.region_id = challenge.region')
            ->where('challenge_id',$challenge_id)
            ->get('challenge');
        $result = $query->row();
        if(isset($result)){
            return $result;
        }
    }

    // Returns the team_id of the team that a user is a member of based on the user's email address.
    public function get_user_team($email){
        $query = $this->db->select('team_id')
            ->where('email_address',$email)
            ->get('account');
        $result = $query->row();
        return $result;
    }

    // Returns a list of projects that a user is a part of based on the users's email address
    public function get_user_project($email){
        $this->db->select('project_id,title');
        $this->db->from('project');
        $this->db->join('account','account.team_id=project.team_id');
        $this->db->where('email_address',$email);
        $result = $this->db->get();
        return $result;
    }

    // Checks if a project entered a challenge, based on their IDs.
    public function check_register($challenge_id,$project_id){
        $this->db->select('*');
        $this->db->from('project_challenge');
        $this->db->where('project_id',$project_id);
        $this->db->where('challenge_id',$challenge_id);
        $result = $this->db->get();
        return $result;
    }

    // Enters a project into a challenge, based on their IDs.
    public function register_challenge($challenge_id,$project_id){
        $data = array(
            'challenge_id' => $challenge_id,
            'project_id' => $project_id
        );
        return $this->db->insert('project_challenge',$data);
    }

    //Get projects that registered in a challenges
    public function get_team_entries($challenge_id){
        $this->db->select('project.title, team.name as teamName, event_location.name as locationName');
        $this->db->from('challenge');
        $this->db->join('project_challenge','project_challenge.challenge_id=challenge.challenge_id');
        $this->db->join('project','project.project_id = project_challenge.project_id');
        $this->db->join('team','project.team_id=team.team_id');
        $this->db->join('event_location','event_location.event_location_id=project.event_location_id');
        $this->db->where('challenge.challenge_id',$challenge_id);
        $result = $this->db->get();
        if($result){
            return $result->result();
        }else{
            return false;
        }
    }

}
?>
