<?
	if (isset($_POST['submit'])) {
		
		include_once "conn.php";

		$nickname = mysqli_real_escape_string($conn, $_POST['nickname']);
		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

		if (empty($nickname) || empty($email) || empty($password)) {
			header("Location: ./signup.php?signup=empty");
			exit();
		} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			header("Location: ./signup.php?signup=email&nickname=$nickname");
			exit();
			} else {
				$sql = "SELECT * FROM phoebe326813_users WHERE user_email='$email'";
				$result = mysqli_query($conn, $sql);
				$resultCheck = mysqli_num_rows($result);

				if ($resultCheck > 0) {
					header("Location: ./signup.php?signup=emailtaken&nickname=$nickname");
					exit();
				} else {
					$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
					$sql = "INSERT INTO phoebe326813_users (user_email, user_password, user_nickname) VALUES ('$email', '$hashedPwd', '$nickname');";
					mysqli_query($conn, $sql);
					header("Location: ./signup.php?signup=success");
					exit();
				}
			}
	} else {
		header("Location: ./signup.php");
		exit();
	}