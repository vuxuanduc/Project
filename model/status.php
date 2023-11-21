<?php
    // Quản lý trạng thái ;
    function getStatus() {
        $conn = connectDB() ;
        $sql = "SELECT * FROM `status`" ;
        $result = $conn -> query($sql) -> fetchAll() ;
        return $result ;
    }
?>