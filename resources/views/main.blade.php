<!-- resources/views/main.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Main Page</title>
</head>
<body>
    <h1>Đây là trang Main</h1>

    @if(Auth::check())
        <p>Xin chào, {{ Auth::user()->full_name }}</p>
    @else
        <p>Bạn chưa đăng nhập.</p>
    @endif
</body>
</html>
