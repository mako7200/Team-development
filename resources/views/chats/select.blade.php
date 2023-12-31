<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>select</title>
    <link rel="stylesheet" href="{{ asset('css/select.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.5.1/css/all.css">
</head>
<body>
        {{-- ナビバー --}}
        <div class="navigation">
            <nav>
                <ul>
                    <li>
                        <a href="{{ route('posts.profile' ,['id' => Auth::id()]) }}" class="list-a name">
                            <img src="{{ asset('storage/images/' . Auth::user()->avatar) }}" alt="{{ Auth::user()->name }}" class="avatar">
                        </a>
                    </li>
                    <li><a href="{{ route('posts.index') }}" class="list-a"><i class="fa-solid fa-house"></i></a></li>
                    <li><a href="{{ route('posts.create') }}" class="list-a"><i class="fa-solid fa-square-plus"></i></a></li>
                    <li><a href="{{ route('chat.select') }}" class="list-a"><i class="fa-solid fa-comments"></i></a></li>
                    <li><a href="{{ route('users.index') }}" class="list-a"><i class="fa-solid fa-user"></i></a></li>
                    <li><a href="{{ route('likes.index') }}" class="list-a"><i class="fa-solid fa-heart"></i></a></li>
                    <li>Swallow</li>
                </ul>
            </nav>
        </div>  
        {{--  チャット可能ユーザ一覧  --}}
        <div class="select-page">
            <div class="index">
                <h2>メッセージ</h2>
            </div>
            <tbody>
                @foreach($users->sortByDesc(function($user) {
                    return \App\Models\Message::where(function($query) use($user) {
                        $query->where('send', Auth::id())->where('receive', $user->id);
                    })->orWhere(function($query) use($user) {
                        $query->where('send', $user->id)->where('receive', Auth::id());
                    })->latest()->value('created_at');
                    }) as $key => $user)
                    @php
                        $lastMessage = \App\Models\Message::where(function($query) use($user) {
                            $query->where('send', Auth::id())->where('receive', $user->id);
                        })->orWhere(function($query) use($user) {
                            $query->where('send', $user->id)->where('receive', Auth::id());
                        })->latest()->first();
            
                        $hasMessages = $lastMessage !== null;
                        $isReceivedMessage = $lastMessage && $lastMessage->receive == Auth::id();
                    @endphp

                    @if($hasMessages)
                    <a href="/chat/{{$user->id}}" class="message-row">
                        <tr>
                            <div class="user-index">
                                <div class="avatar-image">
                                    @if($user->avatar)
                                    <div class="image-box">
                                        <img src="{{ asset('storage/images/' . $user->avatar) }}" class="image">
                                    </div>
                                    @else
                                        <img src="{{ asset('path/to/default/avatar-image.jpg') }}">
                                    @endif
                                    <div class="name">
                                        <p>{{$user->name}}</p>
                                    </div>
                                    {{-- <div class="last-message-info"> --}}
                                        @if($isReceivedMessage)
                                        <div class="dot">
                                            <p class="last-message-text"><span>・</span>{{$lastMessage->message}}</p>
                                            <!-- 中黒を追加 -->
                                        </div>
                                        @else
                                            <p class="last-message-text">{{$lastMessage->message}}</p>
                                        @endif
                                        {{-- </div> --}}
                                    </div>
                                    <p class="last-time">{{$lastMessage->created_at->format('n/j G:i')}}</p>
                                </div>
                            </tr>
                        </a>
                    @endif
                @endforeach
            </tbody>
        </div>

</body>
</html>


