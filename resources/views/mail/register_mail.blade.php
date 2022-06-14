<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    Hi {{$user['nama']}} {{$user['username']}} <br>
Pendaftaran anda sudah kami terima <br>
Silahkan klik link dibawah ini untuk mengaktifasi akun anda. <br>
    <a href="{{route('register.confirm', [$user['email_confirm_token']])}}"> klik disini  </a>
</body>
</html>
