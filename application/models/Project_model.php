<?php

//Model for database CRUD functions related to projects
class Project_model extends CI_Model {

    //Inserts new project into database
	public function createProject() {
		
		//store user's team into $team_id
		$team_id = $this->account_model->getUserTeamId($_SESSION['email']);

		//store event_location_id from finding it from event_location's name selected by user
		// during project creation.
		$data = array(
        	'title' => $this->input->post('title'),
            'event_location_id' => $this->input->post('event_location_id'),
            //thumbnail image and hi res image to add later

            'description' => $this->input->post('description'),
            'data_story' => $this->input->post('data_story'),
            'source_code_url' => $this->input->post('source_code_url'),
            'video_url' => $this->input->post('video_url'),
            'homepage_url' => $this->input->post('homepage_url'),
            'team_id' => $team_id,
            //'event_location_id' = $event_location_id
    	);
    	// Insert project
    	return $this->db->insert('project', $data);
  	}

    //Gets project information from the Project table in the database
    public function fetchProject($project_id) {
        $query = $this->db->select('*')
       		->where('project_id', $project_id)
            ->get('project');
        $row = $query->row();
        if (isset($row)) {
            return $row;
        }else{
            return false;
        }
    }

    // Updates project information in the Project database
    public function updateProject($project_id) {
		$data = array(
			'title' => $this->input->post('title'),
			'description' => $this->input->post('description'),
            'data_story' => $this->input->post('data_story'),
            'source_code_url' => $this->input->post('source_code_url'),
            'video_url' => $this->input->post('video_url'),
            'homepage_url' => $this->input->post('homepage_url'),
		);
		$query = $this->db->where('project_id', $project_id)
			->update('project',$data);
		if (isset($query)) {
			return true;
		} else {
			return false;
		}
	}

    //get all projects stored in the projects table
	public function getProjects(){
	    $this->db->select("project_id,title,team.name as team_name,event_location.name as location_name");
	    $this->db->from('project');
	    $this->db->join('event_location','project.event_location_id=event_location.event_location_id');
	    $this->db->join('team','team.team_id=project.team_id');
	    $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    //returns all challenges a project is registered for or null.
    public function get_project_challenges($project_id) {
        $query = $this->db->select('challenge.challenge_id, challenge.name, region.name as region')
            ->join('project_challenge','project_challenge.challenge_id = challenge.challenge_id')
            ->join('region','region.region_id = challenge.region')
            ->where('project_challenge.project_id', $project_id)
            ->get('challenge');

        $result = $query->result();
        if (isset($result)) {
            return  $result;
        }else{
            return null;
        }
    }

    //returns all datasets connected to a project or null.
    public function get_project_datasets($project_id) {
        $query = $this->db->select('dataset.dataset_id, dataset_name, dataset_url, region.name as region')
            ->join('project_dataset','project_dataset.dataset_id = dataset.dataset_id')
            ->join('region','region.region_id = dataset.region_id')
            ->where('project_dataset.project_id', $project_id)
            ->get('dataset');
        $result = $query->result();
        if (isset($result)) {
            return  $result;
        }else{
            return null;
        }
    }

}

?>