<?
	include_once "conn.php";

	$id = $_POST['id'];
	$username = $_POST['username'];

	$check_sql = "SELECT comments.id, users.username FROM phoebe326813_comments as comments LEFT JOIN phoebe326813_users as users ON comments.user_id = users.id WHERE comments.id = $id";
	$check_result = $conn->query($check_sql);
	if ($check_result->num_rows > 0) {
  		while($check_row = $check_result->fetch_assoc()) {
			if ($username === $check_row['username']){
				$sql = "DELETE FROM phoebe326813_comments WHERE id = $id";
				$conn->query($sql);
				$conn->close();
			}
		}
	}
	header('Location: index.php');
	