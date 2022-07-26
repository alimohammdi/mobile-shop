<?php
include('./partials-panel/header.html')
?>
<?php
include('./partials-panel/sidebar.html');
?>
<?php
if(isset($_GET['id']) & $_GET['id'] != ""){
    $id = $_GET['id'];
    $sql = "SELECT * FROM weblog_tbl WHERE id='$id'";
    if(isset($conn)){
        $res = mysqli_query($conn,$sql);
        if($res) {
            $count = mysqli_num_rows($res);
            if($count == 1){
                $rows = mysqli_fetch_assoc($res);
                $base_title = $rows['base_title'];
                $title = $rows['title'];
                $content = $rows['content'];
                $image_current = $rows['image_weblog'];
                $date = $rows['date'];
                $category = $rows['category'];
                $title2 = $rows['title2'];
                $content2 = $rows['last_content'];
                $content3 = $rows['content3'];
            }

        }
    }


}else{
    redirect(asset("manage-weblog.php "));
}
?>
<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        <h3>ویرایش پست وبلاگ</h3>
                        <?php
                        if(isset($_SESSION['update-post-alarm'])){
                            echo $_SESSION['update-post-alarm'];
                            unset ($_SESSION['update-post-alarm']);
                        }
                        if(isset($_SESSION['update-post-error'])){
                            echo $_SESSION['update-post-error'];
                            unset ($_SESSION['update-post-error']);
                        }
                        if(isset($_SESSION['update-post-success'])){
                            echo $_SESSION['update-post-success'];
                            unset ($_SESSION['update-post-success']);
                        }
                        ?>

                    </header>
                    <div class="panel-body">
                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal tasi-form" >

                            <div class="form-group">
                                <label class="col-sm-2 control-label">عنوان اصلی پست </label>
                                <div class="col-sm-10">
                                    <input type="text" name="base_title" class="form-control" value="<?= $base_title ?>" placeholder="سر صفحه این وبلاگ را وارد نمایید ">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">عنوان اصلی پست </label>
                                <div class="col-sm-10">
                                    <input type="text" name="title" class="form-control" value="<?= $title ?>" placeholder="سر صفحه این وبلاگ را وارد نمایید ">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">توضیحات 1</label>
                                <div class="col-lg-10">
                                    <textarea class="form-control" name="content"   cols="60" rows="5"><?=$content?></textarea>
                                    <br>
                                    <img src="<?= "../images/weblog/".$image_current ?>" class="img-responsive image-box" alt="">
                                    <span class="help-block">اگر میخواهید تصویر را تغییر دهید از اینجا انتخاب نمایید </span>
                                    <input type="file" name="image"  >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">عنوان 2 </label>
                                <?php
                                if($title2 != ""){
                                    ?>
                                    <div class="col-sm-10">
                                        <input type="text" name="title2" value="<?= $title2 ?>" class="form-control">
                                    </div>
                                <?php
                                }else{
                                    ?>
                                    <div class="col-sm-10">
                                        <input type="text" name="title2"  class="form-control">
                                    </div>
                                <?php
                                }
                                ?>

                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">  توضیحات </label>
                                <?php
                                if($content2 != ""){
                                    ?>
                                    <div class="col-lg-10">
                                        <textarea class="form-control" name="content2" cols="60" rows="5"><?=$content2?></textarea>
                                        <br>
                                    </div>
                                <?php

                                }else{
                                    ?>
                                    <div class="col-lg-10">
                                        <textarea class="form-control" name="content2" cols="60" rows="5"></textarea>
                                        <br>
                                    </div>
                                <?php
                                }
                                ?>

                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label"> ادامه توضیحات  </label>
                                <?php
                                if($content3 != ""){
                                    ?>
                                    <div class="col-lg-10">
                                        <textarea class="form-control" name="content3" cols="60" rows="5"><?=$content3?></textarea>
                                        <br>
                                    </div>
                                    <?php

                                }else{
                                    ?>
                                    <div class="col-lg-10">
                                        <textarea class="form-control" name="content3" cols="60" rows="5"></textarea>
                                        <br>
                                    </div>
                                    <?php
                                }
                                ?>

                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-2" for="inputSuccess">دسته بندی </label>
                                <div class="col-lg-10">
                                    <select name="category" class="form-control m-bot15" >
                                        <?php
                                        if($category){
                                            ?>
                                            <option><?= $category ?></option>
                                        <?php
                                        }
                                        ?>
                                        <option>گوشی هوشمند</option>
                                        <option>تجهیزات و لوازم جانبی</option>
                                        <option>برنامه های کاربردی</option>
                                        <option>اموزشی</option>
                                        <option>سرگرمی</option>
                                        <option>تکنولوژی</option>
                                    </select>

                                </div>
                            </div>
                            <br>

                            <div class="form-group">
                                <label class="control-label col-lg-2" for="inputSuccess">تاریخ </label>
                                <div class="col-sm-6">
                                    <input id="dp1" type="date" name="date" class="form-control" size="16"  value="<?= $date ?>">

                                </div>
                            </div>
                            <input type="hidden" name="image_hid" value="<?= $image_current ?>">
                            <input type="hidden" name="id_hid" value="<?= $id ?>">
                            <input type="submit" name="submit" class="btn btn-primary btn-lg btn-block" value="اتمام و ارسال پست " >

                        </form>
                    </div>
                </section>
            </div>


            <?php
            if(isset($_POST['submit'])){
                $base_title = $_POST['base_title'];
                $id = $_POST['id_hid'];
                $current_image = $_POST['image_hid'];
                $title = $_POST['title'];
                $content = $_POST['content'];
                $category = $_POST['category'];
                $date = $_POST['date'];

               if($_POST['title2'] != "" &&  $_POST['content2'] != ""){
                   $title2 = $_POST['title2'];
                   $content2 = $_POST['content2'];
                   if( $_POST['content3'] != ""){
                       $content2 = $_POST['content3'];
                   }
               }

                if(isset($_FILES['image']['name'])){
                    $new_image = $_FILES['image']['name'];
                   if($new_image != ""){
                       $exe = explode(".", $new_image);
                       $exe = end($exe);
                       $image_name = "new_post_weblog".rand(000,999).".".$exe;
                       $image_path = "../images/weblog/".$image_name;
                       $tmp_image = $_FILES['image']['tmp_name'];
                       $uploaded = move_uploaded_file($tmp_image, $image_path);
                       if($uploaded){
                           if($current_image != ""){
                               $path_current = "../images/weblog/".$current_image ;
                               $unlink =  unlink($path_current);
                               $current_image = $image_name;
                               if($unlink){
                                   $_SESSION['update-image-success'] = "<div class='success'> تصویر جدید جایگزین شد </div>";
                               }else{
                                   $_SESSION['update-post-error'] = "<div class='error'> حذف تصویر قبل به درستی انجام نشد لطفا دوباره تلاش کنید</div>";
                               }
                           }
                       }else{
                           $_SESSION['update-post-error'] = "<div class='error'> تصویر جدید به درستی اپلود نشد لطفا دوباره تلاش کنید </div>";
                       }
                   }



                }

                $sql2 = "UPDATE  weblog_tbl SET 
                base_title = '$base_title',
                title = '$title',
                content = '$content',
                category = '$category',
                date = '$date',
                title2 = '$title2',
                content3 = '$content3',
                image_weblog = '$current_image',
                last_content = '$content2' WHERE id='$id'";

                $res2 = mysqli_query($conn,$sql2);
                if($res){
                 $_SESSION['update-post-success'] = "<div class='success'> ویرایش انجام شد</div>";
                 redirect(asset('manage-weblog.php'));
                 mysqli_close($conn);
                }else{
                    $_SESSION['update-post-error'] = "<div class='error'> ویرایش پست با مشکل مواجه شد لطفا دوباره تلاش کنید</div>";
                }


            }
            ?>
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


