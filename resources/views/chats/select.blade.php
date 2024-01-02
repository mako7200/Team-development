<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>select</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/select.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.5.1/css/all.css">
</head>
<body>

    <div class="whole-page">

        {{-- ナビバー --}}
        <div class="navigation">
            <nav>
                <ul>
                    <li><a href="{{ route('posts.profile' ,['id' => Auth::id()]) }}" class="list-a name">{{ Auth::user()->name }}</a></li>
                    <li><a href="{{ route('posts.index') }}" class="list-a"><i class="fa-solid fa-house"></i></a></li>
                    <li><a href="{{ route('posts.create') }}" class="list-a"><i class="fa-solid fa-square-plus"></i></a></li>
                    <li><a href="{{ route('chat.select') }}" class="list-a"><i class="fa-solid fa-comments"></i></a></li>
                    <li><a href="{{ route('posts.search') }}" class="list-a"><i class="fa-solid fa-magnifying-glass"></i></a></li>
                    <li><a href="{{ route('likes.index') }}" class="list-a"><i class="fa-solid fa-heart"></i></a></li>
                    <li>アプリ名</li>
                </ul>
            </nav>
        </div>

        {{--  チャット可能ユーザ一覧  --}}
        <div class="select-page">

            <div class="select">
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $key => $user)
                    <tr>
                        <th>{{$loop->iteration}}</th>
                        <td>{{$user->name}}</td>
                        <td><a href="/chat/{{$user->id}}"><button type="button" class="btn btn-primary">Chat</button></a></td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>
</html>