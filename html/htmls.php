<?php
// Lấy thông tin từ AJAX request
$username = $_POST['username'];
$password = $_POST['password'];

function connectDB() {
    try {
        $conn = new PDO("mysql:hostname=localhost;dbname=project",'root','') ;
        $conn -> exec("set names utf8") ;
        $conn -> setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE , PDO::FETCH_OBJ) ;
        return $conn ;
    } catch(PDOException $e) {
        die("Lỗi kết nối " .$e -> getMessage()) ;
    }

}

function login($email) {
    $conn = connectDB() ;
    $sql = "SELECT * FROM `user` WHERE `Email` = '$email'" ;
    $result = $conn -> query($sql) -> fetch() ;
    return $result ;
}

$user = login($username) ;

if(!empty($user)) {
    if($password == $user -> Password) {
        echo "success" ;
    }else {
        echo "error" ;
    }
}

// Thực hiện kiểm tra tên đăng nhập và mật khẩu (trong trường hợp này, một ví dụ cứng nhắc)
// Mật khẩu hợp lệ


?>
