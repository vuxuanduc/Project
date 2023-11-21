<!-- Trang thông tin cá nhân -->
<style>
    .box-profile {
        margin-top : 10px ;
        display: grid ;
        grid-template-columns: 1fr 2.5fr;
        gap : 20px ;
    }
    @media (width < 575px) {
        .box-profile {
            display: grid ;
            grid-template-columns: 1fr;
            gap : 20px ;
        }
    }
    .nav-profile {
        padding: 0 ;
        list-style : none;
        margin-top : 2px ;
    }
    .nav-profile li {
        padding: 5px 5px ;
    }
    .nav-profile li a {
        text-decoration: none;
        color : black ;
        
    }
    .nav-profile li:hover {
        background-color : #4790cd ;
    }
    .nav-profile li a:hover {
        color : white ;
    }
    
    .card-title {
        
        padding: 5px 10px;
    }
    .card-title-1 {
        background-color : #4790cd;
        color : white ;
    }
    
    
</style>

<div class="box-profile px-1">
    <div class="card-1">
        <h5 class="card-title card-title-1">Lịch sử đặt phòng</h5>
        <ul class="nav-profile">
            <li><a href="?action=profile">Thông tin cá nhân</a></li>
            <li><a href="?action=historyBookingRoom">Lịch sử đặt phòng</a></li>
            <li><a href="?action=logout">Đăng xuất</a></li>
        </ul>
    </div>
    <div class="">
        
    </div>
</div>

<script>
    // Validate form thay đổi mật khẩu ;
    const old_password = document.getElementById('old_password') ;
    const old_password_err = document.getElementById('old_password_err') ;
    const new_password = document.getElementById('new_password') ;
    const new_password_err = document.getElementById('new_password_err') ;
    function validateChangePassword() {
        let checkPass = true ;
        reGaxPass = /^\w{6,}$/ ;
        if(old_password.value.trim() == "") {
            old_password_err.innerText = "Hãy nhập mật khẩu cũ" ;
            checkPass = false ;
        }
        else if(reGaxPass.test(old_password.value) == false) {
            old_password_err.innerText = "Mật khẩu không đúng định dạng" ;
            checkPass = false ;
        }else {
            old_password_err.innerText = "" ;
        }

        if(new_password.value.trim() == "") {
            new_password_err.innerText = "Hãy nhập mật khẩu mới" ;
            checkPass = false ;
        }
        else if(reGaxPass.test(new_password.value) == false) {
            new_password_err.innerText = "Mật khẩu không đúng định dạng" ;
            checkPass = false ;
        }else {
            new_password_err.innerText = "" ;
        }
        return checkPass ;
    }


    // Validate form thay đổi thông tin cá nhân ;
    const profile_phone = document.getElementById('profile_phone') ;
    const profile_phone_err = document.getElementById('profile_phone_err') ;
    const profile_fullname = document.getElementById('profile_fullname') ;
    const profile_fullname_err = document.getElementById('profile_fullname_err') ;
    function validateProfile() {
        let checkProfile = true ;
        if(profile_phone.value.trim() == "") {
            profile_phone_err.innerText = "Hãy nhập số điện thoại" ;
            checkProfile = false ;
        }else {
            profile_phone_err.innerText = "" ;
        }

        if(profile_fullname.value.trim() == "") {
            profile_fullname_err.innerText = "Hãy nhập họ và tên" ;
            checkProfile = false ;
        }else {
            profile_fullname_err.innerText = "" ;
        }

        return checkProfile ;
    }
</script>