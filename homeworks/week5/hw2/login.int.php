<?

	session_start();

	if (isset($_POST['submit'])) {
		
		include_once "conn.php";

		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

		if (empty($email) || empty($password)) {
			header("Location: ./index.php?login=error");
			exit();
		} else {
			$sql = "SELECT * FROM phoebe326813_users WHERE user_email='$email'"; 
			$result = mysqli_query($conn, $sql);
			$resultCheck = mysqli_num_rows($result);

			if ($resultCheck < 1) {
				header("Location: ./index.php?login=error");
				exit();
			} else if ($row = mysqli_fetch_assoc($result)) {
					$hashedPwdCheck = password_verify($pwd, $row['user_password']);
					if ($hashedPwdCheck == false) {
						header("Location: ./index.php?login=error");
						exit();
					} else if ($hashedPwdCheck == true) {
						$_SESSION['u_id'] = $row['user_id'];
						$_SESSION['u_email'] = $row['user_email'];
						$_SESSION['u_nickname'] = $row['user_nickname'];
						header("Location: ./index.php?login=success");
						exit();
					}
			}
		}
	} else {
		header("Location: ./index.php?login=error");
		exit();
	}