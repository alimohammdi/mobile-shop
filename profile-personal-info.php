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
        $sql = "SELECT full_name,phone_number,code_meli FROM customer_tbl WHERE full_name='$user_name' AND email='$user_email'";
        if(isset($conn)){
            $res = mysqli_query($conn,$sql);
            if($res) {
                $count = mysqli_num_rows($res);
                if($count == 1){
                    $rows = mysqli_fetch_assoc($res);
                    $name = $rows['full_name'];
                    $phone_number = $rows['phone_number'];
                    $code_meli = $rows['code_meli'];

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

                                </div>
                            </div>
                        <div class="col-lg-9 col-md-9 col-xs-12 pl">
                            <div class="profile-content">
                                <div class="profile-stats">
                                    <div class="profile-address">
                                        <div class="middle-container">
                                            <form action="#" method="post" class="form-checkout">
                                                <div class="form-checkout-row">
                                                    <label for="namefirst">نام و نام خانوادگی<abbr class="required" title="ضروری"
                                                            style="color:red;">*</abbr></label>
                                                    <input type="text" id="namefirst" name="full_name" value="<?= $name ?>"
                                                        class="input-namefirst-checkout form-control">

                                                    <label for="namelast">شماره همراه <abbr class="required"
                                                            title="ضروری" style="color:red;">*</abbr></label>
                                                    <input type="text" id="namelast" name="phone_number" value="<?php if(!empty($phone_number)){echo $phone_number;} ?>"
                                                        class="input-namelast-checkout form-control">

                                                    <label for="password">کد ملی </label>
                                                    <input type="text"  name="code_meli" value="<?php if(!empty($code_meli)){echo $code_meli;} ?>"
                                                           class="input-password-checkout form-control">

                                                    <div class="AR-CR">
                                                        <button class="btn-registrar" type="submit" name="submit"> ثبت تغییرات </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <?php
                                        if(isset($_SESSION['edite-profile'])){
                                            echo $_SESSION['edite-profile'];
                                            unset($_SESSION['edite-profile']);
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
    if(isset($_POST['submit'])){
        if(!empty($_POST['full_name'])){
            $full_name = strip_tags ($_POST['full_name']);
            if(!empty($_POST['phone_number']) || !empty($_POST['code_meli'])){
                $phone_number = strip_tags ($_POST['phone_number']);
                $code_meli = strip_tags ($_POST['code_meli']);
                    $sql2 = "update customer_tbl set full_name='$full_name',phone_number='$phone_number',code_meli='$code_meli' WHERE full_name='$user_name' AND email='$user_email'";
                    if(isset($conn)){
                        $res2 = mysqli_query($conn,$sql2);
                        if($res2) {
                            $_SESSION['edite-profile-success'] = "<div class='success'> <h6>اطلاعات با موفقیت ویرایش شد  </h6></div>";
                            redirect(BASEURL."profile.php");
                        }
                    }


            }
        }else{
            $_SESSION['edite-profile'] = "<div class='alarm'> <h6>فیلد نام و نام خانوادگی حتما باید کامل باشد </h6></div>";
            redirect(BASEURL."profile-personal-info.php");
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