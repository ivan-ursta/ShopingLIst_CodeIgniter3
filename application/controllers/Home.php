<?php

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('home_model');
	}
	public function RecordsList(){
		$data['title'] = 'List Of Records';
		$data['records'] = $this->home_model->getRecords();
		$data['category'] = $this->home_model->getCategory();
		$this->load->view('records', $data);
	}
}
