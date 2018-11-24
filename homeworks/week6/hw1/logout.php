<?
  setcookie("token", '', time()+3600*24);
  header('Location: index.php');
?>