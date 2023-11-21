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
    .star {
        font-size: 24px;
        cursor: pointer;
    }

    .star:hover,
    .star.active {
        color: gold;
    }
    .btn-rating {
        background-color : #86B817 ;
        color : white ;
    }
    .text-center {
        margin-top : -20px ;
    }
    .text-center span {
        font-size : 35px ;
    }
    #content {
        margin-top : -20px ;
    }
    .title-h6 {
        margin-top : 0 ;
    }
</style>
<div class="box-details">
    <div>
        <div style="border:1px dotted gray;margin-top:5px;">
            <div style="width:100%;background-color:#86B817;">
                <h6 class="text-center py-2 text-white title-h6">TÌM KHÁCH SẠN</h6>
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
                            <a href="?action=roomDetails&&RoomID=<?php echo $Room -> RoomID ?>"  style="background-color:#86B817;padding:3px 5px;border-radius:3px;color:white;text-decoration:none;">Xem phòng</a>
                        </td>
                    </tr>
                <?php endforeach ; ?>
            </tbody>
        </table>
        <div class="rating my-4">
            <h5>ĐÁNH GIÁ CỦA KHÁCH HÀNG</h5>
            <hr>
            <div class="d-flex">
                <div>
                    <span style="font-weight:500;font-size:18px;">Vũ Xuân Đức</span> <br>
                    <span style="font-size:14px ;">21/11/2023</span>
                </div>
                <div class="mx-4">
                    <span style="font-weight:400;font-size:18px;">Chất lượng phục vụ khách sạn rất tốt , tôi thục sự rất hài lòng.</span> <br>
                </div>
                <div style="margin-top:-7px;">
                    <!-- <span class="star" data-rating="1">&#9734;</span>
                    <span class="star" data-rating="2">&#9734;</span>
                    <span class="star" data-rating="3">&#9734;</span>
                    <span class="star" data-rating="4">&#9734;</span>
                    <span class="star" data-rating="5">&#9734;</span> -->
                </div>
            </div>
        </div>
        <a class="btn btn-rating" data-bs-toggle="modal" data-bs-target="#exampleModal">Viết đánh giá</a>

        <!-- Modal đánh giá ; -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="" method="post">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Đánh giá khách sạn</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p class="text-center">
                                <span class="star" data-rating="1">&#9734;</span>
                                <span class="star" data-rating="2">&#9734;</span>
                                <span class="star" data-rating="3">&#9734;</span>
                                <span class="star" data-rating="4">&#9734;</span>
                                <span class="star" data-rating="5">&#9734;</span>
                            </p>
                            <br>
                            <input type="hidden" name="rating" id="input">
                            <textarea name="content" id="content" placeholder="Viết đánh giá..." class="form-control"></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                            <button type="submit" class="btn btn-primary">Gửi đánh giá</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const stars = document.querySelectorAll(".star");
      const input = document.querySelector('#input') ;

      stars.forEach((star) => {
        star.addEventListener("click", (e) => {
          const clickedStar = e.target;
          const rating = clickedStar.getAttribute("data-rating");
          input.value = rating ;

          stars.forEach((s) => {
            s.classList.remove("active");
          });

          for (let i = 0; i < rating; i++) {
            stars[i].classList.add("active");
          }
        });
      });
</script>