<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="style.css">


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
				<article>
					<div class="header">
						<div class="icon"><span class="ico_join"></span><strong><h2>회원가입</h2></strong></div>
					</div>
					<br>
					<div class="col-md-9">
						<form action="signup_chk.php" method="post" accept-charset="utf-8">
							<div id="se-login-fields">
								<label for="display-name">ID</label><br>
								<input type="text" placeholder="SeJongUniv" name="id"><br>
								<label for="email">Email</label><br>
								<input type="email" size="30" maxlength="100" placeholder="you@example.org" name="email"><br>
								<label for="password">Password</label><br>
								<input type="password" placeholder="********" name="pass_1"><br>
								<label for="password2">Confirm password</label><br>
								<input type="password" placeholder="********" name="pass_2"><br>
								<br>
								<div class="butons">
									<p><button class="btn btn-success  btn-lg" type="submit">가입하기</button></p>
								</div>
							</div>
						</form>
					</div>
				</article>


			</div>


			<script src="http://code.jquery.com/jquery.js"></script>
			<script src="bootstrap-3.3.4-dist/js/bootstrap.min.js"></script>

		</body>
		</html>
