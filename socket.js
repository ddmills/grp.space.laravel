var server = require('http').Server();
var io = require('socket.io')(server);
var Redis = require('ioredis');
var redis = new Redis;


redis.subscribe('chat:message');

redis.on('message', function(channel, message) {
    console.log('message');
    message = JSON.parse(message);
    console.log(message);

    io.emit(channel + ':' + message.event, message.data);
});

server.listen(3000);
