<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css">
        <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

         <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style> 

    </head>
    <body class="antialiased"> {{--フェードアウト後bodyにappearクラス付与--}}
        {{-- 最初の読み込み画面 --}}
        <div id="splash">
            <div id="splash-logo">読み込み中...</div>
        </div>

        <div class="splashbg"></div><!---画面遷移用-->

        <div id="container">
            <header class="homeview">
                @if (Route::has('login'))
                    <div class="register-login">
                        {{-- hidden fixed top-0 right-0 px-6 py-4 sm:block --}}
                        @auth
                            <a href="{{ url('/posts') }}" class="button home">Home</a>
                        @else
                            <a href="{{ route('login') }}" class="button login">ログイン</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="button register">登録</a>
                            @endif
                        @endauth
                    </div>
                @endif

                {{-- <div class="viewpage"> --}}
                    <h1>アプリ名</h1>
                {{-- </div> --}}

            </header>

            <span>
                <img src="../images/welcome2.jpg" alt="" class="welcome-img">
                <div class="scrolldown"><span>Scroll</span></div>
            </span>

            

            <main>
                <div class="detail">
                    <div class="explain">
                        <div><img src="../images/welcome.jpg" alt="" class="topimage" id="targetimage">
                        </div>
                        <div class="words">
                            <p class="appeal">【留学生必見！】</p> 
                            3分の2の学生は国外へ憧れを持って海外で働きたいという気持ちを持ったことはありませんか？
                        </div>
                    </div>
                    <div class="explain2">
                        <div class="words">
                            新しい自分を切り開くための交流アプリへようこそ <br>
                            ここでは自分と向き合い、世界中で活躍している人から情報を交換できるアプリです
                        </div>

                        <div>
                            <img src="../images/welcome3.jpg" alt="" class="topimage" id="changeimage2">
                        </div>
                    </div>
                </div>
            </main>

            <footer>
                <p class="footer">Nexseed70th©︎2023teamproject</p>
            </footer>

        </div>

        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="  crossorigin="anonymous"></script>

        <script src="{{ asset('js/welcome.js') }}"></script>
    </body>
</html>
