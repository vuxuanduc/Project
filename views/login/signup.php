<div id="signup">
    <form action="" method="post" onsubmit="return validateSignup();">
        <h4 class="text-center my-2">ĐĂNG KÝ</h4>
        <div class="form-group">
            <label for="">Email</label> <span style="color:red;" id="email_signup_err"></span>
            <span style="color : red;">
                <?php
                    if(isset($error['signup']['email'])) {
                        echo $error['signup']['email'] ;
                    }
                ?>
            </span>
            <input type="text" id="email_signup" name="email" class="form-control my-2" value="<?php echo isset($_POST['email']) ? $_POST['email'] : "" ; ?>">
        </div>
        <div class="form-group">
            <label for="">Mật khẩu</label> <span style="color:red;" id="password_signup_err"></span>
            <input type="password" id="password_signup" name="password" class="form-control my-2" value="<?php echo isset($_POST['password']) ? $_POST['password'] : "" ; ?>">
        </div>
        <div class="form-group">
            <input type="submit" value="Đăng ký" name="btn-signup" class="form-control btn btn-primary my-2">
        </div>
        <div class="form-group">
            <a href="?action=login">Đăng nhập</a>
            <a href="?action=forgot">Quên mật khẩu</a>
        </div>
    </form>
</div>