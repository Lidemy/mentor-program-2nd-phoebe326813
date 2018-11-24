<?
	include_once "conn.php";

	if (!empty($_POST['content'])) {
		$user_id = $_COOKIE['user_id'];
		$content = $_POST['content'];
		$parent_id = $_POST['parent_id'];

		$sql = "INSERT INTO phoebe326813_comments (user_id, content, parent_id) VALUES ($user_id, '$content', $parent_id)";
		$conn->query($sql);
		$conn->close();
		header('Location: index.php');
	}