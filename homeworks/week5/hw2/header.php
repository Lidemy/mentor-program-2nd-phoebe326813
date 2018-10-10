<?
	session_start();
	include_once "getfuncion.php";
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<nav>
			<div class="nav__home"><a href="index.php">留言板</a></div>
				<? 
					getnavnickname($conn);
				?>
			</div>
		</nav>