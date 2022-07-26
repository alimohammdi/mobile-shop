<?php
include('./partials-panel/header.html')
?>
<?php
if(isset($_POST['submit'])){
    if(!empty($_POST['fa-title']) & !empty($_POST['price']) & !empty($_POST['count'])  & !empty($_POST['en-title']) & !empty($_POST['content']) & !empty($_FILES['image2']['name']) & !empty($_FILES['image1']['name']) & !empty($_FILES['image3']['name']) ){

                $fa_title   = $_POST['fa-title'];
                $en_title   = $_POST['en-title'];
                $content   = $_POST['content'];
                $category = $_POST['category'];
                $simcard = $_POST['simcard'];
                $dimensions = $_POST['dimensions'];
                $weight = $_POST['weight'];
                $battery = $_POST['battery'];
                $property   = $_POST['Property'];
                $camera = $_POST['camera'];
                $camera1 = $_POST['camera1'];
                $camera2 = $_POST['camera2'];
                $network   = $_POST['Network'];
                $brand   = $_POST['brand'];
                $systm   = $_POST['systm'];
                $garanty   = $_POST['garanty'];
                $ram   = $_POST['ram'];
                $rom   = $_POST['rom'];
                $count   = $_POST['count'];
                $price   = $_POST['price'];
                $screen   = $_POST['screen'];
                $processor   = $_POST['Processor'];
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
                   //     check image box for uploaded

                    if(isset($_FILES['image1']['name'])){
                        $image_name1 = $_FILES['image1']['name'];
                        if(!empty($image_name1)) {
                            $exe = explode(".", $image_name1);
                            $exe = end($exe);
                            $image_name1 = "new_products_" . rand(000, 999) . "." . $exe;
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
                    if(isset($_FILES['image4']['name'])){
                        $image_name4 = $_FILES['image4']['name'];
                        if(!empty($image_name4)) {
                            $exe4 = explode(".", $image_name4);
                            $exe4 = end($exe4);
                            $image_name4 = "new_products_" . rand(0000, 9999) . "." . $exe4;
                            $tmp_image4 = $_FILES['image4']['tmp_name'];
                            $image_path4 = "../images/products/" . $image_name4;
                            $upload_image = move_uploaded_file($tmp_image4, $image_path4);
                        }
                    }
                        $sql = "INSERT INTO products_tbl SET 
                            fa_title   =  '$fa_title',
                            en_title   = '$en_title',
                            content   = '$content',
                            category = '$category',
                            property   = '$property',
                            camera = '$camera',
                            camera1 = '$camera1',
                            camera2 = '$camera2',
                            network   = '$network',
                            brand   = '$brand',
                            systm   = '$systm',
                            garanty   = '$garanty',
                            ram   = '$ram',
                            simcard = '$simcard',
                            weight = '$weight',
                            battery = '$battery',
                            dimensions ='$dimensions',
                            rom   = '$rom',
                            image_1 = '$image_name1',
                            image_2 = '$image_name2',
                            image_3 = '$image_name3',
                            image_4 = '$image_name4',
                            available   = '$count',
                            sold = '$sold',
                            price   = '$price',
                            screen   = '$screen',
                            processor   = '$processor',
                            or_rom   = '$or_ram',
                            structure   = '$structure',
                            color='$chk',
                            date = '$date' ";
                        if (isset($conn)) {
                            $res = mysqli_query($conn, $sql);
                            if ($res) {
                                $_SESSION['add-products-success'] = "<div class='success'> محصول با موفقیت اضافه شد </div>";
                                redirect(asset('added-products.php'));
                                mysqli_close($conn);
                            } else {
                                $_SESSION['add-products-error'] = "<div class='error'> اضافه کردن محصول موفقیت امیز نبود لطفا دوباره تلاش کنید</div>";
                                redirect(asset('added-products.php'));
                                mysqli_close($conn);
                            }
                        }
    }
    else if(!empty($_POST['fa-title'])  || !empty($_POST['date'])  || !empty($_POST['price']) || !empty($_POST['en-title']) || !empty($_POST['content']) || !empty($_POST['count']) ){
        $_SESSION['add-products-alarm'] = "<div class='alarm'>   لطفا تمامی فیلدهای ستاره دار  را تکمیل کنید و حداقل 3 تصویر انتخاب کنید </div>";
        $fa_title   = $_POST['fa-title'];
        $en_title   = $_POST['en-title'];
        $content   = $_POST['content'];
        $property = $_POST['Property'];
        $price = $_POST['price'];
        $date = $_POST['date'];
        $simcard = $_POST['simcard'];
        $dimensions = $_POST['dimensions'];
        $weight = $_POST['weight'];
        $battery = $_POST['battery'];
        $camera = $_POST['camera'];
        $camera1 = $_POST['camera1'];
        $camera2 = $_POST['camera2'];
        $network   = $_POST['Network'];
        $brand   = $_POST['brand'];
        $systm   = $_POST['systm'];
        $garanty   = $_POST['garanty'];
        $ram   = $_POST['ram'];
        $rom   = $_POST['rom'];
        $count   = $_POST['count'];
        $screen   = $_POST['screen'];
        $processor   = $_POST['Processor'];
        $or_ram   = $_POST['or_ram'];
        $structure   = $_POST['Structure'];
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
                        <h3>اضافه کردن محصول به فروشگاه </h3>

                        <?php
                        if(isset($_SESSION['add-products-alarm'])){
                        echo $_SESSION['add-products-alarm'];
                        unset ($_SESSION['add-products-alarm']);

                        }?>
                    </header>
                    <div class="panel-body">
                        <form action="#" method="post" enctype="multipart/form-data" class="form-horizontal tasi-form" >
                            <div class="form-group">
                                <label class="col-sm-2 control-label">عنوان اصلی محصول (فارسی)*</label>
                                <div class="col-sm-10">
                                    <input type="text" name="fa-title"  class="form-control" value="<?php if(isset($fa_title)){ echo $fa_title ;} ?>" placeholder="مثال : سامسونگ مدل Galaxy Note 10 SM-N970F/DS دو سیم‌کارت ظرفیت 256 گیگابایت ">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">عنوان محصول به (انگلیسی)*</label>
                                <div class="col-sm-10">
                                    <input type="hidden" name="category" value="گوشی هوشمند">
                                    <input type="text" name="en-title"  class="form-control" value="<?php if(isset($en_title)){ echo $en_title ;} ?>" placeholder="مثال : Samsung Galaxy Note 10 Dual SIM 256GB Mobile Phone ">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">نقد و برسی اجمالی *</label>
                                <div class="col-lg-10">
                                    <textarea class="form-control" name="content"  cols="60" rows="5"><?php if(isset($content)){ echo $content ;} ?></textarea>

                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">ویژگی‌های خاص</label>
                                <div class="col-sm-10">
                                    <input type="text" name="Property"  class="form-control" value="<?php if(isset($property)){ echo $property ;} ?>" placeholder="مثال : مقاوم در برابر آب دارای بدنه مقاوم فبلت مجهز به حس‌گر اثرانگشت مناسب عکاسی سلفی مناسب بازی دارای قلم ">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">توضیحات و برسی دوربین ها </label>
                                <div class="col-lg-10">
                                    <textarea class="form-control" name="camera"  cols="60" rows="5"><?php if(isset($camera)){ echo $camera ;} ?></textarea>

                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">بررسی دوربین سلفی</label>
                                <div class="col-sm-10">
                                    <input type="text" name="camera1"  class="form-control" value="<?php if(isset($camera1)){ echo $camera1 ;} ?>" placeholder="مثال : رزولوشن ۲۱۶۰ × ۳۸۴۰ و سرعت ۲۴/۳۰/۶۰ فریم بر ثانیه (۴K@۲۴/۳۰/۶۰fps) رزولوشن ۱۰۸۰ × ۱۹۲۰ و سرعت ۳۰/۶۰/۱۲۰/۲۴۰ فریم بر ثانیه ">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">بررسی دوربین پشت</label>
                                <div class="col-sm-10">
                                    <input type="text" name="camera2"  class="form-control" value="<?php if(isset($camera2)){ echo $camera2 ;} ?>" placeholder="مثال : سنسور از نوع عریض (Wide) با رزولوشن ۱۲ مگاپیکسل و دریچه‌ی دیافراگم f/۲.۲، فاصله کانونی لنز ۲۳ میلی‌متر (Focus Length ۲۳ mm) و سایز سنسور ۱/۳.۶ اینچ (Sensor Size ۱/۳.۶ Inch) ">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">شبکه های ارتباطی</label>
                                <div class="col-sm-10">
                                    <input type="text" name="Network"  class="form-control" value="<?php if(isset($network)){ echo $network ;} ?>" placeholder="مثال : 2G، 3G، 4G ">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">وزن </label>
                                <div class="col-sm-10">
                                    <input type="text" name="weight"  class="form-control" value="<?php if(isset($weight)){ echo $weight ;} ?>" placeholder="مثال : 125 گرم ">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">ابعاد</label>
                                <div class="col-sm-10">
                                    <input type="text" name="dimensions"  class="form-control" value="<?php if(isset($dimensions)){ echo $dimensions ;} ?>" placeholder="مثال : ۱۶۰.۸x۷۸.۱x۷.۷ ">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">انتخاب تصویر</label>
                                <div class="col-lg-10">
                                    <span class="help-block">لطفا 3 تصویر مورد نظر برای این پست را از اینجا انتخاب نمایید *</span>
                                    <input type="file" name="image1">
                                    <input type="file" name="image2">
                                    <input type="file" name="image3">
                                    <input type="file" name="image4">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-2" for="inputSuccess">برند *</label>
                                <div class="col-lg-10">
                                    <?php
                                    $sql = "SELECT * FROM brands_tbl where category='گوشی هوشمند' ";
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
                                <label class="col-sm-2 control-label"> سیستم عامل </label>
                                <div class="col-sm-10">
                                    <input type="text" name="systm"  class="form-control" value="<?php if(isset($systm)){ echo $systm ;} ?>" placeholder="مثال : انروید(Android) ">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label"> توضیحات سیم کارت </label>
                                <div class="col-sm-10">
                                    <input type="text" name="simcard"  class="form-control" value="<?php if(isset($simcard)){ echo $simcard ;} ?>" placeholder="مثال : دو عدد
سایز نانو (۸.۸ × ۱۲.۳ میلی‌متر) ">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">گارانتی یا ضمانت </label>
                                <div class="col-sm-10">
                                    <input type="text" name="garanty"  class="form-control" value="<?php if(isset($garanty)){ echo $garanty ;} ?>" placeholder="مثال : ۱۸ ماهه دیجی اسمارت ">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">مقدار RAM </label>
                                <div class="col-sm-10">
                                    <input type="text" name="ram"  class="form-control" value="<?php if(isset($ram)){ echo $ram ;} ?>"  placeholder="مثال : ۱۸ گیگابایت ">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">موجودی در انبار *</label>
                                <div class="col-sm-10">
                                    <input type="number" name="count"  value="<?php if(isset($count)){ echo $count ;} ?>" class="form-control" placeholder="تعداد را به عدد وارد کنید مثال : 20 ">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">حافظه داخلی </label>
                                <div class="col-sm-10">
                                    <input type="text" name="rom"  class="form-control" value="<?php if(isset($rom)){ echo $rom ;} ?>" placeholder=" مثال : 256 گیگ  ">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">اندازه صفحه نمایش</label>
                                <div class="col-sm-10">
                                    <input type="text" name="screen"  value="<?php if(isset($screen)){ echo $screen ;} ?>" class="form-control" placeholder="مثال : 6.3 اینچ">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">پردازنده</label>
                                <div class="col-sm-10">
                                    <input type="text" name="Processor"  value="<?php if(isset($processor)){ echo $processor ;} ?>" class="form-control" placeholder="مثال : 64 بیت">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">ساختار بدنه </label>
                                <div class="col-sm-10">
                                    <input type="text" name="Structure"  class="form-control" value="<?php if(isset($structure)){ echo $structure ;} ?>" placeholder="مثال : فلز و شیشه (محافظ گوریلا گلس روی قاب پشتی و جلویی + قاب فولادی)">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">توضیحات باتری</label>
                                <div class="col-sm-10">
                                    <input type="text" name="battery"  class="form-control" value="<?php if(isset($battery)){ echo $battery ;} ?>" placeholder="مثال : باتری از نوع لیتیوم-یون پشتیبانی از شارژ سریع با توان ۲۰ وات پشتیبانی از شارژ سریع وایرلس ۱۵ وات USB Power Delivery ۲.۰ ">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">پشتیبانی از کارت حافظه جانبی</label>
                                <div class="col-sm-10">
                                    <input type="text" name="or_ram"  value="<?php if(isset($or_ram)){ echo $or_ram ;} ?>" class="form-control" placeholder="مثال : بصورت دارد یا ندارد نوشته شود">
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
                                <label class="col-sm-2 control-label">  قیمت محصول به تومان *</label>
                                    <div class="input-group m-bot15">
                                        <span class="input-group-addon">تومان</span>
                                        <input type="text" name="price" class="form-control" value="<?php if(isset($price)){ echo $price ;} ?>"  placeholder=" مثال :   120000">
                                    </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-lg-2" for="inputSuccess">تاریخ *</label>
                                <div class="col-sm-6">
                                    <input id="dp1" type="date" name="date"  value="<?php if(isset($date)){ echo $date ;} ?>" class="form-control" size="16" >

                                </div>
                            </div>


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




