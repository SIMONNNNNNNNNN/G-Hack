<?php

class Event_update_model extends CI_Model{
    public function get_all_location_name(){
        $this->db->select('name as eventLoationName');
		$this->db->from('event_location');
		$this->db->order_by('name','asc');
		$query = $this->db->get();
		return $query;
	}
	
  	/**
   	* This function is used to 
	* get all types of event registration setting.
   	*/
	public function get_all_registration_setting(){

		$query = $this->db->query('SELECT unnest(enum_range(NULL::enum_registration_setting))');
		return $query;
	}

	/**
   	* This function is used to 
	* get all types of the event.
   	*/
	public function get_all_eventType(){
		$query = $this->db->query('SELECT unnest(enum_range(NULL::enum_event_type))');
		return $query;
	}

	/**
   	* This function is used to 
	* update the event details or make a new event.
   	*/
	public function create_or_update_event(){
		$this->db->select('event_location_id');
		$this->db->from('event_location');
		$this->db->where('name', $this->input->post('event_location'));
		$query = $this->db->get();
		$row = $query->row();
		
		$data = array(
			//'state_event_id' => $this->input->post('event_id'),
			'event_location_id' => $row->event_location_id,
			'registration_setting' => $this->input->post('registration_setting'),
			//'event_date' => '2018-08-10 06:00:00+00',
			'event_date' => ($this->input->post('event_time'))."+10",
			'type' => $this->input->post('event_type')
			);
		
		$this->db->select('*');
		$this->db->from('state_event');
		$select_event_id = $this->input->post('event_id');
		if($this->input->post('event_id')=="new"){
			$select_event_id = -1;
		}
		$this->db->where('state_event_id', $select_event_id);
		$q = $this->db->get();

		if ( $q->num_rows() > 0 ) 
		{
			$this->db->where('state_event_id', $this->input->post('event_id'));
			$query = $this->db->update('state_event', $data);
			
		} else {
			$query = $this->db->insert('state_event', $data);
		}

		//$query = $this->db->replace('state_event', $data);

		if(isset($query)){
			return true;
		}else{
			return false;
		}
	}
}

?>