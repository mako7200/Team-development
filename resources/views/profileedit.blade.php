<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>プロフィール編集ページ</title>
</head>
<body>
    <main>
        <div class="cancel-btn">
            <a href="">キャンセル</a>
        </div>
        <form action="" method="">
            @csrf
            <div class="edit-form">
                <div class="avatar-edit">
                    <input id="image" type="file" class="form-control" name="image"> 
                    {{-- value="{{ $todo->image }}" onchange="previewImage(this)"> --}}
                    {{-- @if --}}
                    {{-- ($todo->image) --}}
                    <img id="image-preview" alt="" style="max-width: 100%; max-height: 200px;">
                    {{-- src="{{ asset('storage/' . $todo->image) }}"  --}}
                    {{-- @else --}}
                    <img id="image-preview" src="" alt="" style="max-width: 100%; max-height: 200px;">
                    {{-- @endif --}}
                </div>
                <div class="name_edit">
                    <input type="text" class="form-control" placeholder="名前を入力して下さい" name="name"> 
                    {{-- value="{{ $todo->title }}"> --}}
                </div>
                <div class="hash-tagbox">
                    #アフリカ
                </div>
                <div class="background-imagebox">
                    <input id="image" type="file" class="form-control" name="image">
                     {{-- value="{{ $todo->image }}" onchange="previewImage(this)"> --}}
                    

                </div>
                <div class="upload-btn">
                    <button type="submit" class="btn btn-primary">編集完了</button>
                </div>

                


            </div>
        </form>
    </main>
    
</body>
</html>