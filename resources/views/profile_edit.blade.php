<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>プロフィール編集ページ</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/profile.edit.css') }}">
    <script src="{{ asset('js/profile_edit.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
</head>
<body>
    <header>
        <h1>アプリ名</h1>
    </header>
    <main>
        <div class="cancel-btn">
            <a href="javascript:history.back();">キャンセル</a>
        </div>
        <form action="{{ route('user.update' ,['id' => Auth::id()]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="edit-form">
                <div class="avatar-edit">
                    <div class="avatar">
                        @auth
                            <img src="{{ asset('storage/images/' . Auth::user()->avatar) }}" class="avatar">
                        @endauth

                        <input id="avatar" type="file" class="form-control" name="avatar" value="{{ $user->avatar }}" onchange="previewAvatar(this)"> 
                        @if($user->avatar)
                        <img id="avatar-preview" alt="" src="{{ asset('storage/' . $user->avatar) }}" style="max-width: 100%; max-height: 200px;"> 
                        @endif
                    </div>
                </div>
                
                
                <div class="name_edit">
                    <label for="name" style="display: none">名前:</label>
                    <input type="text" id="name" name="name"  value="{{ $user->name }}" class='namebox' required>
                </div>
                <div class="hash-tagbox">
                    #アフリカ
                </div>
                <div class="upload-btn">
                    <button type="submit" class="btn btn-primary">編集完了</button>
                </div>

                


            </div>
        </form>
    </main>
    <script src="{{ asset ('js/lightbox-plus-jquery.js') }}"></script>
    <script>
        lightbox.option({
            'resizeDuration': 200,
            'wrapAround': true
        });
    </script>
</body>
</html>




                
                    
                    