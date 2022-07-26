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
                                <h2>مدیریت وبلاگ</h2>
                                <?php
                                if(isset($_SESSION['add-post-success'])) {
                                    echo $_SESSION['add-post-success'];
                                    unset ($_SESSION['add-post-success']);
                                }
                                if(isset($_SESSION['add-post-error'])) {
                                    echo $_SESSION['add-post-error'];
                                    unset ($_SESSION['add-post-error']);
                                }
                                if (isset($_SESSION['delete-post-success'])) {
                                    echo $_SESSION['delete-post-success'];
                                    unset ($_SESSION['delete-post-success']);
                                }
                                if (isset($_SESSION['delete-post-error'])) {
                                    echo $_SESSION['delete-post-error'];
                                    unset ($_SESSION['delete-post-error']);
                                }
                                if(isset($_SESSION['update-post-success'])){
                                    echo $_SESSION['update-post-success'];
                                    unset ($_SESSION['update-post-success']);
                                }
                                ?>

                            </header>
                            <header class="panel-heading">
                                <a href="add-post.php">
                                    <div class="panel-body">
                                        <button type="button" name="submit" class="btn btn-success btn-lg btn-block">اضافه  کردن  پست </button>
                                    </div>
                                </a>

                            </header>

                            <table class="table table-striped border-top">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>عنوان</th>
                                         <th class="hidden-phone">دسته بندی</th>
                                        <th class="hidden-phone">بازدید</th>
                                        <th class="hidden-phone">تاریخ</th>
                                        <th class="hidden-phone">نام ادمین</th>
                                        <th class="hidden-phone"></th>
                                    </tr>
                                </thead>
                                <?php
                                $num = 0;
                                $sql = "SELECT * FROM weblog_tbl ";
                                if (isset($conn)) {
                                    $res = mysqli_query($conn, $sql);
                                }
                                    $count = mysqli_num_rows($res);
                                    if($count > 0 ){
                                        while($rows = mysqli_fetch_assoc($res)){
                                            $image = $rows['image_weblog'];

                                            $id = $rows['id'];
                                            $base_title = $rows['base_title'];
                                            $admin_name = $rows['admin_name'];
                                            $date = $rows['date'];
                                            $category = $rows['category'];
                                            $view = $rows['view'];
                                            ?>
                                            <tbody>
                                            <tr>
                                                <td><?= $num++ ?></td>
                                                <td><?= $base_title ?></td>
                                                <td class="hidden-phone"><?= $category ?></td>
                                                <td class="hidden-phone"><?= $view ?></td>
                                                <td class="center hidden-phone"><?= convert_date($date) ?></td>
                                                <td class="center hidden-phone"><?= $admin_name  ?></td>
                                                <td>
                                                    <a href="<?= BASEURL ."single-blog.php"?>?id=<?= $id ?>&category=<?= $category ?>"><button type="button" class="btn btn-warning">نمایش</button></a>
                                                    <a href="<?=asset('update-post.php') ?>?id=<?= $id ?>"><button type="button" class="btn btn-info">ویرایش</button></a>
                                                    <a href="<?=asset('delete-post.php') ?>?id=<?= $id ?>&image=<?= $image ?>"><button type="button" class="btn btn-danger">حذف</button></a>
                                                </td>
                                            </tr>
                                            </tbody>
                                <?php
                                        }
                                    }

                                ?>

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


