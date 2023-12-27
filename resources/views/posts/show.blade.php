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
                <li><a href="" class="list-a">ユーザー名</a></li>
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
        <div class="showpage">
            <div class="show-card">
                <div class="row1">
                    <div class="username"><img src="" alt="" class="avatar">　ユーザー名</div>
                    <p class="creatat">投稿日時：</p>
                 </div>

                <div class="main-content">
                    <div class="row2">
                        <h4>タイトル：</h4>

                        <div class="edit-delete">
                            <div>
                                <a href="
                                "><i class="fa-solid fa-eraser stamp icon-shadow"></i></a>
                            </div>
                            <div>
                                <a href=""><i class="fa-solid fa-trash-can stamp icon-shadow"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="row3">

                        <div class="content">
                            <strong>内容：</strong> <br> おおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおおお
                         </div>

                        <div class="image-box">
                            <img src="../img/seedtech70期生徒.jpg" alt="" class="image">
                        </div>
                    </div>

                </div>
            </div>

            <div class="comment-area">
                <div class="commenttext">
                    <form action="}" method="post">
                        @csrf
                        <input type="hidden" name="pos_id" value="">
                        <div>
                            <label class="comment" for="title">コメント</label>
                            <textarea class="commentbox" rows="5" name="comment-body" id="title"></textarea>
                        </div>

                        <div class="btn-box">
                            <button type="submit" class="btn">コメント</button>
                        </div>
                    </form>
                 </div>

                 <div class="view">
                    <div class="commentlist">コメント一覧</div>
                    <div class="commentbox2">ここにアバター、ユーザー <br> textしたコメントを閲覧できるようにします<br>イメージはこんな感じです</div>
                 </div>
            </div>
        </div>
    </main>
</div>
</body>
</html>