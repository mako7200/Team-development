<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.5.1/css/all.css">
</head>
<body>
        <div class="background-images image1"><img src="{{ asset('../images/indexmain.jpg') }}" alt=""></div>
        <div class="background-images image2"><img src="{{ asset('../images/jobsample.jpg') }}" alt=""></div>
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
                <div class="whole-page">
                    @if(isset($post))
                        <div class="profilepage">
                            <div class="user">
                                <div><img src="{{ asset('../images/seedtech70期生徒.jpg') }}" alt="" class="myavatar"></div>
                                <div class="username">　{{ Auth::user()->name }}</div>
                            </div>
                            <div class="hashtag">#{{ $post->country->country_name }}　＃{{ $post->occupation->occupation_name }}</div>
                            <div class="buttons">
                                <div>編集</div>
                                <div>ログアウト</div>
                            </div>
                        </div>
                    @endif
                    <div class="card-page">
                        @foreach($posts as $post)
                        <div class="cards">
                            <div class="postcard">
                                <div class="author"><img src="{{ asset('../images/seedtech70期生徒.jpg') }}" alt="" class="avatar">ユーザー名</div>
                                <h4>タイトル</h4>
                                <div class="content">
                                    <p class="contenttext">内容（10~15文字）</p>
                                    <a href="" class="more">もっと見る...</a>
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
    </div>
</body>
</html>