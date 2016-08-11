<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
<link rel="stylesheet" type="text/css" href="style.css"


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
		<div class="col-md-6">

              <article>

                  <h2>게시판에 문의하기</h2>
                <form action="process.php" method="post">

                  <div class="form-group">
                    <label for="form-title">제목</label>
                    <input type="text" class="form-control" name="title" id="form-title" placeholder="제목을 적어주세요.">
                  </div>

                  <div class="form-group">
                    <label for="form-author">작성자</label>
                    <input type="text" class="form-control" name="author" id="form-author" placeholder="작성자를 적어주세요.">
                  </div>

                  <div class="form-group">
                    <label for="form-author">본문</label>
                    <textarea class="form-control" rows="10" name="description"  id="form-author" placeholder="본문을 적어주세요."></textarea>
                  </div>


                </form>
              </article>
              <hr>
              <div id="control">
                    <a href="localhost/write.php" class="btn btn-success  btn-lg">쓰기</a>
                    <hr>
              </div>

            </div>
</div>

      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="http://localhost/bootstrap-3.3.4-dist/js/bootstrap.min.js"></script>
    </body>
</article>



		</div>


	<script src="http://code.jquery.com/jquery.js"></script>
	<script src="bootstrap-3.3.4-dist/js/bootstrap.min.js"></script>

</body>
</html>
