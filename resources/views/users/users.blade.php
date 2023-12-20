<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/user.css') }}">
</head>
<body>
    <div class="kensaku">検索フォーム</div>
    <form action="{{ route('users.search') }}" method="POST">
        @csrf
        <select name="country_id">
            <option value="">国を選択してください</option>
            @foreach($countries as $country)
                <option value="{{ $country->id }}">{{ $country->country_name }}</option>
            @endforeach
        </select>
    
        <select name="occupation_id">
            <option value="">会社を選択してください</option>
            @foreach($occupations as $occupation)
                <option value="{{ $occupation->id }}">{{ $occupation->occupation_name }}</option>
            @endforeach
        </select>
    
        <span>
            <button>検索</button>
        </span>
    </form>

    <div class="user">
        @foreach($users as $user)
        <div class="user-box">
            <div>名前：{{ $user->name }}</div>
            <div>国のタグ：{{ $user->country->country_name }}</div>
            <div>企業のタグ：{{ $user->occupation->occupation_name }}</div>
        </div>
        @endforeach
    </div>
</body>
</html>