<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ورود به شهروند موبایل</title>
    <!-- font---------------------------------------->
    <link rel="stylesheet" href="assets/css/vendor/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/vendor/materialdesignicons.css">
    <!-- plugin-------------------------------------->
    <link rel="stylesheet" href="assets/css/vendor/bootstrap.css">
    <link rel="stylesheet" href="assets/css/vendor/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/vendor/noUISlider.min.css">
    <!-- main-style---------------------------------->
    <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>
<!----------------------------------------------->
<?php
include ('./inc/functions.php');

if(isset($_POST['submit'])){
    if(!empty($_POST['email-account']) & !empty($_POST['password-account'])){
        $email_account = strip_tags ($_POST['email-account']);
        $password_account = md5 (strip_tags($_POST['password-account']));
        $sql = "SELECT * FROM customer_tbl WHERE email='$email_account'";
        if(isset($conn)){
            $res = mysqli_query($conn,$sql);
            if($res){
                $count = mysqli_num_rows($res);
                if($count == '1'){
                    $rows = mysqli_fetch_assoc($res);
                    $pass = $rows['password'];
                    $user_name = $rows['full_name'];
                    if($pass == $password_account){
                        $_SESSION['user-login'] = $user_name ;
                        $_SESSION['email-login'] = $email_account ;
                       if(isset($_SESSION['massage-pay'])){
                           unset($_SESSION['massage-pay']);
                           redirect(BASEURL . "cart.php");
                       }else{
                           $_SESSION['login-success'] = " <span class='success'>  به شهروند موبایل خوش آمدید     </span>";
                           if(!empty($_SESSION['path'])){
                               redirect($_SESSION['path'] );
                           }
                           redirect ('home.php');
                       }
                    }else{
                        $_SESSION['register-account'] = "<div class='alarm'> <h6>پسوورد وارد شده معتبر نیست </h6></div>";
                        redirect(BASEURL."login.php");
                    }
                }else{
                    $_SESSION['register-account'] = "<div class='alarm'> <h6>ایمیل یافت نشد لطفا دوباره بررسی کنید</h6></div>";
                    redirect(BASEURL."login.php");
                }
            }
        }
    }else{
        $_SESSION['register-account'] = "<div class='alarm'> <h6>لطفا تمامی فیلد ها را پر کنید</h6></div>";
        redirect(BASEURL."login.php");
    }
}
?>
<!-- login----------------------------------->
<div class="container">
    <div class="row">
        <div class="col-lg">
            <section class="page-account-box">
                <div class="col-lg-6 col-md-6 col-xs-12 mx-auto">
                    <div class="ds-userlogin">
                        <div class="account-box">
                            <div class="account-box-headline">
                                <a href="login.php" class="login-ds active">
                                    <span class="title">ورود</span>
                                    <span class="sub-title">به شهروند موبایل</span>
                                </a>
                                <a href="register.php" class="register-ds">
                                    <span class="title">ثبت نام</span>
                                    <span class="sub-title">در شهروند موبایل</span>
                                </a>
                            </div>
                            <div class="Login-to-account mt-4">
                                <div class="account-box-content">
                                    <h4>ورود به حساب کاربری</h4><br>
                                    <?php
                                    if(isset($_SESSION['register-account'])){
                                        echo $_SESSION['register-account'];
                                        unset($_SESSION['register-account']);
                                    }

                                    if (isset($_SESSION['change-pass-success'])) {
                                        echo $_SESSION['change-pass-success'];
                                        unset($_SESSION['change-pass-success']);
                                    }
                                    if(isset($_SESSION['massage-pay'])){
                                        echo $_SESSION['massage-pay'];
                                    }

                                    ?>
                                    <form action="#" method="post"  class="form-account text-right">
                                        <div class="form-account-title">
                                            <label for="email-phone">ایمیل </label>
                                            <input type="email" class="number-email-input" name="email-account"
                                            value="<?php if(isset($email_account)){echo $email_account ;} ?>">
                                        </div>
                                        <div class="form-account-title">
                                            <label for="password">رمز عبور</label>
                                            <a href="register.php" class="account-link-password">ثبت نام نکرده ام </a>

                                            <input type="password" class="password-input" name="password-account">
                                        </div>
                                        <div class="form-auth-row">
                                            <label for="#" class="ui-checkbox mt-1">
                                                <input type="checkbox" value="1" name="login" id="remember">
                                                <span class="ui-checkbox-check"></span>
                                            </label>
<!--                                            <label for="remember" class="remember-me mr-0">مرا به خاطر بسپار</label>-->
                                        </div>
                                        <a href="password-forgot.php" class="account-link-password">رمز خود را فراموش کرده ام</a>
                                        <div class="form-row-account">
                                            <button class="btn btn-primary btn-login" name="submit">ورود به شهروند موبایل</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<!-- login----------------------------------->
                   
<!-- scroll_Progress------------------------->
<div class="progress-wrap">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"/>
    </svg>
</div>
<!-- scroll_Progress------------------------->

</body>
<!-- file js---------------------------------------------------->
<script src="assets/js/vendor/jquery-3.2.1.min.js"></script>
<script src="assets/js/vendor/bootstrap.js"></script>
<!-- plugin----------------------------------------------------->
<script src="assets/js/vendor/owl.carousel.min.js"></script>
<script src="assets/js/vendor/jquery.countdown.js"></script>
<script src="assets/js/vendor/ResizeSensor.min.js"></script>
<script src="assets/js/vendor/theia-sticky-sidebar.min.js"></script>
<script src="assets/js/vendor/wNumb.js"></script>
<script src="assets/js/vendor/nouislider.min.js"></script>
<!-- main js---------------------------------------------------->
<script src="assets/js/main.js"></script>
</html>