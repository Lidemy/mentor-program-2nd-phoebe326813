<?

	session_start();

	if (isset($_POST['submit1'])) {
		
		include_once "conn.php";

		$nickname = mysqli_real_escape_string($conn, $_POST['nickname']);

		if (empty($nickname)) {
			header("Location: ./changeinfo.php?changeinfo=nicknameempty");
			exit();
		} else {
			$sql = "SELECT * FROM phoebe326813_users WHERE user_email='".$_SESSION['u_email']."'";
			$result = mysqli_query($conn, $sql);
			$resultCheck = mysqli_num_rows($result);

			if ($resultCheck < 1) {
				header("Location: ./changeinfo.php?changeinfo=error");
				exit();
			} else {
				$sql = 'UPDATE phoebe326813_users SET user_nickname="'.$nickname.'" WHERE user_email="'.$_SESSION['u_email'].'"';
				mysqli_query($conn, $sql);
				$_SESSION['u_nickname'] = $row['user_nickname'];
				header("Location: ./changeinfo.php?changeinfo=success");
				exit();
			}
		}
	}

	if (isset($_POST['submit2'])) {
		
		include_once "conn.php";

		$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

		if (empty($pwd)) {
			header("Location: ./changeinfo.php?changeinfo=pwdempty");
			exit();
		} else {
			$sql = "SELECT * FROM phoebe326813_users WHERE user_email='".$_SESSION['u_email']."'";
			$result = mysqli_query($conn, $sql);
			$resultCheck = mysqli_num_rows($result);

			if ($resultCheck < 1) {
				header("Location: ./changeinfo.php?changeinfo=error");
				exit();
			} else {
				$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
				$sql = 'UPDATE phoebe326813_users SET user_password="'.$hashedPwd.'" WHERE user_email="'.$_SESSION['u_email'].'"';
				mysqli_query($conn, $sql);
				header("Location: ./changeinfo.php?changeinfo=success2");
				exit();
			}
		}
	}