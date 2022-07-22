<?php
$this->load->view('header');

echo '<span style="color:red;margin-left:20px;">';
echo validation_errors();
echo '</span>';

if(isset($success)){
	echo '<span style="color: green;margin-left: 20px;">';
	echo $success;
	echo '</span>';
}

if(isset($result)){
	echo '<div style="color: green;">'.$result.'</div>';
}

$st['class'] = 'form-horizontal';
echo form_open('home/addRecord', $st);

echo '<div class="row" style="margin: 2px">';
echo form_label('Enter name', 'recName', array('class'=>'control-label col-md-3'));
$data = array('name' => 'recordName', 'size' => 50, 'class' => '');
echo form_input($data);
echo '</div>';

echo '<div class="row" style="margin: 2px">';
echo form_label('Enter quantity', 'qty', array('class'=>'control-label col-md-3'));
$data = array('name' => 'quantity', 'size' => 50, 'class' => '');
echo form_input($data);
echo '</div>';

echo '<div class="row" style="margin: 2px">';
echo form_label('Select category', 'category', array('class'=>'control-label col-md-3'));
echo '<select name="categoryId">';
foreach ($category as $c){
	echo '<option value='.$c['id'].'>';
	echo $c['name'];
	echo '</option>';
}
echo '</select>';
echo '</div>';

echo '<div class="row" style="margin:2px;">';
echo form_submit(array('name'=>'add','value'=>'Add Record', 'class'=>'btn btn-success col-md-offset-4'));
echo form_reset(array('name'=>'reset','value'=>'Reset', 'class'=>'btn btn-info'));
echo '</div>';

echo form_close();

$this->load->view('footer');


