<?php
    function login($email) {
        $conn = connectDB() ;
        $sql = "SELECT * FROM `user` WHERE `Email` = '$email'" ;
        $result = $conn -> query($sql) -> fetch() ;
        return $result ;
    }

    function signup($password , $email , $RoleID) {
        $conn = connectDB() ;
        $sql = "INSERT INTO `user`(`Password` , `Email` , `RoleID`) VALUES('$password' , '$email' , '$RoleID')" ;
        $result = $conn -> query($sql) ;
        echo '<script type="text/javascript">window.location.href = "?action=login";</script>';
    }

    function logout() {
        if(isset($_SESSION['login'])) {
            session_unset() ;
            session_destroy() ;
            
        }
        echo '<script type="text/javascript">window.location.href = "?action=home";</script>';
    }
    
    
?>