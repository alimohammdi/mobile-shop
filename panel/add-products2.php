<?php
include('./partials-panel/header.html');
if(isset($_GET['category'])){
    $label = $_GET['category'];

}
?>
<?php
if(isset($_POST['submit'])){
    if(!empty($_POST['fa-title']) & !empty($_POST['price']) & !empty($_POST['count'])  & !empty($_POST['content']) & !empty($_FILES['image1']['name']) & !empty($_FILES['image2']['name'])){

        $fa_title   = $_POST['fa-title'];
        $one_title   = $_POST['one-title'];
        $content   = $_POST['content'];
        $weight = $_POST['weight'];
        $property   = $_POST['property'];
        $last_category = "لوازم جانبی";
        $brand   = $_POST['brand'];
        $length   = $_POST['length'];
        $connect   = $_POST['connect'];
        $garanty   = $_POST['garanty'];
        $count   = $_POST['count'];
        $price   = $_POST['price'];
        $or_ram   = $_POST['or_ram'];
        $structure   = $_POST['Structure'];
        $date = $_POST['date'];
        $color = $_POST['color'];
        $color1 = "";
        foreach($color as $color1)
        {
            $chk .= $color1.",";
        }
        $sold = "0";
        $label = $_POST['category'];
        //     check image box for uploaded
        if(isset($_FILES['image1']['name'])){
            $image_name1 = $_FILES['image1']['name'];
            if(!empty($image_name1)) {
                $exe = explode(".", $image_name1);
                $exe = end($exe);
                $image_name1 = "new_products_" . rand(0000, 9999) . "." . $exe;
                $tmp_image = $_FILES['image1']['tmp_name'];
                $image_path = "../images/products/" . $image_name1;
                $upload_image = move_uploaded_file($tmp_image, $image_path);
            }
        }
        if(isset($_FILES['image2']['name'])){
            $image_name2 = $_FILES['image2']['name'];
            if(!empty($image_name2)) {
                $exe2 = explode(".", $image_name2);
                $exe2 = end($exe2);
                $image_name2 = "new_products_" . rand(0000, 9999) . "." . $exe2;
                $tmp_image2 = $_FILES['image2']['tmp_name'];
                $image_path2 = "../images/products/" . $image_name2;
                $upload_image = move_uploaded_file($tmp_image2, $image_path2);
            }

        }
        if(isset($_FILES['image3']['name'])){
            $image_name3 = $_FILES['image3']['name'];
            if(!empty($image_name3)) {
                $exe3 = explode(".", $image_name3);
                $exe3 = end($exe3);
                $image_name3 = "new_products_" . rand(0000, 9999) . "." . $exe3;
                $tmp_image3 = $_FILES['image3']['tmp_name'];
                $image_path3 = "../images/products/" . $image_name3;
                $upload_image = move_uploaded_file($tmp_image3, $image_path3);
            }
        }

        $sql = "INSERT INTO product_janeb SET 
                fa_title   =  '$fa_title',
                one_title = '$one_title',
                content   = '$content',
                weight = '$weight',
                length = '$length',
                connect = '$connect',
                category = '$last_category',
                label ='$label',
                brand   = '$brand',
                property   = '$property',
                garanty   = '$garanty',
                image_1 = '$image_name1',
                image_2 = '$image_name2',
                image_3 = '$image_name3',
                available   = '$count',
                sold = '$sold',
                price   = '$price',
                or_rom   = '$or_ram',
                structure   = '$structure',
                 color='$chk',
                date = '$date' ";
        if (isset($conn)) {
            $res = mysqli_query($conn, $sql);
            if($res){
                $_SESSION['add-products-success'] = "<div class='success'> محصول با موفقیت اضافه شد </div>";
                redirect(asset('added-products.php'));
                mysqli_close($conn);
            }else{
                $_SESSION['add-products-error'] = "<div class='error'> اضافه کردن محصول موفقیت امیز نبود لطفا دوباره تلاش کنید</div>";
                redirect(asset('added-products.php'));
                mysqli_close($conn);
            }
        }


    }else if (!empty($_POST['fa-title'])  || !empty($_POST['date'])  || !empty($_POST['price']) || !empty($_POST['content']) || !empty($_POST['count'])){
        $_SESSION['add-products-alarm'] = "<div class='alarm'>  لطفا تمامی فیلدهای ستاره دار را تکمیل کنید  </div>";
        $fa_title   = $_POST['fa-title'];
        $one_title   = $_POST['one-title'];
        $content   = $_POST['content'];
        $weight = $_POST['weight'];
        $property   = $_POST['property'];
        $brand   = $_POST['brand'];
        $length   = $_POST['length'];
        $connect   = $_POST['connect'];
        $garanty   = $_POST['garanty'];
        $count   = $_POST['count'];
        $price   = $_POST['price'];
        $or_ram   = $_POST['or_ram'];
        $structure   = $_POST['Structure'];
        $date = $_POST['date'];
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
                        <h3>اضافه کردن محصول جانبی به فروشگاه </h3>

                        <h4>** قسمت توضیحات را با دقت کامل کنید و تمام توضیحاتی که برای معرفی کامل این محصول نیاز است را بنویسید</h4>
                        <?php
                        if(isset($_SESSION['add-products-alarm'])){
                            echo $_SESSION['add-products-alarm'];
                            unset ($_SESSION['add-products-alarm']);
                        }?>
                    </header>
                    <div class="panel-body">
                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal tasi-form" >
                            <div class="form-group">
                                <label class="col-sm-2 control-label">عنوان اصلی محصول همراه برند *</label>
                                <div class="col-sm-10">
                                    <input type="text" name="fa-title"  class="form-control" value="<?php if(isset($fa_title)){ echo $fa_title ;} ?>" placeholder="مثال : هندزفری سامسونگ مدل  SM-N970F/DS  ">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">عنوان تکی محصول (فارسی)*</label>
                                <div class="col-sm-10">
                                    <input type="text" name="one-title"  class="form-control" value="<?php if(isset($one_title)){ echo $one_title ;} ?>" placeholder="مثال : هارد یا اسپیکر یا کیبورد ">
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-sm-2 control-label">نقد و برسی اجمالی **</label>
                                <div class="col-lg-10">
                                    <textarea class="form-control" name="content"  cols="60" rows="5"><?php if(isset($content)){ echo $content ;} ?></textarea>

                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">ویژگی‌های خاص</label>
                                <div class="col-sm-10">
                                    <input type="text" name="property"  class="form-control" value="<?php if(isset($property)){ echo $property ;} ?>" placeholder="مثال : مقاوم در برابر آب دارای بدنه مقاوم فبلت مجهز به حس‌گر اثرانگشت مناسب عکاسی سلفی مناسب بازی دارای قلم ">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">انتخاب تصویر</label>
                                <div class="col-lg-10">
                                    <span class="help-block">لطفا تصویرهای مورد نظر برای این پست را از اینجا انتخاب نمایید *</span>
                                    <input type="file" name="image1">
                                    <input type="file" name="image2">
                                    <input type="file" name="image3">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-2" for="inputSuccess">برند *</label>
                                <div class="col-lg-10">
                                    <?php
                                    $sql = "SELECT * FROM brands_tbl WHERE category='لوازم جانبی'";
                                    if (isset($conn)) {
                                        $res = mysqli_query($conn, $sql);
                                        $count = mysqli_num_rows($res);
                                    }
                                    if($count > 0){

                                        while ($rows = mysqli_fetch_assoc($res)){
                                            $id = $rows['id'];
                                            $title = $rows['title'];
                                            ?>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="brand" id="optionsRadios2" value="<?= $title  ?>">
                                                    <?= $title ?>

                                                </label>
                                            </div>
                                            <?php

                                        }
                                    }

                                    ?>

                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-2" for="inputSuccess">وزن محصول </label>
                                <div class="col-lg-10">
                                    <input type="text" name="weight"  class="form-control" value="<?php if(isset($weight)){ echo $weight ;} ?>" placeholder="مثال : 250 گر م (برای محصولات کوچک میتواند خالی باشد) ">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-2" for="inputSuccess">طول یا ابعاد </label>
                                <div class="col-lg-10">
                                    <input type="text" name="length"  class="form-control" value="<?php if(isset($length)){ echo $length ;} ?>" placeholder="مثال : سیم با طول 25سانتی متر یا محصولی با ابعاد 150×50 ">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">گارانتی یا ضمانت </label>
                                <div class="col-sm-10">
                                    <input type="text" name="garanty"  class="form-control" value="<?php if(isset($garanty)){ echo $garanty;} ?>" placeholder="مثال : ۱۸ ماهه دیجی اسمارت ">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">نوع اتصال </label>
                                <div class="col-sm-10">
                                    <input type="text" name="connect"  class="form-control" value="<?php if(isset($connect)){ echo $connect ;} ?>" placeholder="مثال : باسیم یا بیسیم ">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">موجودی در انبار *</label>
                                <div class="col-sm-10">
                                    <input type="number" name="count"  class="form-control" value="<?php if(isset($count)){ echo $count ;} ?>" placeholder="تعداد را به عدد وارد کنید مثال : 20 ">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">ساختار بدنه</label>
                                <div class="col-sm-10">
                                    <input type="text" name="Structure"  class="form-control" value="<?php if(isset($structure)){ echo $structure ;} ?>"  placeholder="مثال :  جنس فلزی و پلاستیک خشک ">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">پشتیبانی از کارت حافظه جانبی</label>
                                <div class="col-sm-10">
                                    <input type="text" name="or_ram"  class="form-control" value="<?php if(isset($or_ram)){ echo $or_ram ;} ?>" placeholder="مثال : اگر دارد نوشته شود و اگر ندارد وارد نکنید">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-2" for="inputSuccess">رنگ محصول(میتوانید تا 3 رنگ انتخاب کنید)</label>
                                <div class="col-lg-10">
                                    <?php
                                    $sql1 = "SELECT * FROM color_tbl";
                                    if (!empty($conn)) {
                                        $res = mysqli_query($conn,$sql1);
                                    }
                                    if($res){
                                        $count = mysqli_num_rows($res);
                                        if($count > 0){
                                            while($rows=mysqli_fetch_assoc($res)){
                                                $id = $rows['id'];
                                                $color_name = $rows['color_name'];
                                                $color_code = $rows['color_code'];
                                                $back_color = "background-color: ".$color_code;
                                                ?>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" name="color[]"  value="<?= $color_code ?>">
                                                    <?= $color_name ?>

                                                </label>
                                                <?php
                                            }}}
                                    ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label"> قیمت محصول به تومان</label>
                                <div class="input-group m-bot15">
                                    <span class="input-group-addon">تومان</span>
                                    <input type="text" name="price" class="form-control"  value="<?php if(isset($price)){ echo $price ;} ?>" placeholder=" مثال :   120000">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-lg-2" for="inputSuccess">تاریخ *</label>
                                <div class="col-sm-6">
                                    <input id="dp1" type="date" name="date" value="<?php if(isset($date)){ echo $date ;} ?>" class="form-control" size="16" >

                                </div>
                            </div>

                            <input type="hidden" name="category" value="<?= $label ?>">
                            <input type="submit" name="submit" class="btn btn-primary btn-lg btn-block" value=" اتمام و ارسال محصول به فروشگاه" >

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





