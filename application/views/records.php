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
	$data = array('name' => 'purchased', 'value' => 'purchased','class' => 'btn btn-success btn-sm');
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
