<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>آرشیو محصولات</title>
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
<?php include('./partials-front/header.php');
if(!isset ($_GET['page'])){
    $page = 1;
}else{
    $page = $_GET['page'];
}
                if(!empty($_SESSION['category-search']) & !empty($_SESSION['text-search'])){
                    $category = $_SESSION['category-search'];
                    $text_search = $_SESSION['text-search'];
                    unset($_SESSION['text-search']);
                    unset($_SESSION['category-search']);

                        if($category == "گوشی هوشمند"){
                            $sql = "SELECT id,fa_title,image_1,price,category FROM products_tbl where 
                                                         fa_title like '%{$text_search}%' 
                                                      or en_title like '%{$text_search}%' 
                                                      or brand like '%{$text_search}%'";


                        }
                        if($category == "لپ تاپ"){
                            $sql = "SELECT id,fa_title,image_1,price,category FROM product_lab  where fa_title like '%{$text_search}%' 
                                                  or en_title like '%{$text_search}%' 
                                                or brand like '%{$text_search}%'";


                        }
                        if($category == "تجهیزات جانبی"){
                            $sql = "SELECT id,fa_title,image_1,price,category FROM product_janeb 
                                        where fa_title like '%{$text_search}%' 
                                          or one_title like '%{$text_search}%' 
                                          or brand like '%{$text_search}%'
                                          or label like '%{$text_search}%'";

                        }
                        if($category == "قاب و گلس"){
                            $sql = "SELECT id,fa_title,image_1,price,category FROM product_ghab 
                                            where fa_title like '%{$text_search}%' 
                                            or one_title like '%{$text_search}%' 
                                            or brand like '%{$text_search}%'";
                        }
                        if($category == "همه دسته ها"){
                            $sql1 = "SELECT id,fa_title,image_1,price,category FROM products_tbl where 
                                                         fa_title like '%{$text_search}%' 
                                                      or en_title like '%{$text_search}%' 
                                                      or brand like '%{$text_search}%'";
                            $sql2 = "SELECT id,fa_title,image_1,price,category FROM product_lab  where fa_title like '%{$text_search}%' 
                                                  or en_title like '%{$text_search}%' 
                                                or brand like '%{$text_search}%'";
                            $sql3 = "SELECT id,fa_title,image_1,price,category FROM product_janeb 
                                        where fa_title like '%{$text_search}%' 
                                          or one_title like '%{$text_search}%' 
                                          or brand like '%{$text_search}%'
                                          or label like '%{$text_search}%'";
                            $sql4 = "SELECT id,fa_title,image_1,price,category FROM product_ghab 
                                            where fa_title like '%{$text_search}%' 
                                            or one_title like '%{$text_search}%' 
                                            or brand like '%{$text_search}%'";
                        }
                }else{
                    redirect(BASEURL."home.php");
                }
                ?>

<!-- header-------------------------------->

