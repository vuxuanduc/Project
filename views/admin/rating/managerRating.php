<div class="box">
    <?php
        require './views/admin/navAdmin.php' ;
    ?>
    <div>
        <table class="table">
            <thead class="table-success">
                <tr>
                    <th>Quản lí đánh giá</th>
                </tr>
            </thead>
        </table>
        <form action="" method="post">
            <table class="table table-hover">
                <thead class="table-success">
                    <tr>
                        <th>Tên khách sạn</th>
                        <th>Số lượt đánh giá</th>
                        <th>Điểm trung bình</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>

                <tbody> 
                    <?php foreach($listHotels as $Hotels => $Hotel) : ?>
                        <tr>
                            <td><?php echo $Hotel -> NameHotel ?></td>
                            <td><?php echo countRatingHotelID($Hotel -> HotelID) -> CountRating ?></td>
                            <td><?php echo round(avgRating($Hotel -> HotelID) -> AvgRating , 1) ?></td>
                            <td>
                                <a style="font-size:12px;" class="btn btn-primary" href="?action=RatingHotel&&RatingDetailsHotel=<?php echo $Hotel -> HotelID ?>">Chi tiết</a>
                            </td>
                        </tr>
                    <?php endforeach ; ?>
                </tbody>
                
            </table>
        </form>
    </div>
</div>

