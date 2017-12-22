<meta charset="UTF-8">

<?php
	$sql = mysqli_connect("localhost", "crazygm", "[#crazygm#]", "crazygm");
	
	$email = $_REQUEST["email"];
	$password = md5($_REQUEST["password"]);
	//$password = $_REQUEST["password"];
	
	$result = mysqli_query($sql, "SELECT * FROM account WHERE email='$email' AND password='$password'");

	$row = mysqli_fetch_array($result);
	
	session_start();
	
	if($row != null)
	{
		if($row["ban"] == true)
		{
			echo "<script>alert('정지된 계정입니다.\n관리자에게 문의부탁드리겠습니다.')</script>";
			header("localtion:index.php");
		}
		else
		{
			echo "<script>alert('".$row["nickname"]."님 환영합니다!')</script>\n";
			
			$_SESSION["login_nickname"] = $row["nickname"];	
			
			echo("<script>location.href='../index.php';</script>");
		}
	}
	else
	{
		echo "<script>alert('로그인 실패')</script>\n";
		
		echo("<script>location.href='../index.php';</script>");
	}
?>