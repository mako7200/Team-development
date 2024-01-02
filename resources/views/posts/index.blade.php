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
        <main>
            <div class="glass-box"><img src="{{ asset('../images/airplane.jpg') }}" alt="" class="background-image"></div>
            
            {{-- 投稿検索 --}}
            {{-- <h2 class="title">投稿検索</h2> --}}
            <div class="kensaku">
                <div><i class="fa-solid fa-magnifying-glass glass"></i></div>
                <div>
                    <form action="{{ route('posts.search') }}" method="POST" class="select-bar">
                        @csrf
                        <select name="country_id" class="select">
                            <option value="">国を選択してください</option>
                            @foreach($countries as $country)
                                <option value="{{ $country->id }}">{{ $country->country_name }}</option>
                            @endforeach
                        </select>
                    
                        <select name="occupation_id" class="select">
                            <option value="">会社を選択してください</option>
                            @foreach($occupations as $occupation)
                                <option value="{{ $occupation->id }}">{{ $occupation->occupation_name }}</option>
                            @endforeach
                        </select>
                    
                        <div>
                            <button class="button">検索</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="entire">
                <div class="card-page">
                    @foreach($posts as $post)
                    <div class="cards">
                        <div class="postcard">
                            <div class="author">
                                @auth
                                    @if($post->user->avatar)
                                        <a href="{{ route('posts.profile' ,['id' => $post->user->id]) }}"><img src="{{ asset('storage/images/' . $post->user->avatar) }}" class="avatar" style="max-width: 100%; max-height: 200px;"></a>
                                    @endif
                                @endauth
                                <div class="username">{{ $post->user->name }}</div>
                            </div>

                            <p class="create">{{ $post->created_at->format('m/d H:i') }}</p>
                            <hr>

                            <h4>『{{ mb_substr($post->title, 0, 15, 'UTF-8') }}{{ mb_strlen($post->title, 'UTF-8') > 15 ? '...' : '' }}』</h4>
                            <div class="content">
                                <p class="contenttext">{{ mb_substr($post->content, 0, 15, 'UTF-8') }}{{ mb_strlen($post->content, 'UTF-8') > 15 ? '...' : '' }}</p>
                            </div>
                                <a href="{{ route('posts.show', ['id' => $post->id]) }}" class="more">もっと見る...</a>
                            <div class="hashtag">
                                <div class="hash">#{{ $post->country->country_name }}</div>
                                <div class="hash">#{{ $post->occupation->occupation_name }}</div>
                            </div>
                        </div>
                        <div class="react">
                            {{-- ✅いいね機能 --}}
                            <div class="count">
                                <div>
                                    @if($post->likedBy(Auth::user())->count() >0)
                                        <a href="{{ route('likes.destroy', ['like_id' => $post->likedBy(Auth::user())->firstOrFail()->id, 'from_index' => true]) }}" class="like"><i class="fa-solid fa-heart" style="font-size: 18px"></i></a>
                                    @else
                                        <a href="{{ route('likes.store', ['post_id' => $post->id, 'from_index' => true]) }}"><i class="fa-regular fa-heart" style="font-size: 18px"></i></a>
                                    @endif
                                    {{ $post->likes->count() }}   <!-- いいねの数をカウント -->
                                </div>
                            </div>
                            <div class="count">
                                <i class="fa-regular fa-comment mark"></i>
                                {{ $post->comments->count() }}   <!-- コメントの数をカウント -->
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