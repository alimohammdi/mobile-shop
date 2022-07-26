<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>پروفایل</title>
    <!-- font---------------------------------------->
    <link rel="stylesheet" href="assets/css/vendor/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/vendor/materialdesignicons.css">
    <!-- plugin-------------------------------------->
    <link rel="stylesheet" href="assets/css/vendor/bootstrap.css">
    <link rel="stylesheet" href="assets/css/vendor/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/vendor/noUISlider.min.css">
    <link rel="stylesheet" href="assets/css/vendor/nice-select.css">
    <!-- main-style---------------------------------->
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
</head>

<body>
<!-- header-------------------------------->
<?php include('./partials-front/header.php')?>
<!-- header-------------------------------->
<?php
if(!empty($_SESSION['user-login']) & !empty($_SESSION['email-login'])) {
    $user_name = $_SESSION['user-login'];
    $user_email = $_SESSION['email-login'];
    $sql = "SELECT password FROM customer_tbl WHERE full_name='$user_name' AND email='$user_email'";
    if(isset($conn)){
        $res = mysqli_query($conn,$sql);
        if($res) {
            $count = mysqli_num_rows($res);
            if($count == 1){
                $rows = mysqli_fetch_assoc($res);
                $password = $rows['password'];
            }
        }
    }
}else{
    redirect(BASEURL.'home.php');
}


?>
<!-- profile------------------------------->
<div class="container-main">
    <div class="d-block">
        <section class="profile-home">
            <div class="col-lg">
                <div class="post-item-profile order-1 d-block">
                    <?php include('./partials-front/sidebar-profile.php') ?>
                    <section class="profile-box">
                        <ul class="profile-account-navs">
                            <li class="profile-account-nav-item navigation-link-dashboard">
                                <a href="#" class="active"><i class="mdi mdi-account-outline"></i>
                                    پروفایل
                                </a>
                            </li>
                            <li class="profile-account-nav-item navigation-link-dashboard">
                                <a href="#" class=""><i class="mdi mdi-cart"></i>
                                    همه سفارش ها
                                </a>
                            </li>
                            <li class="profile-account-nav-item navigation-link-dashboard">
                                <a href="#" class=""><i class="mdi mdi-heart"></i>
                                    لیست علاقه مندی
                                </a>
                            </li>
                            <li class="profile-account-nav-item navigation-link-dashboard">
                                <a href="#" class=""><i class="mdi mdi-map-outline"></i>
                                    آدرس ها
                                </a>
                            </li>
                            <li class="profile-account-nav-item navigation-link-dashboard">
                                <a href="#" class=""><i class="mdi mdi-email-open-outline"></i>
                                    نظرات
                                </a>
                            </li>
                            <li class="profile-account-nav-item navigation-link-dashboard">
                                <a href="#" class=""><i class="mdi mdi-tooltip-text-outline"></i>
                                    اطلاعات حساب
                                </a>
                            </li>
                        </ul>
                    </section>
                </div>
            </div>
            <div class="col-lg-9 col-md-9 col-xs-12 pl">
                <div class="profile-content">
                    <div class="profile-stats">
                        <div class="profile-address">
                            <div class="middle-container">
                                <form action="#" method="post" class="form-checkout" >
                                    <div class="form-checkout-row">
                                        <label for="password">رمز عبور قبلی <abbr class="required"
                                                                                  title="ضروری" style="color:red;">*</abbr></label>
                                        <input type="text" id="password" name="last-pass" value="<?php if(isset($_SESSION['last-pass'])){echo $_SESSION['last-pass'] ;} ?>"
                                               class="input-password-checkout form-control">

                                        <label for="password">رمز عبور جدید <abbr class="required"
                                                                                  title="ضروری" style="color:red;">*</abbr></label>
                                        <input type="password" id="password" name="new-pass"
                                               class="input-password-checkout form-control">

                                        <label for="password">تکرار رمز عبور جدید <abbr class="required"
                                                                                        title="ضروری" style="color:red;">*</abbr></label>
                                        <input type="password" id="password" name="repeat-pass"
                                               class="input-password-checkout form-control">

                                        <div class="AR-CR">
                                            <button class="btn-registrar" type="submit" name="submit"> تغییر رمز ورود </button>

                                        </div>
                                    </div>
                                </form>
                            </div>
                            <?php
                            if(isset($_SESSION['change-pass'])){
                                echo $_SESSION['change-pass'];
                                unset($_SESSION['change-pass']);
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>
</section>
</div>
</div>
<!-- profile------------------------------->
<?php

if (isset($_POST['submit'])) {
    if (!empty($_POST['last-pass']) & !empty($_POST['last-pass']) & !empty($_POST['last-pass'])) {
        $last_pass = strip_tags ($_POST['last-pass']);
        $hash_pass = md5($last_pass);
        $new_pass = strip_tags (md5($_POST['new-pass']));
        $repeat_pass = strip_tags (md5($_POST['repeat-pass']));
        if($hash_pass == $password){
            if($new_pass == $repeat_pass){
                $sql_pass = "update customer_tbl set password='$new_pass' where  full_name='$user_name' AND email='$user_email'";
                $res_pass = mysqli_query($conn, $sql_pass);
                if($res_pass){
                    $_SESSION['change-pass-success'] = "<div class='success'> <h6>رمز عبور با موفقیت تغییر کرد </h6></div>";
                    redirect(BASEURL . "profile.php");
                }
            }else{
                $_SESSION['change-pass'] = "<div class='alarm'> <h6>رمز جدید با تکرار ان برابر نیست  </h6></div>";
                $_SESSION['last-pass'] = $last_pass;
                redirect(BASEURL . "change-pass-profile.php");
            }

        }else{
            $_SESSION['change-pass'] = "<div class='alarm'> <h6>رمز وارد شده شما معتبر نیست  </h6></div>";
            $_SESSION['last-pass'] = $last_pass;
            redirect(BASEURL . "change-pass-profile.php");
        }
    }
    else {
        $_SESSION['change-pass'] = "<div class='alarm'> <h6>لطفا تمامی فیلد ها را کامل کنید </h6></div>";
        redirect(BASEURL . "change-pass-profile.php");
    }
}

?>
<!-- footer-------------------------------->
<?php include('./partials-front/footer.php') ?>
<!-- footer------------------------------------------->
<!-- scroll_Progress------------------------->
<div class="progress-wrap">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
    </svg>
</div>
<!-- scroll_Progress------------------------->
<!-- Page Loader----------------------------->

<!-- Page Loader----------------------------->

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
<script src="assets/js/vendor/jquery.nice-select.min.js"></script>
<!-- main js---------------------------------------------------->
<script src="assets/js/main.js"></script>

</html>
