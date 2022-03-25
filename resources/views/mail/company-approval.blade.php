<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <p>Your application to join the site has been approved.</p>
    <p>You can log in with the following details:</p>
    <br/>
    <p>[Login Details]</p>
    <ul>
        <li>Email : {{$approval['email']}}</li>
        <li>Password : {{$approval['password']}}</li>
        <li>Login Here : <a href="{{route('company-user-login')}}">{{route('company-user-login')}}</a></li>
    </ul>
</body>
</html>
