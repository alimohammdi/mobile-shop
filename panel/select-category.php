<?php
include('./partials-panel/header.html')
?>
<?php
include('./partials-panel/sidebar.html');

$cate1 = 'کابل و شارژر';
$cate2 ='هندزفری و هدفون';
$cate3 = 'باند و اسپیکر';
$cate4 = 'مودم و تجهیزات شبکه';
$cate5 = "حافظه های جانبی";
$cate6 = "ماوس و کیبورد";
$cate7 = "تجهیزات سرگرمی";
$cate8 = "سایر محصولات جانبی";
$cate9 = "باطری";


?>
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        <h2>دسته بندی محصول جانبی خود را انتخاب کنید</h2>

                        <h4>** لطفا دسته بندی محصول خود را با دقت انتخاب کنید</h4>
                        <h4>** اگر اطمینان دارید محصول شما جزو دسته بندی های زیر قرار نمیگیرد سایر محصولات را انتخاب کنید</h4>
                    </header>
                    <header class="panel-heading">
                        <a href="<?= "add-products2.php"?>?category=<?= $cate1 ?>">
                            <div class="panel-body">
                                <button type="button" name="submit" class="btn btn-success btn-lg btn-block">کابل و شارژر </button>
                            </div>
                        </a>
                        <a href="<?= "add-products2.php"?>?category=<?= $cate9 ?>">
                            <div class="panel-body">
                                <button type="button" name="submit" class="btn btn-success btn-lg btn-block">باطری</button>
                            </div>
                        </a>
                        <a href="<?= "add-products2.php"?>?category=<?= $cate2 ?>">
                            <div class="panel-body">
                                <button type="button" name="submit" class="btn btn-success btn-lg btn-block">هندزفری و هدفون </button>
                            </div>
                        </a>
                        <a href="<?= "add-products2.php"?>?category=<?= $cate3 ?>">
                            <div class="panel-body">
                                <button type="button" name="submit" class="btn btn-success btn-lg btn-block">باند و اسپیکر</button>
                            </div>
                        </a>
                        <a href="<?= "add-products2.php"?>?category=<?= $cate4 ?>">
                            <div class="panel-body">
                                <button type="button" name="submit" class="btn btn-success btn-lg btn-block">مودم و تجهیزات شبکه</button>
                            </div>
                        </a>
                        <a href="<?= "add-products2.php"?>?category=<?= $cate5 ?>">
                            <div class="panel-body">
                                <button type="button" name="submit" class="btn btn-success btn-lg btn-block">حافظه های جانبی(فلش ، رم ، هارد ، SSD)</button>
                            </div>
                        </a>
                        <a href="<?= "add-products2.php"?>?category=<?= $cate6 ?>">
                            <div class="panel-body">
                                <button type="button" name="submit" class="btn btn-success btn-lg btn-block">موس و کیبورد</button>
                            </div>
                        </a>
                        <a href="<?= "add-products2.php"?>?category=<?= $cate7 ?>">
                            <div class="panel-body">
                                <button type="button" name="submit" class="btn btn-success btn-lg btn-block">تجهیزات سرگرمی</button>
                            </div>
                        </a>
                        <a href="<?= "add-products2.php"?>?category=<?= $cate8 ?>">
                            <div class="panel-body">
                                <button type="button" name="submit" class="btn btn-success btn-lg btn-block">سایر محصولات جانبی</button>
                            </div>
                        </a>

                    </header>


                </section>
            </div>
        </div>
        <!-- page end-->
    </section>
</section>
<!--main content end-->


<!-- js placed at the end of the document so the pages load faster -->
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.scrollTo.min.js"></script>
<script src="js/jquery.nicescroll.js" type="text/javascript"></script>
<script type="text/javascript" src="assets/data-tables/jquery.dataTables.js"></script>
<script type="text/javascript" src="assets/data-tables/DT_bootstrap.js"></script>


<!--common script for all pages-->
<script src="js/common-scripts.js"></script>

<!--script for this page only-->
<script src="js/dynamic-table.js"></script>
