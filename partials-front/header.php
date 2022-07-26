<?php
include('./inc/functions.php');
$_SESSION['path'] = $_SERVER['REQUEST_URI'];
?>
<!-- header-------------------------------->
<header class="header-main">
    <div class="container-main">
        <div class="d-block">
            <section class="h-main-row">
                <div class="col-lg-9 col-md-12 col-xs-12 pr">
                    <div class="header-right">
                        <div class="col-lg-3 pr">
                            <div class="header-logo row text-right">
                                <a href="home.php">
                                    <img src="assets/images/new-logo.png" alt="شهروند موبایل">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-8 pr">
                            <div class="header-search row text-right">
                                <div class="header-search-box">
                                    <form action="#" method="post" class="form-search">
                                        <input type="search" class="header-search-input" name="search-input" value="<?php if(isset($_SESSION['text-search'])){echo $_SESSION['text-search'] ;} ?>"
                                               placeholder="دسته بندی را انتخاب کنید و سپس نام کالا و یا  برند  مورد نظر خود را جستجو کنید…">
                                        <div class="action-btns">
                                            <button  class="btn btn-search" type="submit" name="search-submit">
                                                <img src="assets/images/search.png" alt="search">
                                            </button>
                                            <div class="search-filter">
                                                <div class="form-ui">
                                                    <div class="custom-select-ui">
                                                        <select class="right" name="search-category" value="<?php if(isset($_SESSION['category-search'])){echo $_SESSION['category-search'] ;} ?>" >
                                                            <option>همه دسته ها</option>
                                                            <option>گوشی هوشمند</option>
                                                            <option>لپ تاپ</option>
                                                            <option>لوازم جانبی</option>
                                                            <option>قاب و گلس</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <?php
                                    if(isset($_POST['search-submit']) & !empty($_POST['search-input'])){
                                        if(isset($_POST['search-category'])){
                                            $_SESSION['text-search']=$_POST['search-input'] ;
                                            $_SESSION['category-search']=$_POST['search-category'] ;
                                        }
                                        redirect(BASEURL.'search-products.php');

                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-0 col-xs-12 pl">
                    <div class="header-left">
                        <div class="header-account text-left">
                            <div class="d-block">
                                <div class="account-box">
                                    <?php
                                    if(isset($_SESSION['user-login'])){
                                        ?>
                                        <div class="nav-account d-block pl">
                                            <span class="icon-account">
                                                <img src="assets/images/man.png" class="avator">
                                            </span>
                                            <?php
                                            if(isset($_SESSION['user-login'])){
                                                ?>
                                                <span class="title-account"><?= $_SESSION['user-login'] ?></span>
                                            <?php
                                            }
                                            ?>
                                            <div class="dropdown-menu">
                                                <ul class="account-uls mb-0">
                                                    <li class="account-item">
                                                        <a href="profile.php" class="account-link">پنل کاربری</a>
                                                    </li>
                                                    <li class="account-item">
                                                        <a href="#" class="account-link">سفارشات من</a>
                                                    </li>
                                                    <li class="account-item">
                                                        <a href="logout.php" class="account-link">خروج</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    <?php
                                    }else{
                                        ?>
                                        <div class="nav-account d-block pl">
                                            <span class="icon-account">
                                                <img src="assets/images/man.png" class="avator">
                                            </span>
                                                <a href="<?= BASEURL.'login.php' ?>"><span class="title-account">ورود</span></a>
                                            <a href="#"><span class="title-account">/</span></a>
                                                <a href="<?= BASEURL.'register.php' ?>"><span class="title-account">ثبت نام</span></a>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
<!--            start navbar and category products ------------------------>
            <nav class="header-main-nav">
                <div class="d-block">
                    <div class="align-items-center">
                        <ul class="menu-ul mega-menu-level-one">
                            <li id="nav-menu-item" class="menu-item nav-overlay">
                                <a href="" class="current-link-menu">
                                    کالای دیجیتال
                                </a>
                                <ul class="sub-menu is-mega-menu mega-menu-level-two">
                                    <li class="menu-mega-item menu-item-type-mega-menu">
                                        <a href="<?= BASEURL.'search.php' ?>?category=گوشی هوشمند" class="mega-menu-link">
                                            موبایل و تبلت
                                        </a>
                                        <ul class="sub-menu mega-menu-level-three">
                                        <?php
                                        $sql_for_mobile_brand = "select DISTINCT brand,category from products_tbl where category='گوشی هوشمند'";
                                        if(isset($conn)){
                                            $res_for_mobile_brand = mysqli_query($conn, $sql_for_mobile_brand);
                                            if($res_for_mobile_brand){
                                                while($row_brand = mysqli_fetch_assoc($res_for_mobile_brand)){
                                                    $title_brand = $row_brand['brand'];
                                                    $category_brand = $row_brand['category'];
                                                    ?>
                                                    <li class="menu-mega-item-three">
                                                        <a href="<?= BASEURL.'search.php' ?>?brand=<?= $title_brand ?>&category=<?= $category_brand ?>">
                                                            <?= $title_brand ?>
                                                        </a>
                                                    </li>
                                        <?php
                                                }
                                            }
                                        }
                                        ?>
                                        </ul>
                                    </li>
                                    <li class="menu-mega-item menu-item-type-mega-menu">
                                        <a href="<?= BASEURL.'search.php' ?>?category=لپ تاپ" class="mega-menu-link">
                                            لپ تاپ و کامپیوتر
                                        </a>
                                        <ul class="sub-menu mega-menu-level-three">
                                            <?php
                                            $sql_for_laptop_brand = "select DISTINCT brand,category from product_lab where category='لپ تاپ'";
                                            if(isset($conn)){
                                                $res_for_laptop_brand = mysqli_query($conn, $sql_for_laptop_brand);
                                                if($res_for_laptop_brand){
                                                    while($row_brand = mysqli_fetch_assoc($res_for_laptop_brand)){
                                                        $title_brand = $row_brand['brand'];
                                                        $category_brand = $row_brand['category'];
                                                        ?>
                                                        <li class="menu-mega-item-three">
                                                            <a href="<?= BASEURL.'search.php' ?>?brand=<?= $title_brand ?>&category=<?= $category_brand ?>">
                                                                <?= $title_brand ?>
                                                            </a>
                                                        </li>
                                                        <?php
                                                    }
                                                }
                                            }
                                            ?>
                                        </ul>
                                    </li>
                                    <li class="menu-mega-item menu-item-type-mega-menu">
                                        <a href="<?= BASEURL.'search.php' ?>?category=لوازم جانبی" class="mega-menu-link">
                                             تجهیزات جانبی
                                        </a>
                                        <ul class="sub-menu mega-menu-level-three">
                                            <?php
                                            $sql_for_janeb = "select DISTINCT label,category from product_janeb where category='لوازم جانبی'";
                                            if(isset($conn)){
                                                $res_for_janeb = mysqli_query($conn, $sql_for_janeb);
                                                if($res_for_janeb){
                                                    while($row_brand = mysqli_fetch_assoc($res_for_janeb)){
                                                        $label= $row_brand['label'];
                                                        $category_brand = $row_brand['category'];
                                                        ?>
                                                        <li class="menu-mega-item-three">
                                                            <a href="<?= BASEURL.'search.php' ?>?category=لوازم جانبی&label=<?= $label ?>">
                                                                <?= $label ?>
                                                            </a>
                                                        </li>
                                                        <?php
                                                    }
                                                }
                                            }
                                            ?>
                                        </ul>
                                    </li>
                                    <li class="bg-image">
                                        <img src="assets/images/menu-main/digital.png" alt="">
                                    </li>
                                </ul>
                            </li>
                            <li id="nav-menu-item" class="menu-item nav-overlay">
                                <a href="<?= BASEURL.'search.php' ?>?category=قاب و گلس" class="current-link-menu">
                                    انواع قاب
                                </a>
                                <ul class="sub-menu is-mega-menu-small">
                                    <?php
                                    $sql_for_ghab = "SELECT DISTINCT brand,category from product_ghab where category='قاب و گلس'";
                                    if(isset($conn)){
                                        $res_for_ghab = mysqli_query($conn, $sql_for_ghab);
                                        if($res_for_ghab){
                                            while($row_brand = mysqli_fetch_assoc($res_for_ghab)){
                                                $title_brand = $row_brand['brand'];
                                                $category_brand = $row_brand['category'];
                                                ?>
                                                <li class="menu-mega-item-three">
                                                    <a href="<?= BASEURL.'search.php' ?>?brand=<?= $title_brand ?>&category=<?= $category_brand ?>">
                                                        <?= $title_brand ?>
                                                    </a>
                                                </li>
                                                <?php
                                            }
                                        }
                                    }
                                    ?>
                                </ul>
                            </li>
                            <li id="nav-menu-item" class="menu-item nav-overlay">
                                <a href="<?= BASEURL.'search.php' ?>?category=لوازم جانبی" class="current-link-menu">
                                    تجهیزات جانبی
                                </a>
                                <ul class="sub-menu is-mega-menu-small">
                                    <?php
                                    $sql_for_janeb = "select DISTINCT label,category from product_janeb where category='لوازم جانبی'";
                                    if(isset($conn)){
                                        $res_for_janeb = mysqli_query($conn, $sql_for_janeb);
                                        if($res_for_janeb){
                                            while($row_brand = mysqli_fetch_assoc($res_for_janeb)){
                                                $label= $row_brand['label'];
                                                $category_brand = $row_brand['category'];
                                                ?>
                                                <li class="menu-mega-item-three">
                                                    <a href="<?= BASEURL.'search.php' ?>?category=لوازم جانبی&label=<?= $label ?>">
                                                        <?= $label ?>
                                                    </a>
                                                </li>
                                                <?php
                                            }
                                        }
                                    }
                                    ?>
                                </ul>
                            </li>

                            <li id="nav-menu-item" class="menu-item">
                                <a href="<?= BASEURL.'search.php' ?>?category=لوازم جانبی&label=تجهیزات سرگرمی" class="current-link-menu">
                                    تجهیزات سرگرمی
                                </a>
                            </li>
                            <li id=" nav-menu-item" class="menu-item">
                                <a href="blog.php" class="current-link-menu">
                                    وبلاگ
                                </a>
                            </li>
                            <li id=" nav-menu-item" class="menu-item">
                                <a href="contact-us.php" class="current-link-menu">
                                    ارتباط با ما
                                </a>
                            </li>
                            <li id=" nav-menu-item" class="menu-item">
                                <a href="about.php" class="current-link-menu">
                                    درباره ما
                                </a>
                            </li>

<!--                               cart page     ------------------------------------------------------------------------------------- -->
                            <li class="divider-space-card d-block">
                                <div class="header-cart-basket">
                                    <?php
                                    $obj_cart = new cart();
                                    $count = $obj_cart->count_product($conn);
                                    if($count > 0){
                                        ?>
                                        <a href="<?= BASEURL.'cart.php'?>" class="cart-basket-box">
                                            <span class="icon-cart">
                                                <i class="mdi mdi-shopping"></i>
                                            </span>
                                            <span class="title-cart">سبد خرید</span>
                                            <span class="price-cart">
                                                <?php
                                                if(isset($conn)){
                                                    $obj_cart = new cart();
                                                    echo $end_price = convert_price($obj_cart->get_product_prices($conn));
                                                }
                                                ?>
                                                <span>تومان</span>
                                            </span>
                                            <span class="count-cart"><?php echo $num =  $obj_cart->count_product($conn) ; ?></span>
                                        </a>
                                            <?php
                                    }else if($count == 0){
                                        ?>
                                        <a href="cart-empty.php" class="cart-basket-box">
                                            <span class="icon-cart">
                                                <i class="mdi mdi-shopping"></i>
                                            </span>
                                            <span class="title-cart">سبد خرید</span>
                                            <span class="price-cart">0
                                                <span>تومان</span>
                                            </span>
                                            <span class="count-cart">0</span>
                                        </a>
                                    <?php
                                    }
                                    if ($count > 0){
                                        ?>
                                    <div class="widget-shopping-cart">
                                        <div class="widget-shopping-cart-content">
                                            <div class="wrapper">
                                                <div class="scrollbar" id="style-1">
                                                    <div class="force-overflow">
                                                        <?php
                                                        if(isset($_SESSION['add-cart-true'])){
                                                            ?>
                                                            <ul class="product-list-widget">
                                                                <?php
                                                                $ip = get_ip();
                                                                $sql = "SELECT * FROM cart_tbl WHERE ip_add='$ip'";
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
                                                                        }
                                                                        if($pro_category == "لپ تاپ"){
                                                                            $pro_sql = "select price,image_1,fa_title from product_lab where id='$pro_id'";
                                                                        }
                                                                        if($pro_category == "لوازم جانبی"){
                                                                            $pro_sql = "select price,image_1,fa_title from product_janeb where id='$pro_id'";
                                                                        }
                                                                        if($pro_category == "قاب و گلس"){
                                                                            $pro_sql = "select price,image_1,fa_title from product_ghab where id='$pro_id'";
                                                                        }
                                                                        if(isset($pro_sql)){
                                                                            $res2 = mysqli_query($conn,$pro_sql);
                                                                            $price = 0;
                                                                            if($res2){
                                                                                while($rows = mysqli_fetch_assoc($res2)){
                                                                                    $product_price = array($rows['price']*$pro_qty);
                                                                                    $values = array_sum($product_price);
                                                                                    $price += $values;
                                                                                    $image_name = $rows['image_1'];
                                                                                    $fa_title = $rows['fa_title'];
                                                                                    ?>
                                                                                    <li class="mini-cart-item">
                                                                                        <div class="mini-cart-item-content">
                                                                                            <a href="<?= BASEURL."delete-product-cart.php" ?>?p_id=<?=$pro_id ?>&p_category=<?= $pro_category ?>&color=<?= $color ?>" class="mini-cart-item-close">
                                                                                                <i class="mdi mdi-close"></i>
                                                                                            </a>
                                                                                            <a href="#" class="mini-cart-item-image d-block">
                                                                                                <img src="<?= 'images/products/'.$image_name ?>">
                                                                                            </a>
                                                                                            <span class="product-name-card"><?= $fa_title ?> </span>
                                                                                            <div class="variation">
                                                                                        <span class="variation-n">فروشنده :
                                                                                        </span>
                                                                                                <p class="mb-0">دیجیتال شهروند</p>
                                                                                            </div>
                                                                                            <div
                                                                                                    class="header-basket-list-item-color-badge">
                                                                                                رنگ:
                                                                                                <span style="<?= $back_ground_color ?>"></span>
                                                                                            </div>
                                                                                            <div class="quantity">
                                                                                        <span class="quantity-Price-amount">
                                                                                            <?= convert_price($price) ?>
                                                                                            <span>تومان</span>
                                                                                        </span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </li>
                                                                                    <?php
                                                                                }
                                                                            }
                                                                        }
                                                                    }
                                                                }
                                                                ?>
                                                            </ul>
                                                            <?php
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mini-card-total">
                                                <strong>قیمت کل : </strong>
                                                <span class="price-total">  <?php
                                                    if(isset($conn)){
                                                        echo $end_price = convert_price($obj_cart->get_product_prices($conn));
                                                    }
                                                    ?>
                                                        <span>تومان</span>
                                                    </span>
                                            </div>
                                            <div class="mini-card-button">
                                                <a href="<?= BASEURL . 'cart.php' ?>" class="view-card">مشاهده سبد خرید</a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                    <?php
                                    }
                                    ?>

                            </li>
