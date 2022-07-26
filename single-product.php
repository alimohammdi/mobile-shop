<!DOCTYPE html>
<html lang="fa" dir="rtl">

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

<body>
    <!-- header-------------------------------->
    <?php include('partials-front/header.php');

//send comment start
    if (isset($_POST['submit'])) {
        if (!empty($_SESSION['user-login']) & !empty($_SESSION['email-login'])) {
            if (!empty($_POST['content-question']) ) {
                $full_name = $_SESSION['user-login'];
                $email = $_SESSION['email-login'];
                $content = $_POST['content-question'];
                $date = date('Y-m-d');
                $post_id = $_POST['id_question'];
                $category_post = $_POST['category_question'];
                $confirm = 'no';
                // sql for Do not repeat comments
                $sql_search = "select * from comment_tbl where user_name='$full_name' and content='$content'";
                if(isset($conn)){
                    $res_search = mysqli_query($conn,$sql_search);
                    $count = mysqli_num_rows($res_search);
                    if($count == 0) {
                        $sql_comment = "INSERT INTO comment_tbl SET 
                    user_name = '$full_name',
                    email='$email',
                    post_id = '$post_id',
                    category_post = '$category_post',
                    content='$content',
                    confirmation= '$confirm',
                    date='$date'";
                        $res_comment = mysqli_query($conn, $sql_comment);
                        if ($res_comment) {
                            $_SESSION['send-comment-success'] = "<div class='success'>  نظر شما با موفقیت ثبت شده </div>";
                        }
                    }
                }

            } else {
                $_SESSION['send-comment-error'] = "<div class='alarm'>ارسال نظر موفقیت امیز نبود لطفا همه فیلد ها را پر کنید و دوباره تلاش کنید** </div>";
            }
        } else {
//            user not login
            $_SESSION['send-comment-error-login'] = "<div class='alarm'>  ارسال نظر موفقیت امیز نبود لطفا وارد اکانت خود شوید و دوباره تلاش کنید**</div>";
        }
    }

    if(isset($_GET['id']) & !empty($_GET['id']) & isset($_GET['category'])) {
        $id = $_GET['id'];
        $category = $_GET['category'];
        if ($category == "گوشی هوشمند") {
//        $tbl_name = "products_tbl";

            $sql = "SELECT * FROM  products_tbl WHERE id='$id'";
            if (isset($conn)) {
                $res = mysqli_query($conn, $sql);
                if ($res) {
                    $count = mysqli_num_rows($res);
                    if ($count == 1) {
                        $rows = mysqli_fetch_assoc($res);

                        $fa_title = $rows['fa_title'];
                        $en_title = $rows['en_title'];
                        $content = $rows['content'];
                        $category = $rows['category'];
                        $property = $rows['property'];
                        $camera = $rows['camera'];
                        $camera1 = $rows['camera1'];
                        $camera2 = $rows['camera2'];
                        $network = $rows['network'];
                        $brand = $rows['brand'];
                        $systm = $rows['systm'];
                        $garanty = $rows['garanty'];
                        $ram = $rows['ram'];
                        $rom = $rows['rom'];
                        $count = $rows['available'];
                        $price = $rows['price'];
                        $screen = $rows['screen'];
                        $processor = $rows['processor'];
                        $or_ram = $rows['or_rom'];
                        $structure = $rows['structure'];
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
                        $color = $rows['color'];


                    }
                }
            }
        }
        if ($category == "لپ تاپ") {
//        $tbl_name = "products_tbl";

            $sql = "SELECT * FROM  product_lab WHERE id='$id'";
            if (isset($conn)) {
                $res = mysqli_query($conn, $sql);
                if ($res) {
                    $count = mysqli_num_rows($res);
                    if ($count == 1) {
                        $rows = mysqli_fetch_assoc($res);

                        $fa_title = $rows['fa_title'];
                        $en_title = $rows['en_title'];
                        $content = $rows['content'];
                        $category = $rows['category'];
                        $property = $rows['property'];
                        $brand = $rows['brand'];
                        $cash = $rows['cash'];
                        $cpu_mark = $rows['cpu_mark'];
                        $cpu_graf = $rows['cpu_graf'];
                        $cpu_model = $rows['cpu_model'];
                        $systm = $rows['systm'];
                        $garanty = $rows['garanty'];
                        $ram = $rows['ram'];
                        $rom = $rows['rom'];
                        $count = $rows['available'];
                        $price = $rows['price'];
                        $screen = $rows['screen'];
                        $image_name1 = $rows['image_1'];
                        $image_name2 = $rows['image_2'];
                        $image_name3 = $rows['image_3'];
                        $image_name4 = $rows['image_4'];
                        $sold = $rows['sold'];
                        $connect = $rows['connect'];
                        $port_typec = $rows['port_typec'];
                        $port_usb2 = $rows['port_usb2'];
                        $port_usb3 = $rows['port_usb3'];
                        $date = $rows['date'];
                        $weight = $rows['weight'];
                        $battery = $rows['battery'];
                        $dimensions = $rows['dimensions'];
                        $color = $rows['color'];


                    }
                }
            }
        }
        if ($category == "قاب و گلس") {
//        $tbl_name = "products_tbl";

            $sql = "SELECT * FROM  product_ghab WHERE id='$id'";
            if (isset($conn)) {
                $res = mysqli_query($conn, $sql);
                if ($res) {
                    $count = mysqli_num_rows($res);
                    if ($count == 1) {
                        $rows = mysqli_fetch_assoc($res);

                        $fa_title = $rows['fa_title'];
                        $one_title = $rows['one_title'];
                        $content = $rows['content'];
                        $category = $rows['category'];
                        $brand = $rows['brand'];
                        $count = $rows['available'];
                        $price = $rows['price'];
                        $structure = $rows['structure'];
                        $image_name1 = $rows['image_1'];
                        $image_name2 = $rows['image_2'];
                        $image_name3 = $rows['image_3'];
                        $sold = $rows['sold'];
                        $date = $rows['date'];
                        $weight = $rows['weight'];
                        $property = $rows['property'];
                        $color = $rows['color'];


                    }
                }
            }
        }
        if ($category == "لوازم جانبی") {
//        $tbl_name = "products_tbl";

            $sql = "SELECT * FROM  product_janeb WHERE id='$id'";
            if (isset($conn)) {
                $res = mysqli_query($conn, $sql);
                if ($res) {
                    $count = mysqli_num_rows($res);
                    if ($count == 1) {
                        $rows = mysqli_fetch_assoc($res);

                        $fa_title = $rows['fa_title'];
                        $one_title = $rows['one_title'];
                        $content = $rows['content'];
                        $category = $rows['category'];
                        $label = $rows['label'];
                        $brand = $rows['brand'];
                        $garanty = $rows['garanty'];
                        $count = $rows['available'];
                        $connect = $rows['connect'];
                        $length = $rows['length'];
                        $price = $rows['price'];
                        $structure = $rows['structure'];
                        $image_name1 = $rows['image_1'];
                        $image_name2 = $rows['image_2'];
                        $image_name3 = $rows['image_3'];
                        $sold = $rows['sold'];
                        $date = $rows['date'];
                        $weight = $rows['weight'];
                        $property = $rows['property'];
                        $or_rom = $rows['or_rom'];
                        $color = $rows['color'];
                    }
                }
            }
        }


    }
    ?>
    <!--            php code for add product to cart -->
    <?php
    if(isset($_POST['submit-add-to-cart'])){
        if(isset($_POST['p_id']) & isset($_POST['p_category'])){
            if(isset($_POST['color_code'])){
                $color1 =$_POST['color_code'];
                $color = get_color_name($conn,$color1);
                $p_id = $_POST['p_id'];
                $p_category = $_POST['p_category'];
                $count_pro = $_POST['count_pro'];
                if(isset($_COOKIE["ipUserEcommerce"]))
                {
                    $ip = $_COOKIE["ipUserEcommerce"];
                }else{
                    $ip = getIp();
                    setcookie('ipUserEcommerce',$ip,time()+1206900);
                }
                $sql = "SELECT * FROM cart_tbl WHERE p_id='$p_id' AND p_category='$p_category' AND ip_add='$ip' AND color='$color'";
                if(isset($conn)){
                    $res = mysqli_query($conn,$sql);
                    $count = mysqli_num_rows($res);
                    if($count > 0){
                        $_SESSION['add-cart-alarm'] = "<div class='alarm'>   محصول در سبد خرید موجود است (اگر میخواهید در سفارش تغییر ایجاد کنید لطفا ابتدا محصول را از سبد خرید حذف کنید) </div>";
                        redirect($_SERVER['HTTP_REFERER']);
                    }else{
                        $sql2 = "INSERT INTO cart_tbl (p_id,p_category,ip_add,qty,color) values('$p_id','$p_category','$ip','$count_pro','$color')";
                        $res = mysqli_query($conn,$sql2);
                        if($res){
                            $_SESSION['add-cart-success'] = "<div class='success'> محصول به سبد خرید اضافه شد </div>";
                            $_SESSION['add-cart-true'] = "true";
                            redirect($_SERVER['HTTP_REFERER']);
                        }
                    }
                }
            }else{
                $_SESSION['add-cart-alarm'] = "<div class='alarm'> لطفا رنگ محصول را انتخاب کنید </div>";
                redirect($_SERVER['HTTP_REFERER']);
            }

        }

    }
    ?>
    <!--            end php code -->
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
                                <li class="breadcrumb-item"><a href="home.php">خانه</a></li>
                                <li class="breadcrumb-item"><a >کالای دیجیتال</a></li>
                                <li class="breadcrumb-item"><a href="<?= BASEURL . 'search.php?category='.$category?>"><?= $category ?></a></li>
                                <li class="breadcrumb-item active" aria-current="page"><?= $fa_title ?></li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg">
                        <div class="product type-product">
                            <div class="col-lg-5 col-xs-12 pr d-block" style="padding: 0;">
                                <section class="product-gallery">
                                    <div class="gallery">
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
                                                    <li class="item">
                                                        <a href="#" class="elevatezoom-gallery active" data-update=""
                                                           data-image="<?= "./images/products/". $image_name1 ?>"
                                                           data-zoom-image=<?= "./images/products/". $image_name1 ?>>
                                                            <img src="<?= "./images/products/". $image_name1 ?>"
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
                                    <?php
                                    if(isset($_SESSION['add-cart-success'])){
                                        echo $_SESSION['add-cart-success'] ;
                                        ?>
                                        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                                        <?php
                                        unset ($_SESSION['add-cart-success']) ;
                                    }

                                    if(isset($_SESSION['add-cart-alarm'])){
                                        echo $_SESSION['add-cart-alarm'] ;
                                        unset ($_SESSION['add-cart-alarm']) ;
                                    }

                                    if(isset($_SESSION['send-comment-success'])){
                                        echo $_SESSION['send-comment-success'];
                                        unset ($_SESSION['send-comment-success']);
                                        ?><br>
                                        <?php
                                    }?>
                                    <?php
                                    if(isset($_SESSION['send-comment-error'])){
                                        echo $_SESSION['send-comment-error'];
                                        unset ($_SESSION['send-comment-error']);
                                        ?><br>
                                        <?php
                                    }?>
                                    <?php
                                    if(isset($_SESSION['send-comment-error-login'])){
                                        echo $_SESSION['send-comment-error-login'];
                                        unset ($_SESSION['send-comment-error-login']);
                                        ?><br>
                                        <?php
                                    }?>
                                    <h1 class="product-title">
                                        <?php if(isset($fa_title)){
                                            echo $fa_title;
                                        } ?>
                                    </h1>
                                    <?php
                                    if($sold >= 2){
                                        ?>
                                        <div class="product-guaranteed text-success">
                                            <?= $sold ?>
                                            <span>فروش موفق</span>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                                <div class="product-attributes">
                                    <div class="product-config">
                                        <span class="product-title-en"><?php if(isset($en_title)){
                                                echo $en_title;
                                            }else if(isset($one_title)){
                                            echo $one_title;}
                                            ?></span>
                                    </div>
                                </div>
                                <div class="product-config-wrapper">

                                    <div class="product-directory">
                                        <ul>
                                            <li>
                                                <span>
                                                    <i class="fa fa-archive"></i> دسته:
                                                </span>
                                                <a  class="product-link product-cat-title">
                                                    <?php if($category == "گوشی هوشمند"){echo "کالای دیجیتال" ;}
                                                    if($category == "قاب و گلس"){ echo "لوازم جانبی موبایل" ;}
                                                    if($category == "لپ تاپ"){ echo "کالای دیجیتال" ;}
                                                    if($category == "لوازم جانبی"){ echo $label ;}?>
                                                </a>
                                                ,
                                                <a href="<?= BASEURL . 'search.php?category='.$category?>" class="product-link product-cat-title">
                                                    <?= $category?>
                                                </a>
                                            </li>
                                            <?php if(isset($brand)){
                                                ?>
                                                <li>
                                                <span>
                                                    <i class="fa fa-tags"></i> برند:
                                                </span>
                                                    <a href="<?= BASEURL . 'search.php?category='.$category.'&brand='.$brand?>" class="product-link product-tag-title"><?= $brand ?></a>
                                                </li>
                                            <?php
                                            } ?>

                                        </ul>
                                    </div>
                                    <div class="col=lg-6 col-md-6 col-xs-12 pr">
<!--                                        --><?php
//                                        if($color != NUll){
//                                            ?>
<!--                                            <div class="product-variants">-->
<!--                                                <span>رنگ بندی: </span>-->
<!--                                                <ul class="js-product-variants">-->
<!--                                                    --><?php
//                                                    $cut_color = cut_color($color);
//                                                    foreach ($cut_color as $col){
//                                                       if($col != ""){
//                                                           $color_code = $col;
//                                                           $back_ground_color = "background-color:".$col;
//                                                           ?>
<!--                                                           <li class="ui-variant">-->
<!--                                                               <label for="" class="ui-variant-color">-->
<!--                                                        <span class="ui-variant-shape"-->
<!--                                                              style="--><?//=  $back_ground_color ?><!--"></span>-->
<!--                                                                   <input type="radio" value="--><?//= $color_code ?><!--" name="color" id="variant"-->
<!--                                                                          class="js-variant-selector" checked="">-->
<!--                                                                   <span class="ui-variant-check"></span>-->
<!--                                                               </label>-->
<!--                                                           </li>-->
<!---->
<!--                                                        --><?php
//                                                       }
//                                                    }
//                                                    ?>
<!--                                                </ul>-->
<!--                                            </div>-->
<!--                                        --><?php
//                                        }
//                                        ?>
                                        <div class="product-params pt-3">

                                                <br>
                                                <?php
                                                if($category == "گوشی هوشمند"){
                                                    ?>
                                                    <?php if(isset($systm)){
                                                        ?>
                                                <ul data-title="ویژگی‌های محصول">
                                                        <li>
                                                            <span>سیستم عامل: </span>
                                                            <span><?= $systm ?></span>
                                                        </li>
                                                        <?php
                                                    } ?>
                                                    <?php if(isset($network)){
                                                        ?>
                                                        <li>
                                                            <span>شبکه های ارتباطی: </span>
                                                            <span><?= $network ?></span>
                                                        </li>
                                                        <?php
                                                    } ?>
                                                    <?php if(isset($ram)){
                                                        ?>
                                                        <li>
                                                            <span>مقدار RAM: </span>
                                                            <span><?= $ram ?></span>
                                                        </li>
                                                        <?php
                                                    } ?>
                                                    <?php if(isset($property)){
                                                        ?>
                                                        <li>
                                                            <span>ویژگی‌های خاص: </span>
                                                            <span><?= cot_blog($property) ?></span>
                                                        </li>
                                                        </ul>
                                                        <?php
                                                    } ?>

                                                <?php
                                                }
                                                if($category == "لپ تاپ"){
                                                    ?>
                                                    <?php if(isset($ram)){
                                                        ?>
                                            <ul data-title="ویژگی‌های محصول">
                                            <li>
                                                            <span>توضیحات پردازنده : </span>
                                                            <br>
                                                            <span><?= $ram ?></span>
                                                        </li>
                                                        <?php
                                                    } ?>
                                                    <?php if(isset($rom)){
                                                        ?>
                                                        <li>
                                                            <span>توضیحات حافظه داخلی: </span>
                                                            <br>
                                                            <span><?= $rom ?></span>
                                                        </li>
                                                        <?php
                                                    } ?>

                                                    <?php if(!empty($property)){
                                                        ?>
                                                        <li>
                                                            <span>ویژگی‌های خاص: </span>
                                                            <br>
                                                            <span><?= cot_blog($property) ?></span>
                                                        </li>
                                                        </ul>
                                                        <?php
                                                    } ?>

                                                    <?php
                                                }

                                            if($category == "لوازم جانبی"){
                                            ?>
                                            <?php if(isset($connect)){
                                            ?>
                                            <ul data-title="ویژگی‌های محصول">
                                                <li>
                                                    <span>نوع اتصال : </span>
                                                    <br>
                                                    <span><?= $connect ?></span>
                                                </li>
                                                <?php
                                                } ?>
                                                <?php if(isset($property)){
                                                    ?>
                                                    <li>
                                                        <span>برخی ویژگی های خاص: </span>
                                                        <br>
                                                        <span><?= $property ?></span>
                                                    </li>
                                            </ul>
                                                    <?php
                                                } }?>

                                            </ul>
                                        </div>
<!--                                        <div class="product-price-survey-question">-->
<!--                                            آیا قیمت مناسب‌تری سراغ دارید؟-->
<!--                                            <div class="answers">-->
<!--                                                <a href="#"-->
<!--                                                    class="product-price-survery-answer price-yes btn btn-secondary">بلی</a>-->
<!--                                                <a href="#"-->
<!--                                                    class="product-price-survery-answer price-no btn btn-secondary">خیر</a>-->
<!--                                            </div>-->
<!--                                        </div>-->
                                    </div>

                                        <div class="col=lg-6 col-md-6 col-xs-12 pr">
                                            <form action="" method="post">
                                            <div class="product-seller-info">
                                                <div class="seller-info-changable">
                                                    <div class="product-seller-row vendor">
                                                        <span class="title"> فروشنده:</span>
                                                        <a href="#" class="product-name">شهروند موبایل</a>
                                                    </div>
                                                    <div class="product-seller-row guarantee">
                                                        <span class="title"> گارانتی:</span>
                                                        <a href="#" class="product-name">
                                                            <?php if(isset($garanty)){echo $garanty ;} ?>
                                                        </a>
                                                    </div>
                                                    <div class="product-seller-row price">
                                                        <span class="title"> قیمت:</span>
                                                        <a href="#" class="product-name">
                                                        <span class="amount">
                                                            <?= convert_price($price) ?>
                                                            <span>تومان</span>
                                                        </span>
                                                        </a>
                                                    </div>
                                                    <div class="product-seller-row guarantee">
                                                        <span class="title mt-3"> تعداد:</span>
                                                        <div class="quantity pl">
                                                            <input type="number" name="count_pro" min="1" max="100" step="1" value="1">
                                                            <div class="quantity-nav">
                                                                <div class="quantity-button quantity-up">+</div>
                                                                <div class="quantity-button quantity-down">-</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php
                                                    if($color != NUll){
                                                        ?>
                                                        <div class="product-variants">
                                                            <span>انتخاب رنگ  محصول :                    </span>
                                                            <ul class="js-product-variants">
                                                                <?php
                                                                $cut_color = cut_color($color);
                                                                foreach ($cut_color as $col){
                                                                    if($col != ""){
                                                                        $color_code = $col;
                                                                        $back_ground_color = "background-color:".$col;
                                                                        ?>
                                                                        <li class="ui-variant">
                                                                            <label for="" class="ui-variant-color">
                                                        <span class="ui-variant-shape"
                                                              style="<?=  $back_ground_color ?>"></span>
                                                                                <input type="radio" value="<?= $color_code ?>" name="color_code"
                                                                                       class="js-variant-selector" checked="">
                                                                                <span class="ui-variant-check"></span>
                                                                            </label>
                                                                        </li>

                                                                        <?php
                                                                    }
                                                                }
                                                                ?>
                                                            </ul>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>
                                                    <div class="product-seller-row add-to-cart">

                                                        <?php

                                                        if($count > 0){
                                                            ?>
                                                            <input type="hidden" name="p_id" value="<?= $id ?>">
                                                            <input type="hidden" name="p_category" value="<?= $category ?>">
                                                                <button type="submit" name="submit-add-to-cart"  class="btn btn-primary" style=" margin-right: 45px;" >افزودن به سبد خرید</button>
                                                            <?php
                                                        }else{
                                                            ?>
                                                            <a href="#" class="btn-add-to-cart btn btn-primary">
                                                                <span class="btn-add-to-cart-txt">موجودی محصول به پایان رسیده</span>
                                                            </a>
                                                            <?php
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </section>
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
                            <a class="nav-link" id="Specifications-tab" data-toggle="tab" href="#Specifications"
                                role="tab" aria-controls="Specifications" aria-selected="false">
                                <i class="mdi mdi-format-list-checks"></i>
                                مشخصات
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="question-and-answer-tab" data-toggle="tab"
                                href="#question-and-answer" role="tab" aria-controls="question-and-answer"
                                aria-selected="false">
                                <i class="mdi mdi-comment-question-outline"></i>
                                ارسال نظر ، پرسش و پاسخ
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
                                            <p>
                                                <?php
                                                if(isset($content)){
                                                    echo cot_blog($content);
                                                }
                                                ?>
                                            </p>
                                        </div>
                                        <a href="#" class="mask-handler">
                                            <span class="show-more">+ ادامه مطلب</span>
                                            <span class="show-less">- بستن</span>
                                        </a>
                                        <div class="shadow-box"></div>
                                    </div>
                                </section>
                            </div>
<!--                              مشخصات فنی                    -------------------------------->
                            <div class="tab-pane fade" id="Specifications" role="tabpanel"
                                aria-labelledby="Specifications-tab">
                                <article>
                                    <h2 class="params-headline">مشخصات فنی
                                        <span><?php if(isset($fa_title)){
                                                echo $fa_title;
                                            } ?></span>
                                    </h2>
                                    <?php
                                    if($category == "گوشی هوشمند"){
                                        ?>
                                        <section>
                                            <ul class="params-list">
                                                <?php if(!empty($dimensions)){
                                                    ?>
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
                                                <?php
                                                }?>
                                                <?php if(!empty($simcard)){
                                                    ?>
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
                                                }?>
                                                <?php if(!empty($weight)){
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
                                                    <?php
                                                }?>
                                                <?php if(!empty($structure)){
                                                    ?>
                                                    <li class="params-list-item">
                                                        <div class="params-list-key">
                                                            <span class="block">ساختار بدنه</span>
                                                        </div>
                                                        <div class="params-list-value">
                                                    <span class="block">
                                                        <?= $structure ?>
                                                    </span>
                                                        </div>
                                                    </li>
                                                    <?php
                                                }?>
                                            </ul>
                                        </section>
                                        <section>
                                            <ul class="params-list">
                                                <?php if(!empty($processor)){
                                                    ?>
                                                    <li class="params-list-item">
                                                        <div class="params-list-key">
                                                            <span class="block">پردازنده</span>
                                                        </div>
                                                        <div class="params-list-value">
                                                    <span class="block">
                                                        <?= $processor ?>
                                                    </span>
                                                        </div>
                                                    </li>
                                                    <?php
                                                }?>
                                                <?php if(!empty($network)){
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
                                                }?>
                                                <?php if(!empty($systm)){
                                                    ?>
                                                    <li class="params-list-item">
                                                        <div class="params-list-key">
                                                            <span class="block">سیستم عامل</span>
                                                        </div>
                                                        <div class="params-list-value">
                                                    <span class="block">
                                                        <?= $systm ?>
                                                    </span>
                                                        </div>
                                                    </li>
                                                    <?php
                                                }?>

                                            </ul>
                                        </section>
                                        <section>
                                            <ul class="params-list">
                                                <?php if(!empty($rom)){
                                                    ?>
                                                    <li class="params-list-item">
                                                        <div class="params-list-key">
                                                            <span class="block">توضیحات حافظه داخلی</span>
                                                        </div>
                                                        <div class="params-list-value">
                                                    <span class="block">
                                                        <?= $rom ?>
                                                    </span>
                                                        </div>
                                                    </li>
                                                    <?php
                                                }?>
                                                <?php if(!empty($ram)){
                                                    ?>
                                                    <li class="params-list-item">
                                                        <div class="params-list-key">
                                                            <span class="block">توضیحات ROM</span>
                                                        </div>
                                                        <div class="params-list-value">
                                                    <span class="block">
                                                        <?= $ram ?>
                                                    </span>
                                                        </div>
                                                    </li>
                                                    <?php
                                                }?>
                                                <?php if(!empty($or_ram)){
                                                    ?>
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
                                                    <?php
                                                }?>
                                            </ul>
                                        </section>
                                        <section>
                                            <ul class="params-list">
                                                <?php if(!empty($screen)){
                                                    ?>
                                                    <li class="params-list-item">
                                                        <div class="params-list-key">
                                                            <span class="block">توضیحات صفحه نمایش</span>
                                                        </div>
                                                        <div class="params-list-value">
                                                            <span class="block"><?= $screen ?></span>
                                                        </div>
                                                    </li>
                                                    <?php
                                                }?>
                                            </ul>
                                        </section>
                                        <section>
                                            <ul class="params-list">
                                                <?php if(!empty($rom)){
                                                    ?>
                                                    <li class="params-list-item">
                                                        <div class="params-list-key">
                                                            <span class="block">توضیحات باتری</span>
                                                        </div>
                                                        <div class="params-list-value">
                                                    <span class="block">
                                                        <?= $battery ?>
                                                    </span>
                                                        </div>
                                                    </li>
                                                    <?php
                                                }?>
                                                <?php if(!empty($property)){
                                                    ?>
                                                    <li class="params-list-item">
                                                        <div class="params-list-key">
                                                            <span class="block">ویژگی های خاص</span>
                                                        </div>
                                                        <div class="params-list-value">
                                                    <span class="block">
                                                        <?= $property ?>
                                                    </span>
                                                        </div>
                                                    </li>
                                                    <?php
                                                }?>


                                            </ul>
                                        </section>
                                    <?php
                                    }
                                    ?>
                                    <?php
                                    if($category == "لپ تاپ"){
                                        ?>
                                        <section>
                                            <ul class="params-list">
                                                <?php if(!empty($dimensions)){
                                                    ?>
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
                                                    <?php
                                                }?>
                                                <?php if(!empty($weight)){
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
                                                    <?php
                                                }?>
                                            </ul>
                                        </section>
                                        <section>
                                            <ul class="params-list">
                                                <?php if(!empty($cpu_mark)){
                                                    ?>
                                                    <li class="params-list-item">
                                                        <div class="params-list-key">
                                                            <span class="block">نام پردازنده </span>
                                                        </div>
                                                        <div class="params-list-value">
                                                    <span class="block">
                                                        <?= $cpu_mark ?>
                                                    </span>
                                                        </div>
                                                    </li>
                                                    <?php
                                                }?>
                                                <?php if(!empty($cpu_model)){
                                                    ?>
                                                    <li class="params-list-item">
                                                        <div class="params-list-key">
                                                            <span class="block">توضیحات پردازنده </span>
                                                        </div>
                                                        <div class="params-list-value">
                                                    <span class="block">
                                                        <?= $cpu_model ?>
                                                    </span>
                                                        </div>
                                                    </li>
                                                    <?php
                                                }?>
                                                <?php if(!empty($cpu_graf)){
                                                    ?>
                                                    <li class="params-list-item">
                                                        <div class="params-list-key">
                                                            <span class="block">توضیحات  پردازنده گرافیکی </span>
                                                        </div>
                                                        <div class="params-list-value">
                                                    <span class="block">
                                                        <?= $cpu_graf ?>
                                                    </span>
                                                        </div>
                                                    </li>
                                                    <?php
                                                }?>
                                                <?php if(!empty($connect)){
                                                    ?>
                                                    <li class="params-list-item">
                                                        <div class="params-list-key">
                                                            <span class="block">درگاه‌های ارتباطی</span>
                                                        </div>
                                                        <div class="params-list-value">
                                                    <span class="block">
                                                        <?= $connect ?>
                                                    </span>
                                                        </div>
                                                    </li>
                                                    <?php
                                                }?>
                                                <?php if(!empty($systm)){
                                                    ?>
                                                    <li class="params-list-item">
                                                        <div class="params-list-key">
                                                            <span class="block"> سیستم عامل اولیه</span>
                                                        </div>
                                                        <div class="params-list-value">
                                                    <span class="block">
                                                        <?= $systm ?>
                                                    </span>
                                                        </div>
                                                    </li>
                                                    <?php
                                                }?>

                                            </ul>
                                        </section>
                                        <section>
                                            <ul class="params-list">
                                                <?php if(!empty($rom)){
                                                    ?>
                                                    <li class="params-list-item">
                                                        <div class="params-list-key">
                                                            <span class="block">توضیحات حافظه داخلی</span>
                                                        </div>
                                                        <div class="params-list-value">
                                                    <span class="block">
                                                        <?= $rom ?>
                                                    </span>
                                                        </div>
                                                    </li>
                                                    <?php
                                                }?>
                                                <?php if(!empty($ram)){
                                                    ?>
                                                    <li class="params-list-item">
                                                        <div class="params-list-key">
                                                            <span class="block">توضیحات ROM</span>
                                                        </div>
                                                        <div class="params-list-value">
                                                    <span class="block">
                                                        <?= $ram ?>
                                                    </span>
                                                        </div>
                                                    </li>
                                                    <?php
                                                }?>
                                                <?php if(!empty($cash)){
                                                    ?>
                                                    <li class="params-list-item">
                                                        <div class="params-list-key">
                                                            <span class="block">حافظه cach</span>
                                                        </div>
                                                        <div class="params-list-value">
                                                    <span class="block">
                                                        <?= $cash ?>
                                                    </span>
                                                        </div>
                                                    </li>
                                                    <?php
                                                }?>
                                            </ul>
                                        </section>
                                        <section>
                                            <ul class="params-list">
                                                <?php if(!empty($screen)){
                                                    ?>
                                                    <li class="params-list-item">
                                                        <div class="params-list-key">
                                                            <span class="block">توضیحات صفحه نمایش</span>
                                                        </div>
                                                        <div class="params-list-value">
                                                            <span class="block"><?= $screen ?></span>
                                                        </div>
                                                    </li>
                                                    <?php
                                                }?>
                                                <?php if(!empty($port_usb2)){
                                                    ?>
                                                    <li class="params-list-item">
                                                        <div class="params-list-key">
                                                            <span class="block">پورت USB-2</span>
                                                        </div>
                                                        <div class="params-list-value">
                                                            <span class="block"><?= $port_usb2 ?></span>
                                                        </div>
                                                    </li>
                                                    <?php
                                                }?>
                                                <?php if(!empty($port_usb3)){
                                                    ?>
                                                    <li class="params-list-item">
                                                        <div class="params-list-key">
                                                            <span class="block">پورت USB-3</span>
                                                        </div>
                                                        <div class="params-list-value">
                                                            <span class="block"><?= $port_usb3 ?></span>
                                                        </div>
                                                    </li>
                                                    <?php
                                                }?>
                                                <?php if(!empty($port_typec)){
                                                    ?>
                                                    <li class="params-list-item">
                                                        <div class="params-list-key">
                                                            <span class="block">پورت type-C</span>
                                                        </div>
                                                        <div class="params-list-value">
                                                            <span class="block"><?= $port_typec ?></span>
                                                        </div>
                                                    </li>
                                                    <?php
                                                }?>
                                            </ul>
                                        </section>
                                        <section>
                                            <ul class="params-list">
                                                <?php if(!empty($rom)){
                                                    ?>
                                                    <li class="params-list-item">
                                                        <div class="params-list-key">
                                                            <span class="block">توضیحات باتری</span>
                                                        </div>
                                                        <div class="params-list-value">
                                                    <span class="block">
                                                        <?= $battery ?>
                                                    </span>
                                                        </div>
                                                    </li>
                                                    <?php
                                                }?>
                                                <?php if(!empty($property)){
                                                    ?>
                                                    <li class="params-list-item">
                                                        <div class="params-list-key">
                                                            <span class="block">ویژگی های خاص</span>
                                                        </div>
                                                        <div class="params-list-value">
                                                    <span class="block">
                                                        <?= $property ?>
                                                    </span>
                                                        </div>
                                                    </li>
                                                    <?php
                                                }?>


                                            </ul>
                                        </section>
                                        <?php
                                    }
                                    ?>
                                    <?php
                                    if($category == "قاب و گلس"){
                                    ?>
                                    <section>
                                        <ul class="params-list">
                                            <?php if(!empty($weight)){
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
                                                <?php
                                            }?>
                                            <?php if(!empty($brand)){
                                                ?>
                                                <li class="params-list-item">
                                                    <div class="params-list-key">
                                                        <span class="block">برند</span>
                                                    </div>
                                                    <div class="params-list-value">
                                                    <span class="block">
                                                        <?= $brand ?>
                                                    </span>
                                                    </div>
                                                </li>
                                                <?php
                                            }?>
                                            <?php if(!empty($property)){
                                                ?>
                                                <li class="params-list-item">
                                                    <div class="params-list-key">
                                                        <span class="block">ویژگی های خاص</span>
                                                    </div>
                                                    <div class="params-list-value">
                                                    <span class="block">
                                                        <?= $property ?>
                                                    </span>
                                                    </div>
                                                </li>
                                                <?php
                                            }?>
                                            <?php if(!empty($structure)){
                                                ?>
                                                <li class="params-list-item">
                                                    <div class="params-list-key">
                                                        <span class="block">ساختار و جنس</span>
                                                    </div>
                                                    <div class="params-list-value">
                                                    <span class="block">
                                                        <?= $structure ?>
                                                    </span>
                                                    </div>
                                                </li>
                                                <?php
                                            }?>
                                        </ul>
                                    </section>
                                        <?php
                                    }
                                    ?>
                                    <?php
                                    if($category == "لوازم جانبی"){
                                        ?>
                                        <section>
                                            <ul class="params-list">
                                                <?php if(!empty($weight)){
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
                                                    <?php
                                                }?>
                                                <?php if(!empty($length)){
                                                    ?>
                                                    <li class="params-list-item">
                                                        <div class="params-list-key">
                                                            <span class="block">طول یا ابعاد</span>
                                                        </div>
                                                        <div class="params-list-value">
                                                    <span class="block">
                                                        <?= $length ?>
                                                    </span>
                                                        </div>
                                                    </li>
                                                    <?php
                                                }?>
                                                <?php if(!empty($brand)){
                                                    ?>
                                                    <li class="params-list-item">
                                                        <div class="params-list-key">
                                                            <span class="block">برند</span>
                                                        </div>
                                                        <div class="params-list-value">
                                                    <span class="block">
                                                        <?= $brand ?>
                                                    </span>
                                                        </div>
                                                    </li>
                                                    <?php
                                                }?>
                                                <?php if(!empty($property)){
                                                    ?>
                                                    <li class="params-list-item">
                                                        <div class="params-list-key">
                                                            <span class="block">ویژگی های خاص</span>
                                                        </div>
                                                        <div class="params-list-value">
                                                    <span class="block">
                                                        <?= $property ?>
                                                    </span>
                                                        </div>
                                                    </li>
                                                    <?php
                                                }?>
                                                <?php if(!empty($structure)){
                                                    ?>
                                                    <li class="params-list-item">
                                                        <div class="params-list-key">
                                                            <span class="block">ساختار و جنس</span>
                                                        </div>
                                                        <div class="params-list-value">
                                                    <span class="block">
                                                        <?= $structure ?>
                                                    </span>
                                                        </div>
                                                    </li>
                                                    <?php
                                                }?>
                                                <?php if(!empty($or_rom)){
                                                    ?>
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
                                                    <?php
                                                }?>
                                                <?php if(!empty($connect)){
                                                    ?>
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
                                                    <?php
                                                }?>
                                            </ul>
                                        </section>
                                        <?php
                                    }
                                    ?>
                                </article>
                            </div>
                            <div class="tab-pane fade" id="question-and-answer" role="tabpanel"
                                aria-labelledby="question-and-answer-tab">
                                <div class="faq">
                                    <h2 class="params-headline">ارسال نظر
                                        <span>نظر خود را در مورد محصول مطرح نمایید</span>
                                        <?php
                                        if (empty($_SESSION['user-login'])){
                                            ?>
                                            <br>
                                            <span>برای سوال و نظردهی حتما باید با اکانت خود وارد شوید  :  <a href="login.php">
                                        ورود/ثبت نام
                                    </a></span>
                                        <?php
                                        }
                                        ?>
                                    </h2>

                                    <form action="" method="post">
                                        <div class="form-faq-row mt-4">
                                            <div class="form-faq-col">
                                                <div class="ui-textarea">
                                                    <textarea name="content-question" title="متن نظر به محصول"
                                                        class="ui-textarea-field"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-faq-row mt-4">
                                            <div class="form-faq-col form-faq-col-submit">
                                                <input type="hidden"   name="id_question" value="<?= $id ?>">
                                                <input type="hidden"   name="category_question" value="<?= $category ?>">
                                                <input class="btn-tertiary btn btn-secondary" type="submit" name="submit" value="ثبت پرسش">
                                            </div>
                                        </div>
                                    </form>
                                    <?php
                                    $sql_search_question = "SELECT * FROM comment_tbl WHERE post_id ='$id' AND category_post='$category'";
                                    if(isset($conn)){
                                        $res_sqarch_question = mysqli_query($conn,$sql_search_question);
                                        if($res_sqarch_question){
                                            $count_question = mysqli_num_rows($res_sqarch_question);
                                        }
                                    }
                                    ?>
                                    <div id="product-questions-list">

                                            <?php
                                            if($count_question > 0){
                                                while($rows = mysqli_fetch_assoc($res_sqarch_question)){
                                                    $user_name = $rows['user_name'];
                                                    $content_question = $rows['content'];
                                                    $date = convert_date($rows['date']);
                                                    $answer = $rows['answer'];
                                                    ?>
                                                    <div class="questions-list">
                                                    <ul class="faq-list">
                                                        <li class="is-question">
                                                            <div class="section">
                                                                <div class="faq-header">
                                                                    <span class="icon-faq">?</span>
                                                                    <p class="h5">
                                                                        پرسش :
                                                                        <span><?= $user_name ?></span>
                                                                    </p>
                                                                </div>
                                                                <p><?= $content_question ?></p>
                                                                <div class="faq-date">
                                                                    <em><?= $date ?></em>
                                                                </div>
                                                            </div>
                                                            <?php
                                                            if(!empty($answer)){
                                                                ?>
                                                                <div class="questions-list answer-questions">
                                                                    <ul class="faq-list">
                                                                        <li class="is-question">
                                                                            <div class="section">
                                                                                <div class="faq-header">
                                                                          <span class="icon-faq"><i
                                                                                      class="mdi mdi-storefront"></i></span>
                                                                                    <p class="h5">
                                                                                        پاسخ فروشنده :
                                                                                        <span>دیجیتال شهروند</span>
                                                                                    </p>
                                                                                </div>
                                                                                <p><?= $answer ?></p>
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                    <?php
                                                            }
                                                            ?>
                                                        </li>
                                                    </ul>
                                        </div>
                                            <?php
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
        </div>
    </div>
    </div>
    <!-- arshive-product----------------------->
    <!-- send comment to database and show it-->

    <!-- footer-------------------------------->
    <?= include('./partials-front/footer.php') ?>
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
<script src="assets/js/vendor/lightgallery-all.js"></script>
<script src="assets/js/vendor/jquery.ez-plus.js"></script>
<script src="assets/js/vendor/jquery.nice-select.min.js"></script>
<!-- main js---------------------------------------------------->
<script src="assets/js/main.js"></script>

</html>