<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class About extends CI_Controller{
	//Loads the About page
    public function index()
	{
        $dat = new stdClass();
	    $dat->main_page = 4;
        $this->load->view('templates/head');
        $this->load->view('templates/main_page_header', $dat);
        $this->load->view('about/about');
        $this->load->view('templates/footer');
    }
}

?>