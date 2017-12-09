<html>
	<head>
		<meta charset="UTF-8">
	</head>
	
	<body>
		
	<?php
		$sql = mysqli_connect("localhost", "crazygm", "[#crazygm#]", "crazygm");
		
		$nickname = $_POST["nickname"];
		$email = $_POST["email"];
		$password = md5($_REQUEST["password"]);
		$icon = $_POST["icon"];
	
		if($nickname != null && $email != null && $password != null)
		{
			mysqli_query($sql, "INSERT INTO account(nickname, email, password, icon) VALUES('$nickname', '$email', '$password', '$icon')");
			
			echo "<script>alert('Register SUCCESS')</script>";
			echo "REGISTER SUCCESS<br><br>Nickname : $nickname<br>Email : $email<br>Icon : $icon";	
		}
	?>
		
		<table border="1">
			<tr>
				<td>id</td>
				<td>nickname</td>
				<td>email</td>
				<td>password</td>
				<td>ban</td>
				<td>icon</td>
				<td>rank</td>
				<td>join_date</td>
			</tr>
	
	<?php	
			$user_list = mysqli_query($sql, "SELECT * FROM account");
			
			while($row = mysqli_fetch_row($user_list))
			{
				echo "			<tr>\n";
				
				for($i=0; $i<8; $i++)
					echo "				<td align='center'>".$row[$i]."</td>\n";
					
				echo "			</tr>\n";
			}
			
			echo "		</table>\n";
			
			echo "	<a href='../register.html'>register page</a>\n";
			echo "	<a href='../'>main page</a>\n";
			
			echo "</html>";
	?>