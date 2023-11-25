<style>
    #chart {
        margin-top : 15px ;
        height : 250px ;
    }
</style>
    <div class="box">
    <?php
        require './views/admin/navAdmin.php' ;
    ?>
    <div>
        <h3 class="text-center">Thống kê lượt đặt phòng</h3>
        <div>
            <form action="" method="post" class="d-flex" style="margin-top:15px;">
                <select name="time" id="time" class="form-control">
                    <option value="">Chọn thời gian thống kê</option>
                    <option value="day">Thống kê theo ngày</option>
                    <option value="week">Thống kê theo tuần</option>
                    <option value="month">Thống kê theo tháng</option>
                    <option value="year">Thống kê theo năm</option>
                </select>
                <input style="width : 15%; margin-left:10px;color:white;background-color:#86B817;" type="submit" value="Thực hiện" name="btn-statistical" class="form-control">
            </form>
        </div>
        <div id="chart"></div>
        
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            new Morris.Bar({
                element: 'chart',
                data: [
                    <?php foreach($StatisticsOfBookings as $Bookings => $Booking) : ?>
                        { name: '<?php echo $Booking -> NameHotel ?>', value: <?php echo $Booking -> total_rooms ?> },
                    <?php endforeach ; ?>
                ],
                xkey: 'name',  
                ykeys: ['value'],
                labels: ['Lượt đặt']
            });
        });
    </script>

    <a href="?action=RevenueStatistics" class="btn" style="border:1px solid black; margin-top:15px;">Thống kê doanh thu</a>

    </div>
</div>
