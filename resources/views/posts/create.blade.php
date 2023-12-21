<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/create.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.5.1/css/all.css">
</head>
<body>
    <div><a href="{{ route('posts.index') }}"><i class="fa-solid fa-xmark"></i></a></div>
    
    <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        <div>
            <div>
                <input type="text" id="title" class="titlebox">
                <!-- <div><i class="fa-regular fa-image"></i></div> -->
                <div>
                    <label for="image"><i class="fa-regular fa-image"></i></label>
                    <input type="file" id="image" style="display: none;">
                </div>
            </div>
            <div>
                <input type="textarea">
                <div><img src="../img/jobsample.jpg" alt="" class="postimage"></div>
            </div>
            <div><button type="submit">共有</button></div>
        </div>
    </form>
</body>
</html>