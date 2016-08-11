<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Bootstrap -->
	<link href="bootstrap-3.3.4-dist/css/bootstrap.min.css" rel="stylesheet" media="screen">
</head>
<body id="target">
	<div class="masthead">
		<ul class="nav nav-pills pull-right">
			<?php
			session_start();
			include_once('db_connect.php');
			if($_SESSION['is_login'] == "YES")
			echo file_get_contents("nav_logedin.txt");
			else{
				?>
				<script>
				alert("로그인 후 이용해 주세요.");
				history.back();
				</script>
				<?php
			}
			?>
			<h1 class="btn-lg label label-default">King of the Cloud</h1>
			<br>
			<?php
			if($_SESSION['is_login'] == "YES")
			echo "<h1 class=\"btn-lg label label-default\">$_SESSION[id]</h1>";
			if(isset($_POST['submit']))
			{
				$prj_name = $_POST['submit'];
				$id = $_SESSION['id'];
				$rm_dst = "/var/www/html/SCDC/" . $id . "/" . $prj_name;
				$qq="DELETE FROM PROJECT WHERE prj_name='$prj_name'";
				$mysqli->query($qq);
				shell_exec("rm -rf '$rm_dst'");
			}
			?>
		</div>
		<hr>
		<header class="jumbotron text-center">
			<img src="sourceimg.png" alt="C-OSCAP">
			<h2><a href="index.php">C-OSCAP : Cloud Based Large Scale Open Source Code Analysis Platform</a></h2>

		</header>

		<nav class="col-md-3">
			<ol class="nav nav-oills nav-stacked navbar-header">
				<?php
				echo file_get_contents("list.txt");
				?>
			</ol>
		</nav>
		<aticle>
			<div class="col-md-6">
				<h2>저장된 C-OSCAP 파일 리스트</h2>
				<br>
				<?php

				$qq="SELECT * FROM PROJECT WHERE user_id='$_SESSION[id]'";
				$result = $mysqli->query($qq);
				$row_num = $result->num_rows;
				echo "<form action=\"search.php\" method=\"post\" accept-charset=\"utf-8\">";
				for($i = 0; $i < $row_num; $i++)
				{
					$row = $result->fetch_array(MYSQLI_ASSOC);
					echo "<h4><li class=\"list-group-item\"><a href=" . $row['doxy_path'] . " target=\"_blank\">" . $row['prj_name'] . "</a> <button class=\"btn btn-success\" type=\"submit\" name=\"submit\" value=" . $row['prj_name'] . ">". "delete</button> </li></h4>";
				}
				echo "</form>";
				?>
			</div>
		</article>
	<script src="http://code.jquery.com/jquery.js"></script>
	<script src="bootstrap-3.3.4-dist/js/bootstrap.min.js"></script>
</body>
</html>
