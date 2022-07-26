<?php
include('./partials-panel/header.html')
?>
<?php
include('./partials-panel/sidebar.html');
?>

<?php

if(isset($_POST['submit'])){
    if(!empty($_POST['base_title']) && !empty($_POST['title']) && !empty($_POST['content']) && !empty($_POST['date']) && !empty($_POST['admin']) && !empty($_POST['category']) && !empty($_FILES['image']['name'])){
        $base_title = $_POST['base_title'];
        $title = $_POST['title'];
        $content = $_POST['content'];
        $category = $_POST['category'];
        $admin = $_POST['admin'];
        $date = $_POST['date'];
        $view = 0;
        if(!empty($_POST['title2']) ){
            $title2 = $_POST['title2'];
        }
        if( !empty($_POST['content2'])){
            $content2 = $_POST['content2'];
        }
        if(!empty($_POST['content3'])){
            $content3 = $_POST['content3'];
        }
        if(!empty($_FILES['image']['name'])){
            $image_name = $_FILES['image']['name'];
            }
            if($image_name){
                $exe = explode(".",$image_name);
                $exe = end($exe);
                $image_name = "new_post_weblog_".rand(000,999).".".$exe;
                $tmp_image = $_FILES['image']['tmp_name'];
                $image_path = "../images/weblog/".$image_name;

                $upload_image = move_uploaded_file($tmp_image,$image_path);
                if($upload_image){
                    $sql2 = "INSERT INTO weblog_tbl SET 
                                    base_title ='$base_title',
                                    title = '$title',
                                    content = '$content',
                                    category = '$category',
                                    image_weblog = '$image_name',
                                    admin_name = '$admin',
                                    date = '$date',
                                    view = '$view',
                                    last_content = '$content2',
                                    content3 = '$content3',
                                    title2 = '$title2'";

                    if (isset($conn)) {
                        $res2 = mysqli_query($conn, $sql2);
                        if($res2) {
                            $_SESSION['add-post-success'] = "<div class='success'> پست با موفقیت اضافه شد </div>";
                            redirect(asset('manage-weblog.php'));
                            mysqli_close($conn);
                        }else {
                            $_SESSION['add-post-error'] = "<div class='error'> اضافه کردن پست موفقیت نبود لطفا دوباره تلاش کنید</div>";
                            redirect(asset('manage-weblog.php'));
                            mysqli_close($conn);
                        }
                    }
                }

            }

        }
    if(empty($_POST['title']) || empty($_POST['content'])  || empty($_POST['date']) || empty($_POST['category']) || empty($_FILES['image']['name'])){

        $_SESSION['add-post-alarm'] = "<div class='alarm'> لطفا تمامی فیلد ها را دوباره برسی کنید و فیلد های ستاره دار را تکمیل کنید </div>";
        $base_title = $_POST['base_title'];
        $title = $_POST['title'];
        $content = $_POST['content'];
        $category = $_POST['category'];
        $date = $_POST['date'];
        $title2 = $_POST['title2'];
        $content3 = $_POST['content3'];
        $content2 = $_POST['content2'];


    }
    if(empty($_FILES['image']['name']) && !empty($_POST['title']) && !empty($_POST['content'])  && !empty($_POST['date']) && !empty($_POST['category']) ){
        $_SESSION['add-post-alarm'] = "<div class='alarm'>  لطفا ادمین و تصویری برای پست انتخاب کنید  </div>";
        $title = $_POST['title'];
        $content = $_POST['content'];
        $category = $_POST['category'];
        $date = $_POST['date'];
        $title2 = $_POST['title2'];
        $content2 = $_POST['content2'];
    }
    if(empty($_POST['admin'])  && !empty($_POST['title']) && !empty($_POST['content'])  && !empty($_POST['date']) && !empty($_POST['category']) ){
        $_SESSION['add-post-alarm'] = "<div class='alarm'>  لطفا ادمین و تصویری برای پست انتخاب کنید  </div>";
        $title = $_POST['title'];
        $content = $_POST['content'];
        $category = $_POST['category'];
        $date = $_POST['date'];
        $title2 = $_POST['title2'];
        $content2 = $_POST['content2'];
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
                        <h3>اضافه کردن پست </h3>

                        <?php
                        if(isset($_SESSION['add-post-alarm'])){
                            echo $_SESSION['add-post-alarm'];
                            unset ($_SESSION['add-post-alarm']);

                        }?>
                    </header>
                    <div class="panel-body">
                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal tasi-form" >
                            <div class="form-group">
                                <label class="col-sm-2 control-label">عنوان اصلی پست *</label>
                                <div class="col-sm-10">
                                    <input type="text" name="base_title" value="<?php if(isset($base_title)){echo $base_title ;} ?>" class="form-control" placeholder="سر عنوان اصلی این وبلاگ را وارد نمایید ">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">تیتر شروع  *</label>
                                <div class="col-sm-10">
                                    <input type="text" name="title" value="<?php if(isset($title)){echo $title ;} ?>" class="form-control" placeholder="سر پاراگراف این وبلاگ را وارد نمایید ">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">توضیحات 1 *</label>
                                <div class="col-lg-10">
                                    <textarea class="form-control" name="content"  cols="60" rows="5"><?php if(isset($content)){echo $content ;}?></textarea>
                                    <br>
                                    <span class="help-block">لطفا تصویر مورد نظر برای این پست را از اینجا انتخاب نمایید *</span>
                                    <input type="file" name="image">


                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">تیتر 2  </label>
                                <div class="col-sm-10">
                                    <input type="text" name="title2" value="<?php if(isset($title2)){echo $title2 ;} ?>" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label"> توضیحات 1 تیتر 2 </label>
                                <div class="col-lg-10">
                                    <textarea class="form-control" name="content2" cols="60" rows="5"><?php  if(isset($content2)){echo $content2 ;} ?></textarea>
                                    <br>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label"> توضیحات 2 تیتر 2 (می تواند خالی باشد)</label>
                                <div class="col-lg-10">
                                    <textarea class="form-control" name="content3" cols="60" rows="5"><?php  if(isset($content3)){echo $content3 ;} ?></textarea>
                                    <br>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-2" for="inputSuccess">دسته بندی *</label>
                                <div class="col-lg-10">
                                    <select name="category"  class="form-control m-bot15">
                                        <?php
                                         if(isset($category)){
                                             ?>
                                              <option><?= $category ?></option>
                                        <?php
                                             ;}
                                        ?>
                                        <option> گوشی هوشمند</option>
                                        <option>برنامه های کاربردی</option>
                                        <option>اموزشی</option>
                                        <option>بازی و سرگرمی</option>
                                        <option>تکنولوژی</option>
                                    </select>

                                </div>
                            </div>
                                <br>

                                <div class="form-group">
                                    <label class="control-label col-lg-2" for="inputSuccess">ادمین *</label>
                                    <div class="col-lg-10">
                                        <?php
                                        $sql = "SELECT * FROM admin_tbl ";
                                        if (isset($conn)) {
                                            $res = mysqli_query($conn, $sql);
                                            $count = mysqli_num_rows($res);
                                        }
                                        if($count > 0){

                                            while ($rows = mysqli_fetch_assoc($res)){
                                                $id = $rows['id'];
                                                $username = $rows['user_name'];
                                                ?>
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="admin" id="optionsRadios2" value="<?= $username  ?>">
                                                       <?= $username ?>

                                                    </label>
                                                </div>
                                        <?php

                                            }
                                        }

                                        ?>

                                    </div>
                                </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-2" for="inputSuccess">تاریخ *</label>
                                        <div class="col-sm-6">
                                            <input id="dp1" type="date" name="date" value="<?php if(isset($date)){echo $date ;} ?>"  class="form-control" size="16" >

                                        </div>
                                    </div>


                                <input type="submit" name="submit" class="btn btn-primary btn-lg btn-block" value="اتمام و ارسال پست " >

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



