
<div class="box">
    <?php
        require './views/admin/navAdmin.php' ;
    ?>
    <div>
    <table class="table">
      <thead class="table-success">
          <tr>
              <th>Quản lí đặt phòng</th>
          </tr>
      </thead>
  </table>
  <form action="" method="post">
      <table class="table table-hover">
          <thead class="table-success">
              <tr>
                  <th>Mã đặt</th>
                  <th>Tên KS</th>
                  <th>Tên phòng</th>
                  <th>Email</th>
                  <th>Ngày đặt</th>
                  <th>Ngày vào</th>
                  <th>Ngày ra</th>
                  <th>Giá</th>
                  <th>Tổng tiền</th>
                  <th>Trạng thái</th>
                  
              </tr>
          </thead>

          <tbody>
            <?php foreach($listReservation as $Reservations => $Reservation) : ?>
                <tr>
                    <td><?php echo $Reservation -> ReservationID ?></td>
                    <td><?php echo $Reservation -> NameHotel ?></td>
                    <td><?php echo $Reservation -> RoomName ?></td>
                    <td><?php echo $Reservation -> Email ?></td>
                    <td><?php echo $Reservation -> ReservationDate ?></td>
                    <td><?php echo $Reservation -> Check_In_Date ?></td>
                    <td><?php echo $Reservation -> Check_Out_Date ?></td>
                    <td><?php echo $Reservation -> Price ?></td>
                    <td><?php echo $Reservation -> TotalAmount ?></td>
                    <td><?php echo $Reservation -> NameStatus ?></td>
            
                </tr>
            <?php endforeach ; ?>
          </tbody>
          
      </table>
      <!-- <tr>
          <a class="btn open_checked button-admin">Chọn tất cả</a>
          <a class="btn close_checked mx-2 button-admin">Bỏ chọn tất cả</a>
          <button type="submit" class="btn delete_checked button-admin" onclick="return confirm('Bạn chắc chắn xóa chứ ?');" name="delete_checked">Xóa mục đã chọn</button>
          <a href="?action=addSector" class="btn mx-2 button-admin" data-bs-toggle="modal" data-bs-target="#exampleModal">Thêm mới</a>
      </tr> -->
    </form>
    </div>
</div>

