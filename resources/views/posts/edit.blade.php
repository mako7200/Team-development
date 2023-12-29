<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>プロフィール編集ページ</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/show.edit.css') }}">
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
                    <input id="image" type="file" class="form-control" name="image">
                    {{-- value="{{ $todo->image }}" onchange="previewImage(this)"> --}}
                    
                </div>
                <div class="upload-btn">
                    <button type="submit" class="btn btn-primary">編集</button>
                </div>

                


            </div>
        </form>
    </main>
    
</body>
</html>