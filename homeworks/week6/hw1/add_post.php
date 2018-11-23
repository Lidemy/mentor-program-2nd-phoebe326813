<?
	include_once "conn.php";

	if (!empty($_POST['content'])) {
		$token= $_COOKIE["token"];
		$content = $_POST['content'];
		$parent_id = $_POST['parent_id'];

		$session_sql = "SELECT * FROM phoebe326813_certificates WHERE token='$token'";
		$session_result = $conn->query($session_sql);
		if ($session_result->num_rows > 0) {
      		while($row = $session_result->fetch_assoc()) {
      			$user_id = $row['user_id'];
				$sql = "INSERT INTO phoebe326813_comments (user_id, content, parent_id) VALUES ($user_id, '$content', $parent_id)";
				$conn->query($sql);
				$conn->close();
				header('Location: index.php');
			}
		}
	}