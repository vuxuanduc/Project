<?php
    session_start() ;
    require './model/connect.php' ;
    require './model/user.php' ;
    require './model/hotel.php' ;
    require './model/roomType.php' ;
    require './model/room.php' ;
    require './model/status.php' ;
    require './views/header.php' ;
    
    if(isset($_GET['action'])) {
        $action = $_GET['action'] ;
        switch($action) {
            // Đăng nhập ;
            case 'login' : {
                if(isset($_POST['btn-login'])) {
                    $user = login($_POST['email']) ;
                    $error = [] ;
                    if(!empty($user)) {
                        if($user -> Password == $_POST['password']) {
                            $_SESSION['login'] = true ;
                            $_SESSION['userID'] = $user -> UserID ;
                            $_SESSION['email'] = $_POST['email'] ;
                            $_SESSION['role'] = $user -> RoleID ;
                            echo '<script type="text/javascript">window.location.href = "?action=home";</script>';

                        }else {
                            $error['login']['password'] = "Mật khẩu không đúng" ;
                        }
                    }else {
                        $error['login']['email'] = "Email không tồn tại" ;
                    }
                }
                require './views/login/login.php' ;
                break ;
            }

            //Đăng xuất ;
            case 'logout': {
                logout();
            }
            case 'signup' : {
                if(isset($_POST['btn-signup'])) {
                    $error = [] ;
                    $checkEmail = login($_POST['email']) ;
                    if(!empty($checkEmail)) {
                        $error['signup']['email'] = "Email đã tồn tại" ;
                    }else {
                        signup($_POST['password'] , $_POST['email'] , 2) ;
                    }
                }
                require './views/login/signup.php' ;
                break ;
            }

            // Gửi mail khi quên mật khẩu ;
            case 'forgot' : {
                if(isset($_POST['btn-forgot'])) {
                    $error = [] ;
                    $emailForgot = login($_POST['email']) ;
                    if(empty($emailForgot)) {
                        $error['forgot']['email'] = "Email không tồn tại" ;
                    }else {
                        require("service/PHPMailer-master/src/PHPMailer.php");
                        require("service/PHPMailer-master/src/SMTP.php");
                        require("service/PHPMailer-master/src/Exception.php");

                        $mail = new PHPMailer\PHPMailer\PHPMailer();
                        $mail->IsSMTP(); 
                        $mail->SMTPDebug = 0; 
                        $mail->SMTPAuth = true; 
                        $mail->SMTPSecure = 'ssl'; 
                        $mail->Host = "smtp.gmail.com";
                        $mail->Port = 465; 
                        $mail->IsHTML(true);
                        $mail->Username = "vuxuanduc54@gmail.com";
                        $mail->Password = "bbtretzcpbzkfqiv";
                        $mail->SetFrom("vuxuanduc54@gmail.com");
                        $mail->Subject = "Forgot Password";
                        $mail->Body = "Mat khau cua ban la : " .$emailForgot -> Password;
                        $email = $emailForgot -> Email ;
                        $mail->AddAddress("$email");
                        if (!$mail->Send()) {
                            echo "Mailer Error: " . $mail->ErrorInfo;
                        } else {
                            header("Location:?action=notification") ;
                        }                            
                    }
                }
                require './views/login/forgot.php' ;
                break ;
            }
            // Đưa ra dòng thông báo nếu người dùng nhập đúng email trong phần quên mật khẩu ;
            case 'notification' : {
                require './views/login/notification.php' ;
                break ;
            }

            // Trang chủ ;
            case 'home' : {
                require './views/home.php' ;
                break ;
            }

            // Trang khách sạn ;
            case 'hotel' : {
                require './views/hotel.php' ;
                break ;
            }

            // Trang chi tiết khách sạn ;
            case 'hotelDetails' : {
                // Lấy thông tin khách sạn theo ID ;
                if(isset($_GET['HotelID'])) {
                    $Hotel = getHotelsID($_GET['HotelID']) ;
                    $listRoomHotelID = getRoomHotelID($_GET['HotelID']) ;
                }
                
                require './views/hotelDetails.php' ;
                break ;
            }

            // Trang chi tiết phòng
            case 'roomDetails' : {
                if(isset($_GET['RoomID'])) {
                    $RoomID = getRoomID($_GET['RoomID']) ;
                    $listImageRoom = explode(',' , $RoomID -> Image) ;

                    // Kiểm tra xem phòng khách hàng đã chọn có còn trống không ;
                    if(isset($_POST['check-room'])) {
                        $check_in_date = $_POST['check-in-date'] ;
                        $check_out_date = $_POST['check-out-date'] ;
                        $RoomNumber = $_POST['room-number'] ;
                        $result = checkRoom($_GET['RoomID'] , $RoomNumber , $check_in_date , $check_out_date) ;
                        if(empty($result)) {
                            echo "<script>alert('Không còn phòng trong thời gian bạn mong muốn')</script>" ;
                        }
                    }

                    // Đặt phòng ;
                    if(isset($_POST['book-room'])) {
                        // Lấy số lượng phòng hiện tại ;
                        $AvailableRooms = $RoomID -> AvailableRooms - $_POST['room-number-booking'] ;
                        // Cập nhật số lượng phòng sau khi khách đặt ;
                        updateNumberRoom($_GET['RoomID'] , $AvailableRooms) ;


                        // Lấy thời gian hiện tại ;
                        $ReservationDate = date('Y-m-d H:i:s') ;
                        // Cập nhật phòng ;
                        bookingRoom($_SESSION['userID'] , $_GET['RoomID'] , $ReservationDate , $_POST['check-in-date-booking'] , 
                        $_POST['check-out-date-booking'] , $_POST['room-number-booking'] , $_POST['price-room-booking'] , $_POST['amount-booking'] , 1) ;

                        
                    }


                    require './views/roomDetails.php' ;
                }

                
                break ;
            }

            // Phần thông tin cá nhân và cập nhật thông tin cá nhân ;
            case 'profile' : {
                if(isset($_SESSION['login'])) {
                    // Đổi mật khẩu trong trang thông tin tài khoản ;
                    if(isset($_POST['btn_change_password'])) {
                        $error = [] ;
                        // Lấy mật khẩu theo email ;
                        $old_password = login($_SESSION['email']) -> Password ;
                        // So sánh mật khẩu cũ trong database với mật khẩu cũ người dùng nhập ở form ;
                        if($old_password != $_POST['old_password']) {
                            $error['old_password'] = "Mật khẩu cũ không đúng" ;
                        }else {
                            changePassword($_POST['new_password'] , $_SESSION['userID']) ;
                        }
                    }


                    // Cập nhật thêm thông tin tài khoản trong trang thông tin tài khoản ;
                    if(isset($_POST['btn_add_profile'])) {
                        changeProfile($_POST['fullname'] , $_POST['phone'] , $_SESSION['userID']) ;
                    }



                    require './views/profile.php' ;
                }
                break; 
            }

            // Lịch sửa đặt phòng ;
            case 'historyBookingRoom' : {
                require './views/historyBookingRoom.php' ;
                break ;
            }





            // Phần quản trị

            // Quản lý khách sạn ;
            case 'managerHotels' : {
                // Kiểm tra xem tài khoản có đúng là admin không ;
                if(isset($_SESSION['login']) && isset($_SESSION['role']) && $_SESSION['role'] == 1) {
                    // Lấy danh sách khách sạn ;
                    $listHotels = getHotels() ;
                
                // Thêm khách sạn ;
                    if(isset($_POST['btn-add-hotel'])) {
                        foreach($_FILES['image']['tmp_name'] as $key => $value) {
                            $image = './image_hotel/' .basename($_FILES['image']['name'][$key]) ;
                            $file = $_FILES['image']['tmp_name'][$key] ;
                            $err = $_FILES['image']['error'][$key] ;
                            if(empty($err) && move_uploaded_file($file , $image)) {
                                $imageUpload[] = $image ;
                            }
                        }
                        if(!empty($imageUpload)) {
                            $imagePaths = implode(',' , $imageUpload) ;
                            $address = $_POST['apartmentNumber'] .',' .$_POST['ward'] .',' .$_POST['district'] .',' .$_POST['province'] ;
                            createHotel($_POST['name'] , $imagePaths , $address , $_POST['phone'] , $_POST['email']) ;
                            
                        }
                    }

                    // Xóa từng khách sạn ;
                    if(isset($_GET['DeleteHotelID'])) {
                        $stringImage = getHotelsID($_GET['DeleteHotelID']) ;
                        $imagePaths = explode(',' , $stringImage -> Image) ;
                        foreach($imagePaths as $images => $image) {
                            if(file_exists($image)) {
                                unlink($image) ;
                            }
                        }
                        deleteHotel($_GET['DeleteHotelID']) ;
                    }

                    // Xóa nhiều khách sạn ;
                    if(isset($_POST['delete_checked'])) {
                        $listIDHotel = $_POST['check'] ;
                        foreach($listIDHotel as $HotelIDs => $HotelID) {
                            $stringImage = getHotelsID($HotelID) ;
                            $imagePaths = explode(',' , $stringImage -> Image) ;
                            foreach($imagePaths as $images => $image) {
                                if(file_exists($image)) {
                                    unlink($image) ;
                                }
                            }
                            deleteHotel($HotelID) ;
                        }
                        
                    }
                    require './views/admin/hotel/managerHotels.php' ;
                }

                break ;
            }

            // Cập nhật khách sạn ;
            case 'updateHotel' : {
                if(isset($_SESSION['login']) && isset($_SESSION['role']) && $_SESSION['role'] == 1) {
                    $hotel = getHotelsID($_GET['updateHotelID']) ;
                    if(isset($_POST['btn-update-hotel'])) {
                        if($_FILES['image']['size'] >= 0) {
                            foreach($_FILES['image']['tmp_name'] as $key => $value) {
                                $image = './image_hotel/' .basename($_FILES['image']['name'][$key]) ;
                                $file = $_FILES['image']['tmp_name'][$key] ;
                                $err = $_FILES['image']['error'][$key] ;
                                if(empty($err) && move_uploaded_file($file , $image)) {
                                    $imageUpload[] = $image ;
                                }
                            }
                            if(!empty($imageUpload)) {
                                $imagePaths = implode(',' , $imageUpload) ;
                                $address = empty($_POST['province']) ? $hotel -> Address : $_POST['apartmentNumber'] .',' .$_POST['ward'] .',' .$_POST['district'] .',' .$_POST['province'] ;
                                updateHotel($_POST['name'] , $imagePaths , $address , $_POST['phone'] , $_POST['email'] , $_POST['HotelID']) ;
                                foreach(explode(',' , $hotel -> Image) as $oldImage) {
                                    $isUsed = false;
                                    foreach($imageUpload as $image) {
                                        if($oldImage === $image) {
                                            $isUsed = true ;
                                            break ;
                                        }
                                    }
                                    if(!$isUsed && isset($oldImage)) {
                                        unlink($oldImage) ;
                                    }
                                }
                                
                            }else {
                                $address = empty($_POST['province']) ? $hotel -> Address : $_POST['apartmentNumber'] .',' .$_POST['ward'] .',' .$_POST['district'] .',' .$_POST['province'] ;
                                updateHotelNoImage($_POST['name'] , $address , $_POST['phone'] , $_POST['email'] , $_POST['HotelID']) ;
                            }
                        }
                    }
                    require './views/admin/hotel/updateHotel.php' ;
                }
                break ;
            }

            // Quản lý loại phòng ;
            case 'managerTypeRoom' : {
                if(isset($_SESSION['login']) && isset($_SESSION['role']) && $_SESSION['role'] == 1) {
                    // Lấy danh sách loại phòng ;
                    $listRoomType = getRoomType() ;
                    // Thêm loại phòng ;
                    if(isset($_POST['btn-add-roomType'])) {
                        createRoomType($_POST['RoomTypeName'] , $_POST['Description']) ;
                    }
                    // Xóa từng loại phòng ;
                    if(isset($_GET['DeleteTypeRoomID'])) {
                        deleteRoomType($_GET['DeleteTypeRoomID']) ;
                    }
                    // Xóa nhiều loại phòng cùng lúc ;
                    if(isset($_POST['delete_checked'])) {
                        $listRoomTypeDelete = $_POST['check'];
                        foreach($listRoomTypeDelete as $lists => $list) {
                            deleteRoomType($list) ;
                        }
                    }
                    require './views/admin/roomtype/roomTypes.php' ;
                }
                break ;
            }

            // Cập nhật loại phòng ;
            case 'updateRoomType' : {
                if(isset($_SESSION['login']) && isset($_SESSION['role']) && $_SESSION['role'] == 1) {
                    $RoomTypeID = getRoomTypeID($_GET['UpdateRoomTypeID']) ;
                    if(isset($_POST['btn-update-roomType'])) {
                        updateRoomType($_POST['RoomTypeName'] , $_POST['Description'] , $_POST['RoomTypeID']) ;
                    }
                    require './views/admin/roomtype/updateRoomType.php' ;
                }
                break ;
            }

            // Quản lý phòng ;
            case 'managerRoom' : {
                if(isset($_SESSION['login']) && isset($_SESSION['role']) && $_SESSION['role'] == 1) {
                    // Lấy danh sách phòng ;
                    $listRooms = getRoom() ;
                    // Lấy danh sách loại phòng đưa vào select box ;
                    $listRoomType = getRoomType() ;
                    // Thêm phòng ;
                    if(isset($_POST['btn-add-room'])) {
                        foreach($_FILES['image']['tmp_name'] as $key => $value) {
                            $image = './image_room/' .basename($_FILES['image']['name'][$key]) ;
                            $file = $_FILES['image']['tmp_name'][$key] ;
                            $err = $_FILES['image']['error'][$key] ;
                            if(empty($err) && move_uploaded_file($file , $image)) {
                                $imageUpload[] = $image ;
                            }
                        }
                        if(!empty($imageUpload)) {
                            $imagePaths = implode(',' , $imageUpload) ;
                            createRoom($_POST['HotelID'] , $_POST['RoomTypeID'] , $_POST['RoomName'] , $_POST['MaximumNumber'] , $_POST['Description'] , $imagePaths , $_POST['AvailableRooms'] , $_POST['Price']) ;
                            
                        }
                    }

                    // Xóa từng phòng phòng ;
                    if(isset($_GET['DeleteRoomID'])) {
                        $stringImage = getRoomID($_GET['DeleteRoomID']) ;
                        $imagePaths = explode(',' , $stringImage -> Image) ;
                        foreach($imagePaths as $images => $image) {
                            if(file_exists($image)) {
                                unlink($image) ;
                            }
                        }
                        deleteRoom($_GET['DeleteRoomID']) ;
                    }

                    // Xóa đồng thời nhiều phòng ;
                    if(isset($_POST['delete_checked'])) {
                        $listIDRoom = $_POST['RoomID'] ;
                        foreach($listIDRoom as $RoomIDs => $RoomID) {
                            $stringImage = getRoomID($RoomID) ;
                            $imagePaths = explode(',' , $stringImage -> Image) ;
                            foreach($imagePaths as $images => $image) {
                                if(file_exists($image)) {
                                    unlink($image) ;
                                }
                            }
                            deleteRoom($RoomID) ;
                        }
                        
                    }

                    require './views/admin/room/rooms.php' ;
                    
                }
                break ;
            }

            case 'updateRoom' : {
                if(isset($_SESSION['login']) && isset($_SESSION['role']) && $_SESSION['role'] == 1) {
                    // Lấy thông tin phòng theo ID ;
                    $RoomID = getRoomID($_GET['UpdateRoomID']) ;
                    // Lấy danh sách loại phòng ;
                    $listRoomType = getRoomType() ;
                    if(isset($_POST['btn-update-room'])) {
                        foreach($_FILES['image']['tmp_name'] as $key => $value) {
                            $image = './image_room/' .basename($_FILES['image']['name'][$key]) ;
                            $file = $_FILES['image']['tmp_name'][$key] ;
                            $err = $_FILES['image']['error'][$key] ;
                            if(empty($err) && move_uploaded_file($file , $image)) {
                                $imageUpload[] = $image ;
                            }
                        }
                        if(!empty($imageUpload)) {
                            $imagePaths = implode(',' , $imageUpload) ;
                            updateRoom($_POST['RoomID'] , $_POST['HotelID'] , $_POST['RoomTypeID'] , $_POST['RoomName'] , $_POST['MaximumNumber'] , $_POST['Description'] , $imagePaths , $_POST['AvailableRooms'] , $_POST['Price']) ;
                            foreach(explode(',' , $RoomID -> Image) as $oldImage) {
                                $isUsed = false ;
                                foreach($imageUpload as $newImage) {
                                    if($oldImage === $newImage) {
                                        $isUsed = true ;
                                        break ;
                                    }
                                } 
                                if(!$isUsed && isset($oldImage)) {
                                    unlink($oldImage) ;
                                }
                            }
                        }else {
                            updateRoomNoImage($_POST['RoomID'] , $_POST['HotelID'] , $_POST['RoomTypeID'] , $_POST['RoomName'] , $_POST['MaximumNumber'] , $_POST['Description'] , $_POST['AvailableRooms'] , $_POST['Price']) ;
                        }
                    }
                    require './views/admin/room/updateRoom.php' ;
                }
                break ;
            }

            // Quản lí người dùng ;
            case 'managerUsers' : {
                if(isset($_SESSION['login']) && isset($_SESSION['role']) && $_SESSION['role'] == 1) {
                    // Lấy tất cả user ;
                    $listUsers = getUsers() ;
                    // Thêm mới user ;
                    if(isset($_POST['btn-add-user'])) {
                        // Kiểm tra xem email người dùng nhập đã tồn tại trong hệ thống hay chưa ;
                        $error = [] ;
                        if(!empty(login($_POST['email']))) {
                            $error['admin_add_user']['email'] = "Email đã tồn tại" ;
                        }else {
                            createUser($_POST['password'] , $_POST['email'] , 2) ;
                        }

                    }
                    // Xóa từng user ;
                    if(isset($_GET['DeleteUserID'])) {
                        deleteUser($_GET['DeleteUserID']) ;
                    }
                    // Xóa nhiều người dùng ;
                    if(isset($_POST['delete_checked'])) {
                        $listUsersDelete = $_POST['check'] ;
                        foreach($listUsersDelete as $UserDelete => $UserID) {
                            deleteUser($UserID) ;
                        }
                    }
                    require './views/admin/user/managerUsers.php' ;
                }
                break ;
            }

            // Update người dùng trong trang admin ;
            case 'updateUser' : {
                if(isset($_SESSION['login']) && isset($_SESSION['role']) && $_SESSION['role'] == 1) {
                    $UserID = getUsersID($_GET['UpdateUserID']) ;
                    if(isset($_POST['btn-update-user'])) {
                        // Kiểm tra email xem nó đã tồn tại hay chưa;
                        $error = [] ;
                        $checkEmail = login($_POST['email']) ;
                        if(!empty($checkEmail)) {
                            $error['edit_user']['email'] = "Email đã tồn tại , hãy nhập email khác" ;
                        }else {
                            updateUser($_POST['email'] , $_POST['password'] , $_POST['UserID']) ;
                        }
                    }
                    require './views/admin/user/updateUser.php' ;
                }
                break ;
            }

            // Quản lý trạng thái trong trang admin ;
            case 'managerStatus' : {
                $listStatus = getStatus() ;
                require './views/admin/status/managerStatus.php' ;
                break ;
            }
            default : {
                require './views/home.php' ;
                break ;
            }
        }
    }else {
        require './views/home.php' ;
    }
    require './views/footer.php' ;

?>