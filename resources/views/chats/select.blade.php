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

    <div class="whole-page">

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
                    <li>アプリ名</li>
                </ul>
            </nav>
        </div>
        {{--  チャット可能ユーザ一覧  --}}
        <div class="select-page">
            <div class="index">
                <h3>ユーザー</h3>
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
                    $hasMessages = \App\Models\Message::where(function($query) use($user) {
                        $query->where('send', Auth::id())->where('receive', $user->id);
                    })->orWhere(function($query) use($user) {
                        $query->where('send', $user->id)->where('receive', Auth::id());
                    })->exists();
                    @endphp
            
                    @if($hasMessages)
                    <tr>
                        <div class="user-index">
                            <div class="avatar-image">
                                @if($user->avatar)
                                    <img src="{{ asset('storage/images/' . $user->avatar) }}" class="image">
                                @else
                                    <img src="{{ asset('path/to/default/avatar-image.jpg') }}">
                                @endif
                                <div class="name">
                                    <td>{{$user->name}}</td>
                                </div>
                            </div>
                           
                            <div class="chat-btn">
                                <td><a href="/chat/{{$user->id}}"><button type="button" class="btn btn-primary">Talk</button></a></td>
                            </div>
                        </div> 
                    </tr>
                    @endif
                @endforeach
            </tbody>
            

        </div>
    </div>

</body>
</html>


