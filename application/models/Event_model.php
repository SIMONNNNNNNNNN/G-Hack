<?php
/**
 * The model related to the event controller
 */
class Event_model extends CI_Model{
  /**
   * This function is used to extract event basic information from the database.
	 *@return query the sql select result.
  */

	public function show_events_basic_information(){
		$this->db->select('type as eventType, event_date as eventDate, event_location.name as eventSelfRegion, region.name as eventParentRegion,
		state_event_id as id');
		$this->db->from('state_event');
		$this->db->join('event_location','state_event.event_location_id = event_location.event_location_id');
		$this->db->join('region','event_location.event_region = region.region_id');
		$this->db->order_by('eventDate','asc');
		$this->db->order_by('eventParentRegion','asc');
		$this->db->order_by('eventSelfRegion','asc');
		$this->db->order_by('eventType','asc');
		$query = $this->db->get();

		return $query;
	}

	/**
	* This function is used to extract specific event details from the database according to the
	* event id.
	*@return query the sql select result.
 */
	public function show_events_details_by_id($id){
		$this->db->select('type as eventType, region.name as regionName, event_date as eventDate,
		registration_setting as setting, event_location.name as eventLocationName, email_address, address, accessibility_information, youth_support_information,
		parking_information, public_transfer_information, hours_of_operation_information');
		$this->db->from('state_event');
		$this->db->where('state_event.state_event_id',$id);
		$this->db->join('event_location','state_event.event_location_id = event_location.event_location_id');
		$this->db->join('region','event_location.event_region = region.region_id');
		$query = $this->db->get();
		return $query;
	}
	
	/**
	* This function is used to register event for a account and generate feedback information.
	*@return string the register result information.
 */
	public function event_register($event_id) {
		$this->db->select('*');
		$this->db->from('state_event_register_view');
		$this->db->where('email_address',trim($_SESSION['email']));
		$this->db->where('state_event_id',trim($event_id));
		$query = $this->db->get();

		$row = $query->row();
		if (isset($row)){
			return "You have already registered to attend this event.";
		}else{
			$this->db->select('account_id');
			$this->db->from('account');
			$this->db->where('email_address',trim($_SESSION['email']));
			$query = $this->db->get();

			$user_account_id = $query->row()->account_id;
			$data = array(
				'account_id' => $user_account_id,
				'state_event_id' => $event_id,
			  );
			$insertion_success_or_not = $this->db->insert('state_event_register', $data);

			if($insertion_success_or_not){
				return "You have successfully registered to attend this event!";
			}else{
				return "Something Wrong!";
			}
		}

	}

	//returns all competition events that user is registered for, or null.
	public function get_user_competition_events($email) {
        $this->db->select('event_location.event_location_id, event_location.name')
            ->from('state_event_register')
            ->join('state_event', 'state_event.state_event_id = state_event_register.state_event_id')
            ->join('account', 'account.account_id = state_event_register.account_id')
            ->join('event_location', 'state_event.event_location_id = event_location.event_location_id')
            ->where('account.email_address',$email)
            ->where('state_event.type', 'competitions');
        $query = $this->db->get();
        $result = $query->result();
        if (isset($result)) {
            return  $result;
        }else{
            return null;
        }
    }

    //checks if user is registered to attend this event
    public function registration_check($account_id, $event_id) {
    	$query = $this->db->select('*')
            ->where('account_id',$account_id)
            ->where('state_event_id', $event_id)
        	->get('state_event_register');
        $result = $query->result();
        if (isset($result)) {
            return $result;
        } else {
            return false;
        }
    }

    //Cancels user's registration to attend an event
    public function cancel_registration($account_id, $event_id) {
    	$query = $this->db->where('account_id', $account_id)
    		->where('state_event_id', $event_id)
			->delete('state_event_register');
		//$result = $query->result();
		if ($this->db->affected_rows()) {
            return true;
        } else {
            return false;
        }
    }
}
?>
