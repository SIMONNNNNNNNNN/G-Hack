<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//Class containing functions for loading/processing pages related to the Datasets
class Datasets extends CI_Controller{
  public function __construct(){
		parent::__construct();

		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->database();
		$this->load->model('Dataset_model');
	}

	//Loads the main Datasets page
    public function index()
	{
		$dat = new stdClass();
	    $dat->main_page = 3;
        $this->load->view('templates/head');
        $this->load->view('templates/main_page_header',$dat);

        $query_results=$this->Dataset_model->show_datasets_basic_information();
        $data["query_results"] = $query_results;

        $this->load->view('datasets/datasets',$data);

        $this->load->view('templates/footer');
	}
	
	public function dataset_details($dataset_id){
		$dat = new stdClass();
		$dat->main_page = 3;
		
		$data = new stdClass();

		$data->dataset_detail = $this->dataset_model->get_dataset_details($dataset_id);

		$this->load->view('templates/head');
		$this->load->view('templates/main_page_header',$dat);
		$this->load->view('datasets/dataset_details',$data);

        $this->load->view('templates/footer');
	}


}
