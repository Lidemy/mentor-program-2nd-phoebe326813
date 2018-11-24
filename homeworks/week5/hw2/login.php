<?
  include_once "conn.php";

  $error_message = '';

  if (!empty($_POST['username'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM phoebe326813_users WHERE username='$username' and password='$password'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      setcookie("user_id", $row['id'], time()+3600*24);
      header('Location: index.php');
    } else {
      $error_message = '帳號或密碼錯誤';
    }
    $conn->close();
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
  	<meta name="viewport" content="width=device-width,initial-scale=1">
    <title>登入</title>
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>
  	<div class='registerboard'>
  		<h1 class='board__title'>登入</h1>
<?
  if ($error_message !== '') {
    echo $error_message;
  }
?>
  		<div class='registerblock'>
		  	<form class='registerblock__form' method='POST' action='login.php'>
		  		<div class='registerblock__input'>username: <input name='username' type='text' /></div>
		  		<div class='registerblock__input'>password: <input name='password' type='password' /></div>
		  		<button type='submit' name='submit' class='newpost__form-submit'>登入</button>
		  	</form>
	  	</div>
	</div>
  </body>
</html>