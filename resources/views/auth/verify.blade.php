<!DOCTYPE html>
<html>
<head>
    <title>Xác minh email</title>
</head>
<body>
    <h2>Hãy xác minh địa chỉ email của bạn</h2>
    <p>Một liên kết xác minh đã được gửi đến email của bạn.</p>

    @if (session('message'))
        <div style="color: green">{{ session('message') }}</div>
    @endif

    <form method="POST" action="{{ route('verification.resend') }}">
        @csrf
        <button type="submit">Gửi lại email xác minh</button>
    </form>
</body>
</html>
