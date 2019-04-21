{{--44444444444Click here to verify your account: <a href="{{ $link = route('email-verification.check', $user->verification_token) . '?email=' . urlencode($user->email) }}">{{ $link }}</a>--}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<p>您好, {{ $user->name }} ！</p>
<p>收到此电子邮件是因为我们收到了您帐户的验证请求。请点击下面链接完成注册验证:</p>
{{--<a href="http://localhost/activeAccount/?verify={{$token}}">激活链接</a>--}}
<a href="{{ $link = url('verification', $user->verification_token) . '?email=' . urlencode($user->email) }}"> {{ $link }}</a>

{{--<a href="{{ $link = route('email-verification.check', $user->verification_token) . '?email=' . urlencode($user->email) }}">{{ $link }}</a>--}}
<p>如果您未申请重设密码，请忽略此邮件。</p>
</body>
</html>
