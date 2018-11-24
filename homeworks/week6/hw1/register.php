<?
  require_once "conn.php";

  if (!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['nickname'])) {

    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $nickname = $_POST['nickname'];

    $sql = "INSERT INTO phoebe326813_users (username, password, nickname) VALUES ('$username', '$password', '$nickname')";
    $result = $conn->query($sql);

    if ($result) {
      $token = uniqid(); 
      $user_id = $conn->insert_id;
      $session_sql = "INSERT INTO phoebe326813_certificates (token, user_id) VALUES ('$token', $user_id)";
      $session_result = $conn->query($session_sql);
      setcookie("token", $token, time()+3600*24);
    }

    $conn->close();
    header('Location: index.php');

  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
  	<meta name="viewport" content="width=device-width,initial-scale=1">
    <title>註冊</title>
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>
  	<div class='registerboard'>
  		<h1 class='board__title'>註冊</h1>
  		<div class='registerblock'>
		  	<form class='registerblock__form' method='POST' action='register.php'>
		  		<div class='registerblock__input'>username: <input name='username' type='text' /></div>
		  		<div class='registerblock__input'>password: <input name='password' type='password' /></div>
		  		<div class='registerblock__input'>nickname: <input name='nickname' type='text' /></div>
		  		<button type='submit' name='submit' class='newpost__form-submit'>註冊</button>
		  	</form>
	  	</div>
	</div>
  </body>
</html>

