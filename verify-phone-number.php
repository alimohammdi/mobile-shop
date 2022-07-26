<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ارسال کد</title>
    <!-- font---------------------------------------->
    <link rel="stylesheet" href="assets/css/vendor/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/vendor/materialdesignicons.css">
    <!-- plugin-------------------------------------->
    <link rel="stylesheet" href="assets/css/vendor/bootstrap.css">
    <link rel="stylesheet" href="assets/css/vendor/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/vendor/noUISlider.min.css">
    <!-- main-style---------------------------------->
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
</head>
<body>
<?php
include('./inc/functions.php');

if(!empty($_GET['email-account']) & !empty($_GET['name-account'])){
    $email_account =strip_tags ($_GET['email-account']);
    $name_account = strip_tags($_GET['name-account']);
//    search email in database
    $sql_search_email = "SELECT * from customer_tbl WHERE email='$email_account'";
    if(isset($conn)){
        $res = mysqli_query($conn,$sql_search_email);
        $count = mysqli_num_rows($res);
        if($count != 0){
            $_SESSION['email-is-exist'] = "<div class='alarm'> <h6>این ایمیل قبلا در شهروند موبایل ثبت شده <br>لطفا از قسمت ورود به سایت وارد شوید</h6></div>";
            redirect(BASEURL . 'register.php');
        }

    }
    $confirm_code = rand(10000,99999);
    $to = $email_account;
    $subject = 'ایمیل تایید ثبت نام';
    $message = $confirm_code.'کد تایید ایمیل شما : ';
    $headers = 'From: info@shahrvandmobile.com';
    $email_send = send_email($to,$subject,$message,$headers);

}else{
    $_SESSION['register-account'] = "<div class='alarm'> <h6>*لطفا تمامی فیلد ها را پر کنید*</h6></div>";
    redirect(BASEURL."register.php");
}
?>
<!-- send validation code ti email-->
<?php
if(isset($_POST['submit'])){
    if(!empty($_POST['num1']) & !empty($_POST['num2']) & !empty($_POST['num3']) & !empty($_POST['num4']) & !empty($_POST['num5'])){
        $num1 = strip_tags($_POST['num1']);
        $num2 = strip_tags($_POST['num2']);
        $num3 = strip_tags($_POST['num3']);
        $num4 = strip_tags($_POST['num4']);
        $num5 = strip_tags($_POST['num5']);
        $confirm_number = paste_number($num1,$num2,$num3,$num4,$num5);
        if($confirm_number == $confirm_code){
            $confirmed = '1';
            $cust_ip = getIp();
            $sql = "insert into customer_tbl set full_name='$name_account',email='$email_account',confirm_code='$confirm_code' ,confirmed='$confirmed',cust_ip='$cust_ip'";
            if(isset($conn)){
                $res = mysqli_query($conn,$sql);
                if($res){
                    $_SESSION['user-login'] = $name_account;
                    $_SESSION['email-login'] = $email_account;
                    redirect(BASEURL ."welcome.php");
                }
            }
        }else{
            $_SESSION['register-account'] = "<div class='alarm'> <h6>*کد وارد شده صحیح نیست لطفا دوباره بررسی کنید *</h6></div>";
        }
    }else{
        $_SESSION['register-account'] = "<div class='alarm'> <h6>*لطفا تمامی فیلد ها را پر کنید*</h6></div>";
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
                                    <form action="#" method="post" >
                                        <div class="message-light">
                                            <div class="massege-light-send">
                                                برای ایمیل <?=  $email_account ?>  کد تایید ارسال گردید

                                                <div class="form-edit-number">
                                                    <a href="register.php" class="edit-number-link">ویرایش ایمیل</a>
                                                </div>
                                            </div>
                                            <?php
                                            if(isset($_SESSION['register-account'])){
                                                echo $_SESSION['register-account'];
                                                unset($_SESSION['register-account']);
                                            }
                                            ?>
                                            <div class="account-box-verify-content">
                                                <div class="form-account">
                                                    <div class="form-account-title">کد فعال سازی ارسال شده را وارد کنید</div>
                                                    <div class="form-account-row">
                                                        <div class="lines-number-input">
                                                            <input type="text"  name="num1"  class="line-number-account" maxlength="1">
                                                            <input type="text"  name="num2"  class="line-number-account" maxlength="1">
                                                            <input type="text"  name="num3"  class="line-number-account" maxlength="1">
                                                            <input type="text"  name="num4"  class="line-number-account" maxlength="1">
                                                            <input type="text"  name="num5"  class="line-number-account" maxlength="1">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-account-row">
                                                <div class="receive-verify-code">
                                                    <p id="countdown-verify-end"><span class="day">0</span><span class="hour">0</span><span>: 2</span><span>58</span>
                                                        <i class="fa fa-clock-o"></i>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="account-footer">
                                                <div class="account-footer">
                                                    <div class="form-row-account">
                                                        <button class="btn btn-primary btn-login" type="submit" name="submit">ثبت‌نام در شهروند موبایل</button>
                                                    </div>
                                                </div>
                                            </div>
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
<script src="assets/js/vendor/countdown.min.js"></script>
<script src="assets/js/vendor/owl.carousel.min.js"></script>
<!-- main js---------------------------------------------------->
<script src="assets/js/main.js"></script>
</html>