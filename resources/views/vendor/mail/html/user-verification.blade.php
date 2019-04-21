<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<p>您好, {{ $user->name }} ！ 请点击下面链接完成注册:</p>
{{--<a href="http://localhost/activeAccount/?verify={{$token}}">激活链接</a>--}}
<a href="{{ $link = url('verification', $user->verification_token) . '?email=' . urlencode($user->email) }}"> {{ $link }}</a>

</body>
</html>
