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
   <?php include('./partials-front/header.php') ?>
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
                                <div class="profile-stats">
                                    <div class="profile-address">
                                        <div class="box-header">
                                            <span class="box-title">نشانی </span>
                                        </div>
                                        <div class="profile-address-item">
                                            <div class="profile-address-item-top">
                                                <div class="profile-address-item-title"><?= $name ?></div>
                                            </div>

                                            <div class="profile-address-content">
                                                <ul class="profile-address-info">
                                                    <li>
                                                        <div class="profile-address-info-item location">
                                                            <i class="mdi mdi-map-outline"></i>
                                                            <?= $province .' , '.$city ?>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="profile-address-info-item location">
                                                            <i class="mdi mdi-email-outline"></i>
                                                            <?= $email ?>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="profile-address-info-item location">
                                                            <i class="mdi mdi-phone"></i>
                                                            <?= $phone_number ?>
                                                        </div>
                                                    </li>
                                                    <?php
                                                    if(!empty($home_phone)){
                                                        ?>
                                                        <li>
                                                            <div class="profile-address-info-item location">
                                                                <i class="mdi mdi-call-split"></i>
                                                                <?= $home_phone ?>
                                                            </div>
                                                        </li>
                                                    <?php
                                                    }
                                                    ?>
                                                    <?php
                                                    if(!empty($address)){
                                                        ?>
                                                        <li>
                                                            <div class="profile-address-info-item location">
                                                                <i class="mdi mdi-map-check"></i>
                                                                <?= $address ?>
                                                            </div>
                                                        </li>
                                                    <?php
                                                    }
                                                    ?>
                                                    <li class="location-link">
                                                        <a href="profile-address-edite.php" class="edit-address-link">ویرایش آدرس</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                if(isset($_SESSION['update-address'])) {
                                    echo $_SESSION['update-address'];
                                    unset ($_SESSION['update-address']);
                                }
                                ?><br>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <!-- profile------------------------------->

    <!-- footer-------------------------------->

    <!-- footer------------------------------------------->
    <!-- scroll_Progress------------------------->
    <div class="progress-wrap">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>
    <!-- scroll_Progress------------------------->
    <?php include('./partials-front/footer.php') ?>
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