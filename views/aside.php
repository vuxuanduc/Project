<div>
        <div style="border:1px dotted gray;margin-top:5px;">
            <div style="width:100%;background-color:#86B817;">
                <h6 class="text-center py-2 text-white title-h6">TÌM KHÁCH SẠN</h6>
            </div>
            <div class="px-2">
                <form action="?action=searchHotel" method="post" onsubmit="return validateSearch();">
                    <div class="form-group">
                        <label for="">KHÁCH SẠN</label>
                        <input style="height:30px;" type="text" name="nameHotel" id="nameHotelSearch" placeholder="Tên khách sạn..." class="form-control my-2">
                    </div>
                    <div class="form-group">
                        <label for="">NGÀY NHẬN PHÒNG</label>
                        <input style="height:30px;" name="checkIn" id="checkInSearch" type="date" class="form-control my-2">
                    </div>
                    <div class="form-group">
                        <label for="">NGÀY TRẢ PHÒNG</label>
                        <input style="height:30px;" name="checkOut" id="checkOutSearch" type="date" class="form-control my-2">
                    </div>
                    <div class="form-group">
                        <label for="">SỐ NGƯỜI</label>
                        <input style="height:30px;" name="quantity" id="quantitySearch" type="number" min="0" step="1" class="form-control my-2">
                    </div>
                    <div class="form-group">
                        <input type="submit" value="TÌM PHÒNG" name="btn-search-room" class="form-control my-3" style="background-color:#86B817;color:white;">
                    </div>
                </form>
            </div>
        </div>
        <div style="border:1px dotted gray; margin-top:30px;">
            <div style="width:100%;background-color:#86B817;">
                <h6 class="text-center py-2 text-white">LỰA CHỌN PHỔ BIẾN</h6>
            </div>
            <div class="px-2">
                <ul class="top-views top-reservation">
                    <?php foreach($topReservationHotel as $reservations => $reservation) : ?>
                        <li class="d-flex">
                            <img src="<?php echo explode(',' , $reservation -> Image)[2] ?>" width="70px" height="auto" alt="">
                            <a href="?action=hotelDetails&&HotelID=<?php echo $reservation -> HotelID ?>"><h6><?php echo $reservation -> NameHotel ?></h6></a>
                        </li>
                    <?php endforeach ; ?>
                </ul>
            </div>
        </div>
        <div style="border:1px dotted gray; margin-top:30px;">
            <div style="width:100%;background-color:#86B817;">
                <h6 class="text-center py-2 text-white">TOP LƯỢT XEM</h6>
            </div>
            <div class="px-2">
                <ul class="top-views">
                    <?php foreach($topViewsHotel as $Views => $View) : ?>
                        <li class="d-flex">
                            <img src="<?php echo explode(',' , $View -> Image)[2] ?>" width="70px" height="auto" alt="">
                            <a href="?action=hotelDetails&&HotelID=<?php echo $View -> HotelID ?>"><h6><?php echo $View -> NameHotel ?></h6></a>
                        </li>
                    <?php endforeach ; ?>
                </ul>
            </div>
        </div>
    </div>

    
<script>
    
    function validateSearch() {
        const nameHotelSearch = document.getElementById('nameHotelSearch') ;
        const checkInSearch = document.getElementById('checkInSearch') ;
        const checkOutSearch = document.getElementById('checkOutSearch') ;
        const quantitySearch = document.getElementById('quantitySearch') ;

        let check = true ;
        if(nameHotelSearch.value.trim() == "" || checkInSearch.value.trim() == "" || checkOutSearch.value.trim() == "" || quantitySearch.value.trim() == "") {
            alert("Vui lòng nhập đầy đủ thông tin !") ;
            check = false ;
        }
        return check ;
    }
</script>