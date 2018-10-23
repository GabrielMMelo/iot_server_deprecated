var app = require('express')();
var http = require('http').Server(app);
var io = require('socket.io')(http);

var Redis = require('ioredis');
var redis = new Redis();
redis.subscribe('button-channel', function(err, count) {
console.log("count" + count);
});

io.on('connection',function(socket) {
  console.log('made socket connection');
  socket.on('esp-channel', function(data){
     io.sockets.emit('esp-channel',data);
    console.log(data.id);
  });
});

/*io.on('esp-channel', function(data){
	console.log("_____DATA:")
	console.log(data);
});*/


redis.on('message', function(channel, message) {
    console.log('Message Recieved: ' + message);
    message = JSON.parse(message);
    io.emit(channel + ':' + message.event, message.data);
    console.log(channel + ':' + message.event, message.data);
});



http.listen(3000, function(){
    console.log('Listening on Port 3000');
});
