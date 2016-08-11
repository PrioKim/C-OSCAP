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
				session_start();
				?>
				</ol>
			</nav>
		<div class="col-md-9">


<article>
  <!DOCTYPE html>
  <html lang="eng">
  <head>
    <title>Sign in . Twitter Bootstrap</title>
    <meta charset="utf=8"</meta>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"</meta>
    <meta name="description" content=""></meta>
    <!--Le styles -->
    <linke href="/bootstrap/css/bootstrap.css"
    rel="stylesheet"></link>

    <style type="text/css">
      body {
        background-color: #f5f5f5;
      }

      .form-signin {
        max-width: 300px;

        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
      }
      .form-signin input[type="text"],
      .form-signin input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }

    </style>
  <link href="bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
  </head>
  <body>
    <div class="contatiner">
    	<form class="form-signin" id="login" action="login_chk.php", method="post">
	        <h2 class="form-signin-heading">Please sign in</h2>
	        <input class="input-block-level" type="text" placeholder="ID" name="id"></input>
	        <input class="input-block-level" type="password" placeholder="Password" name="pass"></input>
	        <br>
    		<button class="btn btn-large btn-primary" type="submit">Log in</button>
    	</form>
      </div>




    </body>
    </html>
</article>



		</div>


	<script src="http://code.jquery.com/jquery.js"></script>
	<script src="bootstrap-3.3.4-dist/js/bootstrap.min.js"></script>

</body>
</html>
