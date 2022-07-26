<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>خوش آمدید</title>
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
<?php include('./inc/functions.php');

if(isset($_POST['submit'])){
    if(!empty($_POST['password-account'])) {
        $pass = md5 (strip_tags($_POST['password-account']));
        if(!empty($_SESSION['user-login']) & !empty($_SESSION['email-login'])){
            $user_name = $_SESSION['user-login'];
            $user_email = $_SESSION['email-login'];
            $date = date("Y-m-d");
            $sqli = "UPDATE customer_tbl  SET password='$pass',date='$date' WHERE full_name='$user_name' AND email='$user_email'";
            if(isset($conn)){
                $res =mysqli_query($conn,$sqli);
                if($res){
                    $ip = getIp();
                    setcookie('ipUserEcommerce', $ip, time() + 1206900);
                    if(isset($_SESSION['massage-pay'])) {
                        unset($_SESSION['massage-pay']);
                        redirect(BASEURL . 'cart.php');
                    }else{
                        $_SESSION['login-success'] = " <span class='success'>  به شهروند موبایل خوش آمدید     </span>";
                        redirect (BASEURL.'profile.php');
                    }
                }
            }
        }
    }else{
        $_SESSION['register-account'] = "<div class='alarm'> <h6>*لطفا برای اکانت خود رمزی انتخاب کنید*</h6></div>";
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
                            <div class="Login-to-account mt-4">
                                <div class="account-box-content">
                                    <h4 class="mb-2">  <?php if(!empty($_SESSION['user-login'])){echo $_SESSION['user-login']; } ?> عزیز </h4><br>
                                    <h4 class="mb-2">به شهروند موبایل خوش آمدید</h4>
                                        <div class="user-account-welcome">
                                            <img src="assets/images/man.png">
                                        </div>
                                        <?php
                                        if(isset($_SESSION['register-account'])){
                                            echo $_SESSION['register-account'];
                                            unset($_SESSION['register-account']);
                                        }
                                        ?>
                                        <div class="made-account">
                                            <h2>حساب کاربری شما در شهروند موبایل  ساخته شد</h2>
                                            <h2>لطفا برای اکانت خود رمز انتخاب کنید</h2>
                                            <form action="#" method="post" class="form-account text-right">
                                                <div class="form-account-title">
                                                    <h3><label for="password">  رمز عبور</label></h3>
                                                    <input type="password" class="password-input" name="password-account" placeholder="لطفا رمز مورد نظر خود را وارد نمایید">
                                                </div>
                                                <div class="account-footer">
                                                    <div class="account-footer">
                                                        <div class="form-row-account">
                                                            <button class="btn btn-primary btn-login"  type="submit" name="submit">تکمیل حساب کاربری</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                            <p>اکنون می‌توانید به صفحه‌ای که در آن بودید بازگردید و یا با تکمیل اطلاعات حساب کاربری
                                            خود به کلیه امکانات و
                                            سرویس‌های شهروند موبایل دسترسی داشته باشید</p>
                                        </div>

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