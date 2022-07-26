<?php
include('./partials-panel/header.html')
?>
<?php
include('./partials-panel/sidebar.html');

?>
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        <h2>اضافه کردن محصول به فروشگاه</h2>

                        <?php
                        if(isset($_SESSION['add-products-success'])){
                            echo $_SESSION['add-products-success'];
                            unset ($_SESSION['add-products-success']);
                        }
                        if(isset($_SESSION['add-products-error'])){
                            echo $_SESSION['add-products-error'];
                            unset ($_SESSION['add-products-error']);
                        }

                        ?>

                    </header>
                    <header class="panel-heading">
                        <a href="add-products.php">
                            <div class="panel-body">
                                <button type="button" name="submit" class="btn btn-success btn-lg btn-block">اضافه  کردن گوشی هوشمند </button>
                            </div>
                        </a>
                        <a href="add-product-lab.php">
                            <div class="panel-body">
                                <button type="button" name="submit" class="btn btn-success btn-lg btn-block">اضافه  کردن لپ تاپ  </button>
                            </div>
                        </a>
                        <a href="select-category.php">
                            <div class="panel-body">
                                <button type="button" name="submit" class="btn btn-success btn-lg btn-block">اضافه  کردن محصولات جانبی  </button>
                            </div>
                        </a>
                        <a href="add-products3.php">
                            <div class="panel-body">
                                <button type="button" name="submit" class="btn btn-success btn-lg btn-block">اضافه  کردن قاب و گلس </button>
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



