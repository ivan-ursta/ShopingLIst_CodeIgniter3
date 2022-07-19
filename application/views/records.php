<?php
$this->load->view('header');
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
	echo '</tr>';
}
echo '</table>';
$this->load->view('footer');
