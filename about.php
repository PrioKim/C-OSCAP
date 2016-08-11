<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />


<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Bootstrap -->
<link href="bootstrap-3.3.4-dist/css/bootstrap.min.css" rel="stylesheet" media="screen">
</head>
<body id="target">
	<div class="container-fluid">
		<div class="masthead">
			<ul class="nav nav-pills pull-right">
			<?php
			session_start();
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
		<div class="col-md-9">

			<br>
			<hr>
			<article>
			  <p class="lead"><h3>클라우드환경에서의 개발자를위한 소스코드문서화프로그램</h3></p>

			<div>

			  <li><h4>C,C++,Java등등다양한언어 지원</h4></li>
			  <li><h4>함수간의 호출관계, 클래스간의 상속관계 등을 그래프로표시 가능</h4></li>
			  <li><h4>함수, 변수 클릭시 상세정보 확인가능</h4></li>
			<p>
			<a clss="btn btn-large btn-success" href="http://www.stack.nl/~dimitri/doxygen/index.html"><h4>View details >></h4></a>
			<p/>
			</div>

			  <?php
			if( empty($_GET['id'])==false){
			  echo file_get_contents($_GET['id'].".txt");
			}


			  ?>
			</article>



		</div>


	<script src="http://code.jquery.com/jquery.js"></script>
	<script src="bootstrap-3.3.4-dist/js/bootstrap.min.js"></script>

</body>
</html>
