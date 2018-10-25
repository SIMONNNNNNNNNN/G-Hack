<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//Class containing functions for loading/processing pages related to the user's Dashboard
class Dashboard extends CI_Controller {
    public function __construct(){
        parent::__construct();

        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->database();
        $this->load->model('Account_model');
        $this->load->model('dashboard_model');
        $this->load->model('Event_model');
        $this->load->model('Challenge_model');
        $this->load->model('Dataset_model');
    }

    //Loads the Dashboard page
    public function index()
	{
		if (!isset($_SESSION['email'])) {
    		redirect('account/login');
    	}
    	$data = new stdClass();
      if($this->dashboard_model->get_privilege($_SESSION['email'])){
          $data->privilege = $this->dashboard_model->get_privilege($_SESSION['email']);

      }

      if($data->privilege->privilege != 'managementTeam'){
          $_SESSION['privilege'] = $data->privilege;

        if($this->account_model->getUserName($_SESSION['email'])){
            $data->user_name = $this->account_model->getUserName($_SESSION['email']);
        }
        if($this->dashboard_model->load_registered_challenges($_SESSION['email'])){
            $data->challenge = $this->dashboard_model->load_registered_challenges($_SESSION['email']);
        }
        if($this->dashboard_model->load_registered_projects($_SESSION['email'])){
            $data->project = $this->dashboard_model->load_registered_projects($_SESSION['email']);

        }
        if($this->dashboard_model->load_registered_team($_SESSION['email'])){
            $data->team = $this->dashboard_model->load_registered_team($_SESSION['email']);

        }
        
        if($this->dashboard_model->load_registered_events($_SESSION['email'])){
            $data->event = $this->dashboard_model->load_registered_events($_SESSION['email']);

        }
        if($this->dashboard_model->load_registered_datasets($_SESSION['email'])){
            $data->dataset = $this->dashboard_model->load_registered_datasets($_SESSION['email']);
        }
        if($this->volunteering_model->get_applications_by_account()){
            $data->volunteering = $this->volunteering_model->get_applications_by_account();
        }
        $this->load->view('templates/head');
          $this->load->view('templates/dashboard_nav');
          $this->load->view('dashboard/dashboard',$data);
        $this->load->view('templates/footer');
      } else{
        $_SESSION['privilege'] = 'managementTeam';
        $query_results=$this->Event_model->show_events_basic_information();
        $data->event = $query_results->result();
        $data->challenge = $this->Challenge_model->get_challenge();
        $query_results=$this->Dataset_model->show_datasets_basic_information();
        $data->dataset = $query_results->result();

        if($this->volunteering_model->get_position_information()){
            $data->volunteering = $this->volunteering_model->get_position_information();
        }

        $this->load->view('templates/head');
        $this->load->view('templates/admin_dashboard_nav');
        $this->load->view('dashboard/admin_dashboard',$data);
        $this->load->view('templates/footer');
      }
    }

    //check if user is attending a competition event and is in a team
    //if not attending will return false, otherwise true.
    //if attending but no team, will create a team and place user in it
    public function create_project_check() {
        if ($this->event_model->get_user_competition_events($_SESSION['email'])) {
            //check if in a team
            if (!$this->account_model->getUserTeamId($_SESSION['email'])) {
                //need to create a team here;
                $this->team_model->create_generic_team($_SESSION['email']);
                $_SESSION['message'] = "A new team was created for you. You can update its details in the dashboard";
            }
            echo true;
        } else {
            echo false;
        }
    }
}
