<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    // Controller functions needed to show pages related to projects
class Projects extends CI_Controller {

    // Shows main Projects page
    public function index()
	{
	    $data = new stdClass();
	    $data->projects = $this->project_model->getProjects();
	    $data->main_page = 2;

        $this->load->view('templates/head');
        $this->load->view('templates/main_page_header',$data);
        $this->load->view('projects/projects',$data);
        $this->load->view('templates/footer');
    }

    //Shows Create Project page
    public function create_project() {
    	if (!isset($_SESSION['email'])) {
    		redirect('account/login');
    	}
        $this->form_validation->set_rules('title','Title','required|is_unique[project.title]');
    	$data = new stdClass();
        //load event_location data for competitions that user is registered for
        $data->competitions = $this->event_model->get_user_competition_events($_SESSION['email']);

        if ($this->form_validation->run() == TRUE) {
            //insert project data into database
            $insert = $this->project_model->createProject();
            if ($insert) {
                $this->load->view('templates/head');
                $this->load->view('projects/project_created');
                $this->load->view('templates/footer');
            } else {
                $this->load->view('templates/head');
                $this->load->view('projects/create_project', $data);
                $this->load->view('templates/footer');
            }
        } else {
            $this->load->view('templates/head');
            $this->load->view('projects/create_project', $data);
            $this->load->view('templates/footer');
        }
    }

    //Shows project details page
    public function project_details($project_id = null) {
        if (!$project_id) {
            redirect('projects/index');
        }
        $project = $this->project_model->fetchProject($project_id);

        //if project_id does not exist in the database, redirect to projects page
        if (!$project) {
            redirect('projects/index');
        }

        //Converting markdown text to html
        $parser = new \cebe\markdown\GithubMarkdown();
        $parser->html5 = true;
        $description = $parser->parse($project->description);
        $data_story = $parser->parse($project->data_story);
        $project->description = $description;
        $project->data_story = $data_story;

        //get all challenges of the project
        $project->challenges = $this->project_model->get_project_challenges($project_id);
        //get all datasets of the project
        $project->datasets = $this->project_model->get_project_datasets($project_id);

        $project->team_name = $this->team_model->getTeamName($project->team_id);

        $data = new stdClass();
        $this->load->view('templates/head');
        $data->main_page = 2;
        $this->load->view('templates/main_page_header',$data);
        $this->load->view('projects/project_details',$project);
        $this->load->view('templates/footer');
    }





}
