<div class="box">
    <?php
        require './views/admin/navAdmin.php' ;
    ?>
    <div>
        <table class="table">
            <thead class="table-success">
                <tr>
                    <th>Quản lí đánh giá theo khách sạn</th>
                </tr>
            </thead>
        </table>
        <form action="" method="post">
            <table class="table table-hover">
                <thead class="table-success">
                    <tr>
                        <th>Chọn</th>
                        <th>Mã đánh giá</th>
                        <th>Tài khoản đánh giá</th>
                        <th>Nội dung</th>
                        <th>Số điểm</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>

                <tbody> 
                    <?php foreach($listRatingHotelID as $Ratings => $Rating) : ?>
                        <tr>
                            <td><input type="checkbox" name="check[]" id="checkList" value="<?php echo $Rating -> ReviewID ?>"></td>
                            <td><?php echo $Rating -> ReviewID ?></td>
                            <td><?php echo $Rating -> Email ?></td>
                            <td><?php echo $Rating -> Comment ?></td>
                            <td><?php echo $Rating -> Rating ?></td>
                            <td>
                                <a href="?action=RatingHotel&&RatingDetailsHotel=<?php echo $_GET['RatingDetailsHotel'] ; ?>&&deleteRating=<?php echo $Rating -> ReviewID ?>" onclick="return confirm('Bạn chắc chắn xóa chứ ?')" class="btn btn-danger">Xóa</a>
                            </td>
                        </tr>
                    <?php endforeach ; ?>
                </tbody>
                
            </table>
            <tr>
                <a class="btn open_checked button-admin">Chọn tất cả</a>
                <a class="btn close_checked mx-2 button-admin">Bỏ chọn tất cả</a>
                <button type="submit" class="btn delete_checked button-admin" onclick="return confirm('Bạn chắc chắn xóa chứ ?');" name="delete_checked_rating">Xóa mục đã chọn</button>
                <a class="btn mx-2 button-admin" href="?action=managerRating">Trở về</a>
            </tr>
        </form>
    </div>
</div>
