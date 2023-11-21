<?php $listHotels = getHotels() ; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title>Du lịch muôn nơi</title> -->
    <title><?php echo isset($_GET['action']) ? $_GET['action'] : "" ?></title>
    <link rel="shortcut icon" href="./image/2-removebg-preview.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>

<body>
    <div class="container">
        <header class="header">
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid">
                    <a class="navbar-brand" href="?action=home"><img class="logo" src="./image/2-removebg-preview.png" alt="Lỗi tải ảnh"></a>
                    <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon text-white"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link text-white" aria-current="page" href="?action=home">Trang chủ</a>
                            </li>
                            
                            <li class="nav-item dropdown">
                                <a style="cursor:pointer;" class="nav-link dropdown-toggle text-white" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Khách sạn
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <a style="font-size:15px;" class="dropdown-item" href="?action=hotel">Tất cả khách sạn</a>
                                    <a style="font-size:15px;" class="dropdown-item" href="">Top khách sạn</a>
                                    <a style="font-size:15px;" class="dropdown-item" href="">Khách sạn có khuyến mãi</a>
                                </div>
                            </li>

                            <li class="nav-item dropdown search-room">
                                <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Tìm phòng
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <form class="">
                                        <input type="text" placeholder="Khách sạn"> <br>
                                        <input type="submit" value="Tìm phòng">
                                    </form>
                                </div>
                            </li>
                        </ul>
                        <?php
                            if(isset($_SESSION['login'])) {
                        ?>
                        <div class="nav-item dropdown profile">
                            <a class="nav-link dropdown-toggle text-white" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php echo "Xin chào " .$_SESSION['email'] ; ?>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="?action=profile">Thông tin tài khoản</a>
                                <a class="dropdown-item" href="?action=historyBookingRoom">Danh sách đặt phòng</a>
                                <?php
                                    if($_SESSION['role'] == 1) {
                                ?>
                                    <a class="dropdown-item" href="?action=managerHotels">Quản lí</a>
                                <?php
                                    }
                                ?>
                                <a class="dropdown-item" href="?action=logout">Đăng xuất</a>
                            </div>
                        </div>
                        <?php
                            }else {
                        ?>
                        <div class="nav-item dropdown profile">
                            <a class="nav-link text-white" href="?action=login">Đăng nhập</a>
                        </div>
                        <?php
                            }
                        ?>
                    </div>
                </div>
            </nav>
            
            
        </header>
        