<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta name="ali mohammadi" content="alimohammadipro_1998@yahoo.com">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="شهروند موبایل">
    <meta name="keywords" content="موبایل شهروند">
    <meta name="keywords" content="فروشگاه دیجیتال شهروند">
    <meta name="keywords" content=" شهروند دیجیتال">
    <title>فروشگاه اینترنتی شهروند موبایل</title>
    <!-- font---------------------------------------->
    <link rel="stylesheet" href="assets/css/vendor/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/vendor/materialdesignicons.css">
    <!-- plugin-------------------------------------->
    <link rel="stylesheet" href="assets/css/vendor/bootstrap.css">
    <link rel="stylesheet" href="assets/css/vendor/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/vendor/nice-select.css">
    <link rel="stylesheet" href="assets/css/vendor/jquery.jqZoom.css">
    <!-- main-style---------------------------------->
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
</head>

<body>
<?php include('./partials-front/header.php'); ?>
    <!-- slider-main------------------------------------------------------------------------------------------------------------------------>
    <div class="container-main">
        <div class="d-block">
            <div class="col-lg-12 col-xs-12 pr mb-4">
                <div class="slider-main-container d-block">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item carousel-item-h4 active">
                                <img src="assets/images/baner-for-me/naner-glass.jpg" class="d-block w-100 h-four-img"
                                    alt="...">
                                <div class="carousel-caption d-none d-md-block">
<!--                                    <h3>اپل آیفون پرو مکس 12 - 256 گیگابایت</h3>-->
<!--                                    <p>Apple iPhone Pro Max 12 - 256GB - Dual SIM</p>-->
                                    <a href="<?= BASEURL . 'search.php?category='.'قاب و گلس'?>">
                                        <button type="submit" class="btn btn-warning btn-buy mt-4">خرید کنید</button>
                                    </a>
                                </div>
                            </div>
                            <div class="carousel-item carousel-item-h4">
                                <img src="assets/images/baner-for-me/banner_SlideBanner_QfLelq_7033cc05-4506-4d1b-9926-f4f78a14b9aa.jpg"
                                    class="d-block w-100 h-four-img" alt="...">
                                <div class="carousel-caption d-none d-md-block">
