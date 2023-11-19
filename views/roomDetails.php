<style>
    .h6 {
        display: block ;
        background-color:#86B817;
    }
    .submit {
        background-color:#86B817;
        color : white ;
        font-weight : 500 ;
    }
    label {
        font-weight : 500 ;
    }
    .details {
        display: flex ;
        justify-content: space-between;
    }
    .title {
        font-weight : 500 ;
    }
    .fa-angles-right {
        font-size : 12px ;
    }
    .descriptionRoom {
        cursor: pointer;
        text-decoration: none;
    }
    .modal-body p{
        text-align: justify;
    }
</style>

<div class="row room-details my-2">
    <div class="col-sm-6 col-12">
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
                <label for="">Số lượng phòng</label> <span id="room-number-err" style="color:red;"></span>
                <input type="number" name="room-number" id="room-number" min="1" step="1" class="form-control my-2">
            </div>
            <div class="form-group">
                <input type="submit" name="check-room" value="Kiểm tra" class="form-control my-3 submit">
            </div>
        </form>
    </div>
    <div class="col-sm-6 col-12">
        <h6 class="py-2 px-1 text-white h6">Chi tiết phòng</h6>
        <div id="carouselExampleFade" class="carousel slide carousel-fade">
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
        <hr>
        <h5 style="font-weight:500;">Chi tiết giá phòng</h5>
        <hr>
        <div class="details">
            <p class="title">Loại phòng :</p>
            <p><?php echo $RoomID -> RoomTypeName ?></p>
        </div>
        <div class="details">
            <p class="title">Tên phòng :</p>
            <p><?php echo $RoomID -> RoomName ?></p>
        </div>
        <div class="details">
            <p class="title">Giá phòng :</p>
            <p><?php echo number_format($RoomID -> Price) .'đ' ?></p>
        </div>
        <div class="details">
            <a class="descriptionRoom" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Mô tả phòng<i class="fa-solid fa-angles-right"></i></a>
        </div>


        <!-- Modal mô tả phòng-->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Mô tả phòng</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p><?php echo $RoomID -> Description ?></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">OK</button>
                    </div>
                </div>
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