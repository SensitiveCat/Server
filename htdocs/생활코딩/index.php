<?php
	require("config/config.php");
	require("lib/db.php");
	$conn = db_init($config["host"], $config["duser"], $config["dpw"], $config["dname"]);
	$result = mysqli_query($conn, 'SELECT * FROM topic');
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<link rel="stylesheet" type="text/css" href="/css/style.css">
	<link href="/bootstrap-3.3.4-dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body id="target">
	<div class="container">
		<header class="jumbotron text-center">
			<img src="https://a.thumbs.redditmedia.com/41Jhg1UypfSljaq0JYfpITlAqlQNe1BwLn6SMwHCzX0.png" alt="고오오오급 시계" class="img-thumbnail" id="logo">
			<h1><a href="/index.php" style="text-decoration:none;" id="mainlink">JavaScript</a></h1>
		</header>
		<div class ="row">
		<nav class="col-md-3">
			<ol class="nav nav-pills nav-stacked">
				<?php
					while($row = mysqli_fetch_assoc($result))
					{
						echo '<li><a href="/index.php?id='.$row['id'].'">'.htmlspecialchars($row['title']).'</a></li>'."\n";
					}
				 ?>
			</ol>
		</nav>
		<div class="col-md-9">
		<article>
			<?php
				if(empty($_GET['id']) === false) {
					$sql = "SELECT topic.id, title, name, description FROM topic LEFT JOIN user ON topic.author = user.id WHERE topic.id=".$_GET['id'];
					$result = mysqli_query($conn, $sql);
					$row = mysqli_fetch_assoc($result);
					echo '<h2>'.htmlspecialchars($row['title']).'</h2>';
					echo '<p>저자 : '.htmlspecialchars($row['name']).'</p>';
					echo strip_tags($row['description'],'<a><h1><h2><h3><h4><h5><ul><ol><li>');
				}
			 ?>
		</article>
		<hr>
		<div id="control">
			<div class="btn-group" role="group" aria-label="...">
				<input type="button" value="white" id="w_btn" class="btn btn-default btn-lg"/>
				<input type="button" value="black" id="b_btn" class="btn btn-default btn-lg" />
			</div>
		<div class="btn-group" role="group" aria-label="...">
			<button id="write" type="button" onclick="location.href='/write.php'" class="btn btn-success btn-lg">쓰기</button>
			<!--<a href="http://localhost/write.php">쓰기</a>-->
			<button id="delete" type="button" onclick="location.href='/delete.php?id=<?=$_GET['id'];?>'" class="btn btn-danger btn-lg">삭제</button>
			<!--<a href="http://localhost/delete.php?id=<?=$_GET['id'];?>">삭제</a>-->
		</div>
		</div>
		</div>
		</div>
	</div>

	<script type="text/javascript" src="javascript/script.js"></script>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="/bootstrap-3.3.4-dist/js/bootstrap.min.js"></script>
</body>
</html>
