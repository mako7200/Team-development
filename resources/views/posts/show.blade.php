<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/show.css') }}">
    <script src="{{ asset('js/show.js') }}"></script>   <!--show.jsの読み込み-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>   <!--jQueryの読み込み-->
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
                <li>Swallow</li>
            </ul>
        </nav>
    </div> 
    <main>
        <div class="showpage">
            <div class="show-card">
                <div class="row1">
                    @auth
                    <label for="avatar">
                    @if($post->user->avatar)
                    <div class="username">
                        <img src="{{ asset('storage/images/' . $post->user->avatar) }}" alt="" class="avatar">
                        <p class="showname">{{ $post->user->name }}</p>
                    </div>
                    @endif
                    </label>
                    @endauth
                    <p class="creatat">{{ $post->created_at->format('m/d H:i') }}</p>
                </div>

                <div class="main-content">
                    <div class="row2">
                    <h3>『{{ $post->title }}』</h3>

                        <div class="edit-delete">
                            {{-- ログインユーザー本人のみに「編集・削除ボタン」を表示 --}}
                            @if(Auth::check()  && $post->user_id == Auth::user()->id)
                            <div>
                                <a href="{{ route('posts.edit', $post->id) }}"><i class="fa-solid fa-eraser stamp icon-shadow"></i></a>
                            </div>
                            <div>
                                <form action="{{ route('posts.destroy', $post->id) }}" method="post">
                                @csrf
                                @method('delete')
                                    <button type="submit" class="delete" onclick="return confirm('本当に削除しますか？')">
                                    <i class="fa-solid fa-trash-can stamp icon-shadow"></i>
                                    </button>
                                </form>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="hashtag">
                        <div class="hash">#{{ $post->country->country_name }}</div>
                        <div class="hash">#{{ $post->occupation->occupation_name }}</div>
                    </div>

                    <div class="row3">

                        <div class="content">
                            <strong>{!! nl2br(e($post->content)) !!}</strong>   {{-- 改行の反映 --}}
                        </div>
                        {{-- 画像の表示 --}}
                        
                        <div class="image-box">
                            @auth
                                @if($post->image)
                                    <div class="zoom-overlay" id="zoom-overlay">
                                        <img src="{{ asset('storage/images/' . $post->image) }}" alt="" class="zoomed-image" id="zoomed-image">
                                    </div>
                                    <img src="{{ asset('storage/images/' . $post->image) }}" alt="" class="image" id="zoom-image">
                                @else
                                    <div class="no-image"></div>
                                @endif
                            @endauth
                        </div>

                    </div>

                </div>
            </div>

            {{-- コメント機能 --}}
            <div class="comment-area">
                <div class="commenttext">
                    <form action="{{ route('comments.store') }}" method="post">
                        @csrf
                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                        <div>
                            <label class="comment" for="title"></label>
                            {{-- コメント未記入で送信した場合、バリデーションエラーメッセージ表示 --}}
                            @error('body')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <textarea class="commentbox" rows="5" name="body" id="title" placeholder="コメントを書き込む"></textarea>
                        </div>

                        <div class="btn-box">
                            <button type="submit" class="btn" style="background-color: #46d548">投稿する</button>
                        </div>
                    </form>
                </div>

                
                <div class="view">
                    <div class="commentlist">コメント</div>
                    <div class="commentbox2">
                        @foreach ($post->comments->sortByDesc('created_at') as $comment)   <!--コメントを「最新順」に表示-->
                        <div class="small-box">
                            <h5 class="card-header">
                                <img src="{{ asset('storage/images/' . $comment->user->avatar) }}" class="avatar">
                                <strong> {{ $comment->user->name }}</strong>
                                <div class="comment-body">
                                    <p>{!! nl2br(e($comment->body)) !!}</p>   <!--改行も表示-->
                                    <div class="post-time">
                                    <h6 class="card-time">{{ $comment->created_at->format('m/d H:i') }}</h6>
                                    </div>
                                </div>
                            </h5>
                            
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </main>
{{-- ライトボックスの導入（画像表示） --}}
<script src="{{ asset ('js/lightbox-plus-jquery.js') }}"></script>
    <script>
        lightbox.option({
            'resizeDuration': 200,
            'wrapAround': true
        });
    </script>
</body>
</html>