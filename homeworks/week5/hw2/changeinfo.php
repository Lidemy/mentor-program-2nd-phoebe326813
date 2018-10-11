<? 
	include_once "header.php"; 
?>
		<div class="changeinfo">
			<div class="changeinfo__block">
				<div class="changeinfo__title">更改會員資料</div>
				<div class="changeinfo__info">
					<form class="changeinfo__form" action="changeinfo.int.php" method="POST">
						暱稱：<input type="text" name="nickname" placeholder="新暱稱">
						<button type="submit" name="submit1" class="changeinfo__submit">更改</button>
					</form>
					<form class="changeinfo__form" action="changeinfo.int.php" method="POST">
						密碼：<input type="password" name="pwd" placeholder="新密碼">
						<button type="submit" name="submit2" class="changeinfo__submit">更改</button>
					</form>
<?
	if (!isset($_GET['changeinfo'])) {
		exit();
	} else {
		$changeinfoCheck = $_GET['changeinfo'];
		if ($changeinfoCheck === "nicknameempty"){
			echo '<p class="error">錯誤：未填入新暱稱</p>';
			exit();
		}else if ($changeinfoCheck === "success"){
			echo '<p class="error">暱稱更改成功！</p>';
			exit();
		}else if ($changeinfoCheck === "pwdempty"){
			echo '<p class="error">錯誤：未填入新密碼</p>';
			exit();
		}else if ($changeinfoCheck === "success2"){
			echo '<p class="error">密碼更改成功！</p>';
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