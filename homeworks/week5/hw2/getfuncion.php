<?
	include_once "conn.php";

	function getnavnickname($conn){
		if (isset($_SESSION['u_id'])) {
			include_once "conn.php";
			$sql = "SELECT * FROM phoebe326813_users WHERE user_email='".$_SESSION['u_email']."'";
			$result = $conn->query($sql);
			
			if ($result->num_rows > 0){
				while ($row = $result->fetch_assoc()){
					echo '<div class="nav__login">
							<div class="nav__welcomeword">' . $row["user_nickname"] . ' 歡迎回來！</div>
							<div class="nav__changeinfo"><a href="changeinfo.php">更改會員資料</a></div>
							<div class="nav__form">
								<form action="logout.int.php" method="POST">
									<button type="submit" name="submit" class="nav__submit">登出</button>
								</form>
							</div>';
				}
			} 
		} else {
			echo '<div class="nav__login">
					<div class="nav__form">
						<form action="login.int.php" method="POST">
							<input type="text" name="email" placeholder="電子信箱">
							<input type="password" name="pwd" placeholder="密碼">
							<button type="submit" name="submit" class="nav__submit">登入</button>
						</form>
					</div>
					<div class="nav__signup">
						<div class="nav__signupword">還不是會員？</div>
						<div class="nav__signuplink"><a href="signup.php">註冊</a></div>
					</div>';						
		}
	}

	function getnewpostnickname($conn){
		if (isset($_SESSION['u_id'])) {
			$sql = "SELECT * FROM phoebe326813_users WHERE user_email='".$_SESSION['u_email']."'";
			$result = $conn->query($sql);
			
			if ($result->num_rows > 0){
				while ($row = $result->fetch_assoc()){
					echo '<div class="posts__nickname">'.$row["user_nickname"].'</div>
					</div>
					<div>
						<form class="posts__form" action="posts.int.php" method="POST">
							<textarea name="newpost" class="posts__textarea"></textarea>
							<button type="submit" name="submit" class="posts__submit">留言</button>
						</form>
					</div>';
				}
			}
		} else {
			echo '<div class="posts__nickname">請先登入會員</div>
			</div>';
		}
	}
	
	function getpostscommets($conn){
		$pages_sql = "SELECT COUNT(id) AS num FROM phoebe326813_posts";
		$pages_result = $conn->query($pages_sql);
		$pages_row = $pages_result->fetch_assoc();

		$pagesnum = ceil($pages_row['num'] / 10);

		if(!isset($_GET['page'])) $page=1;
		else $page = intval($_GET['page']);

		$sql = "SELECT id, user_nickname, time, content FROM phoebe326813_posts as posts INNER JOIN phoebe326813_users as users on posts.user_id = users.user_id ORDER BY time DESC LIMIT " . ($page-1)*10 .", 10";
		$result = $conn->query($sql);
		
		if ($result->num_rows > 0){
			while ($row = $result->fetch_assoc()){
				echo '<div class="posts">
					<div class="posts__all">
						<div class="posts__up">				
							<div class="posts__nickname">'.$row["user_nickname"].'</div>
							<div class="posts__time">'.$row["time"].'</div>
						</div>
						<div class="posts__post">';
				echo nl2br ('<div>'.$row["content"].'</div>
						</div><div class="posts__bottom">');

				$sub_sql = "SELECT posts_id, user_nickname, time, content FROM phoebe326813_comments as comments INNER JOIN phoebe326813_users as users on comments.user_id = users.user_id  && posts_id = ".$row["id"]." ORDER BY time DESC";
				$sub_result = $conn->query($sub_sql);
				
				if ($sub_result->num_rows > 0){
					while ($sub_row = $sub_result->fetch_assoc()){
						echo '<div class="posts__comment">
										<div class="posts__commentup">
											<div class="posts__commentnickname">'.$sub_row["user_nickname"].'</div>
											<div class="posts__commenttime">'.$sub_row["time"].'</div>
										</div>
								<div>
								<div>'.$sub_row["content"].'</div>
									</div>
								</div>';
					}
				}

				if (isset($_SESSION['u_id'])) {
					$a_sql = "SELECT * FROM phoebe326813_users WHERE user_email='".$_SESSION['u_email']."'";
					$a_result = $conn->query($a_sql);
					
					if ($a_result->num_rows > 0){
						while ($a_row = $a_result->fetch_assoc()){
							echo '<div class="posts__comment">
										<div class="posts__commentnickname">'.$a_row["user_nickname"].'</div>
											<form class="posts__newcomment" action="posts.int.php" method="POST">
												<textarea name="allcomment" class="posts__commentarea"></textarea>
												<input type="hidden" name="postsid" value="'.$row["id"].'">
												<button type="submit" name="submit2" class="posts__submit">回應</button>
											</form>
									</div>
								</div>
								</div>
								</div>';
						}
					}
				} else {
					echo '<div class="posts__comment">
								<div class="posts__commenttitle">我要回應</div>
								<div class="posts__commentnickname">請先登入會員</div>
							</div>
						</div>
						</div>
						</div>';
				}
			}
		}
	}

	function getpages($conn){
		$pages_sql = "SELECT COUNT(id) AS num FROM phoebe326813_posts";
		$pages_result = $conn->query($pages_sql);
		$pages_row = $pages_result->fetch_assoc();

		$pagesnum = ceil($pages_row['num'] / 10);

		if(!isset($_GET['page'])) $page=1;
		else $page = intval($_GET['page']);

		for($i=1; $i<=$pagesnum; $i++) {
			if($i===$page) echo "<li class='pages'><b> [$i] </b></li>";
			else echo "<li class='pages'><a href='index.php?page=" . $i . "'>" . $i . "</a></li>";
		}
	}		