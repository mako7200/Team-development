<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>chat</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{--  追加  --}}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="crossorigin="anonymous"></script>
    <script src="https://js.pusher.com/8.0.1/pusher.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/push.js/1.0.9/push.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
            </div>
        </div>
    
        {{--  チャットルーム  --}}
        <div id="room">
            @foreach($messages as $key => $message)
                {{--   送信したメッセージ  --}}
                @if($message->send == \Illuminate\Support\Facades\Auth::id())
                    <div class="send" style="text-align: right">
                        <p>{{$message->message}}</p>
                    </div>
     
                @endif
     
                {{--   受信したメッセージ  --}}
                @if($message->receive == \Illuminate\Support\Facades\Auth::id())
                    <div class="receive" style="text-align: left">
                        <p>{{$message->message}}</p>
                    </div>
                @endif
            @endforeach
        </div>
     
        <form>
            <textarea name="message" style="width:100%"></textarea>
            <button  id="btn_send" onclick='send()'>送信</button>
        </form>
    
        <input type="hidden" name="send" value="{{$param['send']}}">
        <input type="hidden" name="receive" value="{{$param['receive']}}">
        <input type="hidden" name="login" value="{{\Illuminate\Support\Facades\Auth::id()}}">
     
    </div>

    <script type="text/javascript">
    
        //ログを有効にする
        Pusher.logToConsole = true;

    
        var pusher = new Pusher('778557bd534208ab5b2d', {
            cluster  : 'ap3',
            encrypted: true
        });

        var pusherChannel = pusher.subscribe('teamchat'); // Replace 'chat' with your channel name

        // Pusherの接続状態が変更された時に実行される処理
        pusher.connection.bind('state_change', function(states) {
            console.log('Pusher Connection State:', states.current);
        });
    
        //イベントを受信したら、下記処理
        pusherChannel.bind('chat_event', function(data) {
    
            let appendText;
            let login = $('input[name="login"]').val();
    
            if(data.send === login){
                appendText = '<div class="send" style="text-align:right"><p>' + data.message + '</p></div> ';
            }else if(data.receive === login){
                appendText = '<div class="receive" style="text-align:left"><p>' + data.message + '</p></div> ';
            }else{
                return false;
            }

            // メッセージを表示
            $("#room").append(appendText);
    
        });

        
    
        $.ajaxSetup({
            headers : {
                'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content'),
            }});
    
        // メッセージ送信
        const send = () => {
            
            $.ajax({
                type : 'POST',
                url : '/chat/send',
                data : {
                    message : $('textarea[name="message"]').val(),
                    send : $('input[name="send"]').val(),
                    receive : $('input[name="receive"]').val(),
                }
            }).done(function(result){
                $('textarea[name="message"]').val('');
            }).fail(function(result){
            });
        }
        console.log('Pusher Connection State:', pusher.connection.state);
    </script>
</body>
</html>