<?php
include('./partials-panel/header.html')
?>
<?php
include('./partials-panel/sidebar.html');
if(isset($conn)){
    $sql = "select * from about_us ";
    $res= mysqli_query($conn, $sql);
    $count = mysqli_num_rows($res);
    if($count > 0){
        if($res){
            $rows = mysqli_fetch_assoc($res);
            $title_1 =  $rows['title_1'];
            $content_1 = $rows['content_1'];
            $title_2 =  $rows['title_2'];
            $content_2 = $rows['content_2'];

        }
    }
}
?>
<?php
if(isset($_POST['submit'])){
    if(isset($_POST['title']) & isset($_POST['content']) & isset($_POST['content_2'])) {
        $title = $_POST['title'];
        $content = $_POST['content'];
        $title_2 = $_POST['title_2'];
        $content_2 = $_POST['content_2'];
        $sql_up = "update about_us set title_1='$title',
            content_1='$content',
                    title_2='$title_2',
                    content_2='$content_2' where id='1'" ;
        $res_up = mysqli_query($conn, $sql_up);
        if($res_up){
            $_SESSION['success-update'] = "<div class='success'>ویرایش انجام شد  </div>";
            redirect(asset('about-us.php'));

        }else{
            $_SESSION['error-update'] = "<div class='error'>ویرایش انجام نشد لطفا دوباره تلاش کنید  </div>";
            redirect(asset('about-us.php'));
        }

    }else{
        $_SESSION['alarm-update'] = "<div class='alarm'>لطفا تمام فیلد های ستاره دار را تکمیل کنید </div>";
        var_dump(header("refresh:0"));
    }
}
?>
<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        <h3>ویرایش صفحه درباره ما</h3>
                        <?php
                        if(isset($_SESSION['alarm-update'])) {
                            echo $_SESSION['alarm-update'];
                            unset ($_SESSION['alarm-update']);
                        }
                        ?>
                    </header>
                    <div class="panel-body">
                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal tasi-form" >
                            <div class="form-group">
                                <label class="col-sm-2 control-label">عنوان سر صفحه (تیتر قسمت رنگی) </label>
                                <?php
                                if(empty($title_1)){
                                    ?>
                                    <div class="col-sm-10">
                                        <input type="text" name="title" class="form-control" placeholder="سر صفحه را وارد نمایید ">
                                    </div>
                                <?php
                                }else{
                                    ?>
                                    <div class="col-sm-10">
                                        <input type="text" name="title" class="form-control" value="<?= $title_1 ?>">
                                    </div>
                                <?php
                                }
                                ?>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">توضیحات متن قسمت بالای صفحه (قسمت رنگی)</label>
                                <div class="col-lg-10">
                                    <?php
                                    if(empty($content_1)){
                                        ?>
                                        <textarea class="form-control" name="content"   cols="60" rows="5"></textarea>
                                    <?php
                                    }else{
                                        ?>
                                        <textarea class="form-control" name="content"   cols="60" rows="5"><?= $content_1 ?></textarea>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">عنوان برای تیتر قسمت زیرین رنگی(میتواند خالی باشد اگر تیتری در نظر ندارید) </label>
                                <?php
                                if(empty($title_2)){
                                    ?>
                                    <div class="col-sm-10">
                                        <input type="text" name="title_2" class="form-control" placeholder="سر صفحه   را وارد نمایید ">
                                    </div>
                                    <?php
                                }else{
                                    ?>
                                    <div class="col-sm-10">
                                        <input type="text" name="title_2" class="form-control" value="<?= $title_2 ?>">
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">توضیحات پایین قسمت رنگی</label>
                                <div class="col-lg-10">
                                    <?php
                                    if(empty($content_2)){
                                        ?>
                                        <textarea class="form-control" name="content_2"   cols="60" rows="5"></textarea>
                                        <?php
                                    }else{
                                        ?>
                                        <textarea class="form-control" name="content_2"   cols="60" rows="5"><?= $content_2 ?></textarea>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>

                            <br>
                            <input type="submit" name="submit" class="btn btn-primary btn-lg btn-block" value="اتمام ویرایش و ارسال  " >

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



