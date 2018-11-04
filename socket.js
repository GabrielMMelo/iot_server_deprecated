// Importa os módulos necessários
var app = require('express')();
var http = require('http').Server(app);
var io = require('socket.io')(http);
var Redis = require('ioredis');

// Inicia instancia do Redis e inscreve no mesmo canal em que
// o evento do laravel realiza o broadcasting: 'button-channel'
var redis = new Redis();
redis.subscribe('button-channel', function(err, count) {
    console.log("count" + count);
});

// Ao estabelecer a conexão, inicia um listener
// no canal 'esp-channel' e envia um pacote para os
// nós
io.on('connection',function(socket) {
  console.log('made socket connection');
  socket.on('esp-channel', function(data){
     io.sockets.emit('esp-channel',data);
    console.log(data.id);
  });
});

// Inicia um listener para o evento do click do botão
// (evento do laravel). Quando disparado o evento, envia 
// uma mensagem de broadcasting para os nós.
redis.on('message', function(channel, message) {
    console.log('Message Recieved: ' + message);
    message = JSON.parse(message);
    io.emit(channel + ':' + message.event, message.data);
    console.log(channel + ':' + message.event, message.data);
});


// Inicia o servidor Socket.io
http.listen(3000, function(){
    console.log('Listening on Port 3000');
});
