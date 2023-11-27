<style>
    .room-details {
        display: grid ;
        grid-template-columns : 1fr 1fr 1fr ;
        gap : 10px ; 
    }
    @media (max-width : 1000px) {
        .room-details {
            display: grid ;
            grid-template-columns : 1fr 1fr ;
            gap : 10px ; 
        }
    }
    @media (max-width : 685px) {
        .room-details {
            display: grid ;
            grid-template-columns : 1fr ;
            gap : 10px ; 
        }
    }
    .h6 {
        background-color : #86B817;
    }
    .submit {
        background-color : #86B817;
        color : white ;
    }
    .description {
        display: flex ;
        justify-content: space-between;
        margin-top : 10px ;
    }
    .description p {
        font-weight : 500 ;
    }
    .modal-body {
        text-align : justify ;
    }
    .text-primary {
        cursor: pointer;
    }
    .room-details label {
        font-weight : 500 ;
    }
</style>


<div class="room-details my-2">
    <div>
        <?php
            if(empty($result)) {
        ?>
            <h6 class="py-2 px-1 text-white h6">Kiểm tra phòng</h6>
            <form action="" method="post" class="px-2" onsubmit="return validateCheckRoom();">
                <div class="form-group">
                    <label for="">Ngày nhận phòng</label> <span id="check-in-date-err" style="color:red;"></span>
                    <input type="date" name="check-in-date" id="check-in-date" class="form-control my-2">
                </div>
                <div class="form-group">
                    <label for="">Ngày trả phòng</label> <span id="check-out-date-err" style="color:red;"></span>
                    <input type="date" name="check-out-date" id="check-out-date" class="form-control my-2">
                </div>

                <div class="form-group">
                    <input type="submit" name="check-room" value="Kiểm tra" class="form-control my-3 submit">
                </div>
            </form>
        <?php
            }else {
        ?>
            <h6 class="py-2 px-1 text-white h6">Nhập thông tin đặt phòng</h6>
            <form action="" method="post" class="px-2" onsubmit="">
                <div class="form-group">
                    <label for="">Ngày nhận phòng</label> 
                    <input type="date" name="check-in-date-booking" value="<?php echo $_POST['check-in-date'] ?>"  class="form-control my-2" readonly>
                </div>
                <div class="form-group">
                    <label for="">Ngày trả phòng</label> 
                    <input type="date" name="check-out-date-booking"  value="<?php echo $_POST['check-out-date'] ?>"  class="form-control my-2" readonly>
                </div>
                <div class="form-group">
                    <label for="">Giá phòng</label> 
                    <input type="number" name="price-room-booking"  value="<?php echo $RoomID -> Price ?>"  class="form-control my-2" readonly>
                </div>
                <div class="form-group">
                    <label for="">Số ngày ở</label> 
                    <input type="number" name="numberOfNights"  value="<?php echo $numberOfNights ?>"  class="form-control my-2" readonly>
                </div>
                <div class="form-group">
                    <label for="">Tổng tiền</label> 
                    <input type="number" name="amount-booking"  value="<?php echo $RoomID -> Price * $numberOfNights ?>"  class="form-control my-2" readonly>
                </div>
                <?php
                    if(isset($_SESSION['login'])) {
                ?>
                    <div class="form-group">
                        <input type="submit" name="book-room" value="Đặt phòng" class="form-control my-3 submit" onclick="return confirm('Sau khi đặt phòng 30 phút nếu quý khách không thanh toán đơn sẽ tự động hủy!');">
                    </div>
                <?php
                    }else {
                ?>
                    <input type="button" class="form-control my-3 submit" data-bs-toggle="modal" data-bs-target="#exampleModal" value="Đặt phòng">
                <?php
                    }
                ?>
            </form>
        <?php
            }
        ?>
    </div>

    <!-- Modal thông báo đăng nhập khi chưa đăng nhập mà đã bấm nút đặt phòng ; -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Thông báo!</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Vui lòng đăng nhập trước khi đặt phòng
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                    <a href="?action=login" class="btn btn-primary">Đăng nhập</a>
                </div>
            </div>
        </div>
    </div>

    <div>
        <h6 class="px-1 py-2 text-white h6">Ảnh phòng</h6>
        <div id="carouselExampleFade" class="carousel slide carousel-fade px-1">
            <div class="carousel-inner">
                <?php foreach($listImageRoom as $Images => $Image) : ?>
                    <div class="carousel-item active">
                        <img src="<?php echo $Image ?>" class="d-block w-100" alt="Lỗi tải ảnh">
                    </div>
                <?php endforeach ; ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <div>
        <h6 class="px-1 py-2 text-white h6">Chi tiết phòng</h6>
        <div class="description px-1">
            <p>Tên khách sạn</p>
            <p><?php echo $RoomID -> NameHotel ?></p>
        </div>
        <div class="description px-1">
            <p>Tên loại phòng</p>
            <p><?php echo $RoomID -> RoomTypeName ?></p>
        </div>
        <div class="description px-1">
            <p>Tên phòng</p>
            <p><?php echo $RoomID -> RoomName ?></p>
        </div>
        <div class="description px-1">
            <p>Giá phòng</p>
            <p><?php echo number_format($RoomID -> Price) .'đ/1 đêm' ?></p>
        </div>
        <div class="description px-1">
            <p class="text-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Xem mô tả phòng</p>
        </div>
    </div>
</div>


<!-- Modal xem mô tả phòng -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Mô tả phòng</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <?php echo $RoomID -> Description ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">OK</button>
      </div>
    </div>
  </div>
</div>


<script>
    const check_in_date = document.getElementById('check-in-date') ;
    const check_in_date_err = document.getElementById('check-in-date-err') ;
    const check_out_date = document.getElementById('check-out-date') ;
    const check_out_date_err = document.getElementById('check-out-date-err') ;
    const room_number = document.getElementById('room-number') ;
    const room_number_err = document.getElementById('room-number-err') ;

    function validateCheckRoom() {
        let checkRoom = true ;
        if(check_in_date.value.trim() == "") {
            check_in_date_err.innerText = "Hãy nhập ngày nhận phòng" ;
            checkRoom = false ;
        }else {
            check_in_date_err.innerText = "" ;
        }

        if(check_out_date.value.trim() == "") {
            check_out_date_err.innerText = "Hãy nhập ngày trả phòng" ;
            checkRoom = false ;
        }else {
            check_out_date_err.innerText = "" ;
        }

        if(room_number.value.trim() == "") {
            room_number_err.innerText = "Hãy nhập số lượng phòng" ;
            checkRoom = false ;
        }else {
            room_number_err.innerText = "" ;
        }

        return checkRoom ;
    }
</script>