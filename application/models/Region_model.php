<?php


class Region_model extends CI_Model {

	public function getAllRegionName() {
		$this->db->select('name');
		$this->db->from('region');
		$this->db->order_by('name','asc');
		$query = $this->db->get();
		$result = $query->result();

		return $result;
	}

	public function getRegionName($id){
		$this->db->select('name');
		$this->db->from('region');
		$this->db->where('region_id',$id);
		$query = $this->db->get();
		$result = $query->result();
		foreach ($result as $row){
	      $region = $row->name;
	  }
		return $region;
	}

	public function getRegionId($name){
		$this->db->select('region_id');
		$this->db->from('region');
		$this->db->where('name',$name);
		$query = $this->db->get();
		$result = $query->result();
		foreach ($result as $row){
	      $id = $row->region_id;
	  }
		return $id;
	}

}

?>
