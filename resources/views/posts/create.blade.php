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
        <div><a href="{{ route('posts.index') }}"><i class="fa-solid fa-xmark"></i></a></div>
        
        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="createpage">

                <div class="box1">
                    
                    <label for="title">タイトル:</label>
                    <input type="text" id="title" name="title" class='titlebox' required>
                    <!-- <div><i class="fa-regular fa-image"></i></div> -->
                    {{-- <div>
                        <label for="image"><i class="fa-regular fa-image"></i></label>
                        <input type="file" id="image" style="display: none;">
                    </div> --}}
                </div>

                <div>
                    <label for="content">内容:</label>
                    <textarea id="content" name="content" required></textarea>
                    {{-- <div><img src="../img/jobsample.jpg" alt="" class="postimage"></div> --}}
                </div>

                <div>
                    <label for="countries">国タグ:</label>
                    <select class="form-select" id="countries" name="country_id" >
                        <option>タグを選択してください</option>
                        @foreach($countries as $country)
                        <option value="{{ $country->id }}">{{ $country->country_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="occupations">企業タグ:</label>
                    <select class="form-select" id="occupations" name="occupation_id" >
                        <option>タグを選択してください</option>
                        @foreach($occupations as $occupation)
                        <option value="{{ $occupation->id }}">{{ $occupation->occupation_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="image">{{ __('投稿画像') }}</label>
                    <input type="file" id="image" name="image" required accept="image/*">
                </div>
                
                

                <div><button type="submit">投稿する</button></div>
            </div>
        </form>
    </main>
</body>
</html>