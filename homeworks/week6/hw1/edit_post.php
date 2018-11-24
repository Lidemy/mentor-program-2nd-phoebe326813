<?
	include_once "conn.php";
	$id = $_POST['id'];
	$username = $_POST['username'];
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
			<meta name="viewport" content="width=device-width,initial-scale=1">
		<title>編輯貼文</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<div class='board'>
	  		<h1 class='board__title'>編輯貼文</h1>
	  		<div class='newpost'>
<?
	$sql = "SELECT * FROM phoebe326813_comments WHERE id = $id";
	$result = $conn->query($sql);

	while($row = $result->fetch_assoc()) {
?>
				<div>內容不可為空白</div>
				<form class='newpost__form' action='edit_post_submit.php' method='POST'>
					<textarea name='content' class='newpost__form-content'><? echo htmlspecialchars($row['content'] ,ENT_QUOTES, 'utf-8') ?></textarea>
					<input name='id' type='hidden' value='<? echo $row['id'] ?>' />
<?
					echo "<input name='username' type='hidden' value='" . $username . "'/>";
?>
					<button name='submit' type='submit' class='newpost__form-submit'>送出</button>
				</form>
			</div>
<?
	}
?>
				</div>
			</div>
  		</div>
	</body>
</html>



