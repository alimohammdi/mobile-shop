<?php
include('./partials-panel/header.html')
?>
<?php
if(isset($_POST['submit'])){
    if(!empty($_POST['fa-title']) & !empty($_POST['price']) & !empty($_POST['count'])  & !empty($_POST['content']) & !empty($_FILES['image1']['name']) & !empty($_FILES['image2']['name'])){

        $fa_title   = $_POST['fa-title'];
        $weight   = $_POST['weight'];
        $one_title   = $_POST['one-title'];
        $content   = $_POST['content'];
        $category = $_POST['category'];
        $brand  = $_POST['brand'];
        $count   = $_POST['count'];
        $price   = $_POST['price'];
        $property   = $_POST['property'];
        $structure = $_POST['structure'];
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
            if(!empty($image_name1)){
                $exe = explode(".",$image_name1);
                $exe = end($exe);
                $image_name1 = "new-products-ghab_".rand(0000,9999).".".$exe;
                $tmp_image1 = $_FILES['image1']['tmp_name'];
                $image_path = "../images/products/".$image_name1;
                $upload_image = move_uploaded_file($tmp_image1,$image_path);
            }
        }
        if(isset($_FILES['image2']['name'])){
            $image_name2 = $_FILES['image2']['name'];
            if(!empty($image_name2)) {
                $exe2 = explode(".", $image_name2);
                $exe2 = end($exe2);
                $image_name2 = "new-products-ghab_" . rand(0000, 9999) . "." . $exe2;
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
                $image_name3 = "new-products-ghab_" . rand(0000, 9999) . "." . $exe3;
                $tmp_image3 = $_FILES['image3']['tmp_name'];
                $image_path3 = "../images/products/" . $image_name3;
                $upload_image = move_uploaded_file($tmp_image3, $image_path3);
            }
        }

        $sql = "INSERT INTO product_ghab SET 
                fa_title   =  '$fa_title',
                weight   = '$weight',
                one_title = '$one_title',
                content   = '$content',
                category = '$category',
                brand   = '$brand',
                image_1 = '$image_name1',
                image_2 = '$image_name2',
                image_3 = '$image_name3',
                available   = '$count',
                property   = '$property',
                sold = '$sold',
                price   = '$price',
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


    }else if(!empty($_POST['fa-title']) || !empty($_POST['en-title'])){
        $_SESSION['add-products-alarm'] = "<div class='alarm'>  لطفا تمامی فیلدهای ستاره دار را تکمیل کنید  </div>";
        $fa_title   = $_POST['fa-title'];
        $weight   = $_POST['weight'];
        $one_title   = $_POST['one-title'];
        $content   = $_POST['content'];
        $brand  = $_POST['brand'];
        $count   = $_POST['count'];
        $price   = $_POST['price'];
        $property   = $_POST['property'];
        $structure = $_POST['structure'];
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
                        <h3>اضافه کردن محصول قاب به فروشگاه </h3>
                        <?php
                        if(isset($_SESSION['add-products-alarm'])){
                            echo $_SESSION['add-products-alarm'];
                            unset ($_SESSION['add-products-alarm']);

                        }?>
                    </header>
                    <div class="panel-body">
                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal tasi-form" >
                            <div class="form-group">
                                <label class="col-sm-2 control-label">سازگار با گوشی *</label>
                                <div class="col-sm-10">
                                    <input type="text" name="fa-title"  class="form-control" value="<?php if(!empty($fa_title)){ echo $fa_title;} ?>" placeholder="مثال : قاب سامسونگ مدل Galaxy Note 10 SM-N970F/DS دو سیم‌کارت ظرفیت 256 گیگابایت ">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">عنوان تکی محصول (فارسی)*</label>
                                <div class="col-sm-10">
                                    <input type="hidden" name="category" value="قاب و گلس">
                                    <input type="text" name="one-title"  class="form-control" value="<?php if(!empty($one_title)){ echo $one_title;} ?>" placeholder="مثال : قاب گوشی سامسونگ A20 ">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">نقد و برسی اجمالی (توضیحات)*</label>
                                <div class="col-lg-10">
                                    <textarea class="form-control" name="content"  cols="60" rows="5"><?php if(!empty($content)){ echo $content ;} ?></textarea>

                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">انتخاب تصویر *</label>
                                <div class="col-lg-10">
                                    <span class="help-block">لطفا تصویرهای مورد نظر برای این پست را از اینجا انتخاب نمایید *</span>
                                    <input type="file" name="image1">
                                    <input type="file" name="image2">
                                    <input type="file" name="image3">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-2" for="inputSuccess">برند محصول یا برند گوشی *</label>
                                <div class="col-lg-10">
                                    <?php
                                    $sql = "SELECT * FROM brands_tbl WHERE category='قاب و گلس'";
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
                                <label class="control-label col-lg-2" for="inputSuccess">ویژگی های خاص این محصول</label>
                                <div class="col-lg-10">
                                    <input type="text" name="property"  class="form-control" value="<?php if(!empty($property)){ echo $property ;} ?>" placeholder="مثال : جنس سلیکونی با پوشش کامل دکمه ها و ضربه گیری عالی ">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">موجودی در انبار </label>
                                <div class="col-sm-10">
                                    <input type="number" name="count"  class="form-control" value="<?php if(!empty($count)){ echo $count ;} ?>" placeholder="تعداد را به عدد وارد کنید مثال : 20 ">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label"> ساختار بدنه یا جنس </label>
                                <div class="col-sm-10">
                                    <input type="text" name="structure"  class="form-control" value="<?php if(!empty($structure)){ echo $structure ;} ?>" placeholder="مثال :  جنس فلزی و پلاستیک خشک ">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">وزن گوشی</label>
                                <div class="col-sm-10">
                                    <input type="text" name="weight"  class="form-control" value="<?php if(!empty($weight)){ echo $weight ;} ?>" placeholder="مثال : ۱۵ گرم ">
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
                                <label class="col-sm-2 control-label"> قیمت محصول به تومان *</label>
                                <div class="input-group m-bot15">
                                    <span class="input-group-addon">تومان</span>
                                    <input type="text" name="price" class="form-control"  value="<?php if(!empty($price)){ echo $price ; }?>" placeholder=" مثال :   120000">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-lg-2" for="inputSuccess">تاریخ *</label>
                                <div class="col-sm-6">
                                    <input id="dp1" type="date" name="date" value="<?php if(!empty($date)){ echo $date ;} ?>" class="form-control" size="16" >

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
