<?php
// Lấy thông tin từ AJAX request
$username = $_POST['username'];
$password = $_POST['password'];

// Thực hiện kiểm tra tên đăng nhập và mật khẩu (trong trường hợp này, một ví dụ cứng nhắc)
$validUsername = 'admin'; // Tên đăng nhập hợp lệ
$validPassword = '123456'; // Mật khẩu hợp lệ

if ($username === $validUsername && $password === $validPassword) {
    echo 'success'; // Trả về 'success' nếu tên đăng nhập và mật khẩu đúng
} else {
    echo 'error'; // Trả về 'error' nếu tên đăng nhập hoặc mật khẩu không đúng
}
?>
