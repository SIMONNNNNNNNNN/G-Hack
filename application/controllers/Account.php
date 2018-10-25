<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// This class contains controller functions to display account (user) related pages
class Account extends CI_Controller{

  public function __construct(){
    parent::__construct();

    $this->load->helper('form');
    $this->load->library('form_validation');
    $this->load->library('session');
    $this->load->helper('url');
    $this->load->database();
    $this->load->model('Account_model');
    $this->load->model('Challenge_model');
    $this->load->model('Dataset_model');
    $this->load->model('Region_model');

}

  //This function records which page directed user to log in/register and will redirect user there after successful login/registration
  public function recordCallingPage() {
    if(!empty($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] != base_url('account/login')
        && $_SERVER['HTTP_REFERER'] != base_url('account/register')
        && $_SERVER['HTTP_REFERER'] != base_url('account/success')
        && $_SERVER['HTTP_REFERER'] != base_url('welcome')
        && $_SERVER['HTTP_REFERER'] != base_url()
        //checks if referer page is not password reset page (checks substring only to disregard added key)
        && substr_compare($_SERVER['HTTP_REFERER'], base_url('account/resetPassword'), 0, strlen(base_url('account/resetPassword')), TRUE)) {
      $_SESSION['calling_page'] = $_SERVER['HTTP_REFERER'];
    }
  }

  // Function to process user sign-in.
  public function login(){
    if(isset($_SESSION['email'])){
      redirect('dashboard/index');
    }
    $this->recordCallingPage();
    $data = new stdClass();
    $this->load->helper('form');
    $this->load->library('form_validation');
    $this->form_validation->set_rules('email','Email','required|trim');
    $this->form_validation->set_rules('password','Password','required|min_length[6]');
    if($this->form_validation->run() == FALSE){
        $this->load->view('templates/head');
        $this->load->view('account/login',$data);
        $this->load->view('templates/footer');
    }else{
        if($this->account_model->login()==True){
          //$this->load->view('login_success');
          $_SESSION['email'] = $this->input->post('email');
          // redirects user to the same page where login was initiated or to Profile if none
          if (isset($_SESSION['calling_page'])) {
            redirect($_SESSION['calling_page']);
          } else {
            redirect('dashboard/index');
          }
        }else{
          $data->error = "wrong password";
          $this->load->view('templates/head');
          $this->load->view('account/login',$data);
          $this->load->view('templates/footer');
        }
    }
  }

  // Function to process user registration
  public function register(){
    if(isset($_SESSION['email'])){
      redirect('dashboard/index');
    }
    $this->recordCallingPage();
    //$data = new stdClass();
    $this->load->helper('form');
		$this->load->library('form_validation');
    $this->form_validation->set_rules('email','Email','required|trim|is_unique[account.email_address]');
    $this->form_validation->set_rules('name', 'Name', 'required');
    $this->form_validation->set_rules('password','Password','required|min_length[6]');
    $this->form_validation->set_rules('password_confirm','Confirm Password','required|min_length[6]|matches[password]');
    $this->form_validation->set_message('is_unique','%s has already been taken');
    if($this->form_validation->run() == TRUE){
        //insert into database
        $insert = $this->account_model->register();
        if($insert){
          $this->load->view('templates/head');
          $this->load->view('account/register_success');
          $this->load->view('templates/footer');
        }else{
          $this->load->view('templates/head');
          $this->load->view('account/register');
          $this->load->view('templates/footer');
        }
      }else{
        $this->load->view('templates/head');
        $this->load->view('account/register');
        $this->load->view('templates/footer');
    }
  }

  // Logs user out and clears SESSION.
  public function logout(){
    if(isset($_SESSION['email'])){
      $this->session->sess_destroy();
    }
    redirect('account/login');
  }

