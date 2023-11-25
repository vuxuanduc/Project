<!DOCTYPE html>
<html>
<head>
    <title>Đăng nhập</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

<form id="loginForm">
    <input type="text" id="username" placeholder="Tên đăng nhập"><br>
    <input type="password" id="password" placeholder="Mật khẩu"><br>
    <button type="submit">Đăng nhập</button>
    <span id="error" style="color: red;"></span>
</form>

<script>
$(document).ready(function() {
    $('#loginForm').submit(function(e) {
        e.preventDefault();
        var username = $('#username').val();
        var password = $('#password').val();

        $.ajax({
            type: 'POST',
            url: 'htmls.php',
            data: {
                username: username,
                password: password
            },
            success: function(response) {
                if (response === 'success') {
                    // Nếu đăng nhập thành công, chuyển hướng hoặc thực hiện hành động khác
                    window.location.href = 'dashboard.php'; // Điều hướng tới trang dashboard.php
                } else {
                    $('#error').text('Tên đăng nhập hoặc mật khẩu không đúng.');
                }
            }
        });
    });
});
</script>

</body>
</html>
