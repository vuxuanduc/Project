const row = document.querySelector('.row-responsive') ;
const search_room = document.querySelector('.search-room') ;
window.addEventListener('resize' , () => {
    if(window.innerWidth < 1200) {
        row.style.display = "none" ;
        search_room.style.display = "block" ;
    }else {
        row.style.display = "flex" ;
        search_room.style.display = "none" ;
    }
}) ;

// Validate form đăng nhập ;

const email_login = document.getElementById('email_login') ;
const email_login_err = document.getElementById('email_login_err') ;
const password_login = document.getElementById('password_login') ;
const password_login_err = document.getElementById('password_login_err') ;
function validateLogin() {
    let check = true ;
    let regexEmail = /^\w([_\.]?\w+)*@\w{2,}(\.\w{2,30})+$/;
    if(email_login.value.trim() == "") {
        email_login_err.innerText = "Vui lòng nhập email" ;
        check = false ;
    }
    else if(regexEmail.test(email_login.value) == false) {
        email_login_err.innerText = "Email không đúng định dạng" ;
        check = false ;
    }
    else {
        email_login_err.innerText = "" ;
    }

    let regaxPass = /^\w{6,}$/ ;
    if(password_login.value.trim() == "") {
        password_login_err.innerText = "Vui lòng nhập mật khẩu" ;
        check = false ;
    }
    else if(regaxPass.test(password_login.value) == false) {
        password_login_err.innerText = "Mật khẩu không đúng định dạng" ;
        check = false ;
    }
    else {
        password_login_err.innerText = "" ;
    }
    return check ;
}

const email_signup = document.getElementById('email_signup') ;
const email_signup_err = document.getElementById('email_signup_err') ;
const password_signup = document.getElementById('password_signup') ;
const password_signup_err = document.getElementById('password_signup_err') ;
function validateSignup() {
    let check = true ;
    let regexEmail = /^\w([_\.]?\w+)*@\w{2,}(\.\w{2,30})+$/;
    if(email_signup.value.trim() == "") {
        email_signup_err.innerText = "Vui lòng nhập email" ;
        check = false ;
    }
    else if(regexEmail.test(email_signup.value) == false) {
        email_signup_err.innerText = "Email không đúng định dạng" ;
        check = false ;
    }
    else {
        email_signup_err.innerText = "" ;
    }

    let regaxPass = /^\w{6,}$/ ;
    if(password_signup.value.trim() == "") {
        password_signup_err.innerText = "Vui lòng nhập mật khẩu" ;
        check = false ;
    }
    else if(regaxPass.test(password_signup.value) == false) {
        password_signup_err.innerText = "Mật khẩu không đúng định dạng" ;
        check = false ;
    }
    else {
        password_signup_err.innerText = "" ;
    }
    return check ;
}

const email_forgot = document.getElementById('email_forgot') ;
const email_forgot_err = document.getElementById('email_forgot_err') ;

function validateForgot() {
    let check = true ;
    let regexEmail = /^\w([_\.]?\w+)*@\w{2,}(\.\w{2,30})+$/;
    if(email_forgot.value.trim() == "") {
        email_forgot_err.innerText = "Vui lòng nhập email" ;
        check = false ;
    }
    else if(regexEmail.test(email_forgot.value) == false) {
        email_forgot_err.innerText = "Email không đúng định dạng" ;
        check = false ;
    }
    else {
        email_forgot_err.innerText = "" ;
    }
    return check ;
}

// form thêm khách sạn ;
const nameHotel = document.getElementById('nameHotel') ,
    nameHotel_err = document.getElementById('nameHotel_err') ,
    image = document.getElementById('image') ,
    image_err = document.getElementById('image_err') ,
    province = document.getElementById('province') ,
    province_err = document.getElementById('province_err') ,
    district = document.getElementById('district') ,
    district_err = document.getElementById('district_err') ,
    ward = document.getElementById('ward') , 
    ward_err = document.getElementById('ward_err') ,
    apartmentNumber = document.getElementById('apartmentNumber') ,
    apartmentNumber_err = document.getElementById('apartmentNumber_err') ,
    phone = document.getElementById('phone') ,
    phone_err = document.getElementById('phone_err') ,
    email = document.getElementById('email') ,
    email_err = document.getElementById('email_err') ;

function validateAddHotel() {
    let check = true ;
    if(nameHotel.value.trim() == "") {
        nameHotel_err.innerText = "Vui lòng nhập tên KS" ;
        check = false ;
    }else {
        nameHotel_err.innerText = "" ;
    }

    if(image.value.trim() == "") {
        image_err.innerText = "Vui lòng thêm ảnh" ;
        check = false ;
    }else {
        image_err.innerText = "" ;
    }

    if(province.value.trim() == "") {
        province_err.innerText = "Vui lòng chọn tỉnh/TP" ;
        check = false ;
    }else {
        province_err.innerText = "" ;
    }

    if(district.value.trim() == "") {
        district_err.innerText = "Vui lòng chọn quận/huyện" ;
        check = false ;
    }else {
        district_err.innerText = "" ;
    }

    if(ward.value.trim() == "") {
        ward_err.innerText = "Vui lòng chọn phường/xã" ;
        check = false ;
    }else {
        ward_err.innerText = "" ;
    }

    if(apartmentNumber.value.trim() == "") {
        apartmentNumber_err.innerText = "Hãy nhập chi tiết địa điểm" ;
        check = false ;
    }else {
        apartmentNumber_err.innerText = "" ;
    }

    if(phone.value.trim() == "") {
        phone_err.innerText = "Vui lòng nhập SĐT" ;
        check = false ;
    }else {
        phone_err.innerText = "" ;
    }

    if(email.value.trim() == "") {
        email_err.innerText = "Vui lòng nhập địa chỉ email" ;
        check = false ;
    }else {
        email_err.innerText = "" ;
    }

    return check ;
}


// validate form thêm loại phòng ;

const RoomTypeName = document.getElementById('RoomTypeName') ,
    RoomTypeName_err = document.getElementById('RoomTypeName_err') ,
    Description = document.getElementById('Description') ,
    Description_err = document.getElementById('Description_err') ;

function validateRoomType() {
    let check = true ;
    if(RoomTypeName.value.trim() == "") {
        RoomTypeName_err.innerText = "Hãy nhập loại phòng " ;
        check = false ;
    }else {
        RoomTypeName_err.innerText = "" ;
    }

    if(Description.value.trim() == "") {
        Description_err.innerText = "Hãy nhập mô tả " ;
        check = false ;
    }else {
        Description_err.innerText = "" ;
    }

    return check ;
}






// Checklist trang admin ;

const open_check = document.querySelector('.open_checked') ,
close_check = document.querySelector('.close_checked') ,
checkList = document.querySelectorAll('#checkList') ;
    
open_check.addEventListener('click' , () => {
    checkList.forEach(check => {
        check.checked = true ;
    })
}) ;
close_check.addEventListener('click' , () => {
    checkList.forEach(check => {
        check.checked = false ;
    })
}) ;

