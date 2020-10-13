var http = require('http').Server();
var io = require('socket.io')(http);
var Redis = require('ioredis');

io.origins('*:*')

var redis = new Redis();
redis.subscribe('news-action');

redis.on('message', function(channel, message){
    message = JSON.parse(message);
    io.emit(channel + ':' + message.event, message.data);
});

http.listen(2002, function(){
    console.log('listening on port:2002')
})
