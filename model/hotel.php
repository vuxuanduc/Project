<?php
    // Thêm khách sạn ;
    function createHotel($name , $image , $address , $phone , $email) {
        $conn = connectDB() ;
        $sql = "INSERT INTO `hotel` (`NameHotel` , `Image` , `Address` , `Phone` , `Email`) VALUES('$name' , '$image' , '$address' , '$phone' , '$email')" ;
        $result = $conn -> query($sql)  ;
        echo '<script type="text/javascript">window.location.href = "?action=managerHotels";</script>';
    }

    // Lấy ra dữ liệu khách sạn ;
    function getHotels() {
        $conn = connectDB() ;
        $sql = "SELECT * FROM `hotel`" ;
        $result = $conn -> query($sql) -> fetchAll() ;
        return $result ;
    }
    

    // Lấy dữ liệu khách sạn theo id ;
    function getHotelsID($hotelID) {
        $conn = connectDB() ;
        $sql = "SELECT * FROM `hotel` WHERE `HotelID` = '$hotelID'" ;
        $result = $conn -> query($sql) -> fetch() ;
        return $result ;
    }

    // Xóa khách sạn ;
    function deleteHotel($idHotel) {
        $conn = connectDB() ;
        $sql = "DELETE  FROM `hotel` WHERE `HotelID` IN ('$idHotel')" ;
        $result = $conn -> query($sql) ;
        echo '<script type="text/javascript">window.location.href = "?action=managerHotels";</script>';
    }

    // Cập nhật khách sạn kèm ảnh ;
    function updateHotel($name , $image , $address , $phone , $email , $hotelID) {
        $conn = connectDB() ;
        $sql = "UPDATE `hotel` SET `NameHotel` = '$name' , `Image` = '$image' , `Address` = '$address' , `Phone` = '$phone' , `Email` = '$email' WHERE `HotelID` = '$hotelID'" ;
        $result = $conn -> query($sql) ;
        echo '<script type="text/javascript">window.location.href = "?action=managerHotels";</script>';
    }

    // Cập nhật khách sạn không kèm ảnh ;
    function updateHotelNoImage($name , $address , $phone , $email , $hotelID) {
        $conn = connectDB() ;
        $sql = "UPDATE `hotel` SET `NameHotel` = '$name' , `Address` = '$address' , `Phone` = '$phone' , `Email` = '$email' WHERE `HotelID` = '$hotelID'" ;
        $result = $conn -> query($sql) ;
        echo '<script type="text/javascript">window.location.href = "?action=managerHotels";</script>';
    }

    // Cập nhật số lượt xem của khách sạn ;
    function updateViews($hotelID , $views) {
        $conn = connectDB() ;
        $sql = "UPDATE `hotel` SET `Views` = '$views' WHERE `HotelID` = '$hotelID'" ;
        $result = $conn -> query($sql) ;
    }

    // Lấy top 10 khách sạn có lượt views cao nhất ;
    function topViewsHotel() {
        $conn = connectDB() ;
        $sql = "SELECT `HotelID` , `Image` , `NameHotel` FROM `hotel` ORDER BY `Views` DESC LIMIT 10" ;
        $result = $conn -> query($sql) -> fetchAll() ;
        return $result ;
    }

    
?>