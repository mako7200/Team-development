<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/search.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.5.1/css/all.css">
</head>
<body>
<div class="whole-page">
    <div class="navigation">
        <nav>
            <ul>
                <li><a href="" class="list-a">ユーザー名</a></li>
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
        <form action="">
            <div class="searchpage">
                <div class="searchbar">
                    <label for="searchInput">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </label>
                    <input type="search" id="searchInput">
                    <button type="submit">検索</button>
                </div>
            </div>
        </form>
    </main>
</div>
</body>
</html>