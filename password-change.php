<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تغییر رمز عبور</title>
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
<?php
include('./inc/functions.php');

if(isset($_SESSION['user-login']) & isset($_SESSION['email-login'])){
    $email_account =$_SESSION['email-login'];
    $name_account =$_SESSION['user-login'];
//    search email in database
    $sql_search_email = "SELECT * from customer_tbl WHERE email='$email_account' and full_name='$name_account'";
    if(isset($conn)){
        $res = mysqli_query($conn,$sql_search_email);
        $count = mysqli_num_rows($res);
        if($count == 1){

        }else{
            $_SESSION['change-pass'] = "<div class='alarm'> <span>ایمیلی با این نام وجود ندارد</span></div>";
            redirect(BASEURL."password-forgot.php");
        }

    }
//    $confirm_code = rand(10000,99999);
    $confirm_code = "12345";
}else{
    $_SESSION['change-pass'] = "<div class='alarm'> <span>ورود شما با خطا مواجه شد لطفا دوباره تلاش کنید</span></div>";
    redirect(BASEURL."password-forgot.php");
}
?>
<!-- change pass php code-->
<?php

if (isset($_POST['submit'])){
    if (isset($_POST['new-password']) & isset($_POST['confirm-password'])){
        $new_password = strip_tags (md5($_POST['new-password']));
        $confirm_password = strip_tags (md5($_POST['confirm-password']));
        if($new_password == $confirm_password){
            $sql_pass = "update customer_tbl set password='$new_password' where  full_name='$name_account' AND email='$email_account'";
            $res_pass = mysqli_query($conn, $sql_pass);
            if($res_pass){
                redirect(BASEURL . "profile.php");
            }
        }else{
            $_SESSION['change-pass'] = "<div class='alarm'> <span>رمز جدید با تکرار ان برابر نیست  </span></div>";
            redirect(BASEURL . "password-change.php");}

    }else{
        $_SESSION['change-pass'] = "<div class='alarm'> <h6>لطفا تمامی فیلد ها را کامل کنید </h6></div>";
        redirect(BASEURL . "password-change.php");}
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
                                    <h4 class="mb-2">تغییر رمز عبور</h4>
                                    <?php
                                    if(isset($_SESSION['change-pass'])){
                                        echo $_SESSION['change-pass'];
                                        unset($_SESSION['change-pass']);
                                    }
                                    ?>
                                    <form action="#" method="post" class="form-account text-right">
                                        <div class="form-account-title">
                                            <label for="password">رمز عبور جدید</label>
                                            <input type="password" name="new-password" class="password-input" name="password-account">
                                        </div>
                                        <div class="form-account-title">
                                            <label for="password">تکرار رمز عبور جدید</label>
                                            <input type="password" name="confirm-password" class="password-input" name="password-account">
                                        </div>
                                        <div class="form-row-account">
                                            <button type="submit" name="submit" class="btn btn-primary btn-login">تغییر رمز عبور</button>
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