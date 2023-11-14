<style>
    table {
        width : 100% ;
        margin-top : 15px ;
        border-collapse:collapse ;
        border : 1px dotted gray ;
    }
    table thead {
        height : 45px ;
        background-color : #e4e4e4;
    }
    table thead tr th{
        padding-left : 10px ;
    }
    table tbody tr {
        height : 100px ;
        border : 1px dotted gray ;
    }
    table tbody tr td{
        border : 1px dotted gray ;
        text-align: center ;
    }
</style>
<div class="box-details">
    <div>
        <div style="border:1px dotted gray;margin-top:5px;">
            <div style="width:100%;background-color:#86B817;">
                <h6 class="text-center py-2 text-white">TÌM KHÁCH SẠN</h6>
            </div>
            <div class="px-2">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="">ĐIỂM ĐẾN</label>
                        <input style="height:30px;" type="text" class="form-control my-2">
                    </div>
                    <div class="form-group">
                        <label for="">NGÀY NHẬN PHÒNG</label>
                        <input style="height:30px;" type="date" class="form-control my-2">
                    </div>
                    <div class="form-group">
                        <label for="">NGÀY TRẢ PHÒNG</label>
                        <input style="height:30px;" type="date" class="form-control my-2">
                    </div>
                    <div class="form-group">
                        <label for="">SỐ PHÒNG</label>
                        <input style="height:30px;" type="number" min="0" step="1" class="form-control my-2">
                    </div>
                    <div class="form-group">
                        <label for="">SỐ NGƯỜI</label>
                        <input style="height:30px;" type="number" min="0" step="1" class="form-control my-2">
                    </div>
                    <div class="form-group">
                        <input type="submit" value="TÌM KIẾM" class="form-control my-3" style="background-color:#86B817;color:white;">
                    </div>
                </form>
            </div>
        </div>
        <div style="border:1px dotted gray; margin-top:20px;">
            <div style="width:100%;background-color:#86B817;">
                <h6 class="text-center py-2 text-white">LỰA CHỌN PHỔ BIẾN</h6>
            </div>
            <div class="px-2">
                
            </div>
        </div>
    </div>
    <div style="margin-left:10px;">
        <h5><?php echo $Hotel -> NameHotel ?></h5>
        <p style="font-size:12px;"><i style="margin-right:6px;color:#128ce3;" class="fa-solid fa-location-dot"></i><?php echo $Hotel -> Address ?></p>
        <div id="carouselExampleFade" class="carousel slide carousel-fade">
            <div class="carousel-inner">
                <?php $listImages = explode(',' , $Hotel -> Image) ; ?>
                <?php foreach($listImages as $images => $image) : ?>
                    <div class="carousel-item active">
                        <img src="<?php echo $image ?>" class="d-block w-100" alt="...">
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
        <table class="table-responsive">
            <thead>
                <tr>
                    <th>Tên phòng</th>
                    <th>Ảnh phòng</th>
                    <th>Loại phòng</th>
                    <th>Số người</th>
                    <th>Giá</th>
                    <th>Đặt phòng</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($listRoomHotelID as $listRoom => $Room) : ?>
                    <tr>
                        <td>
                            <?php echo $Room -> RoomName ?> 
                        </td>
                        <td>
                            <img src="<?php echo explode(',' , $Room -> Image)[0] ?>" width="100px" height="auto" alt="">
                        </td>
                        <td><?php echo $Room -> RoomTypeName ?></td>
                        <td><?php echo $Room -> MaximumNumber ?></td>
                        <td><?php echo number_format($Room -> Price) ."đ" ?></td>
                        <td>
                            <a href=""  style="background-color:#86B817;padding:3px 5px;border-radius:3px;color:white;text-decoration:none;">Xem phòng</a>
                        </td>
                    </tr>
                <?php endforeach ; ?>
            </tbody>
        </table>
        
    </div>
</div>