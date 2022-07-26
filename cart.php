<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>سبد خرید</title>
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
<?PHP
include('./partials-front/header.php')
?>
    <!-- header-------------------------------->

    <!-- cart---------------------------------->
    <div class="container-main">
        <div class="d-block">
            <div class="main-row">
                <div id="breadcrumb">
                    <i class="mdi mdi-home"></i>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">خانه</a></li>
                            <li class="breadcrumb-item active" aria-current="page">سبد خرید</li>
                        </ol>
                    </nav>
                </div>
                <section class="cart-home">
                    <div class="post-item-cart d-block order-2">
                        <div class="content-page">
                            <div class="cart-form">
                                <form action="#" method="post" class="c-form">
                                    <table class="table-cart cart table table-borderless">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="product-cart-name">نام محصول</th>
                                                <th scope="col" class="product-cart-price">قیمت</th>
                                                <th scope="col" class="product-cart-quantity">تعداد</th>
                                                <th scope="col" class="product-cart-quantity"></th>

                                                <th scope="col" class="product-cart-price">مجموع</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $ip = get_ip();
                                        $sql = "SELECT * FROM cart_tbl WHERE ip_add='$ip'";
                                        if(isset($conn)){
                                            $res=mysqli_query($conn,$sql);
                                        $count = mysqli_num_rows($res);
                                        if($res){
                                        while($row = mysqli_fetch_array($res)){
                                        $pro_id = $row['p_id'];
                                        $pro_category = $row['p_category'];
                                        $pro_qty = $row['qty'];
                                        $color = $row['color'];
                                        $color_code = get_color_code($conn,$color);
                                        $back_ground_color = "background-color:".$color_code;
                                        if($pro_category == "گوشی هوشمند"){
                                            $pro_sql = "SELECT price,image_1,fa_title FROM products_tbl WHERE id='$pro_id'";
                                            $image_path = "images/products/mobile/";
                                        }
                                        if($pro_category == "لپ تاپ"){
                                            $pro_sql = "select price,image_1,fa_title from product_lab where id='$pro_id'";
                                            $image_path = "images/products/lab/";
                                        }
                                        if($pro_category == "لوازم جانبی"){
                                            $pro_sql = "select price,image_1,fa_title from product_janeb where id='$pro_id'";
                                            $image_path = "images/products/janebi/";
                                        }
                                        if($pro_category == "قاب و گلس"){
                                            $pro_sql = "select price,image_1,fa_title from product_ghab where id='$pro_id'";
                                            $image_path = "images/products/ghab/";
                                        }
                                        if(isset($pro_sql)){
                                                $res2 = mysqli_query($conn,$pro_sql);
                                                $price = 0;
                                        if($res2){
                                            while($rows = mysqli_fetch_assoc($res2)){
                                                $base_price = $rows['price'];
                                                $product_price = array($rows['price']*$pro_qty);
                                                $values = array_sum($product_price);
                                                $price += $values;
                                                $image_name = $rows['image_1'];
                                                $fa_title = $rows['fa_title'];
                                        ?>
                                            <tr>
                                                <th scope="row" class="product-cart-name">
                                                    <div class="product-thumbnail-img">
                                                        <a href="#">
                                                            <img src="<?= 'images/products/' . $image_name ?>">
                                                        </a>
                                                        <div class="product-remove">
                                                            <a href="<?= BASEURL."delete-product-cart.php" ?>?p_id=<?=$pro_id ?>&p_category=<?= $pro_category ?>&color=<?= $color ?>" class="remove">
                                                                <i class="mdi mdi-close"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="product-title">
                                                        <a href="#">
                                                            <?= $fa_title ?>
                                                        </a>
                                                        <div class="variation">


                                                            <div class="variant-color">
                                                                <span class="variant-color-title"><?= $color ?></span>
                                                                <div class="variant-shape" style="<?= $back_ground_color ?>"></div>
                                                            </div>
                                                            <div class="variant-guarantee">
                                                                <i class="mdi mdi-check"></i>
                                                                گارانتی ۱۸ ماهه
                                                            </div>
                                                            <div class="seller">
                                                                <i class="mdi mdi-storefront"></i>
                                                                فروشنده :
                                                                <span>دیجیتال شهروند </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </th>
                                                <td class="product-cart-price">
                                                    <span class="amount"><?= convert_price($base_price) ?>
                                                        <span>تومان</span>
                                                    </span>
                                                </td>

                                                <td class="product-cart-quantity">
                                                    <div class="required-number before">
                                                        <h5><?= $pro_qty ?></h5>

                                                    </div>
                                                </td>
                                                <td class="product-cart-Total">
                                                    <span class="amount"><?= convert_price($price) ?>
                                                        <span>تومان</span>
                                                    </span>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                        }
                                        }}
                                        }
                                        }
                                        ?>
                                        </tbody>
                                        <?php
                                        if(isset($_SESSION['update-cart-alarm'])){
                                        echo $_SESSION['update-cart-alarm'] ;
                                        unset ($_SESSION['update-cart-alarm']) ;
                                        }
                                        ?>
                                    </table>
                                </form>
                                <div class="cart-collaterals">
                                    <div class="totals d-block">
                                        <h3 class="Total-cart-total">مجموع کل سبد خرید</h3>
                                        <div class="checkout-summary">
                                            <ul class="checkout-summary-summary">
                                                <li class="cart-subtotal">
                                                    <span class="amount">قیمت کل</span>
                                                    <span> <?php $obj_cart = new cart();
                                                   echo convert_price($obj_cart->get_product_prices($conn)) ?> تومان</span>
                                                </li>
                                                <li class="shipping-totals">
                                                    <span class="amount">حمل و نقل</span>
                                                    <div class="shipping-totals-item">
                                                        <div class="shipping-totals-outline">
                                                            <label for="#" class="shipping-totals-title-row">
                                                                <div class="shipping-totals-title">هزینه ارسال پستی : 20,000 تومان
                                                                </div>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="order-total">
                                                    <span class="amount"> مجموع</span>
                                                    <span>  <?php $end_price = $obj_cart->get_product_prices($conn);
                                                        $end_price = $end_price + 20000 ;
                                                        $_SESSION['price_total_purchase'] = $end_price;
                                                        echo convert_price($end_price)?> تومان</span>
                                                </li>
                                                <form action="" method="post" >
                                                    <li class="discount-code">
                                                        <div class=" align-items-center">
                                                            <div class="col-md-2 pl mt-5">
                                                                <input type="submit"  class="btn btn-primary proceed-to-checkout" value="پرداخت">
                                                            </div>
                                                            <h3>    <span class="error"> درگاه پرداخت به زودی راه اندازی خواهد شد در صورتی که تصمیم به خرید دارید از طریق لطفا واتس اپ با ما ارتباط بگیرید :  <a
                                                                            href="
https://wa.me/9384809882"> ارتباط از طریق واتس اپ</a></span>
                                                            </h3>
                                                         </div>
                                                    </li>
                                                </form>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <!-- cart---------------------------------->
<?php
if(isset($_POST['submit-pay'])){
//creating or using cookie
    if(isset($_COOKIE["ipUserEcommerce"]))
    {
        $ip	= $_COOKIE["ipUserEcommerce"];
    }else{
        $ip=getIp();
        setcookie('ipUserEcommerce',$ip,time()+1206900);
    }
    $total_price = $_SESSION['price_total_purchase'];
    $query_search="SELECT * FROM total WHERE ip LIKE '%{$ip}%'";

    $result_search=mysqli_query($conn,$query_search);
    while ($row = mysqli_fetch_array($result_search))
    {
        $ip_search=$row['ip'];
    }
    if($ip == $ip_search){
        mysqli_query($conn,"update total set price_total_purchase='$total_price' ");
    }else{

        $query = "INSERT INTO total	(ip,price_total_purchase)VALUES('$ip','$total_price')";

        $run_c = mysqli_query($conn, $query);
    }

        if(isset($_SESSION['user-login'])){
            redirect(BASEURL . "payment.php");
        }else{
            $_SESSION['massage-pay'] = "<div class='alarm'> <h6>لطفا برای ادامه فرایند خرید وارد اکانت خود در شهروند موبایل شوید</h6></div>";
            redirect(BASEURL . "login.php");
        }


}
?>
    <!-- footer-------------------------------->
<?PHP
include('./partials-front/footer.php')
?>
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