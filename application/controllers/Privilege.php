<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//Class containing functions for loading/processing pages related to the user's Dashboard
class Privilege extends CI_Controller {

    //load the page of all accounts' privileges
    public function index() {
        $result = $this->privilege_model->get_privilege_information();
        if($result){
            $data = new stdClass();
            $data->privileges = $result;
            $this->load->view('templates/head');
            $this->load->view('templates/admin_dashboard_nav');
            $this->load->view('privilege/managePrivilege',$data);
            $this->load->view('templates/footer');
        }
    }

    //update an account's privilege
    public function updatePrivilege() {
        $result = $this->privilege_model->update_privilege();
        if($result) {
            echo "1";
        }else {
            echo "0";
        }
}
}