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
                <div class="col-sm-6">
                    <section class="panel">
                        <header class="panel-heading">
                            <h2>مدیریت ادمین ها</h2>
                            <?php if(isset($_SESSION['add-admin-success'])){
                                echo $_SESSION['add-admin-success'];
                                unset ($_SESSION['add-admin-success']);
                            }
                            if(isset($_SESSION['add-admin-error'])) {
                                echo $_SESSION['add-admin-error'];
                                unset ($_SESSION['add-admin-error']);
                            }
                            if(isset($_SESSION['change-pass-success'])) {
                                echo $_SESSION['change-pass-success'];
                                unset ($_SESSION['change-pass-success']);
                            }
                            ?>

                        </header>
                        <header class="panel-heading">
                            <a href="add-admin.php">
                                <div class="panel-body">
                                    <button type="button" name="submit" class="btn btn-success btn-lg btn-block">اضافه کردن ادمین </button>
                                </div>
                            </a>

                        </header>
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>    نام و نام خانوادگی ادمین   </th>
                                <th>     نام کاربری  </th>

                                <th>  </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $num = 1;
                            $sql1 = "SELECT * FROM admin_tbl";

                            if (!empty($conn)) {
                                $res = mysqli_query($conn,$sql1);
                            }
                            if($res){
                                $count = mysqli_num_rows($res);
                                if($count > 0){
                                    while($rows=mysqli_fetch_assoc($res)){
                                        $id = $rows['id'];
                                        $fullname = $rows['full_name'];
                                        $username = $rows['user_name'];
                                        ?>
                                        <tr>
                                            <td><?= $num++ ?> </td>
                                            <td><?= $fullname ?></td>
                                            <td><?= $username ?></td>
                                            <td>
                                                <a href="<?= asset('change-pass.php') ?>?id=<?= $id ?>"><button type="button" class="btn btn-warning">تغییر پسوورد</button></a>
                                                <a href="<?= asset('update-admin.php') ?>?id=<?= $id ?>"><button type="button" class="btn btn-info">ویرایش</button></a>
                                                <a href="<?= asset('delete-admin.php')?>?id=<?= $id ?>"><button type="button" class="btn btn-danger">حذف</button></a>
                                            </td>
                                        </tr>
                                        <?php

                                    }
                                }
                            }

                            ?>



                            </tbody>
                        </table>
                    </section>
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


    <!--common script for all pages-->
    <script src="js/common-scripts.js"></script>


