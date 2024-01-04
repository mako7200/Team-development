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

        {{-- ナビバー --}}
        <nav>
            <a href="{{ route('chat.select') }}" class="nav-return"><i class="fa-solid fa-angle-left"></i></a>
            <a href="{{ route('posts.profile' ,['id' => $otherUser->id]) }}" class="nav-avatar">
                <img src="{{ asset('storage/images/' . $otherUser->avatar) }}" alt="{{ $otherUser->name }}" >
            </a>
            <div class="nav-name">
                <div>{{ $otherUser->name }}</div>
            </div>
        </nav>

        {{--  チャットルーム  --}}
        <div class="chat">
            <div id="room">
                @foreach($messages as $key => $message)
                    {{--   送信したメッセージ  --}}
                    @if($message->send == \Illuminate\Support\Facades\Auth::id())
                        <p class="message send">{{$message->message}}</p>
                        <p class="send-time time">{{ \Carbon\Carbon::parse($message->created_at)->format('n/j G:i') }}</p>
                    @endif
            
                    {{--   受信したメッセージ  --}}
                    @if($message->receive == \Illuminate\Support\Facades\Auth::id())
                        <div class="receive-content">
                        <img class="receive-avatar" src="{{ asset('storage/images/' . $otherUser->avatar) }}" alt="{{ $otherUser->name }}" >
                            <p class="message receive">{{$message->message}}</p>
                        </div>
                        <p class="receive-time time">{{ \Carbon\Carbon::parse($message->created_at)->format('n/j G:i') }}</p>
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
            let avatar = data.avatar;

            if (data.send === login) {
                appendText = '<p class="message send">' + data.message + '</p>';
                appendText += '<p class="send-time time">';
            } else if (data.receive === login) {
            let avatarHTML = '<img class="receive-avatar" src="{{ asset('storage/images/' . $otherUser->avatar) }}" alt="{{ $otherUser->name }}" >';
            appendText = '<div class="receive-content">';
            appendText += avatarHTML; // avatarを直接追加する
            appendText += '<p class="message receive">' + data.message + '</p>';
            appendText += '</div>';
            appendText += '<p class="receive-time time">';
            } else {
                return false;
            }

            const dateTime = new Date(data.created_at);
            const month = dateTime.getMonth() + 1;
            const day = dateTime.getDate();
            const hour = dateTime.getHours();
            const minute = dateTime.getMinutes();
            const formattedTime = month + '/' + day + ' ' + hour + ':' + minute;

            appendText += formattedTime + '</p>';

            $("#room").append(appendText);
            scrollToBottom();
        });



    
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            }
        });
    
        // チャットが表示された際に最下部にスクロールする関数
        function scrollToBottom() {
            var room = $('#room');
            room.scrollTop(room[0].scrollHeight);
        }
    
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
    
        // チャットが読み込まれたときに最下部にスクロール
        $(document).ready(function() {
            scrollToBottom();
        });
    </script> 
</body>
</html>