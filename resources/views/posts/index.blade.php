<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.5.1/css/all.css">
</head>
<body>
    <div class="whole-page">
        <div class="navigation">
            <nav>
                <ul>
                    <li><a href="" class="list-a">ユーザー名：{{ Auth::user()->name }}</a></li>
                    <li><a href="{{ route('posts.index') }}" class="list-a"><i class="fa-solid fa-house"></i></a></li>
                    <li><a href="{{ route('posts.create') }}" class="list-a"><i class="fa-solid fa-square-plus"></i></a></li>
                    <li><a href="" class="list-a"><i class="fa-solid fa-comments"></i></a></li>
                    <li><a href="{{ route('posts.search') }}" class="list-a"><i class="fa-solid fa-magnifying-glass"></i></a></li>
                    <li><a href="" class="list-a"><i class="fa-solid fa-heart"></i></a></li>
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
                            <div class="author"><img src="../img/seedtech70期生徒.jpg" alt="" class="avatar">username:{{ $post->user->name }}</div>
                            <h4>title:{{ $post->title }}</h4>
                            <div class="content">
                                <p class="contenttext">content:{{ $post->content }}</p>
                                <a href="{{ route('posts.show', ['id' => $post->id]) }}" class="more">show more...</a>
                            </div>
                            <div>国のタグ：{{ $post->country->country_name }}</div>
                            <div>企業のタグ：{{ $post->occupation->occupation_name }}</div>
                        </div>
                        <div class="react">
                            {{-- ✅いいね機能 --}}
                            <div class="count">
                                <div style="padding:10px 40px">
                                    @if($post->likedBy(Auth::user())->count() >0)
                                    <a href="/likes/{{ $post->likedBy(Auth::user())->firstOrfail()->id }}"><i class="fa-solid fa-heart"></i></a>
                                    @else
                                    <a href="/posts/{{ $post->id }}/likes"><i class="fa-regular fa-heart"></i></a>
                                    @endif
                                    {{ $post->likes->count() }}   <!-- いいねの数をカウント -->
                                </div>
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