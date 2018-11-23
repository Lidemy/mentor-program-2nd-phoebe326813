<?
  require_once "conn.php";

  if (!empty($_POST['content'])) {

    $content = $_POST['content'];
    $id = $_POST['id'];
    $username = $_POST['username'];

    $check_sql = "SELECT comments.id, users.username FROM phoebe326813_comments as comments LEFT JOIN phoebe326813_users as users ON comments.user_id = users.id WHERE comments.id = $id";
    $check_result = $conn->query($check_sql);
    if ($check_result->num_rows > 0) {
      while($check_row = $check_result->fetch_assoc()) {
        if ($username === $check_row['username']){
          $sql = "UPDATE phoebe326813_comments SET content = '$content' WHERE id = $id";
          $conn->query($sql);
          $conn->close();
        }
      }
    }
    header('Location: index.php');
  } else {
  	header('Location: index.php');
  }

