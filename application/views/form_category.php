<?php
$this->load->view('header');

echo '<span style="color:red;margin-left:20px;">';
echo validation_errors();
echo '</span>';

if(isset($success)) {
	echo '<span style="color:green;margin-left:20px;">';
	echo $success;
	echo '</span>';
}

if(isset($result)) {
	echo '<div style="color:green;">'.$result.'</div>';
}

$st['class'] = 'form-horizontal';
echo form_open('home/addCategory', $st);

echo '<div class="row" style="margin:2px">';
echo form_label('Enter name', 'catName', array('class'=>'control-label col-md-3'));
$data = array( 'name' => 'categoryName', 'size' => '50', 'class' => '');
echo form_input($data);
echo form_submit(array('name'=>'add','value'=>'Add Category','class'=>'btn btn-success'));
echo '</div>';

echo form_close();

$this->load->view('footer');

