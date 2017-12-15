<!doctype html>
<head>
    <title>CGM.Chat</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, target-densitydpi=medium-dpi" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.0.4/socket.io.js"></script>
    <script src="http://code.jquery.com/jquery-1.11.1.js"></script>
    <script>
        var mode=0;
        var _login,_register;
        var nickname;
        window.onload=function(){
            _login=document.getElementById("login");
            _register=document.getElementById("register");
            _win_back=document.getElementById("win_back");
        }
        function login(nickname){
            var t1=document.getElementById("c_input");
            document.getElementById("login").style.display="none";
            document.getElementById("register").style.display="none";
            document.getElementById("win_back").style.display="none";
            
            t1.placeholder = nickname + "님 > 채팅을 입력하세요";
            
            this.nickname = nickname;
        }
        function goto_login(){
            _login.style.display="block";
            _register.style.display="none";
        }
        function goto_register(){
            _login.style.display="none";
            _register.style.display="block";
        }
        function key_check(event){
            if (event.keyCode == 13)
                if (!event.shiftKey){
                    send();
                    event.preventDefault();
                    event.stopImmediatePropagation();
                }
        }
        function send(){
           /* document.getElementById("c_input").value=document.getElementById("c_input").value.replace(/</g,'&lt;'); document.getElementById("c_input").value=document.getElementById("c_input").value.replace(/>/g,'&gt;');*/
            document.form_chat.nickname.value = nickname;
            document.form_chat.target = "ifrm_chat";
            document.form_chat.submit();
            
            document.getElementById("c_input").value="";
            _shift=0;
        }
        function logout()
        {
	        location.href="server/logout.php";
        }
        function chat_refresh(){
			if(document.ifrm_chat != null)
		        document.ifrm_chat.location.reload(true);
	        //setTimeout("chat_refresh()", 3000);
		}
		
		chat_refresh();
    </script>
</head>
<?php
	session_start();
	
	$nickname = $_SESSION["login_nickname"];
 	
 	if($nickname == null)
 		echo '<body>';
 	else
 		echo '<body onload="login('."'$nickname'".')">';
?>
    <div class="main">
        <div id="chat">
<!--
            <div class="c_center"><div class="c_notice c_n1">(&nbsp;공지 : CGM.Chat에 오신 것을 환영합니다! / 채팅 규정 확인해주시기 바랍니다.&nbsp;)</div></div>
            <div class="c_center"><div class="c_notice c_n2">(&nbsp;<span class="bold">바람냥님</span>이 입장하셨습니다&nbsp;)</div></div>