<!--                                 cart                                    -->
                        </ul>
                    </div>
                </div>
            </nav>
            <!--    responsive-megamenu-mobile------------------------------------------------------------------------------------------->
            <nav class="sidebar">
                <div class="nav-header">
                    <div class="header-cover"></div>
                    <div class="logo-wrap">
                        <a class="logo-icon" href="#"><img alt="logo-icon" src="assets/images/new-logo.png"
                                                           width="40"></a>
                    </div>
                </div>
                <ul class="nav-categories ul-base">
                    <li>
                        <a href="#" class="collapsed" type="button" data-toggle="collapse"
                           data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne"><i
                                class="mdi mdi-chevron-down"></i>کالای دیجیتال</a>
                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne"
                             data-parent="#accordionExample" style="">
                            <ul>
                                <li class="has-sub"><a href="<?= BASEURL.'search.php' ?>?category=گوشی هوشمند" class="category-level-2">گوشی هوشمند</a>
                                    <ul class="sub-menu mega-menu-level-three">
                                        <?php
                                        $sql_for_mobile_brand = "select * from brands_tbl where category='گوشی هوشمند'";
                                        if(isset($conn)){
                                            $res_for_mobile_brand = mysqli_query($conn, $sql_for_mobile_brand);
                                            if($res_for_mobile_brand){
                                                while($row_brand = mysqli_fetch_assoc($res_for_mobile_brand)){
                                                    $title_brand = $row_brand['title'];
                                                    $category_brand = $row_brand['category'];
                                                    ?>
                                                    <li class="menu-mega-item-three">
                                                        <a href="<?= BASEURL.'search.php' ?>?brand=<?= $title_brand ?>&category=<?= $category_brand ?>">
                                                            <?= $title_brand ?>
                                                        </a>
                                                    </li>
                                                    <?php
                                                }
                                            }
                                        }
                                        ?>
                                    </ul>
                                </li>
                                <li class="has-sub"><a href="<?= BASEURL.'search.php' ?>?category=لپ تاپ" class="category-level-2">لپ تاپ</a>
                                    <ul class="sub-menu mega-menu-level-three">
                                        <?php
                                        $sql_for_laptop_brand = "select * from brands_tbl where category='لپ تاپ'";
                                        if(isset($conn)){
                                            $res_for_laptop_brand = mysqli_query($conn, $sql_for_laptop_brand);
                                            if($res_for_laptop_brand){
                                                while($row_brand = mysqli_fetch_assoc($res_for_laptop_brand)){
                                                    $title_brand = $row_brand['title'];
                                                    $category_brand = $row_brand['category'];
                                                    ?>
                                                    <li class="menu-mega-item-three">
                                                        <a href="<?= BASEURL.'search.php' ?>?brand=<?= $title_brand ?>&category=<?= $category_brand ?>">
                                                            <?= $title_brand ?>
                                                        </a>
                                                    </li>
                                                    <?php
                                                }
                                            }
                                        }
                                        ?>
                                    </ul>
                                </li>
                                <li class="has-sub"><a href="<?= BASEURL.'search.php' ?>?category=لوازم جانبی" class="category-level-2">تجهیزات جانبی</a>
                                    <ul class="sub-menu mega-menu-level-three">
                                        <li class="menu-mega-item-three">
                                            <a href="<?= BASEURL.'search.php' ?>?category=لوازم جانبی&label=کابل و شارژر">
                                                کابل و شارژر
                                            </a>
                                        </li>
                                        <li class="menu-mega-item-three">
                                            <a href="<?= BASEURL.'search.php' ?>?category=لوازم جانبی&label=ماوس و کیبرد">
                                                کیبورد و ماوس
                                            </a>
                                        </li>
                                        <li class="menu-mega-item-three">
                                            <a href="<?= BASEURL.'search.php' ?>?category=لوازم جانبی&label=هندزفری و هدفون">
                                                هندزفری و هدفون
                                            </a>
                                        </li>
                                        <li class="menu-mega-item-three">
                                            <a href="<?= BASEURL.'search.php' ?>?category=لوازم جانبی&label=باند و اسپیکر">
                                                باند و اسپیکر
                                            </a>
                                        </li>
                                        <li class="menu-mega-item-three">
                                            <a href="<?= BASEURL.'search.php' ?>?category=لوازم جانبی&label=حافظه های جانبی">
                                                حافظه های جانبی
                                            </a>
                                        </li>
                                        <li class="menu-mega-item-three">
                                            <a href="<?= BASEURL.'search.php' ?>?category=لوازم جانبی&label=مودم و تجهیزات شبکه">
                                                مودم و تجهیزات شبکه
                                            </a>
                                        </li>
                                        <li class="menu-mega-item-three">
                                            <a href="<?= BASEURL.'search.php' ?>?category=لوازم جانبی&label=سایر محصولات جانبی">
                                                سایر محصولات جانبی
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="has-sub"><a href="<?= BASEURL.'search.php' ?>?category=قاب و گلس" class="category-level-2">انواع قاب موبایل</a>
                                    <ul class="sub-menu mega-menu-level-three">
                                        <?php
                                        $sql_for_mobile_brand = "select * from brands_tbl where category='گوشی هوشمند' ";
                                        if(isset($conn)){
                                            $res_for_mobile_brand = mysqli_query($conn, $sql_for_mobile_brand);
                                            if($res_for_mobile_brand){
                                                while($row_brand = mysqli_fetch_assoc($res_for_mobile_brand)){
                                                    $title_brand = $row_brand['title'];
                                                    $category_brand = $row_brand['category'];
                                                    ?>
                                                    <li class="menu-mega-item-three">
                                                        <a href="<?= BASEURL.'search.php' ?>?brand=<?= $title_brand ?>&category=<?= $category_brand ?>">
                                                            <?= $title_brand ?>
                                                        </a>
                                                    </li>
                                                    <?php
                                                }
                                            }
                                        }
                                        ?>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li id="nav-menu-item" class="menu-item">
                        <a href="<?= BASEURL.'search.php' ?>?category=گوشی هوشمند" class="current-link-menu">
                            تبلت و گوشی هوشمند
                        </a>
                    </li>
                    <li id="nav-menu-item" class="menu-item">
                        <a href="<?= BASEURL.'search.php' ?>?category=لپ تاپ" class="current-link-menu">
                            لپ تاپ
                        </a>
                    </li>
                    <li id="nav-menu-item" class="menu-item">
                        <a href="<?= BASEURL.'search.php' ?>?category=قاب و گلس " class="current-link-menu">
                            انواع قاب و گلس
                        </a>
                    </li>
                    <li id="nav-menu-item" class="menu-item">
                        <a href="<?= BASEURL.'search.php' ?>?category=لوازم جانبی" class="current-link-menu">
                            تجهیزات جانبی
                        </a>
                    </li>
                    <li id=" nav-menu-item" class="menu-item">
                        <a href="blog.php" class="current-link-menu">
                            وبلاگ
                        </a>
                    </li>
                    <li id=" nav-menu-item" class="menu-item">
                        <a href="contact-us.php" class="current-link-menu">
                            ارتباط با ما
                        </a>
                    </li>
                    <li id=" nav-menu-item" class="menu-item">
                        <a href="about.php" class="current-link-menu">
                            درباره ما
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="nav-btn nav-slider">
                <span class="linee1"></span>
                <span class="linee2"></span>
                <span class="linee3"></span>
            </div>
            <div class="overlay"></div>
            <!-- bottom-menu-joomy -->
            <div class="bottom-menu-joomy">
                <ul class="mb-0">
                    <li>
                        <a href="home.php">
                            <i class="fa fa-home"></i>
                            صفحه اصلی
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="nav-btn nav-slider">
                                <i class="fa fa-bars" aria-hidden="true"></i>
                            </div>
                            دسته بندی ها
                        </a>
                    </li>
                    <li>
                       <?php
                       if(isset($_SESSION['add-cart-true'])){
                           ?>
                           <a href="cart.php">
                               <i class="fa fa-shopping-cart"></i>
                               سبد خرید
                               <div class="shopping-bag-item"><?php echo $num =  $obj_cart->count_product($conn) ; ?></div>
                           </a>
                        <?php
                       }else{
                           ?>
                           <a href="cart-empty.php">
                               <i class="fa fa-shopping-cart"></i>
                               سبد خرید
                               <div class="shopping-bag-item"><?php echo $num =  $obj_cart->count_product($conn) ; ?></div>
                           </a>
                        <?php
                       }
                       ?>
                    </li>
                    <li>
                        <a href="#" data-toggle="modal" data-target="#exampleModalCenter">
                            <i class="fa fa-search"></i>
                            جستجو
                        </a>
                    </li>
                    <li>
                        <a href="profile.php">
                            <i class="fa fa-user"></i>
                            حساب کاربری
                        </a>
                    </li>
                </ul>
            </div>
            <!--    responsive-megamenu-mobile----------------->
        </div>
    </div>
</header>
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">جستجو</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="header-search text-right">
                    <div class="header-search-box">
                        <form action="#" method="post" class="form-search">
                            <input type="search" class="header-search-input" name="search-input" value="<?php if(isset($_SESSION['text-search'])){echo $_SESSION['text-search'] ;} ?>"
                                   placeholder="دسته بندی را انتخاب کنید و سپس نام کالا و یا  برند  مورد نظر خود را جستجو کنید…">
                            <div class="action-btns">
                                <button  class="btn btn-search" type="submit" name="search-submit">
                                    <img src="assets/images/search.png" alt="search">
                                </button>
                                <div class="search-filter">
                                    <div class="form-ui">
                                        <div class="custom-select-ui">
                                            <select class="right" name="search-category" value="<?php if(isset($_SESSION['category-search'])){echo $_SESSION['category-search'] ;} ?>" >
                                                <option>همه دسته ها</option>
                                                <option>گوشی هوشمند</option>
                                                <option>لپ تاپ</option>
                                                <option>لوازم جانبی</option>
                                                <option>قاب و گلس</option>
                                            </select>
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
</div>
<div class="nav-categories-overlay"></div>
<div class="overlay-search-box"></div>
<!-- header-------------------------------->