<!--                                    <h3>سامسونگ گلگسی نوت 20 آلترا - 512 گیگابایت</h3>-->
<!--                                    <p>Sumsung Galaxy Note 20 Ultra - 512GB - Dual SIM</p>-->
                                    <a href="<?= BASEURL . 'search.php?label=هندزفری و هدفون&category=لوازم جانبی'?>">
                                        <button type="submit" class="btn btn-warning btn-buy mt-4">خرید کنید</button>
                                    </a>
                                </div>
                            </div>
                            <div class="carousel-item carousel-item-h4">
                                <img src="assets/images/baner-for-me/baner-hans.png"
                                    class="d-block w-100 h-four-img" alt="...">
                                <div class="carousel-caption d-none d-md-block">
                                    <a href="<?= BASEURL . 'search.php?category=لوازم جانبی&label=هندزفری و هدفون'?>">
                                        <button type="submit" class="btn btn-warning btn-buy mt-4">خرید کنید</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                            data-slide="prev">
                            <span class="fa fa-angle-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                            data-slide="next">
                            <span class="fa fa-angle-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- adplacement--------------------------->
    <div class="container-main">
        <div class="d-block">
            <div class="adplacement-container-row">
                <div class="col-12">
                    <a class="adplacement-item mb-4">
                        <div class="adplacement-sponsored_box">
                            <img src="assets/images/baner-for-me/banner-home.jpg">
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- adplacement--------------------------->

    <!-- slidre-product------------------------>
    <div class="container-main">
        <div class="d-block">
            <!-- slider-moment------------------------->
            <div class="col-lg-12 col-md-12 col-xs-12 pr order-1 d-block">
                <div class="slider-widget-products">
                    <div class="widget widget-product card">
                        <header class="card-header">
                            <span class="title-one">جدیدترین گوشی های هوشمند</span>
                            <h3 class="card-title"></h3>
                        </header>
                        <div class="product-carousel owl-carousel owl-theme owl-rtl owl-loaded owl-drag">
                            <div class="owl-stage-outer">
                                <div class="owl-stage"
                                    style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 2234px;">
                                    <?php
                                    $sql1 = "SELECT id,fa_title,category,price,image_1 FROM products_tbl  LIMIT 6";
                                    if(isset($conn)){
                                        $res1 = mysqli_query($conn,$sql1);
                                        if($res1){
                                            $count1 = mysqli_num_rows($res1);
                                            if($count1 > 0){
                                                while($rows1 = mysqli_fetch_assoc($res1)){
                                                    $id_mobile = $rows1['id'];
                                                    $fa_title_mobile = $rows1['fa_title'];
                                                    $category_mobile = $rows1['category'];
                                                    $price_mobile = convert_price($rows1['price']);
                                                    $image_mobile =$rows1['image_1'];
                                                    ?>
                                                    <div class="owl-item active" style="width: 309.083px; margin-left: 10px;">
                                                        <div class="item">
                                                            <a href="<?= BASEURL.'single-product.php' ?>?id=<?= $id_mobile ?>&category=<?= $category_mobile ?>" class="d-block hover-img-link">
                                                                <img src="<?= './images/products/'.$image_mobile   ?>"
                                                                     class="img-fluid" alt="<?= $fa_title_mobile ?>">
                                                                <span class="icon-view">
                                                                      <strong><i class="fa fa-eye"></i></strong>
                                                                </span>
                                                            </a>
                                                            <h2 class="post-title">
                                                                <a href="#">
                                                                    <?= $fa_title_mobile ?>
                                                                </a>
                                                            </h2>
                                                            <div class="price">
                                                                <ins><span><?= $price_mobile ?><span>تومان</span></span></ins>
                                                            </div>
                                                        </div>
                                                    </div>
                                    <?php

                                                }
                                            }
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--slider-amazing------------------------->
            <section class="section-slider amazing-section pt-3">
                <div class="container-amazing col-12">
                    <div class="col-lg-3 display-md-none pull-right">
                        <div class="amazing-product text-center">
                                <img src="assets/images/slider-amazing/shopping-cart.svg" alt="">
                            <h5 class="amazing-heading-title amazing-size-default">جدیدترین محصولات جانبی</h5>
                            <a href="<?= BASEURL.'search.php' ?>?category=لوازم جانبی" class="view-all-amazing-btn">
                                مشاهده همه
                                <i class="uil uil-angle-left"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-12 pull-left">
                        <div class="slider-widget-products mb-0">
                            <div class="widget widget-product card">
                                <div class="product-carousel owl-carousel owl-theme owl-rtl owl-loaded owl-drag">
                                    <div class="owl-stage-outer">
                                        <div class="owl-stage"
                                            style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 2234px;">
                                            <?php
                                            $sql1 = "SELECT id,fa_title,category,label,price,image_1 FROM product_janeb  LIMIT 6";
                                            if(isset($conn)){
                                                    $res1 = mysqli_query($conn,$sql1);
                                                    if($res1){
                                                        $count1 = mysqli_num_rows($res1);
                                                            if($count1 > 0){
                                                                    while($rows1 = mysqli_fetch_assoc($res1)){
                                                                            $id_janebi = $rows1['id'];
                                                                            $fa_title_janebi = $rows1['fa_title'];
                                                                            $category_janebi = $rows1['category'];
                                                                            $price_janebi = convert_price($rows1['price']);
                                                                            $image_janebi =$rows1['image_1'];
                                            ?>
                                            <div class="owl-item active" style="width: 309.083px; margin-left: 10px;">
                                                <div class="item">
                                                    <a href="<?= BASEURL.'single-product.php' ?>?id=<?= $id_janebi ?>&category=<?= $category_janebi ?>" class="d-block hover-img-link" >
                                                        <br>
                                                        <img src="<?= 'images/products/'.$image_janebi   ?>"
                                                            class="img-fluid" alt="<?= $fa_title_janebi ?>">
                                                        <br><br>
                                                            <span class="icon-view">
                                                                <strong><i class="fa fa-eye"></i></strong>
                                                            </span>
                                                    </a>
                                                    <h2 class="post-title pt-4">
                                                        <a href="#">
                                                            <?= $fa_title_janebi ?>
                                                        </a>
                                                    </h2>
                                                    <div class="price">
                                                        <ins><span><?= $price_janebi ?><span>تومان</span></span></ins>
                                                        <br>
                                                    </div>
                                                </div>
                                            </div>
                                                                        <?php

                                                                    }
                                                            }
                                                    }
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--slider-amazing------------------------->
            <!-- adplacement--------------------------->
<!--            <div class="container-fluid">-->
<!--                <div class="row pr">-->
<!--                    <div class="adplacement-container-row">-->
<!--                        <div class="col-6 col-lg-3 pr">-->
<!--                            <a href="#" class="adplacement-item">-->
<!--                                <div class="adplacement-sponsored_box">-->
<!--                                    <img src="assets/images/adplacement/a-a.jpg">-->
<!--                                </div>-->
<!--                            </a>-->
<!--                        </div>-->
<!--                        <div class="col-6 col-lg-3 pr">-->
<!--                            <a href="#" class="adplacement-item">-->
<!--                                <div class="adplacement-sponsored_box">-->
<!--                                    <img src="assets/images/adplacement/a-5.jpg">-->
<!--                                </div>-->
<!--                            </a>-->
<!--                        </div>-->
<!--                        <div class="col-6 col-lg-3 pr">-->
<!--                            <a href="#" class="adplacement-item">-->
<!--                                <div class="adplacement-sponsored_box">-->
<!--                                    <img src="assets/images/adplacement/a-6.jpg">-->
<!--                                </div>-->
<!--                            </a>-->
<!--                        </div>-->
<!--                        <div class="col-6 col-lg-3 pr">-->
<!--                            <a href="#" class="adplacement-item">-->
<!--                                <div class="adplacement-sponsored_box">-->
<!--                                    <img src="assets/images/adplacement/a-7.jpg">-->
<!--                                </div>-->
<!--                            </a>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
            <!-- adplacement--------------------------->
            <div class="col-lg-12 col-md-12 col-xs-12 pr order-1 d-block">
                <div class="slider-widget-products">
                    <div class="widget widget-product card">
                        <header class="card-header">
                            <span class="title-one">قاب و گلس</span>
                            <h3 class="card-title"></h3>
                        </header>
                        <div class="product-carousel owl-carousel owl-theme owl-rtl owl-loaded owl-drag">
                            <div class="owl-stage-outer">
                                <div class="owl-stage"
                                    style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 2234px;">
                                    <?php
                                    $sql1 = "SELECT id,fa_title,category,price,image_1 FROM product_ghab  LIMIT 6";
                                    if(isset($conn)){
                                            $res1 = mysqli_query($conn,$sql1);
                                            if($res1){
                                                $count1 = mysqli_num_rows($res1);
                                                if($count1 > 0){
                                                    while($rows1 = mysqli_fetch_assoc($res1)){
                                                    $id_ghab = $rows1['id'];
                                                    $fa_title_ghab = $rows1['fa_title'];
                                                    $category_ghab = $rows1['category'];
                                                    $price_ghab = convert_price($rows1['price']);
                                                    $image_ghab =$rows1['image_1'];
                                    ?>
                                    <div class="owl-item active" style="width: 309.083px; margin-left: 10px;">
                                        <div class="item">
                                            <a href="<?= BASEURL.'single-product.php' ?>?id=<?= $id_ghab ?>&category=<?= $category_ghab ?>" class="d-block hover-img-link" >
                                                <img src="<?= 'images/products/'.$image_ghab   ?>"
                                                    class="img-fluid" alt="">
                                                    <span class="icon-view">
                                                        <strong><i class="fa fa-eye"></i></strong>
                                                    </span>
                                            </a>
                                            <h2 class="post-title">
                                                <a href="#">
                                                   <?= $fa_title_ghab ?>
                                                </a>
                                            </h2>
                                            <div class="price">
                                                <ins><span><?= $price_ghab ?><span>تومان</span></span></ins>
                                            </div>
                                        </div>
                                    </div>
                                                        <?php

                                                    }
                                                }
                                            }
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- adplacement--------------------------->
                    <div class="container-main">
                        <div class="d-block">
                            <div class="adplacement-container-row">
                                <div class="col-12">
                                    <a href="<?= BASEURL.'search.php' ?>?category=لپ تاپ" class="adplacement-item mb-4">
                                        <div class="adplacement-sponsored_box">
                                            <img src="assets/images/banner_SlideBanner_8wPQDE_255acf4f-d824-4733-b482-af28a5171b84.jpg">
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- adplacement--------------------------->

                    <div class="widget widget-product card">
                        <header class="card-header">
                            <span class="title-one">کامپیوتر و لپ تاپ</span>
                            <h3 class="card-title"></h3>
                        </header>
                        <div class="product-carousel owl-carousel owl-theme owl-rtl owl-loaded owl-drag">
                            <div class="owl-stage-outer">
                                <div class="owl-stage"
                                    style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 2234px;">
                                    <?php
                                    $sql2 = "SELECT id,fa_title,category,price,image_1 FROM product_lab  LIMIT 6";
                                    if(isset($conn)){
                                        $res2 = mysqli_query($conn,$sql2);
                                        if($res2){
                                            $count2 = mysqli_num_rows($res2);
                                            if($count2 > 0){
                                                while($rows1 = mysqli_fetch_assoc($res2)){
                                                    $id_lab = $rows1['id'];
                                                    $fa_title_lab = $rows1['fa_title'];
                                                    $category_lab = $rows1['category'];
                                                    $price_lab = convert_price($rows1['price']);
                                                    $image_lab =$rows1['image_1'];
                                                    ?>
                                                    <div class="owl-item active" style="width: 309.083px; margin-left: 10px;">
                                                        <div class="item">
                                                            <a href="<?= BASEURL.'single-product.php' ?>?id=<?= $id_lab ?>&category=<?= $category_lab ?>" class="d-block hover-img-link" >
                                                                <img src="<?= 'images/products/'.$image_lab   ?>"
                                                                     class="img-fluid" alt="<?= $fa_title_lab ?>">
                                                                <span class="icon-view">
                                                                      <strong><i class="fa fa-eye"></i></strong>
                                                                </span>
                                                            </a>
                                                            <h2 class="post-title">
                                                                <a href="#">
                                                                    <?= $fa_title_lab ?>
                                                                </a>
                                                            </h2>
                                                            <div class="price">
                                                                <ins><span><?= $price_lab ?><span>تومان</span></span></ins>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php

                                                }
                                            }
                                        }
                                    }
                                    ?>

                                </div>
                            </div>
                        </div>
                    </div>
                   <!-- Modal -->
<!--                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"-->
<!--                        aria-labelledby="exampleModalLabel" aria-hidden="true">-->
<!--                        <div class="modal-dialog">-->
<!--                            <div class="modal-content">-->
<!--                                <div class="modal-header">-->
<!--                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
<!--                                        <span aria-hidden="true">&times;</span>-->
<!--                                    </button>-->
<!--                                </div>-->
<!--                                <div class="modal-body">-->
<!--                                    <div class="col-lg-6 pr">-->
<!--                                        <div class="thum-img">-->
<!--                                            <div class="widget widget-product card mb-0">-->
<!--                                                <div-->
<!--                                                    class="product-carousel-more owl-carousel owl-theme owl-rtl owl-loaded owl-drag">-->
<!--                                                    <div class="owl-stage-outer">-->
<!--                                                        <div class="owl-stage"-->
<!--                                                            style="transform: translate3d(1652px, 0px, 0px); transition: all 0.25s ease 0s; width: 2065px;">-->
<!--                                                            <div class="owl-item"-->
<!--                                                                style="width: 403px; margin-left: 10px;">-->
<!--                                                                <div class="item">-->
<!--                                                                    <a href="#" class="d-block hover-img-link"-->
<!--                                                                        data-toggle="modal" data-target="#exampleModal">-->
<!--                                                                        <div class="zoom-box">-->
<!--                                                                            <img src="assets/images/slider-product/computer-appel.jpg"-->
<!--                                                                                width="200" height="150" />-->
<!--                                                                            <div class="discount-m">-->
<!--                                                                                <span>10%</span>-->
<!--                                                                            </div>-->
<!--                                                                        </div>-->
<!--                                                                    </a>-->
<!--                                                                </div>-->
<!--                                                            </div>-->
<!--                                                            <div class="owl-item"-->
<!--                                                                style="width: 403px; margin-left: 10px;">-->
<!--                                                                <div class="item">-->
<!--                                                                    <a href="#" class="d-block hover-img-link"-->
<!--                                                                        data-toggle="modal" data-target="#exampleModal">-->
<!--                                                                        <div class="zoom-box">-->
<!--                                                                            <img src="assets/images/slider-product/computer-appel.jpg"-->
<!--                                                                                width="200" height="150" />-->
<!--                                                                            <div class="discount-m">-->
<!--                                                                                <span>10%</span>-->
<!--                                                                            </div>-->
<!--                                                                        </div>-->
<!--                                                                    </a>-->
<!--                                                                </div>-->
<!--                                                            </div>-->
<!--                                                            <div class="owl-item"-->
<!--                                                                style="width: 403px; margin-left: 10px;">-->
<!--                                                                <div class="item">-->
<!--                                                                    <a href="#" class="d-block hover-img-link"-->
<!--                                                                        data-toggle="modal" data-target="#exampleModal">-->
<!--                                                                        <div class="zoom-box">-->
<!--                                                                            <img src="assets/images/slider-product/computer-appel.jpg"-->
<!--                                                                                width="200" height="150" />-->
<!--                                                                            <div class="discount-m">-->
<!--                                                                                <span>10%</span>-->
<!--                                                                            </div>-->
<!--                                                                        </div>-->
<!--                                                                    </a>-->
<!--                                                                </div>-->
<!--                                                            </div>-->
<!--                                                            <div class="owl-item"-->
<!--                                                                style="width: 403px; margin-left: 10px;">-->
<!--                                                                <div class="item">-->
<!--                                                                    <a href="#" class="d-block hover-img-link"-->
<!--                                                                        data-toggle="modal" data-target="#exampleModal">-->
<!--                                                                        <div class="zoom-box">-->
<!--                                                                            <img src="assets/images/slider-product/computer-appel.jpg"-->
<!--                                                                                width="200" height="150" />-->
<!--                                                                            <div class="discount-m">-->
<!--                                                                                <span>10%</span>-->
<!--                                                                            </div>-->
<!--                                                                        </div>-->
<!--                                                                    </a>-->
<!--                                                                </div>-->
<!--                                                            </div>-->
<!--                                                            <div class="owl-item active"-->
<!--                                                                style="width: 403px; margin-left: 10px;">-->
<!--                                                                <div class="item">-->
<!--                                                                    <a href="#" class="d-block hover-img-link"-->
<!--                                                                        data-toggle="modal" data-target="#exampleModal">-->
<!--                                                                        <div class="zoom-box">-->
<!--                                                                            <img src="assets/images/slider-product/computer-appel.jpg"-->
<!--                                                                                width="200" height="150" />-->
<!--                                                                            <div class="discount-m">-->
<!--                                                                                <span>10%</span>-->
<!--                                                                            </div>-->
<!--                                                                        </div>-->
<!--                                                                    </a>-->
<!--                                                                </div>-->
<!--                                                            </div>-->
<!--                                                        </div>-->
<!--                                                    </div>-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                    <div class="col-lg-6 pr">-->
<!--                                        <div class="product-box-modal-title">-->
<!--                                            <h2 class="post-title">-->
<!--                                                <a href="#">-->
<!---->
<!--                                                </a>-->
<!--                                            </h2>-->
<!--                                        </div>-->
<!--                                        <div class="small-gutters align-items-stretch mb-4">-->
<!--                                            <div class="col-lg-12 pr-0 pl-0 pr">-->
<!--                                                <div class="product-box-modal_price mt-12 mt-auto">-->
<!--                                                    <div class="price">-->
<!--                                                        <del><span>۳,۵۰۰,۰۰۰<span>تومان</span></span></del>-->
<!--                                                        <ins><span>۲,۰۰۰,۰۰۰<span>تومان</span></span></ins>-->
<!--                                                    </div>-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                            <div class="small-gutters">-->
<!--                                                <div class="col-lg-12 mb-8 pr-0 pl-0 pr mt-3">-->
<!--                                                    <div class="product-box_action">-->
<!--                                                        <button class="btn btn-gradient-primary add-to-cart"-->
<!--                                                            type="submit">افزودن به سبد</button>-->
<!--                                                        <a href="#" class="btn btn-outline-dark btn-block">مشاهده-->
<!--                                                            جزئیات</a>-->
<!--                                                    </div>-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
                <!-- elementor -->
                <div class="elementor">
                    <div class="col-12 col-md-6 col-lg-6 col-xl-6 items-1 pr">
                        <article class="blog-item">
                            <figure class="figure">
                                <div class="post-thumbnail">
                                    <img src="assets/images/ghesti-image.jpg"
                                        alt="camera">
                                </div>

                                <div class="post-title">
                                    <a href="<?= BASEURL.'faq.php?cat=کارت حکمت'?>"  class="d-block">
                                        <button type="button" class="btn btn-light btn-see-all">مشاهده</button>
                                    </a>

                                </div>
                            </figure>
                        </article>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6 col-xl-6 items-1 pr">
                        <article class="blog-item">
                            <figure class="figure">
                                <div class="post-thumbnail">
                                    <img src="assets/images/ghesti-kharid-1.jpg" alt="camera">
                                </div>

                                <div class="post-title">
                                    <a href="<?= BASEURL.'faq.php?cat=خرید اقساطی'?>" class="d-block">

                                        <button type="button" class="btn btn-light btn-see-all">مشاهده</button>
                                    </a>
                                </div>
                            </figure>
                        </article>
                    </div>
                </div>
                <!-- elementor -->
            </div>
        </div>

        <!-- footer------------------------------------------->
        <?php include("./partials-front/footer.php") ?>
        <!-- scroll_Progress------------------------->
        <div class="progress-wrap">
            <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
                <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
            </svg>
        </div>
        <!-- scroll_Progress------------------------->
        <!-- Page Loader----------------------------->
<!--        <div class="P-loader">-->
<!--            <div class="P-loader-content">-->
<!--                <div class="logo-loader">-->
<!--                    <img src="assets/images/logo.png" alt="logo">-->
<!--                </div>-->
<!--                <div class="pic-loader text-center">-->
<!--                    <img src="assets/images/three-dots.svg" width="50" alt="">-->
<!--                </div>-->
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
<script src="assets/js/vendor/jquery.nice-select.min.js"></script>
<script src="assets/js/vendor/jquery.jqZoom.js"></script>
<!-- main js---------------------------------------------------->
<script src="assets/js/main.js"></script>

</html>

