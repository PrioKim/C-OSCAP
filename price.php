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
				<img src="sourceimg.png" alt="S_OSCAP">
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
<div class="col-md-9">
<article>
  	<div id = "real_content">
        <h2>스토리지 구매</h2>

        <div class = "select_box">
            <fieldset align>
                <form action="price.php" method="post">
                    100GB <input type="radio" name="price" value="100GB" checked="checked" />
                    500GB <input type="radio" name="price" value="500GB" />
                    1TB <input type="radio" name="price" value="1TB" />
                    1TB이상 <input type="radio" name="price" value="1TB이상" />
                    <input type="submit" name="submit" value="구매">
                    <br><br>
                </form>
            </fieldset>
            </div>
        <h2>스토리지 요금제</h2>
        <br>
        <style media="screen">
            table{
                table-layout:fixed;
            }
        </style>
  		<table class="table table-bordered">
            <tr>
                <th>총 저장용량</th>
                <th>월요금</th>
            </tr>
            <tr>
                <td>30GB</td>
                <td>무료</td>
            </tr>
            <tr>
                <td>100GB</td>
                <td>4500원</td>
            </tr>
            <tr>
                <td>500GB</td>
                <td>20000원</td>
            </tr>
            <tr>
                <td>1TB</td>
                <td>40000원</td>
            </tr>
            <tr>
                <td>1TB이상</td>
                <td>별도 문의</td>
            </tr>
        </table>
  	</div>
</article>
</div>

	<script src="http://code.jquery.com/jquery.js"></script>
	<script src="bootstrap-3.3.4-dist/js/bootstrap.min.js"></script>

</body>
</html>
