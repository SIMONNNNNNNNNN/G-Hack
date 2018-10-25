<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Volunteering extends CI_Controller{
    //return all volunteering positions information to ajax
    public function index()
    {
        $results =$this->volunteering_model->get_position_information();
        $array = json_encode($results);
        echo $array;
    }

    //return all volunteering applications to ajax
    public function manageVolunteering(){
        $results = $this->volunteering_model->get_applications();
        $array = json_encode($results);
        echo $array;
    }

    //create a new application for a volunteering position
    public function applyPosition($volunteering_position_id){
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $this->load->helper('form');
            $this->load->library('form_validation');
            $this->form_validation->set_rules('previous_experience','previous_experience','required|max_length[200]');
            $this->form_validation->set_rules('availability','availability','required|max_length[200]');
            $this->form_validation->set_rules('previous_govhack_experience','previous_govhack_experience','required|max_length[200]');
            $this->form_validation->set_rules('apply_reason','apply_reason','required|max_length[200]');

            if($this->form_validation->run() == TRUE){

                $this->volunteering_model->newApplication();
                redirect('dashboard/index');
            }else{
                $data = new stdClass();
                $data->id = $volunteering_position_id;
                $this->load->view('templates/head');
                $this->load->view('templates/dashboard_nav');
                $this->load->view('volunteering/newApplication',$data);
                $this->load->view('templates/footer');
            }
        }else{
            $data = new stdClass();
            $data->id = $volunteering_position_id;
            $this->load->view('templates/head');
            $this->load->view('templates/dashboard_nav');
            $this->load->view('volunteering/newApplication',$data);
            $this->load->view('templates/footer');
        }


    }

    //load detail of a specific detail
    public function application_detail($volunteer_id) {

            $data = new stdClass();
            $data->volunteering = $this->volunteering_model->get_application_detail($volunteer_id);
            $this->load->view('templates/head');
            $this->load->view('templates/dashboard_nav');
            $this->load->view('volunteering/application_detail',$data);
            $this->load->view('templates/footer');

    }

    //update volunteering position information
    public function updatePosition($position_num = null){
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $this->load->helper('form');
            $this->load->library('form_validation');
            $this->form_validation->set_rules('role','role','required');
            $this->form_validation->set_rules('available_number','available_number','required');
            $this->form_validation->set_rules('description','description','required|max_length[200]');
            if($this->form_validation->run() == TRUE){

                $this->volunteering_model->update_position_information();
                redirect('dashboard/index');
            }else{
                $data = new stdClass();
                $data->volunteering = $this->volunteering_model->get_position_information_by_num($_POST['id']);
                $this->load->view('templates/head');
                $this->load->view('templates/admin_dashboard_nav');
                $this->load->view('volunteering/updatePosition',$data);
                $this->load->view('templates/footer');
            }
        }else{
            $data = new stdClass();
            $data->volunteering = $this->volunteering_model->get_position_information_by_num($position_num);
            $this->load->view('templates/head');
            $this->load->view('templates/admin_dashboard_nav');
            $this->load->view('volunteering/updatePosition',$data);
            $this->load->view('templates/footer');
        }

    }

    //load the page for creating new position
    public function newPosition(){
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $this->load->helper('form');
            $this->load->library('form_validation');
            $this->form_validation->set_rules('role','role','required');
            $this->form_validation->set_rules('available_number','available_number','required');
            $this->form_validation->set_rules('description','description','required|max_length[200]');
            if($this->form_validation->run() == TRUE){

                $this->volunteering_model->new_position();
                redirect('dashboard/index');
            }else{
                $this->load->view('templates/head');
                $this->load->view('templates/admin_dashboard_nav');
                $this->load->view('volunteering/newPosition');
                $this->load->view('templates/footer');
            }
        }else{
            $this->load->view('templates/head');
            $this->load->view('templates/admin_dashboard_nav');
            $this->load->view('volunteering/newPosition');
            $this->load->view('templates/footer');
        }

    }

    //load detail page of specific volunteering application
    public function applicationDetail($volunteer_id){

        $data = new stdClass();
        $data->application = $this->volunteering_model->get_application_detail($volunteer_id);
        $this->load->view('templates/head');
        $this->load->view('templates/admin_dashboard_nav');
        $this->load->view('volunteering/application_review',$data);
        $this->load->view('templates/footer');

    }


    // Update status of a application
    public function updateStatus(){
        $query = $this->volunteering_model->updateStates();
        if($query){
            echo "1";
        }else{
            echo "0";
        }

    }


}

?>