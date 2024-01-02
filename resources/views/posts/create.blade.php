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
    <header>
        <h1>アプリ名</h1>
    </header>
    <main>
        <div><a href="{{ route('posts.index') }}" class="cancel-btn">キャンセル</a></div>
        
        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="createpage">

                <div class="box1">
                    
                    <label for="title" style="display: none">タイトル:</label>
                    <input type="text" id="title" name="title" class='titlebox' required placeholder="タイトル">
            
                    {{-- ✅投稿画像の表示 --}}
                    <div>
                        {{-- <label for="image"><i class="fa-regular fa-image image"></i></label> --}}
                        <input type="file" id="image" name="image" style="display: none;" onchange="displayImage()">
                    </div>
                    
                </div>

                <div class="box2">
                    <label for="content" style="display: none">内容:</label>
                    <textarea id="content" name="content" required class="text-content"></textarea>
                    
                    {{-- ここに反映する画像挿入 --}}
                    <div class="edit-image">
                        <img src="#" alt="" id="selectedImage">
                        <div id="hiddenBlock" class="hidden">
                        <!-- ここに非表示にしたいコンテンツを追加 -->
                        {{-- このブロックは画像が選択されたときに <br>
                        非表示にされます。 --}}
                        <i class="fa-regular fa-images"></i>
                        <label for="image"><div class="image">写真を選択</div></label>
                        </div>
                    </div>
                </div>

                <div class="box3">
                    <div>
                        <label for="countries">国タグ:</label>
                        <select class="form-select choose" id="countries" name="country_id" >
                            <option>タグを選択してください</option>
                            @foreach($countries as $country)
                            <option value="{{ $country->id }}">{{ $country->country_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="occupations">企業タグ:</label>
                        <select class="form-select choose" id="occupations" name="occupation_id" >
                            <option>タグを選択してください</option>
                            @foreach($occupations as $occupation)
                            <option value="{{ $occupation->id }}">{{ $occupation->occupation_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                    
                <div class="button"><button type="submit" class="btn">投稿する</button></div>
            </div>
        </form>
    </main>

    <script>
        function displayImage(){
            var input = document.getElementById('image');
            var image = document.getElementById('selectedImage');
            var hiddenBlock = document.getElementById('hiddenBlock');

            // ファイルが選択されたか確認
            if(input.files && input.files[0]){
                var reader = new FileReader();
            

            // 画像が読み込まれた時の処理
            reader.onload = function(e){
                image.src = e.target.result;
                image.style.display = 'block';
            };

            // 画像を読み込む
            reader.readAsDataURL(input.files[0]);
            } 

            hiddenBlock.style.display = "none";
        }
    </script>

</body>
</html>