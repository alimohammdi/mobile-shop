<?php
include('./partials-panel/header.html')
?>
<?php
include('./partials-panel/sidebar.html')
?>
        <!--main content start-->
<?php
        if(isset($_POST['submit']) ) {
            if(!empty($_POST['fullname']) && !empty($_POST['username']) && !empty($_POST['password'])){
                $fullname = $_POST['fullname'];
                $username = $_POST['username'];
                $password = md5($_POST['password']);

                                    $sql = "INSERT INTO admin_tbl SET 
                    full_name= '$fullname',
                    user_name= '$username',
                    password= '$password'";


                if (!empty($conn)) {
                    $res = mysqli_query($conn,$sql,true);
                }
                if($res === true){
                    $_SESSION['add-admin-success'] = "<div class='success'> ادمین اضافه شد </div>";
                    redirect(asset('manage-admin.php'));
                    mysqli_close($conn);
                }else{
                    $_SESSION['add-admin-error'] = "<div class='error'> ادمین اضافه نشد لطفا دوباره تلاش کنید </div>";
                    redirect(asset('manage-admin.php'));
                    mysqli_close($conn);
                }
            }else{
                $_SESSION['add-admin-alarm'] = "<div class='alarm'> لطفا تمامی فیلد ها را تکمیل کنید </div>";
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
                                اضافه کردن ادمین
                                <?php
                                if(isset($_SESSION['add-admin-alarm'])){
                                    echo $_SESSION['add-admin-alarm'];
                                    unset ($_SESSION['add-admin-alarm']);

                                } ?>
                            </header>
                            <div class="panel-body">
                                <form action="" method="post">
                                    <div class="form-group">
                                        <label for="full name">نام و نام خانوادگی </label>
                                        <input type="text" name="fullname" class="form-control"  placeholder="نام کامل ادمین">
                                    </div>
                                    <div class="form-group">
                                        <label for="full name">نام کاربری </label>
                                        <input type="text" name="username" class="form-control"  placeholder="نام کاربری ">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">پسوورد</label>
                                        <input type="password" name="password" class="form-control"  placeholder="رمز ورود">
                                    </div>

                                    <input type="submit" value="اضافه کن" name="submit" class="btn btn-info">
                                </form>

                            </div>
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


