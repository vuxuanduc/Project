<?php

    // Phần đăng nhập ;
    function login($email) {
        $conn = connectDB() ;
        $sql = "SELECT * FROM `user` WHERE `Email` = '$email'" ;
        $result = $conn -> query($sql) -> fetch() ;
        return $result ;
    }

    // Phần đăng ký của người dùng ;
    function signup($password , $email , $RoleID) {
        $conn = connectDB() ;
        $sql = "INSERT INTO `user`(`Password` , `Email` , `RoleID`) VALUES('$password' , '$email' , '$RoleID')" ;
        $result = $conn -> query($sql) ;
        echo '<script type="text/javascript">window.location.href = "?action=login";</script>';
    }

    // Phần đăng xuất ;
    function logout() {
        if(isset($_SESSION['login'])) {
            session_unset() ;
            session_destroy() ;
            
        }
        echo '<script type="text/javascript">window.location.href = "?action=home";</script>';
    }

    // Lấy tất cả thông tin user ra ;
    function getUsers() {
        $conn = connectDB() ;
        $sql = "SELECT * FROM `user`" ;
        $result = $conn -> query($sql) -> fetchAll() ;
        return $result ;
    }
    
    // Thêm người dùng trong trang admin ;
    function createUser($password , $email , $RoleID) {
        $conn = connectDB() ;
        $sql = "INSERT INTO `user`(`Password` , `Email` , `RoleID`) VALUES('$password' , '$email' , '$RoleID')" ;
        $result = $conn -> query($sql) ;
        echo '<script type="text/javascript">window.location.href = "?action=managerUsers";</script>';
    }

    // Xóa người dùng ;
    function deleteUser($UserID) {
        $conn = connectDB() ;
        $sql = "DELETE FROM `user` WHERE `UserID` IN ('$UserID')" ;
        $result = $conn -> query($sql) ;
        echo '<script type="text/javascript">window.location.href = "?action=managerUsers";</script>';
    }
    
    
?>