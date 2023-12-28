<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>chat_user_select</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
            </div>
        </div>
     
        {{--  チャット可能ユーザ一覧  --}}
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $key => $user)
            <tr>
                <th>{{$loop->iteration}}</th>
                <td>{{$user->name}}</td>
                <td><a href="/chat/{{$user->id}}"><button type="button" class="btn btn-primary">Chat</button></a></td>
            </tr>
            @endforeach
            </tbody>
        </table>
     
    </div>
</body>
</html>