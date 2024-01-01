<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>プロフィール編集ページ</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/profile.edit.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.5.1/css/all.css">
    <script src="{{ asset('js/profile_edit.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
</head>
<body>
    <header>
        <h1>アプリ名</h1>
    </header>
    <main>
        <div>
            <a href="javascript:history.back();" class="cancel-btn">キャンセル</a>
        </div>
        <form id="editForm" action="{{ route('user.update' ,['id' => Auth::id()]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="profile-editpage">

                
                <div class="box1">
                    <div class="change-avatar">
                        <div>
                            {{-- 既存の画像表示 --}}
                            @auth
                                <label for="avatar">
                                @if($user->avatar)
                                    <img src="{{ asset('storage/images/' . $user->avatar) }}" class="avatar" >
                                @endif
                                </label>
                            @endauth
                        </div>

                        {{-- 変更予定画像表示 --}}
                        <div class="sub-box">
                            <div>
                                {{-- <label for="avatar"><i class="fa-regular fa-image image"></i></label> --}}
                                <input id="avatar" type="file" class="form-control" name="avatar" value="{{ $user->avatar }}" onchange="previewAvatar(this)" style="display: none">
                            </div>
                            <div class="point">
                                →
                            </div>
                        </div>

                        <div class="after-image">
                            @if($user->avatar)
                                <img id="avatar-preview" alt="" src="{{ asset('storage/images' . $user->avatar) }}" class="avatar"> 
                            @else
                                <img id="avatar-preview" src="" alt=""  class="avatar" style=" border-radius: 80%;
                                width: 200px; height: 400px;">
                            @endif
                        </div>
                    </div>

                    <div class="namebox">
                        <label for="name" style="display: none">名前:</label>
                        <input type="text" id="name" name="name"  value="{{ $user->name }}" class='name' required>
                    </div>
                </div>
                
                <div class="box2">
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
                <div class="button">
                    <button type="submit" class="btn">編集完了</button>
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




                
                    
                    