<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    //Class containing functions related to loading/processing pages related to Challenges
class Challenges extends CI_Controller{
    public function __construct(){
        parent::__construct();

        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->database();
        //$this->load->model('Challenge_model');
    }

    //Loads the main Challenges page
    public function index()
	{
	    $data = new stdClass();

	    $data->challenges = $this->challenge_model->get_challenge();
        $this->load->view('templates/head');
        $data->main_page = 1;
        $this->load->view('templates/main_page_header',$data);

        $this->load->view('challenges/challenges',$data);

        $this->load->view('templates/footer');
    }

    //Loads the challenge details page based on the challenge ID
    public function challenge_detail($challenge_id){
        $data = new stdClass();

        $data->challenge_detail = $this->challenge_model->get_challenge_detail($challenge_id);
        $team_entries = $this->challenge_model->get_team_entries($challenge_id);
        if(isset($team_entries)){
            $data->team_entries = $team_entries;
        }
        $data->main_page = 1;
        $this->load->view('templates/head');
        $this->load->view('templates/main_page_header',$data);

        $this->load->view('challenges/challenge_detail',$data);

        $this->load->view('templates/footer');
    }

    // Loads and processes the page where user can register for (enter) a challenge
    public function register_challenge($challenge_id){
        $data = new stdClass();
        #check login
        if(!isset($_SESSION['email'])){
            redirect('account/login');
        }
        $team=$this->challenge_model->get_user_team($_SESSION['email']);
        #check if user has team
        if($team == null){
            #user dont have team
            $data->team_null = 1;
            $this->load->view('templates/head');
            $this->load->view('challenges/register_challenge',$data);
            $this->load->view('templates/footer');
        }else{
            #user has team
            $projects = $this->challenge_model->get_user_project($_SESSION['email']);
            if($projects->num_rows()==1){
                #user has one project
                $result = $this->challenge_model->check_register($challenge_id,$projects->row()->project_id);
                if($result->num_rows()==0){
                    #user not resgistered
                    if($this->challenge_model->register_challenge($challenge_id,$projects->row()->project_id)){
                        #register successfully
                        $data->register_success = 1;
                        $this->load->view('templates/head');
                        $this->load->view('challenges/register_challenge',$data);
                        $this->load->view('templates/footer');
                    }else{
                        #register failed
                        $data->register_failed = 1;
                        $this->load->view('templates/head');
                        $this->load->view('challenges/register_challenge',$data);
                        $this->load->view('templates/footer');
                    }
                }else{
                    #user registered for this challenge already
                    $data->registered = 1;
                    $this->load->view('templates/head');
                    $this->load->view('challenges/register_challenge',$data);
                    $this->load->view('templates/footer');
                }
            }else if($projects->num_rows()>1){
                #user has multiple projects
                $data->projects = $projects->result();
                $data->challenge_id = $challenge_id;
                $this->load->view('templates/head');
                $this->load->view('challenges/register_challenge',$data);
                $this->load->view('templates/footer');

            }else{
                $data->no_project = '1';
                $this->load->view('templates/head');
                $this->load->view('challenges/register_challenge',$data);
                $this->load->view('templates/footer');
            }

        }

    }
    public function register_challenge_for_project($project_id,$challenge_id){
        $data = new stdClass();
        $result = $this->challenge_model->check_register($challenge_id,$project_id);
        if($result->num_rows()==0){
            #user not resgistered
            if($this->challenge_model->register_challenge($challenge_id,$project_id)){
                #register successfully
                $data->register_success = 1;
                $this->load->view('templates/head');
                $this->load->view('challenges/register_challenge',$data);
                $this->load->view('templates/footer');
            }else{
                #register failed
                $data->register_failed = 1;
                $this->load->view('templates/head');
                $this->load->view('challenges/register_challenge',$data);
                $this->load->view('templates/footer');
            }
        }else{
            #user registered for this challenge already
            $data->registered = 1;
            $this->load->view('templates/head');
            $this->load->view('challenges/register_challenge',$data);
            $this->load->view('templates/footer');
        }
    }
}
?>