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
        <form id="editForm" action="{{ route('user.update' ,['id' => Auth::id()]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="edit-form">
                <div class="avatar-edit">
                    <div class="avatar">
                        {{-- 既存の画像表示 --}}
                        @auth
                            @if($user->avatar)
                                <img src="{{ asset('storage/images/' . $user->avatar) }}" class="avatar" style="max-width: 100%; max-height: 200px;">
                            @endif
                        @endauth

                        {{-- 変更予定画像表示 --}}
                        <input id="avatar" type="file" class="form-control" name="avatar" value="{{ $user->avatar }}" onchange="previewAvatar(this)"> 

                        @if($user->avatar)
                            <img id="avatar-preview" alt="" src="{{ asset('storage/images' . $user->avatar) }}" style="max-width: 100%; max-height: 200px;"> 
                        @else
                            <img id="avatar-preview" src="" alt="" style="max-width: 100%; max-height: 200px;">
                        @endif
                    </div>
                </div>
                <div class="name_edit">
                    <label for="name" style="display: none">名前:</label>
                    <input type="text" id="name" name="name"  value="{{ $user->name }}" class='namebox' required>
                </div>
                <div class="hash-tagbox">
                    <div>
                        <label for="countries">国タグ:</label>
                        <select class="form-select choose" id="countries" name="country_id" >
                            <option value="" selected>タグを選択してください</option>
                            @foreach($countries as $country)
                            <option value="{{ $country->id }}"
                                @if($selectedCountry== $country->id) 
                                selected @endif>
                                {{ $country->country_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="occupations">企業タグ:</label>
                        <select class="form-select choose" id="occupations" name="occupation_id" >
                            <option value="" selected>タグを選択してください</option>
                            @foreach($occupations as $occupation)
                            <option value="{{ $occupation->id }}" 
                                @if($selectedOccupation == $occupation->id) 
                                selected @endif>
                                {{ $occupation->occupation_name }}</option>
                            @endforeach
                        </select>
                    </div>
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




                
                    
                    