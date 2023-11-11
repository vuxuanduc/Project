<?php
    // Lấy ra tất cả các khách sạn ;
    function getRoom() {
        $conn = connectDB() ;
        $sql = "SELECT `hotel`.`NameHotel` , `roomtype`.`RoomTypeName` , `room`.* FROM `room` 
        JOIN `hotel` ON `hotel`.`HotelID` = `room`.`HotelID`
        JOIN `roomtype` ON `roomtype`.`RoomTypeID` = `room`.`RoomTypeID`" ;
        $result = $conn -> query($sql) -> fetchAll() ;
        return $result ;
    }

    function getRoomID($RoomID) {
        $conn = connectDB() ;
        $sql = "SELECT `hotel`.`NameHotel` , `roomtype`.`RoomTypeName` , `room`.* FROM `room` 
        JOIN `hotel` ON `hotel`.`HotelID` = `room`.`HotelID`
        JOIN `roomtype` ON `roomtype`.`RoomTypeID` = `room`.`RoomTypeID` WHERE `RoomID` = '$RoomID'" ;
        $result = $conn -> query($sql) -> fetch() ;
        return $result ;
    }

    function createRoom($HotelID , $RoomTypeID , $RoomName , $Max , $Des , $Image , $AvailableRooms , $Price) {
        $conn = connectDB() ;
        $sql = "INSERT INTO `room` (`HotelID` , `RoomTypeID` , `RoomName` , `MaximumNumber` , `Description` , `Image` , `AvailableRooms` , `Price`) VALUES('$HotelID' , '$RoomTypeID' , '$RoomName' , '$Max' , '$Des' , '$Image' , '$AvailableRooms' , '$Price')" ;
        $result = $conn -> query($sql) ;
        echo '<script type="text/javascript">window.location.href = "?action=managerRoom";</script>';
    }

    function deleteRoom($RoomID) {
        $conn = connectDB() ;
        $sql = "DELETE FROM `room` WHERE `RoomID` IN ('$RoomID')" ;
        $result = $conn -> query($sql) ;
        echo '<script type="text/javascript">window.location.href = "?action=managerRoom";</script>';
    }

    function updateRoom($RoomID , $HotelID , $RoomTypeID , $RoomName , $Max , $Des , $Image , $AvailableRooms , $Price) {
        $conn = connectDB() ;
        $sql = "UPDATE `room` SET `HotelID` = '$HotelID' , `RoomTypeID` = '$RoomTypeID' , `RoomName` = '$RoomName' , `MaximumNumber` = '$Max' , `Description` = '$Des' , `Image` = '$Image' , `AvailableRooms` = '$AvailableRooms' , `Price` = '$Price' WHERE `RoomID` = '$RoomID'" ;
        $result = $conn -> query($sql) ;
        echo '<script type="text/javascript">window.location.href = "?action=managerRoom";</script>';
    }

    function updateRoomNoImage($RoomID , $HotelID , $RoomTypeID , $RoomName , $Max , $Des , $AvailableRooms , $Price) {
        $conn = connectDB() ;
        $sql = "UPDATE `room` SET `HotelID` = '$HotelID' , `RoomTypeID` = '$RoomTypeID' , `RoomName` = '$RoomName' , `MaximumNumber` = '$Max' , `Description` = '$Des' , `AvailableRooms` = '$AvailableRooms' , `Price` = '$Price' WHERE `RoomID` = '$RoomID'" ;
        $result = $conn -> query($sql) ;
        echo '<script type="text/javascript">window.location.href = "?action=managerRoom";</script>';
    }
?>