<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>詳細編集ページ</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/edit.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.5.1/css/all.css">
    <script src="{{ asset('js/edit.js') }}"></script>   <!--edit.jsの読み込み-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>   <!--jQueryの読み込み-->
</head>
<body>
    <header>
        <h1>アプリ名</h1>
    </header>
    <main>
        <div>
            <a href="{{ route('posts.show', $post->id) }}" class="cancel-btn">キャンセル</a>
        </div>

        <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="editpage">

                    <div class="box1">

                        <label for="title" style="display: none">タイトル:</label>
                        <input type="text" class="titlebox" value="{{ $post->title }}" name="title" required placeholder="タイトル">

                        <div>
                            {{-- 画像の入れ込み --}}
                            {{-- <label for="image"><i class="fa-regular fa-image image"></i></label> --}}
                            <input id="image" type="file" class="form-control" name="image" value="{{ $post->image }}" onchange="previewImage(this)" style="display: none">
                        </div>
                    </div>

                    <div class="box2">
                        <label for="content" style="display: none">内容:</label>
                        <textarea class="text-content" name="content" id="content" required placeholder="内容">{{ $post->content }}</textarea>

                        {{-- 画像の反映 --}}
                        <div>
                            @auth
                                <label for="image">
                                @if($post->image)
                                    <img id="image-preview"src="{{ asset('storage/images/' . $post->image) }}" class="postimage" >
                                {{-- エラー文表示 --}}
                                @error('image')
                                    <p class="text-red-500" style="color: red;">{{ $message }}</p>
                                @enderror
                                    <div class="image" style="background-color: rgb(0, 157, 255)" >写真を選択</div>
                                @else
                                <div id="hiddenBlock" class="hidden">
                                <i class="fa-regular fa-images"></i>
                                <img id="image-preview" class="postimage"><div class="image">写真を選択</div>
                                </div>
                                @endif
                                </label>
                            @endauth
                        </div>
                        
                    </div>

                    <div class="box3">

                        <div>
                            <label for="countries">国タグ:</label>
                            <select class="form-select choose" id="countries" name="country_id" required>
                                <option value="" disabled selected>タグを選択してください</option>
                                @foreach($countries as $country)
                                    <option value="{{ $country->id }}" @if($country->id == $selectedCountry) selected @endif>   <!--編集前のタグを引き継ぐ-->
                                        {{ $country->country_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label for="occupations">企業タグ:</label>
                            <select class="form-select choose" id="occupations" name="occupation_id" required>
                                <option disabled selected>タグを選択してください</option>
                                @foreach($occupations as $occupation)
                                    <option value="{{ $occupation->id }}" @if($occupation->id == $selectedOccupation) selected @endif>   <!--編集前のタグを引き継ぐ-->
                                        {{ $occupation->occupation_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                {{-- エラー文表示 --}}
                @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                    <div class="button">
                        <button type="submit" class="btn" style="background-color: #46d548">編集する</button>
                    </div>

            </div>
        </form>
    </main>
    {{-- ライトボックスの導入（画像表示） --}}
<script src="{{ asset ('js/lightbox-plus-jquery.js') }}"></script>
<script>
    lightbox.option({
        'resizeDuration': 200,
        'wrapAround': true
    });
</script>
</body>
</html>