<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">


<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Bootstrap -->
<link href="bootstrap-3.3.4-dist/css/bootstrap.min.css" rel="stylesheet" media="screen">
</head>

<?php
	session_start();

	if(!isset($_SESSION['is_login']) || $_GET['logout'] == "TRUE"){
		$_SESSION['id']="";
		$_SESSION['is_login']="NO";
	}
?>


<body id="target">
	<div class="container-fluid">
		<div class="masthead">
			<ul class="nav nav-pills pull-right">
			<?php
			if($_SESSION['is_login'] == "YES")
				echo file_get_contents("nav_logedin.txt");
			else
				echo file_get_contents("nav_logedout.txt");
			?>
			<h1 class="btn-lg label label-default">King of the Cloud</h1>
			<br>
			<?php
			if($_SESSION['is_login'] == "YES")
				echo "<h1 class=\"btn-lg label label-default\">$_SESSION[id]</h1>";
			?>
		</div>
		<hr>
		<header class="jumbotron text-center">
			<img src="sourceimg.png" alt="C-OSCAP">
			<h2><a href="index.php">C-OSCAP : Cloud Based Large Scale Open Source Code Analysis Platform</a></h2>
		</header>
		<div class="row">
			<nav class="col-md-3">
			<ol class="nav nav-oills nav-stacked navbar-header">
			<?php
			echo file_get_contents("list.txt");
			?>
			</ol>
			</nav>
		<div class="col-md-6">
			<article>
				<img src="1.png" alt="SCDC">
				<br>
				<img src="3.png" alt="SCDC">
			</article>
		</div>


	<script src="http://code.jquery.com/jquery.js"></script>
	<script src="bootstrap-3.3.4-dist/js/bootstrap.min.js"></script>

</body>
</html>
