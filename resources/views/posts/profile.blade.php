<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.5.1/css/all.css">
</head>
<body>
        <div><img src="{{ asset('../images/profile.jpg') }}" alt="" class="background-image"></div>
        
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
            <main>
                <div class="whole-page">
                    @if(isset($user))
                        <div class="profilepage">
                            <div class="user">
                                @auth
                                    @if($user->avatar)
                                        <img src="{{ asset('storage/images/' . $user->avatar) }}" class="bigavatar">
                                    @endif
                                @endauth
                                <div>
                                    <div class="territory">
                                        <p class="myname">{{ $user->name }}</p>
                                        <div class="buttons">
                                            {{-- 編集機能 --}}
                                            {{-- ログインユーザー本人のみに「編集・削除ボタン」を表示 --}}
                                            @if(Auth::check()  && $user->id == Auth::user()->id)
        
                                            <a class="edit" href="{{ route('profile_edit' ,['id' => Auth::id()]) }}" >編集</a>
        
                                            {{-- ログアウト機能 --}}
                                            <a class="logout" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                                {{ __('ログアウト') }}
                                            </a>
        
                                            @else
        
                                            {{-- トークボタン --}}
                                            <div class="chat-btn">
                                                <a href="/chat/{{$user->id}}">
                                                    <button type="button" class="talk-btn">メッセージを送信する</button>
                                                </a>
                                            </div>
        
                                            @endif
        
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </div>
                                    </div>
                                    <div class="hashtag">
                                        #{{ $user->country->country_name }}　#{{ $user->occupation->occupation_name }}
                                    </div>
                                </div>
                            </div>
                                
                        </div>
                    @endif
                    <div class="card-page">
                        @foreach($posts as $post)
                        <div class="cards">
                            <div class="postcard">
                                <div class="author">
                                    @auth
                                        @if($user->avatar)
                                            <img src="{{ asset('storage/images/' . $user->avatar) }}" class="avatar" style="max-width: 100%; max-height: 200px;">
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
                                <div class="hashtag2">
                                    <div class="hash">#{{ $post->country->country_name }}</div>
                                    <div class="hash">#{{ $post->occupation->occupation_name }}</div>
                                </div>
                            </div>
                            <div class="react">
                                {{-- ✅いいね機能 --}}
                                <div class="count">
                                    <div>
                                        {{-- @if($post->likedBy(Auth::user())->count() >0)
                                        <a href="{{ route('likes.destroy', ['like_id' => $post->likedBy(Auth::user())->firstOrFail()->id, 'from_profile' => true]) }}" class="like"><i class="fa-solid fa-heart" style="font-size: 18px"></i></a>
                                        @else
                                        <a href="{{ route('likes.store', ['post_id' => $post->id, 'from_profile' => true]) }}" class="like"><i class="fa-regular fa-heart" style="font-size: 18px"></i></a>
                                        @endif --}}
                                        {{-- <i class="fa-regular fa-heart" style="font-size: 18px"></i></a>
                                        {{ $post->likes->count() }}   <!-- いいねの数をカウント --> --}}
                                        <i class="fa-regular fa-heart{{ $post->likes->count() > 0 ? ' fa-solid' : '' }}" style="font-size: 18px"></i>
                                        {{ $post->likes->count() }}   <!--いいねの数をカウント-->

                                        @php Log::info('Likes count: ' . $post->likes->count()); @endphp
                                    </div>
                                </div>
                                <div class="count">
                                    {{-- <a href="#"></a> --}}
                                    {{-- <i class="fa-regular fa-comment mark"></i> --}}
                                    <i class="fa-regular fa-comment mark{{ $post->comments->count() > 0 ? ' fas blue' : '' }}"></i>
                                    {{ $post->comments->count() }}   <!-- コメントの数をカウント -->
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