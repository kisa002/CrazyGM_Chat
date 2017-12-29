var express = require('express');
var app = express();
var http = require('http').Server(app);
var io = require('socket.io')(http);

app.get('/',function(req, res){
  res.sendFile(__dirname + '/client.html');
});

var count=1;
io.on('connection', function(socket){
  console.log('user connected: ', socket.id);
  var name = "user" + count++;
  io.to(socket.id).emit('change name',name);
  //io.emit('receive message', "<b>" + name + "님</b>이 접속하셨습니다.");
  io.emit('receive message', '<div class="c_center"><div class="c_notice c_n2">(&nbsp;<span class="bold">' + name + '님</span>이 입장하셨습니다&nbsp;)</div></div>');

  socket.on('disconnect', function(){
    console.log('user disconnected: ', socket.id);
    io.emit('receive message', '<div class="c_center"><div class="c_notice c_n1">(&nbsp;<span class="bold">' + name + '님</span>이 퇴장하셨습니다&nbsp;)</div></div>');
  });

  socket.on('send message', function(name,text){
    text = text.replace("<", "&lt;");
    text = text.replace(">", "&gt;");

    if(text.indexOf("#notice:") != -1)
    {
      console.log(text);

      text = text.replace("#notice:", "");
      text = '<div class="c_center"><div class="c_notice c_n3">' + text + '</div></div>';

      var msg = text;
    }
    else
    {
      var msg = name + ' : ' + text;

      console.log(msg);
    }
    
    io.emit('receive message', msg);
  });

  socket.on('login', function(email, pw){
    console.log("[LOGIN] email : " + email + " / pw : " + pw);
  });

  socket.on('register', function(nick, email, pw, icon){
    console.log("[REGISTER] nick : " + nick + " / email : " + email + " / pw : " + pw + " / icon : " + icon);
  });
});

http.listen(80, function(){
  console.log('Server Start!');
});
