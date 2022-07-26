<?php
include('./partials-panel/header.html')
?>
<?php
include ('./partials-panel/sidebar.html');

?>
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        <h2>مدیریت کاربران</h2>


                    </header>
                    <table class="table table-striped border-top" id="sample_1">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>نام کامل</th>
                            <th class="hidden-phone">نام کاربری</th>
                            <th class="hidden-phone">ایمیل</th>
                            <th class="hidden-phone">تاریخ عضویت</th>
                            <th class="hidden-phone"></th>
                        </tr>
                        </thead>
                                <tbody>
                                <tr>
                                    <td></td>
                                    <td class="hidden-phone"></td>
                                    <td class="hidden-phone"></td>
                                    <td class="center hidden-phone"></td>
                                    <td class="center hidden-phone"></td>
                                    <td>
                                        <a href=""><button type="button" class="btn btn-warning">نمایش کامل اطلاعات</button></a>
                                    </td>
                                </tr>
                                </tbody>
                    </table>
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



