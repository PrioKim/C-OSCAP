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
  	<h2> C-OSCAP 실행 및 저장</h2>
    <br>
  		<div class = "select_box">
		<fieldset align>
	  		<form action="doxygen.php" method="post" enctype="multipart/form-data">
	  			<p>Upload your source code directory compressed by zip type</p>
	  			<input type="file" name="upload_file"/><br/>
				Poject name : <input type="text" name="project_name" size=32><br/><br/>
	  			<input type="radio" name="language" value="C" checked="checked" />C
	  			<input type="radio" name="language" value="C++" />C++
	  			<input type="radio" name="language" value="Java" />Java
				<input type="radio" name="language" value="Fortran" />Fortran
				<input type="radio" name="language" value="VHDL" />VHDL
	  			<input type="radio" name="language" value="Python" />Python
				<br/>
				<input type="radio" name="spec" value="minimal" checked="checked" />minimal
				<input type="radio" name="spec" value="normal" />normal
				<input type="radio" name="spec" value="medium" />medium
				<input type="radio" name="spec" value="large" />large
				<input type="radio" name="spec" value="xlarge" />xlarge
	  			<input type="submit" name="submit" value="upload">
	  		</form>
  		</fieldset>
  		</div>
  	</div>
</article>


	<script src="http://code.jquery.com/jquery.js"></script>
	<script src="bootstrap-3.3.4-dist/js/bootstrap.min.js"></script>

</body>
</html>
