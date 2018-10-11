<? 
	include_once "header.php"; 
	include_once "conn.php";
	include_once "getfuncion.php";
?>
		<div class="posts">
			<div class="posts__all">
				<div class="posts__title">我要留言</div>
				<div class="posts__up">	
<?
	getnewpostnickname($conn);
?>
			</div>
<?
	getpostscommets($conn);
?>
		</div>
		<div class="pagesblock">
<?
	getpages($conn);
?>
		</div>
<?
	include_once "footer.php"; 
?>
