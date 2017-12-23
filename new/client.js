var socket = io();
$('#chat').on('submit', function(e){
  socket.emit('send message', $('#name').val(), $('#message').val());
  $('#message').val("");
  $("#message").focus();
  e.preventDefault();
});
socket.on('receive message', function(msg){
  $('#chatEnd').before("<p>" + msg.replace("<", "&lt;").replace(">", "&gt;") + "</p>");
  $('#chatLog').scrollTop($('#chatLog')[0].scrollHeight);
});
socket.on('change name', function(name){
  $('#name').val(name);
});