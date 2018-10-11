<? 
	include_once "header.php"; 
?>
		<div class="signup">
			<div class="signup__block">
				<div class="signup__title">註冊會員</div>
				<div class="signup__info">
					<form class="signup__form" action="signup.int.php" method="POST">
						<?
							if (isset($_GET['nickname'])) {
								$nickname = $_GET['nickname'];
								echo '<input type="text" name="nickname" placeholder="暱稱" value="'.$nickname.'">';
							} else {
								echo '<input type="text" name="nickname" placeholder="暱稱">';
							}
						?>
						<input type="text" name="email" placeholder="電子信箱">
						<input type="password" name="pwd" placeholder="設定密碼">
						<button type="submit" name="submit" class="signup__submit">送出資料</button>
					</form>
					<?
						if (!isset($_GET['signup'])) {
							exit();
						} else {
							$signupCheck = $_GET['signup'];
							if ($signupCheck === "empty"){
								echo '<p class="error">錯誤：有資料未填入</p>';
								exit();
							}else if ($signupCheck === "email"){
								echo '<p class="error">錯誤：無效的電子信箱</p>';
								exit();
							}else if ($signupCheck === "emailtaken"){
								echo '<p class="error">錯誤：電子信箱已註冊</p>';
								exit();
							}else if ($signupCheck === "success"){
								echo '<p class="error">註冊成功！</p>';
								exit();
							}
						}
					?>
				</div>
			</div>
		</div>
<?
	include_once "footer.php"; 
?>