<!-- arshive-product----------------------->
<div class="container-main">
    <div class="d-block">
        <div class="page-content page-row">
            <div class="main-row">
                <div id="breadcrumb">
                    <i class="mdi mdi-home"></i>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">خانه</a></li>
                            <li class="breadcrumb-item active" aria-current="page">آرشیو محصولات</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-9 col-md-9 col-xs-12 pl">
                    <div class="shop-archive-content mt-3 d-block">
                        <div class="product-items">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="Most-visited" role="tabpanel"
                                     aria-labelledby="Most-visited-tab">
                                    <div class="row">

                                        <?php
                                        if(isset($sql)){
                                            if(isset($conn)){
                                                $res =mysqli_query($conn,$sql);

                                                if($res){
                                                    while($rows = mysqli_fetch_assoc($res)){
                                                        $id = $rows['id'];
                                                        $image_name = $rows['image_1'];
                                                        $title = $rows['fa_title'];
                                                        $price = $rows['price'];
                                                        $category_post = $rows['category'];
                                                        ?>
                                                        <div class="col-lg-3 col-md-3 col-xs-12 order-1 d-block mb-3">
                                                            <section class="product-box product product-type-simple">
                                                                <div class="thumb">
                                                                    <a href="<?= BASEURL .'single-product.php'?>?id=<?= $id?>&category=<?= $category_post ?>" class="d-block">
                                                                        <img src="<?= "./images/products/".$image_name ?>">
                                                                    </a>
                                                                </div>
                                                                <div class="title">
                                                                    <a href="<?= BASEURL .'single-product.php'?>?id=<?= $id?>&category=<?= $category_post ?>">
                                                                        <?= $title ?>
                                                                    </a>
                                                                </div>
                                                                <div class="price">
                                                            <span class="amount"><?= convert_price($price) ?>
                                                                <span>تومان</span>
                                                            </span>
                                                                </div>
                                                            </section>
                                                        </div>
                                                        <?php
                                                    }
                                                }
                                            }

                                        }else if(isset($sql1) & isset($sql2)){
                                            $array = array();
                                            if(isset($conn)){
                                                $res1 = mysqli_query($conn,$sql1);
                                                $res2 = mysqli_query($conn,$sql2);
                                                $res3 = mysqli_query($conn,$sql3);
                                                $res4 = mysqli_query($conn,$sql4);
                                                if($res1){
                                                    while($rows = mysqli_fetch_assoc($res1)){
                                                        $id = $rows['id'];
                                                        $image_name = $rows['image_1'];
                                                        $title = $rows['fa_title'];
                                                        $price = $rows['price'];
                                                        $category_post = $rows['category'];
                                                        ?>
                                                        <div class="col-lg-3 col-md-3 col-xs-12 order-1 d-block mb-3">
                                                            <section class="product-box product product-type-simple">
                                                                <div class="thumb">
                                                                    <a href="<?= BASEURL .'single-product.php'?>?id=<?= $id?>&category=<?= $category_post ?>" class="d-block">
                                                                        <img src="<?= "./images/products/".$image_name ?>">
                                                                    </a>
                                                                </div>
                                                                <div class="title">
                                                                    <a href="<?= BASEURL .'single-product.php'?>?id=<?= $id?>&category=<?= $category_post ?>">
                                                                        <?= $title ?>
                                                                    </a>
                                                                </div>
                                                                <div class="price">
                                                            <span class="amount"><?= convert_price($price) ?>
                                                                <span>تومان</span>
                                                            </span>
                                                                </div>
                                                            </section>
                                                        </div>
                                                        <?php
                                                    }
                                                } if($res2){
                                                    while($rows = mysqli_fetch_assoc($res2)){
                                                        $id = $rows['id'];
                                                        $image_name = $rows['image_1'];
                                                        $title = $rows['fa_title'];
                                                        $price = $rows['price'];
                                                        $category_post = $rows['category'];
                                                        ?>
                                                        <div class="col-lg-3 col-md-3 col-xs-12 order-1 d-block mb-3">
                                                            <section class="product-box product product-type-simple">
                                                                <div class="thumb">
                                                                    <a href="<?= BASEURL .'single-product.php'?>?id=<?= $id?>&category=<?= $category_post ?>" class="d-block">
                                                                        <img src="<?= "./images/products/".$image_name ?>">
                                                                    </a>
                                                                </div>
                                                                <div class="title">
                                                                    <a href="<?= BASEURL .'single-product.php'?>?id=<?= $id?>&category=<?= $category_post ?>">
                                                                        <?= $title ?>
                                                                    </a>
                                                                </div>
                                                                <div class="price">
                                                            <span class="amount"><?= convert_price($price) ?>
                                                                <span>تومان</span>
                                                            </span>
                                                                </div>
                                                            </section>
                                                        </div>
                                                        <?php

                                                    }
                                                } if($res3){
                                                    while($rows = mysqli_fetch_assoc($res3)){
                                                        $id = $rows['id'];
                                                        $image_name = $rows['image_1'];
                                                        $title = $rows['fa_title'];
                                                        $price = $rows['price'];
                                                        $category_post = $rows['category'];
                                                        ?>
                                                        <div class="col-lg-3 col-md-3 col-xs-12 order-1 d-block mb-3">
                                                            <section class="product-box product product-type-simple">
                                                                <div class="thumb">
                                                                    <a href="<?= BASEURL .'single-product.php'?>?id=<?= $id?>&category=<?= $category_post ?>" class="d-block">
                                                                        <img src="<?= "./images/products/".$image_name ?>">
                                                                    </a>
                                                                </div>
                                                                <div class="title">
                                                                    <a href="<?= BASEURL .'single-product.php'?>?id=<?= $id?>&category=<?= $category_post ?>">
                                                                        <?= $title ?>
                                                                    </a>
                                                                </div>
                                                                <div class="price">
                                                            <span class="amount"><?= convert_price($price) ?>
                                                                <span>تومان</span>
                                                            </span>
                                                                </div>
                                                            </section>
                                                        </div>
                                                        <?php
                                                    }
                                                } if($res4){
                                                    while($rows = mysqli_fetch_assoc($res4)){
                                                        $id = $rows['id'];
                                                        $image_name = $rows['image_1'];
                                                        $title = $rows['fa_title'];
                                                        $price = $rows['price'];
                                                        $category_post = $rows['category'];
                                                        ?>
                                                        <div class="col-lg-3 col-md-3 col-xs-12 order-1 d-block mb-3">
                                                            <section class="product-box product product-type-simple">
                                                                <div class="thumb">
                                                                    <a href="<?= BASEURL .'single-product.php'?>?id=<?= $id?>&category=<?= $category_post ?>" class="d-block">
                                                                        <img src="<?= "./images/products/".$image_name ?>">
                                                                    </a>
                                                                </div>
                                                                <div class="title">
                                                                    <a href="<?= BASEURL .'single-product.php'?>?id=<?= $id?>&category=<?= $category_post ?>">
                                                                        <?= $title ?>
                                                                    </a>
                                                                </div>
                                                                <div class="price">
                                                            <span class="amount"><?= convert_price($price) ?>
                                                                <span>تومان</span>
                                                            </span>
                                                                </div>
                                                            </section>
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
<!--                            <div class="pagination-product">-->
<!--                                <nav aria-label="Page navigation example">-->
<!--                                    <ul class="pagination">-->
<!--                                        --><?php
//
//                                        $number_of_page = ceil($count_page/$result_per_page);
//                                        $pagLink = "";
//                                        if($page>=2){
//                                            echo "<li class='page-item'>
//                                <a class= 'page-link' href='search.php?page=".($page-1)."' aria-label='Next'>
//                                    <span aria-hidden='true'> &laquo;</span>
//                                </a>
//                            </li>";
//                                        }
//                                        for ($i=1; $i<=$number_of_page; $i++) {
//                                            if ($i == $page) {
//                                                $pagLink .= "<li class='page-item'>
//                                        <a class='page-link' href='search.php?page=". $i ."' >".$i." </a>
//                                    </li>";
//                                            }
//                                            else  {
//                                                $pagLink .= "<li class='page-item'>
//                                        <a class='page-link' href='search.php?page=". $i ."' >".$i." </a>
//                                    </li>";
//
//                                            }
//                                        }
//                                        echo $pagLink;
//                                        if($page<$number_of_page){
//                                            echo "<li class='page-item'>
//                                <a class= 'page-link' href='search.php?page=".($page+1)."' aria-label='Next'>
//                                    <span aria-hidden='true'>&raquo;  </span>
//                                </a>
//                            </li>";
//                                        }
//                                        ?>
<!--                                    </ul>-->
<!--                                </nav>-->
<!--                            </div>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <!-- arshive-product----------------------->

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