<?php

// This class contains functions for CRUD operations related to Datasets.
class Dataset_model extends CI_Model {

	//Returns basic information about datasets combined with region names the datasets relate to.
	public function show_datasets_basic_information() {

		$this->db->select('dataset_name, description, dataset_url, region.name as regionName, dataset.dataset_id');
		$this->db->from('dataset');
		$this->db->join('region','dataset.region_id = region.region_id');
		$this->db->order_by('dataset_name','asc');
		$this->db->order_by('regionName','asc');
		$query = $this->db->get();
		return $query;
	}

	public function get_dataset_details($dataset_id) {
        $query = $this->db->select('dataset.*, region.name as region_name')
            ->join('region','dataset.region_id = region.region_id')
            ->where('dataset_id',$dataset_id)
            ->get('dataset');
        $result = $query->row();
        if(isset($result)){
            return $result;
        }
    }
}
?>
