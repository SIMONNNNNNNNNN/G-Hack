<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Events extends CI_Controller{

	public function __construct(){
		parent::__construct();

		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->database();
		$this->load->model('Event_model');
	}

  /**
   * This function is used to show all events' basic information.
   * Users can browse different types of events and filter events
   * according to month, event type and event region.
  */
	public function index(){
	    $dat = new stdClass();
	    $dat->main_page = 0;
      $this->load->view('templates/head');
      $this->load->view('templates/main_page_header',$dat);

      $query_results=$this->Event_model->show_events_basic_information();
      $data["query_results"] = $query_results;
      $this->load->view('events/event',$data);

      $this->load->view('templates/footer');
    }
  
  /**
   * This function is used to show specific events details to users.
  */
  public function eventDetails() {
    $dat = new stdClass();
    $dat->main_page = 0;
    $event_id = $this->input->get('event_id');
    $query_results = $this->Event_model->show_events_details_by_id($event_id);
    $data["query_results"] = $query_results;
    $data['event_id'] = $event_id;//for the event register
    $data['registered'] = false;
    
    //check if user is registered to attend this event
    if (isset($_SESSION['email'])) {
      $account_id = $this->account_model->get_account_id($_SESSION['email']);
      if ($this->event_model->registration_check($account_id, $event_id)) {
        $data['registered'] = true;
      }
    }

    $this->load->view('templates/head');
    $this->load->view('templates/main_page_header',$dat);
    $this->load->view('events/event_details',$data);
    $this->load->view('templates/footer');
  }
  
  /**
   * This function is used to register to attend a specific event
  */
  public function register(){
    if(!isset($_SESSION['email'])){
      $data['result'] = "Please login first.";
      echo json_encode($data);
      //redirect('account/login');
    }else{
      $event_id = $this->input->get('event_id');
      $result=$this->Event_model->event_register($event_id);
      $data['result'] = $result;
      echo json_encode($data);
    }
  }

  //Cancels user's registration for an event
  public function cancel_registration() {
    $event_id = $this->input->get('event_id');
    //get account_id of user
    $account_id = $this->account_model->get_account_id($_SESSION['email']);
    $result = $this->Event_model->cancel_registration($account_id, $event_id);
    if ($result) {
      $data['result'] = 'You have successfully cancelled your registration';
    } else {
      $data['result'] = 'You have already cancelled your registration';
    }
    echo json_encode($data);
  }

}

