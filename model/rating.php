<?php
    // Chức năng đánh giá ;
    function newRating($ReservationID , $Rating , $Comment , $RatingDate , $HotelID) {
        $conn = connectDB() ;
        $sql = "INSERT INTO `review` (`ReservationID` , `Rating` , `Comment` , `RatingDate`) VALUES('$ReservationID' , '$Rating' , '$Comment' , '$RatingDate')" ;
        $result = $conn -> query($sql) ;
        echo '<script type="text/javascript">window.location.href = "?action=hotelDetails&HotelID=' . $HotelID . '";</script>';
    }
    
    // Lấy đánh giá theo ID của khách sạn ;
    function getRatingHotelID($HotelID) {
        $conn = connectDB() ;
        $sql = "SELECT `hotel`.`NameHotel` , `user`.`Email`, `user`.`DisplayStatusID` , `review`.`ReviewID` , `review`.`Rating` , `review`.`Comment`, `review`.`RatingDate`
        FROM `hotel`
        JOIN `room` ON `hotel`.`HotelID` = `room`.`HotelID`
        JOIN `reservation` ON `room`.`RoomID` = `reservation`.`RoomID`
        JOIN `user` ON `user`.`UserID` = `reservation`.`UserID`
        JOIN `review` ON `reservation`.`ReservationID` = `review`.`ReservationID`
        WHERE `hotel`.`HotelID` = '$HotelID' AND `user`.`DisplayStatusID` = 1" ;
        $result = $conn -> query($sql) -> fetchAll() ;
        return $result ; 
    }

    // Lấy đánh giá theo ID của khách sạn trong trang admin ;
    function getRatingHotelIDAdmin($HotelID) {
        if(isset($_GET['pages'])) {
            $pages = $_GET['pages'] ;
        }else {
            $pages = 1 ;
        }
        $location = ($pages - 1) * 10 ;
        $conn = connectDB() ;
        $sql = "SELECT `hotel`.`NameHotel` , `user`.`Email` , `review`.`ReviewID` , `review`.`Rating` , `review`.`Comment`, `review`.`RatingDate`
        FROM `hotel`
        JOIN `room` ON `hotel`.`HotelID` = `room`.`HotelID`
        JOIN `reservation` ON `room`.`RoomID` = `reservation`.`RoomID`
        JOIN `user` ON `user`.`UserID` = `reservation`.`UserID`
        JOIN `review` ON `reservation`.`ReservationID` = `review`.`ReservationID`
        WHERE `hotel`.`HotelID` = '$HotelID' LIMIT $location,10" ;
        $result = $conn -> query($sql) -> fetchAll() ;
        return $result ; 
    }

    // Tính điểm đánh giá trung bình của mỗi khách sạn ;
    function avgRating($HotelID) {
        $conn = connectDB() ;
        $sql = "SELECT SUM(`review`.`Rating`)/COUNT(`review`.`Rating`) AS `AvgRating`
        FROM `hotel`
        JOIN `room` ON `hotel`.`HotelID` = `room`.`HotelID`
        JOIN `reservation` ON `room`.`RoomID` = `reservation`.`RoomID`
        JOIN `user` ON `user`.`UserID` = `reservation`.`UserID`
        JOIN `review` ON `reservation`.`ReservationID` = `review`.`ReservationID`
        WHERE `hotel`.`HotelID` = '$HotelID'" ;
        $result = $conn -> query($sql) -> fetch() ;
        return $result ; 
    }

    // Kiểm tra xem người dùng đã từng đánh giá khách sạn hay chưa ;
    function checkReview($HotelID , $UserID) {
        $conn = connectDB() ;
        $sql = "SELECT `hotel`.`HotelID`
        FROM `hotel`
        JOIN `room` ON `hotel`.`HotelID` = `room`.`HotelID`
        JOIN `reservation` ON `room`.`RoomID` = `reservation`.`RoomID`
        JOIN `user` ON `user`.`UserID` = `reservation`.`UserID`
        JOIN `review` ON `reservation`.`ReservationID` = `review`.`ReservationID`
        WHERE `hotel`.`HotelID` = '$HotelID' AND `user`.`UserID` = '$UserID'" ;
        $result = $conn -> query($sql) -> fetchAll() ;
        return $result ; 
    }

    // Tính số lượt đánh giá của mỗi khách sạn ;
    function countRatingHotelID($HotelID) {
        $conn = connectDB() ;
        $sql = "SELECT COUNT(`review`.`Rating`) AS `CountRating`
        FROM `hotel`
        JOIN `room` ON `hotel`.`HotelID` = `room`.`HotelID`
        JOIN `reservation` ON `room`.`RoomID` = `reservation`.`RoomID`
        JOIN `user` ON `user`.`UserID` = `reservation`.`UserID`
        JOIN `review` ON `reservation`.`ReservationID` = `review`.`ReservationID`
        WHERE `hotel`.`HotelID` = '$HotelID'" ;
        $result = $conn -> query($sql) -> fetch() ;
        return $result ; 
    }

    // Xóa đánh giá ;
    function deleteRating($RatingID , $HotelID) {
        $conn = connectDB() ;
        $sql = "DELETE FROM `review` WHERE `ReviewID` IN ($RatingID)" ;
        $result = $conn -> query($sql) ;
        echo '<script type="text/javascript">window.location.href = "?action=RatingHotel&RatingDetailsHotel=' . $HotelID . '";</script>';
        
    }
?>