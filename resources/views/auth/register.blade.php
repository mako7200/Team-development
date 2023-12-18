{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.5.1/css/all.css">
</head>
<body>
    <header>
        <h1>アプリ名</h1>
        <hr>
    </header>
    <main>
        <div><a href=""><i class="fa-solid fa-xmark"></i></a></div>
        <div class="register-box">
            <form method="POST" action="">
                <div>
                    <div>
                        <label for="name">Username</label>
                        <input type="text" id="name">
                    </div>
                    <div>
                        <label for="mail">Mail Address</label>
                        <input type="text" id="mail">
                    </div>
                    <div>
                        <label for="password">Password</label>
                        <input type="text" id="password">
                    </div>
                    <div class="row1">
                        <label for="confirm">Confirm Password</label>
                        <input type="text" id="confirm">
                        <div>
                            <label for="avatar"><i class="fa-solid fa-camera"></i></label>
                            <input type="file" id="avatar" style="display: none">
                        </div>
                    </div>
                </div>
                <div>
                    <div><img src="../img/seedtech70期生徒.jpg" alt="" class="myavatar"></div>
                </div>
                <div class="row2">
                    <div>
                        <label for="location">Location</label>
                        <input type="text" id="location">
                    </div>
                    <div>
                        <label for="job">Occupation</label>
                        <input type="text" id="job">
                    </div>
                </div>
                <div><button type="submit">登録</button></div>
            </form>
        </div>
    </main>
</body>
</html>
