<?php

class Home_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}
	public function getRecords(){
		$res = $this->db->get('records');
		return $res->result_array();
	}
	public function getCategory(){
		$res = $this->db->get('category');
		return $res->result_array();
	}
}

