<?php
    // Lấy ra tất cả các phòng ;
    function getRoom() {
        $conn = connectDB() ;
        $sql = "SELECT `hotel`.`NameHotel` , `roomtype`.`RoomTypeName` , `room`.* FROM `room` 
        JOIN `hotel` ON `hotel`.`HotelID` = `room`.`HotelID`
        JOIN `roomtype` ON `roomtype`.`RoomTypeID` = `room`.`RoomTypeID`" ;
        $result = $conn -> query($sql) -> fetchAll() ;
        return $result ;
    }

    // Lấy danh sách phòng theo ID khách sạn ;
    function getRoomHotelID($HotelID) {
        $conn = connectDB() ;
        $sql = "SELECT `roomtype`.`RoomTypeName` , `room`.* FROM `room`
        JOIN `roomtype` ON `roomtype`.`RoomTypeID` = `room`.`RoomTypeID`
        WHERE `HotelID` = '$HotelID'" ;
        $result = $conn -> query($sql) -> fetchAll() ;
        return $result ;
    }
    
    // Lấy thông tin phòng theo ID của phòng ;
    function getRoomID($RoomID) {
        $conn = connectDB() ;
        $sql = "SELECT `hotel`.`NameHotel` , `roomtype`.`RoomTypeName` , `room`.* FROM `room` 
        JOIN `hotel` ON `hotel`.`HotelID` = `room`.`HotelID`
        JOIN `roomtype` ON `roomtype`.`RoomTypeID` = `room`.`RoomTypeID` WHERE `RoomID` = '$RoomID'" ;
        $result = $conn -> query($sql) -> fetch() ;
        return $result ;
    }

    // Thêm mới phòng ;
    function createRoom($HotelID , $RoomTypeID , $RoomName , $Max , $Des , $Image , $Price) {
        $conn = connectDB() ;
        $sql = "INSERT INTO `room` (`HotelID` , `RoomTypeID` , `RoomName` , `MaximumNumber` , `Description` , `Image` , `Price`) VALUES('$HotelID' , '$RoomTypeID' , '$RoomName' , '$Max' , '$Des' , '$Image' , '$Price')" ;
        $result = $conn -> query($sql) ;
        echo '<script type="text/javascript">window.location.href = "?action=managerRoom";</script>';
    }

    // Xóa phòng; 
    function deleteRoom($RoomID) {
        $conn = connectDB() ;
        $sql = "DELETE FROM `room` WHERE `RoomID` IN ('$RoomID')" ;
        $result = $conn -> query($sql) ;
        echo '<script type="text/javascript">window.location.href = "?action=managerRoom";</script>';
    }
    
    // Cập nhật phòng không chỉnh sửa ảnh của phòng ;
    function updateRoom($RoomID , $HotelID , $RoomTypeID , $RoomName , $Max , $Des , $Image , $Price) {
        $conn = connectDB() ;
        $sql = "UPDATE `room` SET `HotelID` = '$HotelID' , `RoomTypeID` = '$RoomTypeID' , `RoomName` = '$RoomName' , `MaximumNumber` = '$Max' , `Description` = '$Des' , `Image` = '$Image' , `Price` = '$Price' WHERE `RoomID` = '$RoomID'" ;
        $result = $conn -> query($sql) ;
        echo '<script type="text/javascript">window.location.href = "?action=managerRoom";</script>';
    }

    // Cập nhật ảnh phòng có chỉnh sửa ảnh của phòng ;
    function updateRoomNoImage($RoomID , $HotelID , $RoomTypeID , $RoomName , $Max , $Des , $Price) {
        $conn = connectDB() ;
        $sql = "UPDATE `room` SET `HotelID` = '$HotelID' , `RoomTypeID` = '$RoomTypeID' , `RoomName` = '$RoomName' , `MaximumNumber` = '$Max' , `Description` = '$Des' , `Price` = '$Price' WHERE `RoomID` = '$RoomID'" ;
        $result = $conn -> query($sql) ;
        echo '<script type="text/javascript">window.location.href = "?action=managerRoom";</script>';
    }

    // Check xem phòng có còn phòng trong một khoảng thời gian nhất định không ;
    // function checkRoom($roomID , $room_number , $check_in_date , $check_out_date) {
    //     $conn = connectDB() ;
    //     $sql = "SELECT r.*
    //     FROM room r
    //     JOIN hotel h ON r.HotelID = h.HotelID
    //     JOIN roomtype rt ON r.RoomTypeID = rt.RoomTypeID
    //     WHERE r.RoomID = $roomID
    //       AND r.AvailableRooms >= $room_number
    //       AND NOT EXISTS (
    //         SELECT 1
    //         FROM reservation res
    //         WHERE res.RoomID = r.RoomID
    //           AND ('$check_in_date' BETWEEN res.`Check-In-Date` AND res.`Check-Out-Date`
    //             OR '$check_out_date' BETWEEN res.`Check-In-Date` AND res.`Check-Out-Date`)
    //       );" ;
    //     $result = $conn -> query($sql) -> fetchAll() ;
    //     return $result ;
    // }

    

    

?>