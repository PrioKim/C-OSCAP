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
			?>
		</div>
		<hr>
		<header class="jumbotron text-center">
			<div class="container-fluid">
				<img src="sourceimg.png" alt="C-OSCAP">
			</div>
		<h2><a href="index.php">C-OSCAP : Cloud Based Large Scale Open Source Code Analysis Platform</a></h2>
		</header>
		<nav class="col-md-3">
			<ol class="nav nav-oills nav-stacked navbar-header">
			<?php
			echo file_get_contents("list.txt");
			?>
			</ol>
		</nav>

<article>
  	<div id = "real_content">
  	<h2> 소스 코드가 성공적으로 제출되었습니다. </h2>
    <br>
    <h2>처리에는 소스 크기에 따라 7일까지도 소요될 수 있습니다.</h2>
    <br>
    <h3>SCDC 조회 및 삭제 메뉴에서 결과물 확인이 가능합니다.</h3>
  	</div>
</article>


	<script src="http://code.jquery.com/jquery.js"></script>
	<script src="bootstrap-3.3.4-dist/js/bootstrap.min.js"></script>

</body>
</html>
