<!DOCTYPE html>
<html lang="fa" dir="rtl">
<?php
include('inc/config.php');
if(isset($_GET['id']) & !empty($_GET['id']) & isset($_GET['category'])){
    $id = $_GET['id'];
    $category = $_GET['category'];
    if($category == "گوشی هوشمند"){
//        $tbl_name = "products_tbl";

        $sql = "SELECT * FROM  products_tbl WHERE id='$id'";
        if(isset($conn)){
            $res = mysqli_query($conn,$sql);
            if($res){
                $count = mysqli_num_rows($res);
                if($count == 1){
                    $rows = mysqli_fetch_assoc($res);

                    $fa_title   = $rows['fa_title'];
                    $en_title   = $rows['en_title'];
                    $content   = $rows['content'];
                    $category = $rows['category'];
                    $property = $rows['property'];
                    $camera = $rows['camera'];
                    $camera1 = $rows['camera1'];
                    $camera2 = $rows['camera2'];
                    $network   = $rows['network'];
                    $brand   = $rows['brand'];
                    $systm   = $rows['systm'];
                    $garanty   = $rows['garanty'];
                    $ram   = $rows['ram'];
                    $rom   = $rows['rom'];
                    $count   = $rows['available'];
                    $price   = $rows['price'];
                    $screen   = $rows['screen'];
                    $processor   = $rows['processor'];
                    $or_ram   = $rows['or_rom'];
                    $structure   = $rows['structure'];
                    $image_name1 = $rows['image_1'];
                    $image_name2 = $rows['image_2'];
                    $image_name3 = $rows['image_3'];
                    $image_name4 = $rows['image_4'];
                    $sold = $rows['sold'];
                    $date = $rows['date'];
                    $weight = $rows['weight'];
                    $simcard = $rows['simcard'];
                    $battery = $rows['battery'];
                    $dimensions = $rows['dimensions'];


                }
            }
        }
    }
    if($category == "لپ تاپ"){
//        $tbl_name = "products_tbl";

        $sql = "SELECT * FROM  product_lab WHERE id='$id'";
        if(isset($conn)){
            $res = mysqli_query($conn,$sql);
            if($res){
                $count = mysqli_num_rows($res);
                if($count == 1){
                    $rows = mysqli_fetch_assoc($res);

                    $fa_title   = $rows['fa_title'];
                    $en_title   = $rows['en_title'];
                    $content   = $rows['content'];
                    $category = $rows['category'];
                    $property = $rows['property'];
                    $brand   = $rows['brand'];
                    $cash = $rows['cash'];
                    $cpu_mark = $rows['cpu_mark'];
                    $cpu_graf   = $rows['cpu_graf'];
                    $cpu_model= $rows['cpu_model'];
                    $systm   = $rows['systm'];
                    $garanty   = $rows['garanty'];
                    $ram   = $rows['ram'];
                    $rom   = $rows['rom'];
                    $count   = $rows['available'];
                    $price   = $rows['price'];
                    $screen   = $rows['screen'];
                    $image_name1 = $rows['image_1'];
                    $image_name2 = $rows['image_2'];
                    $image_name3 = $rows['image_3'];
                    $image_name4 = $rows['image_4'];
                    $sold = $rows['sold'];
                    $connect = $rows['connect'];
                    $port_typec   = $rows['port_typec'];
                    $port_usb2   = $rows['port_usb2'];
                    $port_usb3   = $rows['port_usb3'];
                    $date = $rows['date'];
                    $weight = $rows['weight'];
                    $battery = $rows['battery'];
                    $dimensions = $rows['dimensions'];


                }
            }
        }
    }
    if($category == "قاب و گلس"){
//        $tbl_name = "products_tbl";

        $sql = "SELECT * FROM  product_ghab WHERE id='$id'";
        if(isset($conn)){
            $res = mysqli_query($conn,$sql);
            if($res){
                $count = mysqli_num_rows($res);
                if($count == 1){
                    $rows = mysqli_fetch_assoc($res);

                    $fa_title   = $rows['fa_title'];
                    $one_title = $rows['one_title'];
                    $content   = $rows['content'];
                    $category = $rows['category'];
                    $brand   = $rows['brand'];
                    $count   = $rows['available'];
                    $price   = $rows['price'];
                    $structure   = $rows['structure'];
                    $image_name1 = $rows['image_1'];
                    $image_name2 = $rows['image_2'];
                    $image_name3 = $rows['image_3'];
                    $sold = $rows['sold'];
                    $date = $rows['date'];
                    $weight = $rows['weight'];
                    $property = $rows['property'];


                }
            }
        }
    }
    if($category == "لوازم جانبی"){
//        $tbl_name = "products_tbl";

        $sql = "SELECT * FROM  product_janeb WHERE id='$id'";
        if(isset($conn)){
            $res = mysqli_query($conn,$sql);
            if($res){
                $count = mysqli_num_rows($res);
                if($count == 1){
                    $rows = mysqli_fetch_assoc($res);

                    $fa_title   = $rows['fa_title'];
                    $one_title = $rows['one_title'];
                    $content   = $rows['content'];
                    $category1 = $rows['category'];
                    $label = $rows['label'];
                    $brand   = $rows['brand'];
                    $count   = $rows['available'];
                    $connect = $rows['connect'];
                    $length = $rows['length'];
                    $price   = $rows['price'];
                    $structure   = $rows['structure'];
                    $image_name1 = $rows['image_1'];
                    $image_name2 = $rows['image_2'];
                    $image_name3 = $rows['image_3'];
                    $sold = $rows['sold'];
                    $date = $rows['date'];
                    $weight = $rows['weight'];
                    $property = $rows['property'];
                    $or_rom = $rows['or_rom'];


                }
            }
        }
    }


}else{
    redirect(asset('manage-products.php'));
}
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>محصولات</title>
    <!-- font---------------------------------------->
    <link rel="stylesheet" href="assets/css/vendor/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/vendor/materialdesignicons.css">
    <!-- plugin-------------------------------------->
    <link rel="stylesheet" href="assets/css/vendor/bootstrap.css">
    <link rel="stylesheet" href="assets/css/vendor/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/vendor/noUISlider.min.css">
    <link rel="stylesheet" href="assets/css/vendor/lightgallery.css">
    <link rel="stylesheet" href="assets/css/vendor/nice-select.css">
    <!-- main-style---------------------------------->
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
</head>
<?php

