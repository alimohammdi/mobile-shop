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
                        <h2>مدیریت صفحه درباره ما</h2>
                        <?php
                        if(isset($_SESSION['error-update'])) {
                            echo $_SESSION['error-update'];
                            unset ($_SESSION['error-update']);
                        }
                        if(isset($_SESSION['success-update'])) {
                            echo $_SESSION['success-update'];
                            unset ($_SESSION['success-update']);
                        }
                        ?>

                    </header>
                    <header class="panel-heading">
                        <a href="update-about.php">
                            <div class="panel-body">
                                <button type="button" name="submit" class="btn btn-success btn-lg btn-block">ویرایش صفحه </button>
                            </div>
                        </a>
                        <a href="<?= BASEURL . 'about.php' ?>">
                            <div class="panel-body">
                                <button type="button" name="submit" class="btn btn-primary btn-lg btn-block">نمایش صفحه </button>
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


