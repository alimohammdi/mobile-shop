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
                                        <div class="middle-container">
                                            <form action="#"  method="post" class="form-checkout">
                                                <div class="form-checkout-row">
                                                    <label for="name">نام تحویل گیرنده <abbr class="required"
                                                            title="ضروری" style="color:red;">*</abbr></span></label>
                                                    <input type="text" name="full_name" id="name" value="<?= $name ?>"
                                                        class="input-name-checkout form-control">
                                                    <label for="phone-number">شماره موبایل <abbr class="required"
                                                            title="ضروری" style="color:red;">*</abbr></label>
                                                    <input type="text"  name="phone-number" value="<?php if(!empty($phone_number)){ echo $phone_number ;}?>"
                                                        class="input-name-checkout form-control text-left">
                                                    <label for="fixed-number">شماره تلفن ثابت <abbr class="required"
                                                            title="ضروری" style="color:red;">*</abbr></label>
                                                    <input type="text" name="fixed-number" value="<?php if(!empty($home_phone)){ echo $home_phone ;}?>"
                                                        class="input-name-checkout form-control text-left">

                                                    <div class="form-checkout-valid-row">
                                                        <label for="province">استان
                                                            <abbr class="required" title="ضروری"
                                                                style="color:red;">*</abbr>
                                                        </label>
                                                            <select name="province_name" id="province"  class="form-control">
                                                               <?php if(!empty($province)){
                                                                   ?>
                                                                   <option ><?= $province ?></option>
                                                                <?php
                                                                   }?>
                                                                <option >استان را انتخاب کنید</option>
                                                                <option>آذربایجان شرقی</option>
                                                                <option>آذربایجان غربی</option>
                                                                <option>اردبیل</option>
                                                                <option>اصفهان</option>
                                                                <option>البرز</option>
                                                                <option>ایلام</option>
                                                                <option>بوشهر</option>
                                                                <option>تهران</option>
                                                                <option>چهارمحال بختیاری</option>
                                                                <option >خراسان جنوبی</option>
                                                                <option >خراسان رضوی</option>
                                                                <option >خراسان شمالی</option>
                                                                <option >خوزستان</option>
                                                                <option >زنجان</option>
                                                                <option >سمنان</option>
                                                                <option >سیستان و بلوچستان</option>
                                                                <option >فارس</option>
                                                                <option >قزوین</option>
                                                                <option >قم</option>
                                                                <option >کردستان</option>
                                                                <option >کرمان</option>
                                                                <option >کرمانشاه</option>
                                                                <option >کهکیلویه و بویراحمد</option>
                                                                <option >گلستان</option>
                                                                <option >گیلان</option>
                                                                <option >لرستان</option>
                                                                <option >مازندران</option>
                                                                <option >مرکزی</option>
                                                                <option >هرمزگان</option>
                                                                <option >همدان</option>
                                                                <option >یزد</option>
                                                            </select>
                                                        </select>


                                                    </div>

                                                    <div class="form-checkout-valid-row">
                                                        <label for="city">شهر
                                                            <abbr class="required" title="ضروری"
                                                                  style="color:red;">*</abbr>
                                                        </label>
                                                        <input type="text" name="city" value="<?php if(!empty($city)){ echo $city ;}?>"
                                                               class="input-name-checkout js-input-bld-num form-control">
                                                    </div>

                                                    <label for="post-code">کد پستی<abbr class="required" title="ضروری"
                                                            style="color:red;">*</abbr></label>
                                                    <input type="text" name="post_code" value="<?php if(!empty($code_post)){ echo $code_post ;}?>"
                                                        class="input-name-checkout form-control"
                                                        placeholder="کد پستی را بدون خط تیره بنویسید">

                                                    <label for="address">آدرس کامل (طبقه / واحد)
                                                        <abbr class="required" title="ضروری"
                                                            style="color:red;">*</abbr></label>
                                                    <textarea rows="5" cols="30" name="address"
                                                        class="textarea-name-checkout form-control"> <?php if(!empty($address)){ echo $address ;}?></textarea>

                                                    <div class="AR-CR">
                                                        <input type="hidden" name="id" value="<?= $id ?>">
                                                        <button type="submit"  name="submit" class="btn-registrar"> ثبت آدرس</button>
                                                        <a href="<?= $_SESSION['path'] = $_SERVER['REQUEST_URI']; ?>" class="cancel-edit-address" data-dismiss="modal"
                                                            aria-label="Close">بازگشت</a>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
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
    $id = $_POST['id'];
    $full_name = $_POST['full_name'];
    $phone_number = $_POST['phone-number'];
    $fixed_number = $_POST['fixed-number'];
    $proviced_name = $_POST['province_name'];
    $city = $_POST['city'];
    $post_code = $_POST['post_code'];
    $address = $_POST['address'];


   $sql_address = "UPDATE customer_tbl SET 
      get_post_name='$full_name',
      phone_number='$phone_number',
      home_phone='$fixed_number',
      code_post='$post_code',
      city='$city',
      province='$proviced_name',
      address='$address' where  id='$id'";
   if(isset($conn)){
       $res_update = mysqli_query($conn, $sql_address);
       if($res_update){
           $_SESSION['update-address'] = "<div class='success'> ادرس با موفقیت ویرایش شد   </div>";
           redirect('profile-address.php');
       }else{
           $_SESSION['update-address'] = "<div class='error'> ویرایش ادرس با مشکل مواجه شد لطفا دوباره تلاش کنید   </div>";
           redirect('profile-address.php');
       }
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