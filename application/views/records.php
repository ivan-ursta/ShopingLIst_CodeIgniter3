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

echo '<h2>'.$title.'</h2>';

//Filter by status
echo '<div class="row" style="margin: 2px">';
echo form_open('home/byStatus');
echo form_label('Filter by status:', 'filterByStatus', array('class'=>'control-label', 'style'=>'margin-left:10px'));
$data = array('name' => 'checkStatus', 'id' => 'checkPurchased', 'value' => 'purchased', 'checked' => TRUE);
echo form_label('purchased', 'purchased', array('class'=>'control-label', 'style'=>'margin-left:10px'));
echo form_radio($data);

$data = array('name' => 'checkStatus', 'id' => 'checkNotPurchased', 'value' => 'not purchased');
echo form_label('not purchased', 'notPurchased', array('class'=>'control-label', 'style'=>'margin-left:10px'));
echo form_radio($data);

$data = array('name' => 'byStatus', 'value' => 'Filter','class' => 'btn btn-success btn-sm', 'style'=>'margin-left:10px');
echo form_submit($data);
echo form_close().'</td>';
echo '</div>';

//Filter by category
echo '<div class="row" style="margin: 2px">';
echo form_open('home/byCategory');

echo form_label('Filter by category:', 'filterByCategory', array('class'=>'control-label', 'style'=>'margin-left:10px'));
echo '<select name="categoryId">';
foreach ($category as $c){
	echo '<option value='.$c['id'].'>';
	echo $c['name'];
	echo '</option>';
}
echo '</select>';

$data = array('name' => 'byCategory', 'value' => 'Filter','class' => 'btn btn-success btn-sm', 'style'=>'margin-left:10px');
echo form_submit($data);
echo form_close().'</td>';
echo '</div>';

echo '<table class="table table-striped">';
foreach ($records as $r)
{
	echo '<tr>';
	echo '<td>'.$r['name'].'</td>';
	echo '<td>'.$r['quantity'].'</td>';
	echo '<td>'.$r['recStatus'].'</td>';
	foreach ($category as $c)
	{
		if ($r['categoryId'] == $c['id']){
			echo '<td>'.$c['name'].'</td>';
			break;
		}
	}
	echo '<td>'.$r['created_at'].'</td>';

	$hidden = array('id' => $r['id']);
	echo '<td>'.form_open('home/editStatus','', $hidden);
	$data = array('name' => 'purchased', 'value' => 'not purchased','class' => 'btn btn-success btn-sm');
	echo form_submit($data);
	echo form_close().'</td>';

	echo '<td>'.form_open('home/deleteRecord','', $hidden);
	$data1 = array('name' => 'delete', 'value' => 'Delete','class' => 'btn btn-danger btn-sm');
	echo form_submit($data1);
	echo form_close().'</td>';
	echo '</tr>';
}
echo '</table>';

$this->load->view('footer');
