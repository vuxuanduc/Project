<?php
    // Thêm thanh toán vào bảng thanh toán ;
    function createPay($ReservationID , $PayInfo) {
        $conn = connectDB() ;
        $sql = "INSERT INTO `pay` (`ReservationID` , `PayInfo`) VALUES('$ReservationID' , '$PayInfo')" ;
        $result = $conn -> query($sql) ;
        echo "<script>window.location.href = '?action=historyBookingRoom'</script>" ;
    }

    // Lấy danh sách thanh toán ;
    function getPays() {
        $conn = connectDB() ;
        $sql = "SELECT r.`TotalAmount` , p.* FROM `pay` p
        JOIN `reservation` r ON r.`ReservationID` = p.`ReservationID`" ;
        $result = $conn -> query($sql) -> fetchAll() ;
        return $result ;
    }
?>