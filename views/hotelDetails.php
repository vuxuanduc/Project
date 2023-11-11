<!-- Chi tiết khách sạn -->
<div class="box-details">
    <div>
        <div style="border:1px dotted gray;">
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
    </div>
</div>