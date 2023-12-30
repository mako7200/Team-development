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
                            <div class="sub-box">
                                <div class="hashtag">
                                    #{{ $post->country->country_name }}　#{{ $post->occupation->occupation_name }}
                                </div>
                                <div class="buttons">
                                    {{-- 編集機能 --}}
                                    <a class="edit" href="{{ route('profile_edit' ,['id' => Auth::id()]) }}" >編集</a>
                                    {{-- ログアウト機能 --}}
                                    <a class="logout" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                        {{ __('ログアウト') }}
                                    </a>
        
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="card-page">
                        @foreach($posts as $post)
                        {{-- <div class="cards">
                            <div class="postcard">
                                <div class="author"><img src="{{ asset('../images/seedtech70期生徒.jpg') }}" alt="" class="avatar">{{ $user->name }}</div>
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
                        </div> --}}
                        <div class="cards">
                            <div class="postcard">
                                <div class="author"><img src="/storage/#" alt="" class="avatar"> {{ $post->user->name }}</div>
                                <h4>『{{ mb_substr($post->title, 0, 15, 'UTF-8') }}{{ mb_strlen($post->title, 'UTF-8') > 15 ? '...' : '' }}』</h4>
                                <div class="content">
                                    <p class="contenttext">{{ mb_substr($post->content, 0, 15, 'UTF-8') }}{{ mb_strlen($post->content, 'UTF-8') > 15 ? '...' : '' }}</p>
                                </div>
                                    <a href="{{ route('posts.show', ['id' => $post->id]) }}" class="more">もっと見る...</a>
                                <div class="hashtag2">
                                    <div class="hash">#{{ $post->country->country_name }}</div>
                                    <div class="hash">#{{ $post->occupation->occupation_name }}</div>
                                </div>
                            </div>
                            <div class="react">
                                {{-- ✅いいね機能 --}}
                                <div class="count">
                                    <div>
                                        @if($post->likedBy(Auth::user())->count() >0)
                                        <a href="/likes/{{ $post->likedBy(Auth::user())->firstOrfail()->id }}" class="like"><i class="fa-solid fa-heart" style="font-size: 18px"></i></a>
                                        @else
                                        <a href="/posts/{{ $post->id }}/likes" class="like"><i class="fa-regular fa-heart" style="font-size: 18px"></i></a>
                                        @endif
                                        {{ $post->likes->count() }}   <!-- いいねの数をカウント -->
                                    </div>
                                </div>
                                <div class="count">
                                    {{-- <a href="#"></a> --}}
                                    <i class="fa-regular fa-comment mark"></i>
                                    {{ $post->comments->count() }}   <!-- コメントの数をカウント -->
                                </div>
                            </div>
                            <p>{{ $post->created_at }}</p>
                        </div>
                        @endforeach
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>
</html>