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
                <li><a href="" class="list-a"><i class="fa-solid fa-house"></i></a></li>
                <li><a href="{{ route('posts.create') }}" class="list-a"><i class="fa-solid fa-square-plus"></i></a></li>
                <li><a href="" class="list-a"><i class="fa-solid fa-comments"></i></a></li>
                <li><a href="" class="list-a"><i class="fa-solid fa-magnifying-glass"></i></a></li>
                <li><a href="" class="list-a"><i class="fa-solid fa-heart"></i></a></li>
                <li>アプリ名</li>
            </ul>
        </nav>
    </div> 
    <main>
        <div class="showpage">
            <div class="show-card">
                <div class="username"><img src="../img/seedtech70期生徒.jpg" alt="" class="avatar">ユーザー名</div>

                <div>
                    <h4>タイトル</h4>
                    <div>
                        <i class="fa-solid fa-eraser"></i>
                    </div>
                    <div>
                        <i class="fa-solid fa-trash-can"></i>
                    </div>
                </div>

                <div class="content">
                    <p>content <br> Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsum, dolore nemo. Tempore nobis, aliquid quia sequi assumenda quod vitae sed ipsum. Possimus animi dolorum deleniti. Reprehenderit obcaecati labore necessitatibus impedit!</p>
                    <div><img src="../img/seedtech70期生徒.jpg" alt="" class="image"></div>
                </div>
            </div>

            <div class="comment-area">
                <div class="commenttext">
                    <p>コメント</p>
                    <div class="commentbox">コメントコメントコメント</div>
                    <button type="submit">コメント</button>
                 </div>
                 <div class="view">
                    <div class="commentlist">コメント一覧</div>
                    <div class="commentbox2">ここにアバター、ユーザー <br> textしたコメントを閲覧できるようにします</div>
                 </div>
            </div>
        </div>
    </main>
</div>
</body>
</html>