<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>CodeIgniter 3</title>
	<link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.css"); ?>" />
</head>
<body>
<!-- Menu -->
<nav class="navbar navbar-inverse">
	<div class="container-fluid">
		<div class="collapse navbar-collapse" id="myNavbar">
			<ul class="nav navbar-nav">

				<li><a href="<?php echo site_url('home/RecordsList'); ?>">
						Get List</a></li>
				<li><a href="<?php echo site_url('home/AddRecord'); ?>">
						Add Record</a></li>
				<li><a href="<?php echo site_url('home/AddCategory'); ?>">
						Add Category</a></li>
			</ul>
		</div>
	</div>
</nav>
