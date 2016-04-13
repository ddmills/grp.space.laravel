var
    Vue    = require('vue'),
    moment = require('moment'),
    marked = require('marked'),
    io     = require('socket.io-client')
;

Vue.use(require('vue-resource'));

function show(roomname) {
    Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#_token').getAttribute('value');
    var socket = io(window.location.host + ':' + 3000);

    new Vue({
        el: '.chat',

        data: {
            chatInput: '',
            messages: []
        },

        methods: {
            sendMessage: function() {
                var message = {
                    'timestamp': moment(),
                    'message': this.chatInput,
                    'author': window.CONFIG.author,
                    'pending': true,
                };

                this.messages.push(message);

                this.$http.post(window.location.pathname + '/chat', {'message' : this.chatInput}, []).then(function() {
                    message.pending = false;
                });

                this.chatInput = '';
                Vue.nextTick(this.repositionScroll.bind(this));
            },

            repositionScroll: function() {
                var chatDiv = document.getElementsByClassName("chat-messages");
                chatDiv[0].scrollTop = chatDiv[0].scrollHeight;
            }
        },

        filters: {
            marked: marked
        },

        ready: function() {
            for (var rawMessage of window.CONFIG.rawChatMessages) {
                this.messages.push({
                    'timestamp': moment.utc(rawMessage.timestamp.date),
                    'author': rawMessage.author.username,
                    'message': rawMessage.message.content,
                    'pending': false
                });
            }

            Vue.nextTick(this.repositionScroll.bind(this));

            socket.on('chat:message', function(data) {
                if (data.author.username != window.CONFIG.author) {
                    var message = {
                        'timestamp': moment.utc(data.timestamp.date),
                        'author': data.author.username,
                        'message': data.message.content,
                        'pending': false,
                    };
                    this.messages.push(message);
                    Vue.nextTick(this.repositionScroll.bind(this));
                }
            }.bind(this));
        }
    });
}


module.exports = {
    'show' : show
}
