<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>chat</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- css --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/chat.css') }}">

    {{-- fontawesome --}}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.5.1/css/all.css">

    {{--  追加  --}}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="crossorigin="anonymous"></script>
    <script src="https://js.pusher.com/8.0.1/pusher.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/push.js/1.0.9/push.min.js"></script>
</head>
<body>
    <div class="whole-page">

        <nav>
            <div>
                <a href=""></a>
            </div>
            <div>
                <img src="" alt="">
            </div>
            <div>
                <div></div>
            </div>
        </nav>

        {{--  チャットルーム  --}}
        <div class="chat">
            <div id="room">
                @foreach($messages as $key => $message)
                    {{--   送信したメッセージ  --}}
                    @if($message->send == \Illuminate\Support\Facades\Auth::id())
                        <div class="message send">
                            <p>{{ $message->created_at }}</p> {{-- 送信日時を表示 --}}
                            <p>{{$message->message}}</p>
                        </div>
                    @endif
            
                    {{--   受信したメッセージ  --}}
                    @if($message->receive == \Illuminate\Support\Facades\Auth::id())
                        <div class="message receive">
                            <p>{{ $message->created_at }}</p>
                            <p>{{$message->message}}</p>
                        </div>
                    @endif
                @endforeach
            </div>
            
            <form class="send_form">
                <textarea name="message" placeholder="メッセージを入力" ></textarea>
                {{-- <button  id="btn_send" onclick='send()'>送信</button> --}}
            </form>
        
            <input type="hidden" name="send" value="{{$param['send']}}">
            <input type="hidden" name="receive" value="{{$param['receive']}}">
            <input type="hidden" name="login" value="{{\Illuminate\Support\Facades\Auth::id()}}">
        </div>
    </div>

    <script type="text/javascript">
        //ログを有効にする
        Pusher.logToConsole = true;
    
        var pusher = new Pusher('778557bd534208ab5b2d', {
            cluster: 'ap3',
            encrypted: true
        });
    
        var pusherChannel = pusher.subscribe('teamchat');
    
        pusher.connection.bind('state_change', function(states) {
            console.log('Pusher Connection State:', states.current);
        });
    
        pusherChannel.bind('chat_event', function(data) {
            let appendText;
            let login = $('input[name="login"]').val();
    
            if (data.send === login) {
                appendText = '<div class="send" style="text-align:right"><p>' + data.message + '</p></div> ';
            } else if (data.receive === login) {
                appendText = '<div class="receive" style="text-align:left"><p>' + data.message + '</p></div> ';
            } else {
                return false;
            }
    
            $("#room").append(appendText);
        });
    
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            }
        });
    
        // Enterキーが押された時の処理
        $('textarea[name="message"]').keydown(function(event) {
            if (event.keyCode === 13 && !event.shiftKey) { // Enterキーのキーコードは13、Shiftキーが押されていないことを確認
                event.preventDefault(); // デフォルトのEnterキーの動作を無効化
                send(); // メッセージを送信する関数を呼び出す
            }
        });
    
        // メッセージ送信
        const send = () => {
            $.ajax({
                type: 'POST',
                url: '/chat/send',
                data: {
                    message: $('textarea[name="message"]').val(),
                    send: $('input[name="send"]').val(),
                    receive: $('input[name="receive"]').val(),
                }
            }).done(function(result) {
                $('textarea[name="message"]').val('');
            }).fail(function(result) {});
        }
        console.log('Pusher Connection State:', pusher.connection.state);
    </script>
    
</body>
</html>