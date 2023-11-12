<div class="box">
    <?php
        require './views/admin/navAdmin.php' ;
    ?>
    <div>
        <table class="table">
            <thead class="table-success">
                <tr>
                    <th>Quản lí người dùng</th>
                </tr>
            </thead>
        </table>
        <form action="" method="post">
            <table class="table">
                <thead class="table-success">
                    <tr>
                        <th>Chọn</th>
                        <th>Mã người dùng</th>
                        <th>Họ & tên</th>
                        <th>Email</th>
                        <th>Số điện thoại</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>

                <tbody> 
                    <?php foreach($listUsers as $Users => $User) : ?>
                        <tr>
                            <td><input type="checkbox" value="<?php echo $User -> UserID ?>" name="check[]" id="checkList"></td>
                            <td><?php echo $User -> UserID ?></td>
                            <td><?php echo $User -> FullName ?></td>
                            <td><?php echo $User -> Email ?></td>
                            <td><?php echo $User -> Phone ?></td>
                            <td>
                                <a href="?action=managerUsers&&DeleteUserID=<?php echo $User -> UserID ?>" onclick="return confirm('Bạn chắc chắn xóa chứ ?');" class="btn btn-danger">Xóa</a>
                                <a href="?action=updateUser&&UpdateUserID=<?php echo $User -> UserID ?>" class="btn btn-primary my-1">Sửa</a>
                            </td>
                        </tr>
                    <?php endforeach ; ?>
                </tbody>
                
            </table>
            <tr>
                <a class="btn open_checked button-admin">Chọn tất cả</a>
                <a class="btn close_checked mx-2 button-admin">Bỏ chọn tất cả</a>
                <button type="submit" class="btn delete_checked button-admin" onclick="return confirm('Bạn chắc chắn xóa chứ ?');" name="delete_checked">Xóa mục đã chọn</button>
                <a class="btn mx-2 button-admin" data-bs-toggle="modal" data-bs-target="#exampleModal">Thêm mới</a>
            </tr>
        </form>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Thêm loại phòng</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="" method="post" enctype="multipart/form-data" onsubmit="return">
        <div class="modal-body">
          
          
    
        </div>
          
        <div class="modal-footer">
          <input type="reset" class="btn btn-secondary" value="Nhập lại">
          <button type="submit" class="btn" name="btn-add-room" style="background-color:#86B817;color:white;">Thêm mới</button>
        </div>
      </form>
    </div>
  </div>
</div>


