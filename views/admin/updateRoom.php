<div class="box">
    <?php
        require './views/admin/navAdmin.php' ;
    ?>
    <div class="" style="padding : 0 10px;">
        <h6 class="text-center">CHỈNH SỬA PHÒNG</h6>
        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="HotelID" value="<?php echo $hotel -> HotelID ?>" class="form-control my-1">
            <div class="form-group">
                <label class="my-1" for="" style="font-weight:500;">Tên khách sạn</label>
                <input type="text" name="name" value="<?php echo $hotel -> NameHotel ?>" class="form-control my-1">
            </div>
            <div class="form-group">
                <label class="my-1" for="" style="font-weight:500;">Ảnh khách sạn</label>
                <div class="d-flex my-1">
                    <?php $listImage = explode(',' , $hotel -> Image) ; ?>
                    <?php foreach($listImage as $images => $image) : ?>
                        <img class="mx-2" src="<?php echo $image ?>" width="40px" height="auto" alt="">
                    <?php endforeach ; ?>
                </div>
            </div>
            <div class="form-group">
                <label class="my-1" for="" style="font-weight:500;">Ảnh mới</label>
                <input type="file" name="image[]" class="form-control my-1" accept="image/*" multiple>
            </div>
            <div class="form-group">
                <label class="my-1" for="" style="font-weight:500;">Địa chỉ</label>
                <input type="text" readonly value="<?php echo $hotel -> Address ?>" class="form-control my-1" accept="image/*" multiple>
            </div>
            <input type="hidden" value="" name="province" id="province_insert">
            <input type="hidden" value="" name="district" id="district_insert">
            <input type="hidden" value="" name="ward" id="ward_insert">

          <div class="form-group">
            <label for="" style="font-weight:500;">Chọn tỉnh</label> <span id="province_err" style="color:red;font-size:14px;"></span>
            <select id="province" class="form-control my-2 province">
              <option value="">Chọn tỉnh</option>
            </select>
          </div>
          <div class="form-group">
            <label for="" style="font-weight:500;">Chọn quận/huyện</label> <span id="district_err" style="color:red;font-size:14px;"></span>
            <select id="district" class="form-control my-2 district">
              <option value="">Chọn quận/huyện</option>
            </select>
          </div>
          <div class="form-group">
            <label for="" style="font-weight:500;">Chọn phường/xã</label> <span id="ward_err" style="color:red;font-size:14px;"></span>
            <select id="ward" class="form-control my-2 ward">
              <option value="">Chọn phường/xã</option>
            </select>
          </div>
          <div class="form-group">
            <label for="" style="font-weight:500;">Chi tiết</label> <span id="apartmentNumber_err" style="color:red;font-size:14px;"></span>
            <input type="text" id="apartmentNumber" name="apartmentNumber" placeholder="Tên đường, số nhà..." class="form-control my-2">
          </div>
          <div class="form-group">
            <label for="" style="font-weight:500;">Số điện thoại</label> <span id="phone_err" style="color:red;font-size:14px;"></span>
            <input type="text" id="phone" value="<?php echo $hotel -> Phone ?>" name="phone" placeholder="Số điện thoại" class="form-control my-2">
          </div>
          <div class="form-group">
            <label for="" style="font-weight:500;">Email</label> <span id="email_err" style="color:red;font-size:14px;"></span>
            <input type="text" value="<?php echo $hotel -> Email ?>" id="email" name="email" placeholder="Email" class="form-control my-2">
          </div>
          <div style="margin-top:15px;">
            <input class="btn button-admin" type="submit" name="btn-update-hotel" value="Cập nhật">
            <a href="?action=managerHotels" class="btn mx-2 button-admin" >Danh sách</a>
          </div>
        </form>
    </div>
</div>