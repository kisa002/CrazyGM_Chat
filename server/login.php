<?php
	$sql = mysqli_connect("localhost", "crazygm", "[#crazygm#]", "crazygm");
	
	$email = $_REQUEST["email"];
	$password = md5($_REQUEST["password"]);
	//$password = $_REQUEST["password"];
	
	$result = mysqli_query($sql, "SELECT * FROM account WHERE email='$email' AND password='$password'");

	$row = mysqli_fetch_array($result);
	
	if($row != null)
	{
		if($row["ban"] == true)
		{
			echo "<script>alert('YOU BANNED')</script>";
			header("localtion:index.html");
		}
		else
		{
			echo "<script>alert('WELCOME : ".$row["nickname"]."')</script>\n";
			
			$_SESSION["login_nickname"] = $row["nickname"];	
			
			echo("<script>location.href='../index.html';</script>");
		}
	}
	else
	{
		echo "<script>alert('LOGIN FAILED')</script>\n";
		
		echo("<script>location.href='../index.html';</script>");
	}
?>