-->
<!--
            <p class="c_text"><img src="img/ico/woket.png" class="profile"><span class="bold">바람냥&nbsp;:&nbsp;</span>안녕</p>

            <div class="c_center"><div class="c_notice c_n2">(&nbsp;<span class="bold">HelloWorld님</span>이 입장하셨습니다&nbsp;)</div></div>
            <p class="c_text"><img src="img/ico/woket.png" class="profile"><span class="bold">HelloWorld&nbsp;:&nbsp;</span>안녕하세요<br>이건 한 줄 내렸습니다.<br>adsf<br>ㅁㄴㅇㄹ<br>마나오리</p>
            <p class="c_text"><img src="img/ico/woket.png" class="profile"><span class="bold">바람냥&nbsp;:&nbsp;</span>와우</p>
            <p class="c_text"><img src="img/ico/woket.png" class="profile"><span class="bold">바람냥&nbsp;:&nbsp;</span>와우</p>
            <p class="c_text"><img src="img/ico/woket.png" class="profile"><span class="bold">바람냥&nbsp;:&nbsp;</span>와우</p>
            <p class="c_text"><img src="img/ico/woket.png" class="profile"><span class="bold">바람냥&nbsp;:&nbsp;</span>와우</p>
            <p class="c_text"><img src="img/ico/woket.png" class="profile"><span class="bold">바람냥&nbsp;:&nbsp;</span>와우</p>
            <p class="c_text"><img src="img/ico/woket.png" class="profile"><span class="bold">바람냥&nbsp;:&nbsp;</span>와우</p>
            <p class="c_text"><img src="img/ico/woket.png" class="profile"><span class="bold">바람냥&nbsp;:&nbsp;</span>와우</p>
            <p class="c_text"><img src="img/ico/woket.png" class="profile"><span class="bold">바람냥&nbsp;:&nbsp;</span>와우</p>
            <p class="c_text"><img src="img/ico/woket.png" class="profile"><span class="bold">바람냥&nbsp;:&nbsp;</span>와우</p>
            <p class="c_text"><img src="img/ico/woket.png" class="profile"><span class="bold">바람냥&nbsp;:&nbsp;</span>와우</p>
            <p class="c_text"><img src="img/ico/woket.png" class="profile"><span class="bold">바람냥&nbsp;:&nbsp;</span>와우</p>
            <p class="c_text"><img src="img/ico/woket.png" class="profile"><span class="bold">바람냥&nbsp;:&nbsp;</span>와우</p>
            <p class="c_text"><img src="img/ico/woket.png" class="profile"><span class="bold">바람냥&nbsp;:&nbsp;</span>와우</p>
            <p class="c_text"><img src="img/ico/woket.png" class="profile"><span class="bold">바람냥&nbsp;:&nbsp;</span>와우</p>
            <p class="c_text"><img src="img/ico/woket.png" class="profile"><span class="bold">바람냥&nbsp;:&nbsp;</span>와우</p>
            <p class="c_text"><img src="img/ico/woket.png" class="profile"><span class="bold">바람냥&nbsp;:&nbsp;</span>와우</p>
-->
            
            <iframe name="ifrm_chat" src="server/chat.php" frameborder="0" width="100%" height="100%"></iframe>            
        </div>
        <div id="ui">
            <form name="form_chat" action="server/chat.php" method="post">
                <div class="input">
                    <input id="c_list" type="button" value="'▽'">
                </div>
                <div class="input">
                    <textarea name="message" id="c_input" placeholder="&nbsp;>&nbsp;채팅을 입력하세요" onkeydown="key_check(event)"></textarea>
                    <input type="text" name="nickname" hidden="true">
                    <input type="button" id="c_send" onclick="send()" value="보내기">
                </div>
            </form>
        </div>
        
        <div id="win_back">
            <div id="win">
                <div id="login">
                    <form action="server/login.php" method=post>
                        <h2>로그인</h2><hr>
                        <br>
                        <span class="win_span">이메일</span><input type=email class="win_input" name="email" required><br>
                        <span class="win_span">비밀번호</span><input type=password class="win_input" name="password" required><br>
                        <input type=text class="win_input" name="icon" value="-1" hidden="true"><br>
                        <input type=submit class="win_button" value="로그인" required>
                        <input type="button" class="win_button" onclick="goto_register()" value="회원가입">
                    </form>
                </div>
                <div id="register">
                    <h2>회원가입</h2><hr>
                    <form action="server/register.php" method=post>
                        <span class="warn">중복 계정 생성은 벤입니다.<br>가입 시 계정 확인 메일이 전송됩니다.</span><br>
                        <span class="win_span">닉네임</span><input type=text class="win_input" name="nickname" required><br>
                        <span class="win_span">이메일</span><input type=email class="win_input" name="email" required><br>
                        <span class="win_span">비밀번호</span><input type=password class="win_input" name="password" required><br>
                        <span class="win_span">비밀번호 확인</span><input type=password class="win_input" name="password2" required><br>
                        <input type=text class="win_input" name="icon" value="-1" hidden="true"><br>
                        <input type=submit class="win_button" value="가입하기" required>
                        <input type="button" class="win_button" onclick="goto_login()" value="취소">
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
<link rel="stylesheet" type="text/css" href="style.css">