<?
	include_once "conn.php";
	$is_login = false;
	$token = '';
	$nickname = '';

	if(isset($_COOKIE["token"]) && !empty($_COOKIE["token"])) {
		$is_login = true;
		$token = $_COOKIE["token"];
	}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
  	<meta name="viewport" content="width=device-width,initial-scale=1">
    <title>留言板</title>
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>

<?
	if ($is_login) {
 		echo "<div class='link'><a href='logout.php'>登出</a></div>";
	} else {
		echo "<div class='link'>";
		echo 	"<a href='register.php'>註冊</a>";
		echo 	"<a href='login.php'>登入</a>";
		echo "</div>";
	}
?>
  	<div class='board'>
  		<h1 class='board__title'>留言板</h1>
  		<div class='newpost'>
			<form class='newpost__form' action='add_post.php' method='POST'>
				<textarea name='content' class='newpost__form-content' placeholder='留言內容'></textarea>
				<input type='hidden' name='parent_id' value='0' />
<?
	if ($is_login) {
 		echo "<button type='submit' name='submit' class='newpost__form-submit'>送出</button>";
	} else {
		echo "<button type='submit' name='submit' class='newpost__form-submit' disabled>請先登入</button>";
	}
?>
			</form>
		</div>
		<div class='posts'>
<?
	$pages_sql = "SELECT COUNT(id) AS num FROM phoebe326813_comments WHERE parent_id = 0";
	$pages_result = $conn->query($pages_sql);
	$pages_row = $pages_result->fetch_assoc();

	$pagesnum = ceil($pages_row['num'] / 10);

	if (!isset($_GET['page'])) $page=1;
	else $page = intval($_GET['page']);

	$sql = "SELECT comments.id, comments.created_at, comments.content, users.nickname, comments.user_id, users.username FROM phoebe326813_comments as comments LEFT JOIN phoebe326813_users as users ON comments.user_id = users.id WHERE parent_id = 0 ORDER BY created_at DESC LIMIT " . ($page-1)*10 .", 10";
	$result = $conn->query($sql);

	while($row = $result->fetch_assoc()) {
?>
			<div class='posts__post'>
				<div class='posts__header'>
					<div class='posts__header-nickname'><? echo htmlspecialchars($row['nickname'] ,ENT_QUOTES, 'utf-8') ?></div>
					<div class='posts__header-timestamp'><? echo $row['created_at'] ?></div>
				</div>
				<div class='posts__contentblock'>
					<div class='posts__content'><? echo htmlspecialchars($row['content'] ,ENT_QUOTES, 'utf-8') ?></div>
<?
		$session_sql = "SELECT * FROM phoebe326813_certificates WHERE token='$token'";
		$session_result = $conn->query($session_sql);
		if ($session_result->num_rows > 0) {
      		while($session_row = $session_result->fetch_assoc()) {
				if ($session_row['user_id'] === $row['user_id']) {
?>
					<div class='posts__change'>
						<form action='edit_post.php' method='POST'>
							<input name='id' type='hidden' value='<? echo $row['id'] ?>' />
							<input name='username' type='hidden' value='<? echo $row['username'] ?>' />
							<button name='submit' type='submit' class='newpost__form-submit'>編輯</button>
						</form>
						<form action='delete_post.php' method='POST'>
							<input name='id' type='hidden' value='<? echo $row['id'] ?>' />
							<input name='username' type='hidden' value='<? echo $row['username'] ?>' />
							<button name='submit' type='submit' class='newpost__form-submit'>刪除</button>
						</form>
					</div>
<?
				}
			}
		}
?>
				</div>
				<div class='posts_comments'>
<?
		$parent_id = $row['id'];
		$sql_sub = "SELECT comments.id, comments.created_at, comments.content, users.nickname,comments.user_id FROM phoebe326813_comments as comments LEFT JOIN phoebe326813_users as users ON comments.user_id = users.id WHERE parent_id = $parent_id ORDER BY created_at DESC";
		$result_sub = $conn->query($sql_sub);

		while($row_sub = $result_sub->fetch_assoc()) {
			if($row_sub['user_id'] === $row['user_id']) {
?>
					<div class='posts__postcolor'>
						<div class='posts__header'>
							<div class='posts__header-nickname'><? echo htmlspecialchars($row_sub['nickname'] ,ENT_QUOTES, 'utf-8') ?></div>
							<div class='posts__header-timestamp'><? echo $row_sub['created_at'] ?></div>
						</div>
					<div class='posts__contentblock'>
						<div class='posts__content'><? echo htmlspecialchars($row_sub['content'] ,ENT_QUOTES, 'utf-8') ?></div>
					</div>
				</div>
<?
			} else {
?>
					<div class='posts__post'>
						<div class='posts__header'>
							<div class='posts__header-nickname'><? echo htmlspecialchars($row_sub['nickname'] ,ENT_QUOTES, 'utf-8') ?></div>
							<div class='posts__header-timestamp'><? echo $row_sub['created_at'] ?></div>
						</div>
						<div class='posts__content'><? echo htmlspecialchars($row_sub['content'] ,ENT_QUOTES, 'utf-8') ?></div>
					</div>
<?
			}
				$edit_sql = "SELECT certificates.user_id, certificates.token, users.username FROM phoebe326813_certificates as certificates LEFT JOIN phoebe326813_users as users ON certificates.user_id = users.id WHERE token='$token'";
				$edit_result = $conn->query($edit_sql);
				if ($edit_result->num_rows > 0) {
		      		while($edit_row = $edit_result->fetch_assoc()) {
						if ($edit_row['user_id'] === $row_sub['user_id']) {
?>
						<div class='posts__change'>
							<form action='edit_post.php' method='POST'>
								<input name='id' type='hidden' value='<? echo $row_sub['id'] ?>' />
								<input name='username' type='hidden' value='<? echo $edit_row['username'] ?>' />
								<button name='submit' type='submit' class='sub_formedit'>編輯</button>
							</form>
							<form action='delete_post.php' method='POST'>
								<input name='id' type='hidden' value='<? echo $row_sub['id'] ?>' />
								<input name='username' type='hidden' value='<? echo $edit_row['username'] ?>' />
								<button name='submit' type='submit' class='sub_formdelete'>刪除</button>
							</form>
						</div>
<?
						}
					}
				}		
		}
?>
					<div class='newpost'>
						<form class='newpost__form' action='add_post.php' method='POST'>
							<textarea name='content' class='newpost__form-content' placeholder='留言內容'></textarea>
							<input name='parent_id' type='hidden' value='<? echo $row['id'] ?>' />
<?
		if ($is_login) {
	 		echo "<button type='submit' name='submit' class='newpost__form-submit'>送出</button>";
		} else {
			echo "<button type='submit' name='submit' class='newpost__form-submit' disabled>請先登入</button>";
		}
?>
						</form>
					</div>
				</div>
			</div>
<?		
	}
?>
			
		</div>
  	</div>
  	<div class='link'>
<?
	for ($i=1; $i<=$pagesnum; $i++) {
		if ($i === $page) echo "<div class='pages'><b> $i </b></div>";
		else echo "<a href='index.php?page=" . $i . "'>" . $i . "</a>";
	}
?>
	</div>
  </body>
</html>