<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/show.css') }}">
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
        <div class="showpage">
            <div class="show-card">
                <div class="row1">
                    <div class="username"><img src="/storage/#" alt="" class="avatar">{{ $post->user->name }}</div>
                    <p class="creatat">{{ $post->created_at }}</p>
                </div>

                <div class="main-content">
                    <div class="row2">
                <h4>『{{ $post->title }}』</h4>

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

                    <div class="row3">

                        <div class="content">
                            <strong>{{ $post->content }}</strong>
                        </div>

                        <div class="image-box">
                            <img src="/storage/{{ $post->image }}" alt="" class="image">
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
                            <button type="submit" class="btn">投稿する</button>
                        </div>
                    </form>
                </div>

                
                <div class="view">
                    <div class="commentlist">コメント</div>
                    <div class="commentbox2">
                        @foreach ($post->comments->sortByDesc('created_at') as $comment)   <!--コメントを「最新順」に表示-->
                        <div class="small-box">
                            <h5 class="card-header"><strong>{{ $comment->user->name }}</strong>{{ $comment->body }}</h5>
                            <div class="post-time">
                                <h6 class="card-time">{{ $comment->created_at }}</h6>
                                {{-- <p class="card-text"></p> --}}
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
</body>
</html>