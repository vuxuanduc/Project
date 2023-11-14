
<div class="box">
    <?php
        require './views/admin/navAdmin.php' ;
    ?>
    <div>
    <table class="table">
      <thead class="table-success">
          <tr>
              <th>Quản lí khách sạn</th>
          </tr>
      </thead>
  </table>
  <form action="" method="post">
      <table class="table">
          <thead class="table-success">
              <tr>
                  <th>Chọn</th>
                  <th>Mã KS</th>
                  <th>Tên KS</th>
                  <th>Số ĐT</th>
                  <th>Email</th>
                  <th>Địa chỉ</th>
                  <th>Thao tác</th>
              </tr>
          </thead>

          <tbody>
              <?php foreach($listHotels as $hotels => $hotel) : ?>
                <tr>
                  <td><input type="checkbox" id="checkList" name="check[]" value="<?php echo $hotel -> HotelID ?>"></td>
                  <td><?php echo $hotel -> HotelID ?></td>
                  <td><?php echo $hotel -> NameHotel ?></td>
                  <td><?php echo $hotel -> Phone ?></td>
                  <td><?php echo $hotel -> Email ?></td>
                  <td><?php echo $hotel -> Address ?></td>
                  <td>
                    <a href="?action=managerHotels&&DeleteHotelID=<?php echo $hotel -> HotelID ?>" onclick="return confirm('Bạn chắc chắn xóa chứ ?');" class="btn btn-danger">Xóa</a>
                    <a href="?action=updateHotel&&updateHotelID=<?php echo $hotel -> HotelID ?>" class="btn btn-primary my-1">Sửa</a>
                  </td>
                </tr>
              <?php endforeach ; ?>
          </tbody>
          
      </table>
      <tr>
          <a class="btn open_checked button-admin">Chọn tất cả</a>
          <a class="btn close_checked mx-2 button-admin">Bỏ chọn tất cả</a>
          <button type="submit" class="btn delete_checked button-admin" onclick="return confirm('Bạn chắc chắn xóa chứ ?');" name="delete_checked">Xóa mục đã chọn</button>
          <a href="?action=addSector" class="btn mx-2 button-admin" data-bs-toggle="modal" data-bs-target="#exampleModal">Thêm mới</a>
      </tr>
    </form>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Thêm khách sạn</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="" method="post" enctype="multipart/form-data" onsubmit="return validateAddHotel();">
        <div class="modal-body">
          <div class="form-group">
            <label for="" style="font-weight:500;">Tên khách sạn</label> <span id="nameHotel_err" style="color:red;font-size:14px;"></span>
            <input type="text" id="nameHotel" name="name" placeholder="Tên khách sạn" class="form-control my-2">
          </div>
          <div class="form-group">
            <label for="" style="font-weight:500;">Ảnh khách sạn</label> <span id="image_err" style="color:red;font-size:14px;"></span>
            <input type="file" id="image" name="image[]" accept="image/*" multiple class="form-control my-2">
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
            <input type="text" id="phone" name="phone" placeholder="Số điện thoại" class="form-control my-2">
          </div>
          <div class="form-group">
            <label for="" style="font-weight:500;">Email</label> <span id="email_err" style="color:red;font-size:14px;"></span>
            <input type="text" id="email" name="email" placeholder="Email" class="form-control my-2">
          </div>
        </div>
          
        <div class="modal-footer">
          <input type="reset" class="btn btn-secondary" value="Nhập lại">
          <button type="submit" class="btn" name="btn-add-hotel" style="background-color:#86B817;color:white;">Thêm mới</button>
        </div>
      </form>
    </div>
  </div>
</div>
