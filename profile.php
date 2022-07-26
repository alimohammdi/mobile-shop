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
   <?php include('./partials-front/header.php');
   if(!isset($_SESSION['user-login'])){
       redirect(BASEURL . "login.php");
   } ?>
    <!-- header-------------------------------->

    <!-- profile------------------------------->
    <div class="container-main">
        <div class="d-block">
            <section class="profile-home">
                <div class="col-lg">
                    <div class="post-item-profile order-1 d-block">
                        <?php include('./partials-front/sidebar-profile.php')?>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-9 col-xs-12 pl">
                            <div class="profile-content">
                                <?php
                                if(isset($_SESSION['login-success'])){
                                    echo $_SESSION['login-success'];
                                    unset ($_SESSION['login-success']);
                                }
                                ?>
                                <div class="profile-stats">
                                    <table class="table table-profile">
                                        <tbody>
                                            <tr>
                                                <td class="w-50">
                                                    <div class="title">نام و نام خانوادگی:</div>
                                                    <div class="value"><?= $name ?></div>
                                                </td>
                                                <td>
                                                    <div class="title">پست الکترونیک :</div>
                                                    <div class="value"><?= $email ?></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="title">شماره تلفن همراه:</div>
                                                    <div class="value"><?php if(!empty($phone_number)){echo $phone_number;}else {echo "شماره همراه وارد نشده";} ?></div>
                                                </td>
                                                <td>
                                                    <div class="title">تاریخ عضویت:</div>
                                                    <div class="value"><?= $date ?></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="title"> کد ملی :</div>
                                                    <div class="value"><?php if(!empty($code_meli)){echo $code_meli;}else {echo "کد ملی وارد نشده";} ?></div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="profile">
                                        <ul class="mb-0">
                                            <li class="profile-item">
                                                <div class="title">نام و نام خانوادگی:</div>
                                                <div class="value"><?= $name ?></div>
                                            </li>
                                            <li class="profile-item">
                                                <div class="title">پست الکترونیک :</div>
                                                <div class="value"><?= $email ?></div>
                                            </li>
                                            <li class="profile-item">
                                                <div class="title">شماره تلفن همراه:</div>
                                                <div class="value"><?php if(!empty($phone_number)){echo $phone_number;}else {echo "-";} ?></div>
                                            </li>
                                            <li class="profile-item">
                                                <div class="title">تاریخ عضویت:</div>
                                                <div class="value"><?= $date ?></div>
                                            </li>
                                            <li class="profile-item">
                                                <div class="title"> کد ملی :</div>
                                                <div class="value"><?php if(!empty($code_meli)){echo $code_meli;}else {echo "کد ملی وارد نشده";} ?></div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="profile-edit-action">
                                        <a href="profile-personal-info.php" class="link-spoiler-edit btn btn-secondary">ویرایش اطلاعات</a>
                                        <a href="change-pass-profile.php" class="link-spoiler-edit btn btn-secondary">تغییر رمز ورود</a>
                                    </div>

                                </div>
                                <?php
                                if(isset($_SESSION['edite-profile-success'])){
                                    echo $_SESSION['edite-profile-success'];
                                    unset($_SESSION['edite-profile-success']);
                                }
                                if(isset($_SESSION['change-pass-success'] )){
                                    echo $_SESSION['change-pass-success'] ;
                                    unset($_SESSION['change-pass-success'] );
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <!-- profile------------------------------->

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
<!--    <div class="P-loader">-->
<!--        <div class="P-loader-content">-->
<!--            <div class="logo-loader">-->
<!--                <img src="assets/images/logo.png" alt="logo">-->
<!--            </div>-->
<!--            <div class="pic-loader text-center">-->
<!--                <img src="assets/images/three-dots.svg" width="50" alt="">-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
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