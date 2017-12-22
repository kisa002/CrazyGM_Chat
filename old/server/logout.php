<meta charset="UTF-8">
<?php
	session_start();
	
	echo("<script>alert('".$_SESSION["login_nickname"]."님 로그아웃 처리가 완료되었습니다.')</script>");
	
	session_unset("login_nickname");
	
	echo("<script>location.href='../index.php';</script>");
?>