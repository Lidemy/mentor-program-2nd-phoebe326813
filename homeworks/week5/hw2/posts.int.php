<?
	session_start();

	if (isset($_POST['submit'])) {
		
		include_once "conn.php";

		$newpost = mysqli_real_escape_string($conn, $_POST['newpost']);

		if (empty($newpost)) {
			header("Location: ./index.php?newpost=empty");
			exit();
		} else {
			$sql = "INSERT INTO phoebe326813_posts (user_id, content) VALUES (".$_SESSION['u_id'].", '$newpost');";
				mysqli_query($conn, $sql);
				header("Location: ./index.php?newpost=success");
				exit();
		}
	}

	if (isset($_POST['submit2'])) {

		include_once "conn.php";

		$comment = mysqli_real_escape_string($conn, $_POST['allcomment']);
		$postsid = mysqli_real_escape_string($conn, $_POST['postsid']);

		if (empty($comment)) {
			header("Location: ./index.php?comment=empty");
			exit();
		} else {
			$sql = "INSERT INTO phoebe326813_comments (posts_id, user_id, content) VALUES ('$postsid', '".$_SESSION['u_id']."', '$comment');";
			mysqli_query($conn, $sql);
			header("Location: ./index.php?comment=success");
			exit();
		}
	}

	