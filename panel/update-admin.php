<?php include('./partials-panel/header.html') ?>
<?php  include('./partials-panel/sidebar.html');


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM admin_tbl WHERE id='$id'";
    if (!empty($conn)) {
        $res = mysqli_query($conn, $sql);
    }
    if ($res) {
        $count = mysqli_num_rows($res);
        if ($count == 1) {
            $rows = mysqli_fetch_array($res);
            $id = $rows['id'];
            $fullname = $rows['full_name'];
            $username = $rows['user_name'];
        }
    }
}

?>
<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <div class="row">
            <div class="col-lg-6">
                <section class="panel">
                    <header class="panel-heading">
                        ویرایش ادمین

                        <?php
                        if(isset($_SESSION['add-admin-alarm'])){
                            echo $_SESSION['add-admin-alarm'];
                            unset ($_SESSION['add-admin-alarm']);

                        } ?>
                    </header>
                    <div class="panel-body">
                        <form action="#" method="post">
                            <div class="form-group">
                                <label for="full name">نام و نام خانوادگی </label>
                                <input type="text" name="fullname" class="form-control"  value="<?php echo $fullname; ?>">
                            </div>
                            <div class="form-group">
                                <label for="full name">نام کاربری </label>
                                <input type="text" name="username" class="form-control"  value="<?php echo $username; ?>" >
                            </div>
<!--                            <div class="form-group">-->
<!--                                <label for="exampleInputPassword1">پسوورد</label>-->
<!--                                <input type="password" name="password" class="form-control"  placeholder="رمز ورود"></inp>-->
<!--                            </div>-->
                            <input type="hidden" name="id" value="<?= $id ?>">
                            <input type="submit" value="ویرایش کن" name="submit" class="btn btn-info">
                        </form>

                    </div>
                </section>
            </div>
            <!-- page end-->
    </section>
</section>
<!--main content end-->

<?php
if(isset($_POST['submit'])){
    if(!empty($_POST['fullname']) && !empty($_POST['username'])){
        $id = $_POST['id'];
        $newfullname = $_POST['fullname'];
        $newusername = $_POST['username'];

        $sql2 = "UPDATE admin_tbl SET 
           full_name = '$newfullname',
           user_name = '$newusername'  WHERE  id='$id'";

        $res = mysqli_query($conn, $sql2);
        if($res){
            $_SESSION['add-admin-success'] = "<div class='success'> ویرایش ادمین انجام شد  </div>";
            redirect(asset('manage-admin.php'));
            mysqli_close($conn);
        }else{
            $_SESSION['add-admin-error'] = "<div class='success'> ویرایش ادمین انجام نشد لطفا دوباره تلاش کنید</div>";
            redirect(asset('manage-admin.php'));
            mysqli_close($conn);
        }
    }else{
        $_SESSION['add-admin-alarm'] = "<div class='alarm'> لطفا تمامی فیلد ها را تکمیل کنید </div>";
    }
}

?>
<!-- js placed at the end of the document so the pages load faster -->
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.scrollTo.min.js"></script>
<script src="js/jquery.nicescroll.js" type="text/javascript"></script>


<!--common script for all pages-->
<script src="js/common-scripts.js"></script>




