<?php
include('./partials-panel/header.html')
?>
<?php
include('./partials-panel/sidebar.html');
if(isset($_GET['id'])){
    $id = $_GET['id'];
}else{
    redirect(asset('manage-admin.php'));
}
?>
        <!--main content start-->
<?php
if(isset($_POST['submit'])){
    if(!empty($_POST['current-password']) && !empty($_POST['new-password']) && !empty($_POST['confirm-password'])){
        $id = $_POST['id'];
        $last_pass = md5($_POST['current-password']);
        $new_pass = md5($_POST['new-password']);
        $confirm_pass = md5($_POST['confirm-password']);

        if($new_pass === $confirm_pass){
            $sql = "SELECT * FROM admin_tbl WHERE id='$id' AND password = '$last_pass'";
            if(isset($conn)){
                $res = mysqli_query($conn,$sql);
                if($res){
                    $count = mysqli_num_rows($res);
                    if($count === 1){
                        $sql2 = "UPDATE admin_tbl SET  password='$confirm_pass' WHERE id='$id'";
                        $res2 = mysqli_query($conn,$sql2);
                        if($res2){
                            $_SESSION['change-pass-success'] = "<div class='success'> تغییر پسوورد انجام شد</div>";
                            mysqli_close($conn);
                            redirect(asset('manage-admin.php'));
                        }

                    }else{
                        $_SESSION['change-pass-error'] = "<div class='error'> پسوورد قبلی شما معتبر نیست  </div>";
                        mysqli_close($conn);
                    }
                }
            }

        }else{
            $_SESSION['change-pass-alarm'] = "<div class='alarm'> پسوورد جدید با تکرار ان برابر نیست.لطفا دقت کنید </div>";

        }
    }else if (empty($_POST['current-password']) || empty($_POST['new-password']) || empty($_POST['confirm-password'])){
        $_SESSION['change-pass-alarm'] = "<div class='alarm'> لطفا تمامی فیلد ها را کامل کنید </div>";
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
                                تغییر پسوورد
                                <?php
                                if(isset($_SESSION['change-pass-error'])){
                                    echo $_SESSION['change-pass-error'];
                                    unset ($_SESSION['change-pass-error']);
                                }
                                if(isset($_SESSION['change-pass-alarm'])){
                                    echo $_SESSION['change-pass-alarm'];
                                    unset ($_SESSION['change-pass-alarm']);

                                }
                                ?>
                            </header>
                            <div class="panel-body">
                                <form action="#" method="post">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">پسوورد</label>
                                        <input type="password" name="current-password" class="form-control"  placeholder="پسوورد قبلی خود را وارد کنید ">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">پسوورد جدید</label>
                                        <input type="password" name="new-password" class="form-control"  placeholder="پسوورد جدید خود را وارد کنید">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">تکرار پسوورد</label>
                                        <input type="password" name="confirm-password" class="form-control"  placeholder="پسوورد جدید خود را تکرار کنید">
                                    </div>
                                    <input type="hidden" name="id" value="<?= $id ?>">
                                    <input type="submit" value="تغییر پسوورد" name="submit" class="btn btn-info">
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


