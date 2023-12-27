<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/like.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.5.1/css/all.css">
</head>
<body>
<div class="whole-page">
    <div class="navigation">
        <nav>
            <ul>
                <li><a href="{{ route('posts.profile' ,['id' => Auth::id()]) }}" class="list-a">ユーザー名：{{ Auth::user()->name }}</a></li>
                <li><a href="{{ route('posts.index') }}" class="list-a"><i class="fa-solid fa-house"></i></a></li>
                <li><a href="{{ route('posts.create') }}" class="list-a"><i class="fa-solid fa-square-plus"></i></a></li>
                <li><a href="" class="list-a"><i class="fa-solid fa-comments"></i></a></li>
                <li><a href="{{ route('posts.search') }}" class="list-a"><i class="fa-solid fa-magnifying-glass"></i></a></li>
                <li><a href="{{ route('likes.index') }}" class="list-a"><i class="fa-solid fa-heart"></i></a></li>
                <li>アプリ名</li>
            </ul>
        </nav>
    </div>   
    <main>
        <div class="entire">
            <div class="card-page">
                @foreach($posts as $post)
                <div class="cards">
                    <div class="postcard">
                        <div class="author"><img src="../img/avatarsample.jpg" alt="" class="avatar">ユーザー名：{{ $post->user->name }}</div>
                        <h4>タイトル：{{ $post->title }}</h4>
                        <div class="content">
                            <p class="contenttext">投稿</p>
                            <a href="" class="more">もっと見る</a>
                        </div>
                    </div>
                    <div class="react">
                        <div class="count">
                            <a href="#"><i class="fa-regular fa-heart mark"></i></a>
                            <p>2</p>
                        </div>
                        <div class="count">
                            <a href="#"><i class="fa-regular fa-comment mark"></i></a>
                            <p>1</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </main>
</div>
</body>
</html>