  /**
   * This function is used to
   * provide the forget password page to the user.
   * The user need to his/her account email.
  */
  public function forgetPassword(){
    $data = new stdClass();
    $data->message = "";
    $this->load->view('templates/head');
    $this->load->view('account/forgetpassword',$data);
    $this->load->view('templates/footer');
  }

  /**
   * This function is used to
   * verify the account which the user want to change its related password.
   * If the account is valid, the resetting password email will be send to
   * the account related mailbox.
  */
  public function provideEmailForResetPassword(){
    $data = new stdClass();
    $this->load->helper('form');
    $this->load->library('form_validation');
    $this->form_validation->set_rules('email','Email','required|trim');

    if($this->form_validation->run()==false){
      $data->message = "";
      $this->load->view('templates/head');
      $this->load->view('account/forgetpassword',$data);
      $this->load->view('templates/footer');
    }else{
      //$email = $this->input->post('email');
      //echo $email;
      if($this->Account_model->checkEmailExist()){
        if($this->Account_model->sendPasswordResetEmail()){
          $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Please confirm the mail that has been sent to your email. </div>');
          $data->message = "email send succeed";
        //  echo "email send succeed";
          $this->load->view('templates/head');
          $this->load->view('account/forgetpassword',$data);
          $this->load->view('templates/footer');
        }
        //echo $this->email->print_debugger();
      }else{
        $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">You have not signed up using this email! Please signup first or try another email.</div>');
      //  echo "email send failed";
        $data->message = "email send failed";
        $this->load->view('templates/head');
        $this->load->view('account/forgetpassword',$data);
        $this->load->view('templates/footer');
      }

    }

  }

  /**
   * This function is used to
   * provide the resetting password page to the user.
  */
  public function resetPasswordPage($key){
    $_SESSION['resetting_email_key'] = $key;
    $this->load->view('templates/head');
    $this->load->view('account/resetpassword');
    $this->load->view('templates/footer');
  }

  /**
   * This function is used to reset password. If the
   * password has been updated successfully, the page will
   * be redirected to the LogIn page.
  */
  public function resetPassword(){
    $this->load->helper('form');
    $this->load->library('form_validation');
    $this->form_validation->set_rules('password_new','New Password','required|min_length[6]');
    $this->form_validation->set_rules('password_new_confirm','Confirm Password','required|min_length[6]|matches[password_new]');

    $data['email_resetted_key'] = $_SESSION['resetting_email_key'];
    if($this->form_validation->run() == TRUE){
      if($this->Account_model->setNewPassword($data)){
         redirect('account/login');
      }else{
      	$this->resetPasswordPage($_SESSION['resetting_email_key']);
      }
    }else{
    	$this->resetPasswordPage($_SESSION['resetting_email_key']);
    }
  }

  // Loads user's Profile page
  public function showProfile(){
    if(!isset($_SESSION['email'])){
      redirect('account/login');
    }
    $profile = $this->account_model->getProfile($_SESSION['email']);
    $data['email'] = $profile->email_address;
    $data['name'] = $profile->name;
    $data['preferredName'] = $profile->preferred_name;
    if($profile->profile_picture!=null){
      $data['profilePicture'] = $profile->profile_picture;
    }
    $data['privilege'] = $profile->privilege;
    $data['teamID'] = $profile->team_id;
    $this->load->view('templates/head');
    if($data['privilege'] == "managementTeam"){
        $this->load->view('templates/admin_dashboard_nav');
    }else{
        $this->load->view('templates/dashboard_nav');
    }
    $this->load->view('account/profile',$data);
    $this->load->view('templates/footer');
  }

