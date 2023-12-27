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
    <div class="whole-page">
        <div><img src="../img/backgroundsample.jpg" alt="" class="background-image">
            <div class="navigation">
                <nav>
                    <ul>
                        <li><a href="" class="list-a">ユーザー名：{{ Auth::user()->name }}</a></li>
                        <li><a href="" class="list-a"><i class="fa-solid fa-house"></i></a></li>
                        <li><a href="" class="list-a"><i class="fa-solid fa-square-plus"></i></a></li>
                        <li><a href="" class="list-a"><i class="fa-solid fa-comments"></i></a></li>
                        <li><a href="" class="list-a"><i class="fa-solid fa-magnifying-glass"></i></a></li>
                        <li><a href="" class="list-a"><i class="fa-solid fa-heart"></i></a></li>
                        <li>アプリ名</li>
                    </ul>
                </nav>
            </div> 
            <main>
                <div class="profilepage">
                    <div class="user">
                        <div><img src="../img/seedtech70期生徒.jpg" alt="" class="myavatar"></div>
                        <div class="username">ユーザー名</div>
                    </div>
                    <div class="hashtag">#アフリカ　＃エンジニア</div>
                    <div class="buttons">
                        <div>編集</div>
                        <div>ログアウト</div>
                    </div>
                </div>
                <div class="card-page">
                    <div class="cards">
                        <div class="postcard">
                            <div class="author"><img src="../img/seedtech70期生徒.jpg" alt="" class="avatar">username</div>
                            <h4>title</h4>
                            <div class="content">
                                <p class="contenttext">content10~15</p>
                                <a href="" class="more">show more...</a>
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

                    <div class="cards">
                        <div class="postcard">
                            <div class="author"><img src="../img/seedtech70期生徒.jpg" alt="" class="avatar">username</div>
                            <h4>title</h4>
                            <div class="content">
                                <p>content10~15</p>
                                <a href="" class="more">show more...</a>
                            </div>
                        </div>
                        <div class="react">
                            <div class="count">
                                <i class="fa-regular fa-heart mark"></i><p>2</p>
                            </div>
                            <div class="count">
                                <i class="fa-regular fa-comment mark"></i><p>1</p>
                            </div>
                        </div>
                    </div>

                    <div class="cards">
                        <div class="postcard">
                            <div class="author"><img src="../img/seedtech70期生徒.jpg" alt="" class="avatar">username</div>
                            <h4>title</h4>
                            <div class="content">
                                <p>content10~15</p>
                                <a href="" class="more">show more...</a>
                            </div>
                        </div>
                        <div class="react">
                            <div class="count">
                                <i class="fa-regular fa-heart mark"></i>
                                <p>2</p>
                            </div>
                            <div class="count">
                                <i class="fa-regular fa-comment mark"></i>
                                <p>1</p>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>
</html>