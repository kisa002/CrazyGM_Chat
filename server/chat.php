<!doctype html>
<html>
	<head>
	    <title>CGM.Chat</title>
	    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, target-densitydpi=medium-dpi" />
	    <script>
		    window.onload=function(){
            window.scrollTo(0, document.body.scrollHeight);
        }
		</script>
	</head>
	
	<body>
		<div class="c_center"><div class="c_notice c_n1">(&nbsp;공지 : CGM.Chat에 오신 것을 환영합니다! / 채팅 규정 확인해주시기 바랍니다.&nbsp;)</div></div>
		<?php
			$sql = mysqli_connect("localhost", "crazygm", "[#crazygm#]", "crazygm");
			
			$message = $_POST["message"];
			$nickname = $_POST["nickname"];
			
			mysqli_query($sql, "set session character_set_connection=utf8;");
			mysqli_query($sql, "set session character_set_results=utf8;");	
			mysqli_query($sql, "set session character_set_client=utf8;");
			
			$current_id = 1;
			
			if($message != null)
			{
				mysqli_query($sql, "INSERT INTO chat (message, nickname) VALUES ('$message', '$nickname')");	
			}
			
			$result = mysqli_query($sql, "SELECT * FROM chat");
			
			while($row = mysqli_fetch_array($result))
			{
				echo '<p class="c_text"><img src="../img/ico/woket.png" class="profile"><span class="bold">'.$row["nickname"].'&nbsp;:&nbsp;</span>'.$row['message'].'</p>';
				
				$current_id += 1;
			}
			
			
/*
			//while(true)
			{
				$result = mysqli_query($sql, "SELECT * FROM chat WHERE id=".($current_id + 1));
				
				$row = mysqli_fetch_array($result);
				
				if($row != null)
				{
					echo '<p class="c_text"><img src="../img/ico/woket.png" class="profile"><span class="bold">'.$row["nickname"].'&nbsp;:&nbsp;</span>'.$row['message'].'</p>';
					
					$current_id += 1;
				}
			}
*/
			
			//echo '<div class="c_center"><div class="c_notice c_n2">(&nbsp;<span class="bold">'.$row["nickname"].'</span>이 입장하셨습니다&nbsp;)</div></div>';
		?>
	</body>
</html>
<link rel="stylesheet" type="text/css" href="../style.css">