?>
<body>

    <!-- arshive-product----------------------->
    <div class="container-main">
        <div class="d-block">
            <div class="page-content page-row">
                <div class="main-row">
                    <div class="col-lg">
                        <div class="product type-product">
                            <div class="col-lg-5 col-xs-12 pr d-block" style="padding: 0;">
                                <section class="product-gallery">
                                    <div class="gallery">
                                        <div class="gallery-item">
                                            <div>
                                                <ul class="gallery-actions">
                                                    <li>
                                                        <a href="#" class="btn-option add-product-wishes">
                                                            <i class="mdi mdi-heart-outline"></i>
                                                            <span>محبوب</span>
                                                        </a>
                                                    </li>

                                                </ul>
                                            </div>
                                        </div>
                                        <div class="gallery-item">
                                            <div class="gallery-img">
                                                <a href="#">
                                                    <img class="zoom-img" id="img-product-zoom"
                                                        src="<?= "./images/products/". $image_name1 ?>"
                                                        data-zoom-image="<?= "./images/products/". $image_name1 ?>"
                                                        width="411" />
                                                    <div id="gallery_01f" style="width:420px;float:right;">
                                                </a>
                                                <ul class="gallery-items owl-carousel owl-theme" id="gallery-slider">
                                                    <li class="item">
                                                        <a href="#" class="elevatezoom-gallery active" data-update=""
                                                           data-image="<?= "./images/products/".$image_name2 ?>"
                                                           data-zoom-image=<?= "./images/products/".$image_name2 ?>>
                                                            <img src="<?= "./images/products/".$image_name2 ?>"
                                                                 width="100" /></a>
                                                    </li>
                                                    <li class="item">
                                                        <a href="#" class="elevatezoom-gallery active" data-update=""
                                                           data-image="<?= "./images/products/". $image_name3 ?>"
                                                           data-zoom-image=<?= "./images/products/". $image_name3 ?>>
                                                            <img src="<?= "./images/products/". $image_name3 ?>"
                                                                 width="100" /></a>
                                                    </li>
                                                    <?php
                                                      if (!empty($image_name4)){
                                                          ?>
                                                          <li class="item">
                                                              <a href="#" class="elevatezoom-gallery active" data-update=""
                                                                 data-image="<?= "./images/products/". $image_name4 ?>"
                                                                 data-zoom-image=<?= "./images/products/". $image_name4 ?>>
                                                                  <img src="<?= "./images/products/". $image_name4 ?>"
                                                                       width="100" /></a>
                                                          </li>
                                                    <?php
                                                      }
                                                    ?>


                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                        <div class="col-lg-7 col-xs-12 pl mt-5 d-block">
                            <section class="product-info">
                                <div class="product-headline">
                                    <h1 class="product-title">
                                        <?= $fa_title ?>
                                    </h1>
                                </div>
                                <?php
                                if(!empty($en_title)){
                                    ?>
                                    <div class="product-attributes">
                                        <div class="product-config">
                                            <span class="product-title-en"> <?= $en_title ?></span>
                                            <div class="product-rate">
                                                <i class="fa fa-star active"></i>
                                                <i class="fa fa-star active"></i>
                                                <i class="fa fa-star active"></i>
                                                <i class="fa fa-star active"></i>
                                                <i class="fa fa-star active"></i>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                                <div class="product-config-wrapper">
                                    <div class="product-directory">
                                        <ul>
                                            <li>
                                                <span>
                                                    <i class="fa fa-archive"></i> دسته:
                                                </span>
                                                <a href="#" class="product-link product-cat-title"><?php if($category == "گوشی هوشمند"){echo "کالای دیجیتال" ;}
                                                    if($category == "قاب و گلس"){ echo "لوازم جانبی موبایل" ;}
                                                    if($category == "لپ تاپ"){ echo "کالای دیجیتال" ;}
                                                    if($category == "لوازم جانبی"){ echo "لوازم جانبی" ;}?></a>
                                                <a href="#" class="product-link product-cat-title">
                                                    <?php
                                                    if($category == "لوازم جانبی"){
                                                        echo $label ;
                                                    }else{
                                                        echo $category;
                                                    }?>
                                                </a>
                                            </li>
                                            <li>
                                                <span>
                                                    <i class="fa fa-tags"></i> برچسب:
                                                </span>
                                                <a href="#" class="product-link product-tag-title"><?php if($category == "گوشی هوشمند"){echo "گوشی موبایل" ;}
                                                    if($category == "قاب و گلس"){ echo " قاب موبایل" ;}
                                                    if($category == "لپ تاپ"){ echo "لپ تاپ ".$brand ;}
                                                    if($category == "لوازم جانبی"){ echo $category1 ;} ?></a>
                                            </li>
                                            <li>
                                                <span>
                                                    برند:
                                                </span>
                                                <a href="#" class="product-link product-tag-title"><?= $brand ?></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col=lg-6 col-md-6 col-xs-12 pr">
                                        <div class="product-variants">
                                            <span>رنگ بندی: </span>
                                            <ul class="js-product-variants">
                                                <li class="ui-variant">
                                                    <label for="#" class="ui-variant-color">
                                                        <span class="ui-variant-shape"
                                                            style="background-color: #56abef"></span>
                                                        <input type="radio" value="4" name="color" id="variant"
                                                            class="js-variant-selector" checked="">
                                                        <span class="ui-variant-check"></span>
                                                    </label>
                                                </li>
                                                <?php $color = "background-color: #56abef" ;
                                                 ?>
                                                <li class="ui-variant">
                                                    <label for="#" class="ui-variant-color">
                                                        <span class="ui-variant-shape"
                                                            style='<?= $color?>'></span>
                                                        <input type="radio" value="4" name="color" id="variant"
                                                            class="js-variant-selector">
                                                        <span class="ui-variant-check"></span>
                                                    </label>
                                                </li>
                                                <li class="ui-variant">
                                                    <label for="#" class="ui-variant-color">
                                                        <span class="ui-variant-shape"
                                                            style="background-color: ' .$color.'"></span>
                                                        <input type="radio" value="4" name="color" id="variant"
                                                            class="js-variant-selector">
                                                        <span class="ui-variant-check"></span>
                                                    </label>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="product-params pt-3">
                                            <ul data-title="ویژگی‌های محصول">
                                                <?php
                                                if($category == "گوشی هوشمند"){
                                                    ?>
                                                        <li>
                                                            <span>سیستم عامل: </span>
                                                            <span><?= $systm ?></span>
                                                        </li>
                                                        <li>
                                                            <span>شبکه های ارتباطی: </span>
                                                            <span><?= $network ?></span>
                                                        </li>
                                                        <li>
                                                            <span>مقدار RAM: </span>
                                                            <span><?= $ram ?></span>
                                                        </li>
                                                        <li>
                                                <?php
                                                }
                                                ?>
                                                    <span>ویژگی‌های خاص: </span>
                                                    <span><?= $property ?></span>
                                                </li>
                                            </ul>
                                        </div>

                                    </div>
                                    <div class="col=lg-6 col-md-6 col-xs-12 pr">
                                        <div class="product-seller-info">
                                            <div class="seller-info-changable">
                                                <div class="product-seller-row vendor">
                                                    <span class="title"> فروشنده:</span>
                                                    <a href="#" class="product-name">دیجیتال شهروند</a>
                                                </div>
                                                <?php
                                                if(isset($garanty)){
                                                    ?>
                                                    <div class="product-seller-row guarantee">
                                                        <span class="title"> گارانتی:</span>
                                                        <a href="#" class="product-name"><?= $garanty ?></a>
                                                    </div>
                                                <?php
                                                }
                                                ?>
                                                <div class="product-seller-row price">
                                                    <span class="title"> قیمت:</span>
                                                    <a href="#" class="product-name">
                                                        <span class="amount">
                                                            <?= $price ?>
                                                            <span>تومان</span>
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="product-seller-row guarantee">
                                                    <span class="title mt-3"> تعداد:</span>
                                                    <div class="quantity pl">
                                                        <input type="number" min="1" max="100" step="1" value="1">
                                                        <div class="quantity-nav">
                                                            <div class="quantity-button quantity-up">+</div>
                                                            <div class="quantity-button quantity-down">-</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-seller-row add-to-cart">
                                                    <a href="#" class="btn-add-to-cart btn btn-primary">
                                                        <span class="btn-add-to-cart-txt">افزودن به سبد خرید</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                        <div class="product-usp">
                            <div class="product-feature">
                                <div class="product-feature-col">
                                    <a href="#" class="product-feature-item">
                                        <img src="assets/images/page-single-product/delivery.svg">
                                        امکان تحویل
                                        <br>
                                        اکسپرس
                                    </a>
                                </div>
                                <div class="product-feature-col">
                                    <a href="#" class="product-feature-item">
                                        <img src="assets/images/page-single-product/contact-us.svg">
                                        ۷ روز هفته
                                        <br>
                                        ۲۴ ساعته
                                    </a>
                                </div>
                                <div class="product-feature-col">
                                    <a href="#" class="product-feature-item">
                                        <img src="assets/images/page-single-product/payment-terms.svg">
                                        امکان
                                        <br>
                                        پرداخت انلاین
                                    </a>
                                </div>
                                <div class="product-feature-col">
                                    <a href="#" class="product-feature-item">
                                        <img src="assets/images/page-single-product/return-policy.svg">
                                        هفت روز ضمانت بازگشت کالا
                                    </a>
                                </div>
                                <div class="product-feature-col">
                                    <a href="#" class="product-feature-item">
                                        <img src="assets/images/page-single-product/origin-guarantee.svg">
                                        ضمانت
                                        <br>
                                        اصل بودن کالا
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tabs">
                <div class="tab-box">
                    <ul class="tab nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="Review-tab" data-toggle="tab" href="#Review" role="tab"
                                aria-controls="Review" aria-selected="true">
                                <i class="mdi mdi-glasses"></i>
                                نقد و بررسی
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " id="Specifications-tab" data-toggle="tab" href="#Specifications"
                                role="tab" aria-controls="Specifications" aria-selected="false">
                                <i class="mdi mdi-format-list-checks"></i>
                                مشخصات
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg">
                    <div class="tabs-content">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="Review" role="tabpanel"
                                aria-labelledby="Review-tab">
                                <h2 class="params-headline">نقد و بررسی اجمالی</h2>
                                <section class="content-expert-summary">
                                    <div class="mask pm-3">
                                        <div class="mask-text">
                                            <pr><?= $content ?></pr>
                                        </div>
                                        <a href="#" class="mask-handler">
                                            <span class="show-more">+ ادامه مطلب</span>
                                            <span class="show-less">- بستن</span>
                                        </a>
                                        <div class="shadow-box"></div>
                                    </div>
                                </section>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="Specifications" role="tabpanel"
                                aria-labelledby="Specifications-tab">
                                <?php
                                if(isset($category) & $category == "گوشی هوشمند"){
                                    ?>
                                    <article>
                                        <h2 class="params-headline">مشخصات فنی
                                            <span><?= $fa_title ?></span>
                                        </h2>
                                        <section>
                                            <ul class="params-list">
                                                <li class="params-list-item">
                                                    <div class="params-list-key">
                                                        <span class="block">ابعاد</span>
                                                    </div>
                                                    <div class="params-list-value">
                                                    <span class="block">
                                                        <?= $dimensions ?>
                                                    </span>
                                                    </div>
                                                </li>
                                                <li class="params-list-item">
                                                    <div class="params-list-key">
                                                        <span class="block">ویژگی های خاص</span>
                                                    </div>
                                                    <div class="params-list-value">
                                                    <span class="block">
                                                        <?= $property?>
                                                    </span>
                                                    </div>
                                                </li>
                                                <li class="params-list-item">
                                                    <div class="params-list-key">
                                                        <span class="block">توضیحات سیم کارت</span>
                                                    </div>
                                                    <div class="params-list-value">
                                                    <span class="block">
                                                        <?= $simcard ?>
                                                    </span>
                                                    </div>
                                                </li>
                                               <?php
                                               if(!empty($network)){
                                                   ?>
                                                   <li class="params-list-item">
                                                       <div class="params-list-key">
                                                           <span class="block">شبکه های ارتباطی</span>
                                                       </div>
                                                       <div class="params-list-value">
                                                    <span class="block">
                                                        <?= $network ?>
                                                    </span>
                                                       </div>
                                                   </li>
                                                <?php
                                               }
                                               ?>
                                                <li class="params-list-item">
                                                    <div class="params-list-key">
                                                        <span class="block">بررسی دوربین ها</span>
                                                    </div>
                                                    <div class="params-list-value">
                                                    <span class="block">
                                                        <?= $camera ?>
                                                    </span>
                                                    </div>
                                                </li>

                                               <?php if(!empty($camera1)){
                                                ?>
                                                <li class="params-list-item">
                                                    <div class="params-list-key">
                                                        <span class="block">بررسی دوربین سلفی</span>
                                                    </div>
                                                    <div class="params-list-value">
                                                    <span class="block">
                                                        <?= $camera1 ?>
                                                    </span>
                                                    </div>
                                                </li>
                                                <?php
                                               }
                                                ?>
                                                <?php if(!empty($camera2)){
                                                ?>
                                                <li class="params-list-item">
                                                    <div class="params-list-key">
                                                        <span class="block">بررسی دوربین پشت</span>
                                                    </div>
                                                    <div class="params-list-value">
                                                    <span class="block">
                                                        <?= $camera2 ?>
                                                    </span>
                                                    </div>
                                                </li>
                                                <?php
                                                }
                                                ?>
                                                <li class="params-list-item">
                                                    <div class="params-list-key">
                                                        <span class="block">وزن</span>
                                                    </div>
                                                    <div class="params-list-value">
                                                    <span class="block">
                                                        <?= $weight ?>
                                                    </span>
                                                    </div>
                                                </li>
                                                <li class="params-list-item">
                                                    <div class="params-list-key">
                                                        <span class="block">ساختار بدنه</span>
                                                    </div>
                                                    <div class="params-list-value">
                                                    <span class="block">
                                                     <?=  $structure ?>
                                                    </span>
                                                    </div>
                                                </li>
                                            </ul>
                                        </section>
                                        <section>
                                            <ul class="params-list">
                                                <li class="params-list-item">
                                                    <div class="params-list-key">
                                                        <span class="block">نوع پردازنده</span>
                                                    </div>
                                                    <div class="params-list-value">
                                                    <span class="block">
                                                        <?= $processor ?>
                                                    </span>
                                                    </div>
                                                </li>

                                            </ul>
                                        </section>
                                        <section>
                                            <ul class="params-list">
                                                <li class="params-list-item">
                                                    <div class="params-list-key">
                                                        <span class="block">حافظه داخلی</span>
                                                    </div>
                                                    <div class="params-list-value">
                                                    <span class="block">
                                                        <?= $rom ?>
                                                    </span>
                                                    </div>
                                                </li>
                                                <li class="params-list-item">
                                                    <div class="params-list-key">
                                                        <span class="block">مقدار RAM</span>
                                                    </div>
                                                    <div class="params-list-value">
                                                    <span class="block">
                                                        <?=  $ram ?>
                                                    </span>
                                                    </div>
                                                </li>
                                                <li class="params-list-item">
                                                    <div class="params-list-key">
                                                        <span class="block">پشتیبانی از کارت حافظه جانبی</span>
                                                    </div>
                                                    <div class="params-list-value">
                                                    <span class="block">
                                                        <?= $or_ram ?>
                                                    </span>
                                                    </div>
                                                </li>

                                            </ul>
                                        </section>
                                        <section>
                                            <ul class="params-list">
                                                <li class="params-list-item">
                                                    <div class="params-list-key">
                                                        <span class="block">بازه‌ی اندازه صفحه نمایش</span>
                                                    </div>
                                                    <div class="params-list-value">
                                                        <span class="block"><?= $screen ?></span>
                                                    </div>
                                                </li>
                                            </ul>

                                        </section>
                                    </article>
                                <?php
                                }
                                ?>
                                <?php
                                if(isset($category) & $category == "قاب و گلس"){
                                ?>
                                <article>
                                    <h2 class="params-headline">مشخصات
                                        <span><?= $fa_title ?></span>
                                    </h2>
                                    <section>
                                        <ul class="params-list">
                                            <li class="params-list-item">
                                                <div class="params-list-key">
                                                    <span class="block">مناسب برای گوشی</span>
                                                </div>
                                                <div class="params-list-value">
                                                    <span class="block">
                                                        <?= $fa_title ?>
                                                    </span>
                                                </div>
                                            </li>
                                            <li class="params-list-item">
                                                <div class="params-list-key">
                                                    <span class="block">وزن</span>
                                                </div>
                                                <div class="params-list-value">
                                                    <span class="block">
                                                        <?= $weight ?>
                                                    </span>
                                                </div>
                                            </li>
                                            <li class="params-list-item">
                                                <div class="params-list-key">
                                                    <span class="block">ویژگی های خاص</span>
                                                </div>
                                                <div class="params-list-value">
                                                    <span class="block">
                                                        <?= $property?>
                                                    </span>
                                                </div>
                                            </li>
                                            <li class="params-list-item">
                                                <div class="params-list-key">
                                                    <span class="block">جنس و ساختار بدنه</span>
                                                </div>
                                                <div class="params-list-value">
                                                    <span class="block">
                                                        <?= $structure ?>
                                                    </span>
                                                </div>
                                            </li>
                                        </ul>
                                    </section>
                                <?php
                                }
                                ?>
                                    <?php
                                    if(isset($category) & $category == "لوازم جانبی"){
                                    ?>
                                    <article>
                                        <h2 class="params-headline">مشخصات
                                            <span><?= $fa_title ?></span>
                                        </h2>
                                        <section>
                                            <ul class="params-list">
                                                <li class="params-list-item">
                                                    <div class="params-list-key">
                                                        <span class="block">وزن</span>
                                                    </div>
                                                    <div class="params-list-value">
                                                    <span class="block">
                                                        <?= $weight ?>
                                                    </span>
                                                    </div>
                                                </li>
                                                <li class="params-list-item">
                                                    <div class="params-list-key">
                                                        <span class="block">ابعاد</span>
                                                    </div>
                                                    <div class="params-list-value">
                                                    <span class="block">
                                                        <?= $length?>
                                                    </span>
                                                    </div>
                                                </li>
                                                <li class="params-list-item">
                                                    <div class="params-list-key">
                                                        <span class="block">ویژگی های خاص</span>
                                                    </div>
                                                    <div class="params-list-value">
                                                    <span class="block">
                                                        <?= $property?>
                                                    </span>
                                                    </div>
                                                </li>
                                                <li class="params-list-item">
                                                    <div class="params-list-key">
                                                        <span class="block">جنس و ساختار بدنه</span>
                                                    </div>
                                                    <div class="params-list-value">
                                                    <span class="block">
                                                        <?= $structure ?>
                                                    </span>
                                                    </div>
                                                </li>
                                                <li class="params-list-item">
                                                    <div class="params-list-key">
                                                        <span class="block">پشتیبانی از حافظه جانبی</span>
                                                    </div>
                                                    <div class="params-list-value">
                                                    <span class="block">
                                                        <?= $or_rom ?>
                                                    </span>
                                                    </div>
                                                </li>
                                                <li class="params-list-item">
                                                    <div class="params-list-key">
                                                        <span class="block">نوع اتصال</span>
                                                    </div>
                                                    <div class="params-list-value">
                                                    <span class="block">
                                                        <?= $connect ?>
                                                    </span>
                                                    </div>
                                                </li>
                                            </ul>
                                        </section>
                                        <?php
                                        }
                                        ?>
                                    <?php
                                    if(isset($category) & $category == "لپ تاپ"){
                                        ?>
                                        <article>
                                            <h2 class="params-headline">مشخصات فنی
                                                <span><?= $fa_title ?></span>
                                            </h2>
                                            <section>
                                                <ul class="params-list">
                                                    <li class="params-list-item">
                                                        <div class="params-list-key">
                                                            <span class="block">ابعاد</span>
                                                        </div>
                                                        <div class="params-list-value">
                                                    <span class="block">
                                                        <?= $dimensions ?>
                                                    </span>
                                                        </div>
                                                    </li>
                                                    <li class="params-list-item">
                                                        <div class="params-list-key">
                                                            <span class="block">وزن</span>
                                                        </div>
                                                        <div class="params-list-value">
                                                    <span class="block">
                                                        <?= $weight ?>
                                                    </span>
                                                        </div>
                                                    </li>
                                                    <li class="params-list-item">
                                                        <div class="params-list-key">
                                                            <span class="block">ویژگی های خاص</span>
                                                        </div>
                                                        <div class="params-list-value">
                                                    <span class="block">
                                                        <?= $property?>
                                                    </span>
                                                        </div>
                                                    </li>
                                                    <li class="params-list-item">
                                                        <div class="params-list-key">
                                                            <span class="block">برسی RAM</span>
                                                        </div>
                                                        <div class="params-list-value">
                                                    <span class="block">
                                                        <?= $ram?>
                                                    </span>
                                                        </div>
                                                    </li>
                                                    <li class="params-list-item">
                                                        <div class="params-list-key">
                                                            <span class="block">برسی صفحه نمایش</span>
                                                        </div>
                                                        <div class="params-list-value">
                                                    <span class="block">
                                                        <?= $screen?>
                                                    </span>
                                                        </div>
                                                    </li>
                                                    <li class="params-list-item">
                                                        <div class="params-list-key">
                                                            <span class="block">حافظه Cache</span>
                                                        </div>
                                                        <div class="params-list-value">
                                                    <span class="block">
                                                        <?= $cash?>
                                                    </span>
                                                        </div>
                                                    </li>
                                                    <?php
                                                    if(!empty($connect)){
                                                        ?>
                                                        <li class="params-list-item">
                                                            <div class="params-list-key">
                                                                <span class="block">درگاه ارتباطی</span>
                                                            </div>
                                                            <div class="params-list-value">
                                                    <span class="block">
                                                        <?= $connect ?>
                                                    </span>
                                                            </div>
                                                        </li>
                                                        <?php
                                                    }
                                                    ?>
                                                    <li class="params-list-item">
                                                        <div class="params-list-key">
                                                            <span class="block">برسی حافظه داخلی</span>
                                                        </div>
                                                        <div class="params-list-value">
                                                    <span class="block">
                                                        <?= $rom ?>
                                                    </span>
                                                        </div>
                                                    </li>

                                                    <?php if(!empty($battery)){
                                                        ?>
                                                        <li class="params-list-item">
                                                            <div class="params-list-key">
                                                                <span class="block">باتری</span>
                                                            </div>
                                                            <div class="params-list-value">
                                                    <span class="block">
                                                        <?= $battery ?>
                                                    </span>
                                                            </div>
                                                        </li>
                                                        <?php
                                                    }
                                                    ?>
                                                    <?php if(!empty($cpu_graf)){
                                                        ?>
                                                        <li class="params-list-item">
                                                            <div class="params-list-key">
                                                                <span class="block">توضیحات پردازنده گرافیکی</span>
                                                            </div>
                                                            <div class="params-list-value">
                                                    <span class="block">
                                                        <?= $cpu_graf ?>
                                                    </span>
                                                            </div>
                                                        </li>
                                                        <?php
                                                    }
                                                    ?>
                                                    <li class="params-list-item">
                                                        <div class="params-list-key">
                                                            <span class="block">پورت USB_2</span>
                                                        </div>
                                                        <div class="params-list-value">
                                                    <span class="block">
                                                        <?= $port_usb2 ?>
                                                    </span>
                                                        </div>
                                                    </li>
                                                    <li class="params-list-item">
                                                        <div class="params-list-key">
                                                            <span class="block">پورت USB_3</span>
                                                        </div>
                                                        <div class="params-list-value">
                                                    <span class="block">
                                                        <?= $port_usb3 ?>
                                                    </span>
                                                        </div>
                                                    </li>
                                                    <li class="params-list-item">
                                                        <div class="params-list-key">
                                                            <span class="block">پورت Type_C</span>
                                                        </div>
                                                        <div class="params-list-value">
                                                    <span class="block">
                                                        <?= $port_typec ?>
                                                    </span>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </section>
                                            <section>
                                                <ul class="params-list">
                                                    <li class="params-list-item">
                                                        <div class="params-list-key">
                                                            <span class="block">سازنده پردازنده</span>
                                                        </div>
                                                        <div class="params-list-value">
                                                    <span class="block">
                                                        <?= $cpu_mark ?>
                                                    </span>
                                                        </div>
                                                    </li>

                                                </ul>
                                                <ul class="params-list">
                                                    <li class="params-list-item">
                                                        <div class="params-list-key">
                                                            <span class="block">مدل پردازنده</span>
                                                        </div>
                                                        <div class="params-list-value">
                                                    <span class="block">
                                                        <?= $cpu_model ?>
                                                    </span>
                                                        </div>
                                                    </li>

                                                </ul>
                                            </section>
                                            <section>
                                                <ul class="params-list">
                                                    <li class="params-list-item">
                                                        <div class="params-list-key">
                                                            <span class="block">حافظه داخلی</span>
                                                        </div>
                                                        <div class="params-list-value">
                                                    <span class="block">
                                                        <?= $rom ?>
                                                    </span>
                                                        </div>
                                                    </li>
                                                    <li class="params-list-item">
                                                        <div class="params-list-key">
                                                            <span class="block">مقدار RAM</span>
                                                        </div>
                                                        <div class="params-list-value">
                                                    <span class="block">
                                                        <?=  $ram ?>
                                                    </span>
                                                        </div>
                                                    </li>


                                                </ul>
                                            </section>
                                        </article>
                                        <?php
                                    }
                                    ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- arshive-product----------------------->

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
<script src="assets/js/vendor/lightgallery-all.js"></script>
<script src="assets/js/vendor/jquery.ez-plus.js"></script>
<script src="assets/js/vendor/jquery.nice-select.min.js"></script>
<!-- main js---------------------------------------------------->
<script src="assets/js/main.js"></script>

</html>