<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>プロフィール編集ページ</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/show.edit.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.5.1/css/all.css">
    <script src="{{ asset('js/edit.js') }}"></script>   <!--✅edit.jsの読み込み-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>   <!--✅jQueryの読み込み-->
</head>
<body>
    <header>
        <h1>アプリ名</h1>
    </header>
    <main>
        <div>
            <a href="{{ route('posts.show', $post->id) }}" class="cancel-btn">キャンセル</a>
        </div>

        <form action="{{ route('posts.update', $post->id) }}" method="POST">
            @csrf
            @method('put')
            <div class="editpage">

                    <div class="box1">

                        <label for="title" style="display: none">タイトル:</label>
                        <input type="text" class="titlebox" placeholder="タイトル" name="title" 
                        {{-- value="{{ $todo->title }}" --}}
                        >

                        <div>
                            {{-- <input id="image" type="file" class="form-control" name="image"> --}}
                            {{-- value="{{ $todo->image }}" onchange="previewImage(this)"> --}}
                            {{-- ✅画像の表示 --}}
                            <label for="image"><i class="fa-regular fa-image image"></i></label>
                            <input id="image" type="file" class="form-control" name="image" value="{{ $post->image }}" onchange="previewImage(this)" style="display: none">
                        </div>
                    </div>

                    <div class="box2">
                        <label for="content" style="display: none">内容:</label>
                        <textarea class="text-content" name="content" id="content"></textarea>
                        {{-- {{ $todo->content }} --}}

                        <div>
                            @if($post->image)
                            <img id="image-preview" alt="" src="{{ asset('storage/' . $post->image) }}" class="postimage">
                            {{-- style="max-width: 100%; max-height: 200px;" --}}
                            @endif
                        </div>
                    </div>
                
                    <div class="button">
                        <button type="submit" class="btn">編集する
                        </button>
                    </div>

            </div>
        </form>
    </main>
    {{-- ✅ライトボックスの導入（画像表示） --}}
<script src="{{ asset ('js/lightbox-plus-jquery.js') }}"></script>
<script>
    lightbox.option({
        'resizeDuration': 200,
        'wrapAround': true
    });
</script>
</body>
</html>