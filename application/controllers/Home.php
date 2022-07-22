<?php

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('home_model');
		$this->load->library('form_validation');
	}
	public function recordsList(){
			$data['title'] = 'List Of Records';
			$data['records'] = $this->home_model->getRecords();
			$data['category'] = $this->home_model->getCategory();
			$this->load->view('records', $data);
	}

	public function addCategory(){
		$this->form_validation->set_rules('categoryName','Category name','required');

		if( $this->form_validation->run() == FALSE){
			$this->load->view('form_category');
		}
		else
		{
			$info['success'] = 'Form data passed the validation';
			$data['name'] = $this->input->post('categoryName');
			$categoryId = $this->home_model->addNewCategory($data);
			$info['result'] = 'Successfully Inserted New Category With Id='.$categoryId;
			$this->load->view('form_category',$info);
		}
	}

	public function addRecord(){
		$this->form_validation->set_rules('recordName', 'Record name', 'required');
		$this->form_validation->set_rules('quantity', 'Quantity', 'numeric|required');

		if($this->form_validation->run() == FALSE){
			$data['category'] = $this->home_model->getCategory();
			$this->load->view('form_record',$data);
		}
		else{
			$info['success'] = 'Form data passed the validation';
			$data['name'] = $this->input->post('recordName');
			$data['quantity'] = $this->input->post('quantity');
			$data['recStatus'] = 'not purchased';
			$data['categoryId'] = $this->input->post('categoryId');
			$recordId = $this->home_model->addNewRecord($data);
			$info['result'] = 'Successfully Inserted New Records With Id='.$recordId;
			$this->load->view('form_record',$info);
		}
	}

	public function editStatus(){
		$data['recStatus'] = 'purchased';
		$id = $this->input->post('id');
		if($this->home_model->purchased($data,$id)){
			$this->recordsList();
		}
		else {
			echo 'error';
		}

	}
}