  //Dispays and processes the Update Profile page
  public function updateProfile(){
    $this->load->helper('form');
		$this->load->library('form_validation');

    $profile = $this->account_model->getProfile($_SESSION['email']);
    $data['name'] = $profile->name;
    $data['preferredName'] = $profile->preferred_name;
    $data['fullLegalName'] = $profile->full_legal_name;
    $data['profilePicture'] = $profile->profile_picture;
    $data['dietaryRequirement'] = $profile->dietary_requirement;
    $data['communicationPreference'] = $profile->communication_preference;
    $data['tShirtSize'] = $profile->tshirt_size;
    $data['departureAirport'] = $profile->departure_airport;
    $data['flightPreference'] = $profile->flight_preference;
    $data['roomSharePreference'] = $profile->room_share_preference;

    //$this->load->helper('form');
    //$this->load->library('form_validation');
    $this->form_validation->set_rules('name','Name','required');
    if($this->form_validation->run() == TRUE){
      $this->account_model->updateProfile($_SESSION['email']);
      redirect('account/profile');
    }else{
      $this->load->view('templates/head');
        if($_SESSION['privilege'] == "managementTeam"){
            $this->load->view('templates/admin_dashboard_nav');
        }else{
            $this->load->view('templates/dashboard_nav');
        }
      $this->load->view('account/updateProfile',$data);
      $this->load->view('templates/footer');
    }
  }

  public function editDataset($dataset_id){
    $data['dataset_id'] = $dataset_id;
    $data['region_options'] = $this->Region_model->getAllRegionName();
    if($dataset_id!='new'){
      $dataset = $this->dataset_model->get_dataset_details($dataset_id);
      $data['name'] = $dataset->dataset_name;
      $data['description'] = $dataset->description;
      $data['url'] = $dataset->dataset_url;
      $data['current_region'] = $this->Region_model->getRegionName($dataset->region_id);
    }

    $this->load->view('templates/head');
    $this->load->view('account/updateDataset',$data);
    $this->load->view('templates/footer');
  }

  public function updateDataset($dataset_id){
    $this->load->helper('form');
    $this->load->library('form_validation');
    $this->form_validation->set_rules('name','name','required');
    $this->form_validation->set_rules('description','description','required');
    $this->form_validation->set_rules('url','url','required');

    if($this->form_validation->run() == TRUE){
      $id = $this->Region_model->getRegionId($this->input->post('region'));
      $data = array(
        'dataset_name' => $this->input->post('name'),
        'region_id' => $id,
        'description' => $this->input->post('description'),
        'dataset_url' => $this->input->post('url')
        );
      if($dataset_id!='new'){
        $this->db->where('dataset_id', $dataset_id);
        $this->db->update('dataset', $data);
      }else{
        $this->db->where('dataset_id', -1);
        $this->db->insert('dataset', $data);
      }

      redirect('dashboard/index');
    }else{
      $this->editDataset($dataset_id);
    }

  }

  public function updateTeam ($team_id){
    $this->load->helper('form');
    $this->load->library('form_validation');
    $this->form_validation->set_rules('name','name','required');

    if($this->form_validation->run() == TRUE){

      $data = array(
        'name' => $this->input->post('name'),
        'captain' => $this->account_model->get_account_id($_SESSION['email'])
        );

      if($team_id!='new'){
        $this->db->where('team_id', $team_id);
        $this->db->update('team', $data);
      }else{
        $this->db->insert('team', $data);

        $data = array(
            'team_id' => $this->team_model->getTeamid($this->account_model->get_account_id($_SESSION['email']))
        );
        $this->db->where('email_address', $_SESSION['email'])
                      ->update('account', $data);
      }

      redirect('dashboard/index');
    }
  }



  public function editChallenge($challenge_id){

    $data['challenge_id'] = $challenge_id;
    $data['region_options'] = $this->Region_model->getAllRegionName();
    if($challenge_id!='new'){
      $challenge = $this->challenge_model->get_challenge_detail($challenge_id);
      $data['name'] = $challenge->name;
      $data['description'] = $challenge->short_description;
      $data['current_region'] = $this->Region_model->getRegionName($challenge->region);
    }

    $this->load->view('templates/head');
    $this->load->view('account/updateChallenge',$data);
    $this->load->view('templates/footer');
  }

