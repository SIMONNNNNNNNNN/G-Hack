<?php

/**
 * The model related to account includes functionals for registration, login,
 * sending email, updating profile and etc..
 *
 * @author    g-hack
 * @version   v1.0.1	21/9/2018
 */
class Account_model extends CI_Model{


  /**
   * Create new user account in database.
   *
   * @return true if the account is registered successfully, otherwise false.
   */
  public function register(){
    // User data array
      $enc_password = password_hash($this->input->post('password'),PASSWORD_DEFAULT);
      // If Google user, storing empty string as password.
      if($this->input->post('token')) {
        $enc_password = "";
      }
      $data = array(
        'email_address' => $this->input->post('email'),
        'name' => $this->input->post('name'),
        'password' => $enc_password,
          'privilege' => 'teamMember'
      );
      // Insert user
      return $this->db->insert('account', $data);
  }

  /**
   * Login to account given account number and password.
   *
   * @return true if successfully login to account, otherwise false.
   */
  public function login(){

      $query = $this->db->select('email_address,password')
              ->where('email_address',$this->input->post('email'))
              ->get('account');

      $row = $query->row();
      if (isset($row)){
        // if token is set, password checking is not needed, this is Google sign in.
        if ($this->input->post('token') || password_verify($this->input->post('password'),$row->password)==true) {
          return TRUE;
         }
      }
      return False;
  }

  /**
   * Check whether the email has been signed up in the database.
   *
   * @return true if given email address exists, otherwise false.
   */
  public function checkEmailExist(){
    $this->db->select('*');
    $this->db->where('email_address', $this->input->post('email'));
    $query = $this->db->get('account');

    if ($query->num_rows() > 0){
        return true;
    } else {
        return false;
    }
  }

  /**
   * Send password reset email to the user.
   *
   * @return true if the email has been successfully sent to the user, otherwise false.
   */
  public function sendPasswordResetEmail(){
    $from = "GovHack Account Management Center";
    $receiver = $this->input->post('email');
    $subject = "GovHack Account Password Resetting";
    $message = 'Dear User,<br><br> Please click on the below activation link to reset your password<br><br>
        <a href=\''.base_url().'Account/resetPasswordPage/'.md5($receiver).'\'>Reset your password</a><br><br>Thanks';
    return $this->sendEmail($from,$receiver,$subject,$message);
  }

  /**
   * Reset password data in the database.
   *
   * @param $data verification information when setting new password
   *
   * @return true if the email has been successfully sent to the user, otherwise false.
   */
  public function setNewPassword($data){
    $email_reseted_key = $data['email_resetted_key'];
    $enc_password = password_hash($this->input->post('password_new'),PASSWORD_DEFAULT);
    $newContent = array(
      'password' => $enc_password,
    );

	$this->db->where('md5(email_address)', $email_reseted_key);
    echo "database process outcomes";
    $result = $this->db->update('account',$newContent);
    echo $result;
    return $result;
  }

  /**
   * Send setting password email.
   *
   * @param $from the address for sending the email
   * @param $receiver the user expected to receive the email
   * @param $subject the subject of the email
   * @param $message the message of the email
   *
   * @return true if the email has been successfully sent, otherwise false.
   */
  public function sendEmail($from,$receiver,$subject,$message){
    //config email settings

    $config['protocol'] = 'smtp';
    $config['smtp_host'] = 'ssl://smtp.gmail.com';
    $config['smtp_port'] = '465';
    $config['smtp_user'] = 'deco7381ghack@gmail.com';
    $config['smtp_pass'] = 'ghack123';  //sender's password
    
    $config['mailtype'] = 'html';
    $config['charset'] = 'iso-8859-1';
    $config['wordwrap'] = 'TRUE';
    $config['newline'] = "\r\n";
    date_default_timezone_set("UTC");
    $this->load->library('email', $config);
    $this->email->initialize($config);
    //send email
    $this->email->from('deco7381ghack@gmail.com','GovHack Management Team');
    $this->email->to($receiver);
    $this->email->subject($subject);
    $this->email->message($message);
    
    if($this->email->send()){
      return true;
    }else{
        return false;
    }
}

  /**
   * Get user profile for given email address.
   *
   * @param $email the email address used to get profile.
   * @return database object if the email address exists, otherwise false.
   */
  public function getProfile($email){
    $query = $this->db->select('*')
              ->where('email_address',$email)
              ->get('account');
    $row = $query->row();
    if(isset($row)){
      return $row;
    }else{
      return false;
    }
  }

  /**
   * Get user profile for given email address.
   *
   * @param $email the email address used to get profile.
   * @return database object if the email address exists, otherwise false.
   */
  public function updateProfile($email){
    $data = array(
        'name' => $this->input->post('name'),
        'preferred_name' => $this->input->post('preferredName'),
        'full_legal_name' => $this->input->post('fullLegalName'),
        'dietary_requirement' => $this->input->post('dietaryRequirement'),
        'communication_preference' => $this->input->post('communicationPreference'),
        'tshirt_size' => $this->input->post('tShirtSize'),
        'departure_airport' => $this->input->post('departureAirport'),
        'flight_preference' => $this->input->post('flightPreference'),
        'room_share_preference' => $this->input->post('roomSharePreference'),
        );

    $query = $this->db->where('email_address',$email)
                      ->update('account',$data);

    if(isset($query)){
      return true;
    }else{
      return false;
    }
  }

  /**
   * Get user's name for given email address.
   *
   * @param $email the email address used to get profile.
   * @return name of the user if email address exists, otherwise false.
   */
  public function getUserName($email) {
    $query = $this->db->select('name')->where('email_address',$email)->get('account');
    $row = $query->row();
    if(isset($row)){
      return $row->name;
    }else{
      return false;
    }
  }

  /**
   * Get the team id of the user.
   *
   * @param $email the email address used to get the team id.
   * @return valid team id if the email address exists, otherwise false.
   */
  public function getUserTeamId($email) {
		$query = $this->db->select('team_id')
      ->where('email_address',$email)
      ->get('account');
    $row = $query->row();
  	if (isset($row)) {
		 	return $row->team_id;
  	}else{
     	return false;
  	}
  }

  //returns account id of a user based on their email address
  public function get_account_id($email) {
    $query = $this->db->select('account_id')
      ->where('email_address', $email)
      ->get('account');
    $account_id = $query->row()->account_id;
    return $account_id;
  }

}


 ?>
