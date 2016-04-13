@section('javascript')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.17/vue.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.12.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/marked/0.3.2/marked.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue-resource/0.7.0/vue-resource.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/1.4.5/socket.io.min.js"></script>

    <script>
        var socket = io(window.location.host + ':' + 3000);

        var author = '{{ Auth::user()->username }}';
        var raw = {!! json_encode($messages) !!};
    </script>
@endsection

<div class="panel">
    <div class="panel-header">
        <h4 class="panel-title">
            <i class="icon-chat"></i> Chat
        </h4>
    </div>
    <div class="panel-body chat">
        <div class="chat-messages">
           <div class="chat-message" v-for="message in messages">
               <a class="chat-author" href="/user/@{{ message.author }}">
                   @{{ message.author }}
               </a>
               <span class="chat-timestamp">
                   @{{ message.timestamp.local().calendar() }}
               </span>
               <span class="chat-pending" v-if="message.pending">
                   <i class="icon-dot-2 animate-spin"></i>
               </span>
               <span class="chat-message-text chat-md" v-html="message.message | marked">
               </span>
           </div>
       </div>
        <div class='row chat-input'>
            <div class='column four-fifths'>
                <input type='text' class='form-control' id='chat-message' v-model='chatInput' v-on:keyup.enter="sendMessage">
            </div>
            <div class='column one-fifth'>
                <meta id="_token" value="{{ csrf_token() }}">
                <button type='button' class='btn btn-block btn-primary' v-on:click="sendMessage">send</button>
            </div>
        </div>
    </div>
</div>
