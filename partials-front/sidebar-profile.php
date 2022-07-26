<?php
if(!isset($_SESSION['user-login'])){
    redirect(BASEURL . "login.php");
}
if(!empty($_SESSION['user-login']) & !empty($_SESSION['email-login'])) {
    $user_name = $_SESSION['user-login'];
    $user_email = $_SESSION['email-login'];
    $sql = "SELECT * FROM customer_tbl WHERE full_name='$user_name' AND email='$user_email'";
    if(isset($conn)){
        $res = mysqli_query($conn,$sql);
        if($res) {
            $count = mysqli_num_rows($res);
            if($count == 1){
                $rows = mysqli_fetch_assoc($res);
                $id = $rows['id'];
                $name = $rows['full_name'];
                $email = $rows['email'];
                $phone_number = $rows['phone_number'];
                $date = convert_date($rows['date']);
                $code_meli = $rows['code_meli'];
                $city = $rows['city'];
                $province = $rows['province'];
                $code_post = $rows['code_post'];
                $home_phone = $rows['home_phone'];
                $address = $rows['address'];

            }
        }
    }
}else{
    redirect(BASEURL.'home.php');
}
?>

<div class="col-lg-3 col-md-3 col-xs-12 pr">
    <div class="sidebar-profile sidebar-navigation">
        <section class="profile-box">
            <header class="profile-box-header-inline">
                <div class="profile-avatar user-avatar profile-img">
                    <img src="assets/images/man.png">
                </div>
            </header>
            <footer class="profile-box-content-footer">
                <span class="profile-box-nameuser"><?= $name ?></span>
                <span class="profile-box-registery-date">عضویت در سایت <?= $date ?></span>
                <span class="profile-box-phone">شماره همراه : <?php if(!empty($phone_number)){echo $phone_number;}else {echo "-";} ?></span>
                <div class="profile-box-tabs">
                    <a href="logout.php" class="profile-box-tab-sign-out"><i
                            class="mdi mdi-logout-variant"></i>خروج از حساب</a>
                </div>
            </footer>
        </section>
        <section class="profile-box">
            <ul class="profile-account-navs">
                <li class="profile-account-nav-item navigation-link-dashboard">
                    <a href="profile.php" class=""><i class="mdi mdi-account-outline"></i>
                        پروفایل
                    </a>
                </li>
                <li class="profile-account-nav-item navigation-link-dashboard">
                    <a href="#" class=""><i class="mdi mdi-cart"></i>
                        همه سفارش ها
                    </a>
                </li>
<!--                <li class="profile-account-nav-item navigation-link-dashboard">-->
<!--                    <a href="#" class=""><i class="mdi mdi-heart"></i>-->
<!--                        لیست علاقه مندی-->
<!--                    </a>-->
<!--                </li>-->
                <li class="profile-account-nav-item navigation-link-dashboard">
                    <a href="profile-address.php" class=""><i class="mdi mdi-map-outline"></i>
                        آدرس ها
                    </a>
                </li>
                <li class="profile-account-nav-item navigation-link-dashboard">
                    <a href="profile-comment.php" class=""><i class="mdi mdi-email-open-outline"></i>
                        نظرات
                    </a>
                </li>

            </ul>
        </section>