  public function updateChallenge($challenge_id){
    $this->load->helper('form');
    $this->load->library('form_validation');
    $this->form_validation->set_rules('name','name','required');
    $this->form_validation->set_rules('description','description','required');

    if($this->form_validation->run() == TRUE){
      $id = $this->Region_model->getRegionId($this->input->post('region'));
      $data = array(
        'name' => $this->input->post('name'),
        'region' => $id,
        'short_description' => $this->input->post('description')
        );
      if($challenge_id!='new'){
        $this->db->where('challenge_id', $challenge_id);
        $this->db->update('challenge', $data);
      }else{
        $this->db->where('challenge_id', -1);
        $this->db->insert('challenge', $data);
      }

      redirect('dashboard/index');
    }else{
      $this->editChallenge($challenge_id);
    }

  }


  /**
   * This function is used to
   * show the event update page.
  */
  public function updateEvent($event_id){
    $data['event_id'] = $event_id;
    if($event_id!="new"){
      $this->load->model('Event_model');
      $data['current_value'] = $this->Event_model->show_events_details_by_id($event_id);
    }else{
      $data['current_value'] = null;
    }
    $this->load->model('Event_update_model');
    $data['event_information'] = $this->Event_update_model->get_all_location_name();
    $data['all_event_type'] = $this->Event_update_model->get_all_eventType();
    $data['all_registration_setting'] = $this->Event_update_model->get_all_registration_setting();
    //print_r($this->Event_update_model->get_all_eventType()->result());
    //var_dump($answer->result());
    $this->load->view('templates/head');
    $this->load->view('account/updateEvent',$data);
    $this->load->view('templates/footer');
  }

  /**
   * This function is used to
   * update the event information.
  */
  public function editEvent(){
    $this->load->helper('form');
    $this->load->library('form_validation');
    $this->form_validation->set_rules('event_location','event_location','required');
    $this->form_validation->set_rules('registration_setting','registration_setting','required');
    $this->form_validation->set_rules('event_type','event_type','required');
    $this->form_validation->set_rules('event_id','event_id','required');
    if($this->form_validation->run() == TRUE){
      $this->load->model('Event_update_model');
      $operation_result = $this->Event_update_model->create_or_update_event();
      redirect('dashboard/index');
    }else{
      //updateEvent($event_id);
    }
  }

  // Processes Google Sign-in started on Sign In or Register pages.
  // Registers a new user if needed.
  public function google() {
    //read input sent via AJAX
    $id_token = $this->input->post('token');
    //$this->load->view('news/success');
    $CLIENT_ID = '759948704133-m9u80ag34n0037rm8kqhhaqdauqgmh2i.apps.googleusercontent.com';

    // Specify the CLIENT_ID of the app that accesses the backend
    $client = new Google_Client(['client_id' => $CLIENT_ID]);
    $payload = $client->verifyIdToken($id_token);
    if ($payload) {
      if (isset($_SESSION['calling_page'])) {
            $data['redirect'] = $_SESSION['calling_page'];
          } else {
            $data['redirect'] = base_url('dashboard/index');
          }
      $data['logged_in'] = '1';
      if ($this->account_model->login() == True) {
          $_SESSION['email'] = $this->input->post('email');
          $data['response'] = "Logged in as existing Google User.";
        } else {
          //Need to register first
          $insert = $this->account_model->register();
          if ($insert) {
            $_SESSION['email'] = $this->input->post('email');
            $data['response'] = "Registered with Google sign in as new user.";
          } else {
            //some issue with database
            $data['response'] = "Registration failed (database issue). Logging out";
            $data['logged_in'] = '0';
          }
        }
    } else {
      // Invalid ID token, malicious app trying to pretend it's a real user.
      $data['response'] = 'Authentication failed. Login is not genuine! Logging out.';
      $data['logged_in'] = '0';
    }
    echo json_encode($data);
  }


}
 ?>
