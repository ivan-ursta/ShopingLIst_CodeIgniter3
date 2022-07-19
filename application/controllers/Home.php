<?php

class Home extends CI_Controller
{
	public function index()
	{
		$data['title'] = 'Page1';
		$data['text'] = 'This text was send from Home controller';
		$data['countries'] = array('Argentina','Belgium','Canada','Great Britain');
		$this->load->view('page1', $data);
	}
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
