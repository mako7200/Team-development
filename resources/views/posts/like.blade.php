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
                <li><a href="{{ route('posts.profile' ,['id' => Auth::id()]) }}" class="list-a">{{ Auth::user()->name }}</a></li>
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
        <div><img src="{{ asset('../images/airplane.jpg') }}" alt="" class="background-image"></div>
        <div class="entire">
            <div class="card-page">
                @foreach($posts as $post)
                <div class="cards">
                    <div class="postcard">
                        <div class="author"><img src="../img/avatarsample.jpg" alt="" class="avatar">{{ $post->user->name }}</div>
                        <h4>『{{ $post->title }}』</h4>
                        <div class="content">
                            <p class="contenttext">{{ $post->content }}</p>
                            <a href="{{ route('posts.show', ['id' => $post->id]) }}" class="more">もっと見る...</a>
                        </div>
                    </div>
                    <div class="react">
                        <div class="count">
                            <a href="#"><i class="fa-solid fa-heart mark"></i></a>
                            {{ $post->likes->count() }}
                        </div>
                        <div class="count">
                            <a href="#"><i class="fa-regular fa-comment mark"></i></a>
                            {{ $post->comments->count() }}
                        </div>
                    </div>
                    <p>{{ $post->created_at }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </main>
</div>
</body>
</html>