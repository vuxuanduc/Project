<div id="forgot">
    <form action="" method="post" onsubmit="return validateForgot();">
        <h4 class="text-center my-2">QUÊN MẬT KHẨU</h4>
        <div class="form-group">
            <label for="">Email</label> <span style="color:red;" id="email_forgot_err"></span>
            <span style="color:red;">
                <?php
                    if(isset($error['forgot']['email'])) {
                        echo $error['forgot']['email'] ;
                    }
                ?>
            </span>
            <input type="text" id="email_forgot" name="email" class="form-control my-2" value="<?php echo isset($_POST['email']) ? $_POST['email'] : "" ; ?>">
        </div>
        <div class="form-group">
            <input type="submit" value="Gửi" name="btn-forgot" class="form-control btn btn-primary my-2">
        </div>
        <div class="form-group">
            <a href="?action=signup">Đăng ký</a>
            <a href="?action=login">Đăng nhập</a>
        </div>
    </form>
</div>

<script>
    

function validateForgot() {
    const email_forgot = document.getElementById('email_forgot') ;
    const email_forgot_err = document.getElementById('email_forgot_err') ;
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

</script>