<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>プロフィール編集ページ</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/show.edit.css') }}">
    <script src="{{ asset('js/edit.js') }}"></script>   <!--✅edit.jsの読み込み-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>   <!--✅jQueryの読み込み-->
</head>
<body>
    <main>
        <div class="cancel-btn">
            <a href="{{ route('posts.show', $post->id) }}">キャンセル</a>
        </div>
        <form action="{{ route('posts.update', $post->id) }}" method="POST">
        @csrf
        @method('put')
            <div class="edit-form">
                <div class="title-edit">
                    <input type="text" class="form-control" placeholder="タイトルを入力して下さい" name="title" 
                    {{-- value="{{ $todo->title }}" --}}
                    >
                </div>
                <div class="content-edit">
                    <textarea class="form-control" placeholder="内容" rows="5" name="content">
                        {{-- {{ $todo->content }} --}}
                    </textarea>

                </div>
                <div class="image-edit">
                    {{-- <input id="image" type="file" class="form-control" name="image"> --}}
                    {{-- value="{{ $todo->image }}" onchange="previewImage(this)"> --}}
                    {{-- ✅画像の表示 --}}
                    <input id="image" type="file" class="form-control" name="image" value="{{ $post->image }}" onchange="previewImage(this)">
                    @if($post->image)
                    <img id="image-preview" alt="" src="{{ asset('storage/' . $post->image) }}" style="max-width: 100%; max-height: 200px;">
                    @endif
                </div>
                <div class="upload-btn">
                    <button type="submit" class="btn btn-primary">編集</button>
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