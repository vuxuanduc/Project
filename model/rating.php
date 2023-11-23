<?php
    // Chức năng đánh giá ;
    function newRating($ReservationID , $Rating , $Comment , $RatingDate , $HotelID) {
        $conn = connectDB() ;
        $sql = "INSERT INTO `review` (`ReservationID` , `Rating` , `Comment` , `RatingDate`) VALUES('$ReservationID' , '$Rating' , '$Comment' , '$RatingDate')" ;
        $result = $conn -> query($sql) ;
        echo '<script type="text/javascript">window.location.href = "?action=hotelDetails&&HotelID="'.$HotelID.';</script>';
    }
    
    // Lấy đánh giá theo ID của khách sạn ;
    function getRatingHotelID($HotelID) {
        $conn = connectDB() ;
        $sql = "SELECT `hotel`.`NameHotel` , `user`.`Email` , `review`.`Rating`, `review`.`Comment`, `review`.`RatingDate`
        FROM `hotel`
        JOIN `room` ON `hotel`.`HotelID` = `room`.`HotelID`
        JOIN `reservation` ON `room`.`RoomID` = `reservation`.`RoomID`
        JOIN `user` ON `user`.`UserID` = `reservation`.`UserID`
        JOIN `review` ON `reservation`.`ReservationID` = `review`.`ReservationID`
        WHERE `hotel`.`HotelID` = '$HotelID'" ;
        $result = $conn -> query($sql) -> fetchAll() ;
        return $result ; 
    }
?>