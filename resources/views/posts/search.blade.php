<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/search.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.5.1/css/all.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> --}}
    <script src="search.js"></script>
</head>
<body>
    
    <div class="whole-page">
        
        <div class="navigation">
            <nav>
                <ul>
                    {{-- <li><a href="{{ route('posts.profile' ,['id' => Auth::id()]) }}" class="list-a name">{{ Auth::user()->name }}</a></li> --}}
                    <li>
                        <a href="{{ route('posts.profile' ,['id' => Auth::id()]) }}" class="list-a name">
                            <img src="{{ asset('storage/images/' . Auth::user()->avatar) }}" alt="{{ Auth::user()->name }}" class="avatar">
                        </a>
                    </li>
                    <li><a href="{{ route('posts.index') }}" class="list-a"><i class="fa-solid fa-house"></i></a></li>
                    <li><a href="{{ route('posts.create') }}" class="list-a"><i class="fa-solid fa-square-plus"></i></a></li>
                    <li><a href="{{ route('chat.select') }}" class="list-a"><i class="fa-solid fa-comments"></i></a></li>
                    <li><a href="{{ route('posts.search') }}" class="list-a"><i class="fa-solid fa-user"></i></i></a></li>
                    <li><a href="{{ route('likes.index') }}" class="list-a"><i class="fa-solid fa-heart"></i></a></li>
                    <li>アプリ名</li>
                </ul>
            </nav>
        </div> 

        <div><img src="{{ asset('../images/search.blade.jpg') }}" alt="" class="background-image"></div>
        <div class="usersearch">
            

                {{-- <div class="kensaku">
                    <div>
                    <form action="{{ route('posts.search') }}" method="POST" class="kensaku-bar">
                        @csrf
                        @if(isset($countries)) $countriesが定義しているかどうか確認している --}}
                        {{-- <select name="country_id" class="country-bar">
                            <option value="">国を選択してください</option>
                            @foreach($countries as $country)
                                <option value="{{ $country->id }}">{{ $country->country_name }}</option>
                            @endforeach
                        </select>
                        @endif
                        
                        @if(isset($occupations))  $occupationsが定義されているかどうか確認している --}}
                        {{-- <select name="occupation_id" class="occupation-bar">
                            <option value="">会社を選択してください</option>
                            @foreach($occupations as $occupation)
                                <option value="{{ $occupation->id }}">{{ $occupation->occupation_name }}</option>
                            @endforeach
                        </select>
                        @endif
                        
                            <div class="button-box">
                                <button class="button">検索</button>
                            </div>
                    </form>
                    </div>
                </div> --}}

                {{-- <div class="search-results">
                    <h2>検索結果</h2>
            
                    <table>
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Content</th>
                                <th>Country</th>
                                <th>Occupation</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->content }}</td>
                                    <td>{{ $post->country->country_name }}</td>
                                    <td>{{ $post->occupation->occpation_name }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div> --}}

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
                </div>
    </div>
</body>
</html>
