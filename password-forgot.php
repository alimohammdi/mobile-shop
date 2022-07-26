<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>یاد آوری رمز عبور</title>
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
<?php include('./inc/functions.php') ?>
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
                                    <h4 class="mb-2">فراموشی گذرواژه</h4>
                                    <?php
                                    if(isset($_SESSION['change-pass'])){
                                        echo $_SESSION['change-pass'];
                                        unset($_SESSION['change-pass']);
                                    }
                                    ?>
                                    <p>گذرواژه خود را فراموش کرده اید؟ ایمیل خود را وارد کنید.</p>
                                    <form action="verify-email.php" class="form-account text-right">
                                        <div class="form-account-title">
                                            <label for="email-phone">ایمیل خود را وارد نمایید </label>
                                            <input type="text" class="number-email-input" id="email-phone" name="email-account">
                                        </div>
                                        <div class="form-row-account">
                                            <button class="btn btn-primary btn-login">بازگردانی رمز عبور</button>
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