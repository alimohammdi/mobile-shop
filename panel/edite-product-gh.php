<?php
include('./partials-panel/header.html');

if(isset($_GET['id']) & !empty($_GET['id'])){
    $id_product =  $_GET['id'];
    $sql  = " SELECT * FROM product_ghab WHERE id='$id_product' ";
    if (isset($conn)) {
        $res = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($res);
        if($count > 0){
            $rows = mysqli_fetch_assoc($res);
            $fa_title   = $rows['fa_title'];
            $weight   = $rows['weight'];
            $one_title = $rows['one_title'];
            $content   = $rows['content'];
            $category = $rows['category'];
            $brand   = $rows['brand'];
            $property = $rows['property'];
            $count   = $rows['available'];
            $price   = $rows['price'];
            $structure   = $rows['structure'];
            $image_name1 = $rows['image_1'];
            $image_name2 = $rows['image_2'];
            $image_name3 = $rows['image_3'];
        }
    }
}else{
    redirect(asset('manage-products.php'));
}
?>
<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        <h3>ویرایش محصول فروشگاه </h3>

                    </header>
                    <div class="panel-body">
                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal tasi-form" >
                            <div class="form-group">
                                <label class="col-sm-2 control-label">سازگار با گوشی *</label>
                                <div class="col-sm-10">
                                    <input type="text" name="fa-title"  class="form-control" value="<?php if(isset($fa_title)){ echo $fa_title ;} ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">عنوان تکی محصول (فارسی)*</label>
                                <div class="col-sm-10">
                                    <input type="text" name="one-title"  class="form-control" value="<?php if(isset($one_title)){ echo $one_title ;} ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">نقد و برسی اجمالی (توضیحات)*</label>
                                <div class="col-lg-10">
                                    <textarea class="form-control" name="content"  cols="60" rows="5"><?php if(isset($content)){ echo $content ;} ?></textarea>

                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">انتخاب تصویر</label>
                                <div class="col-lg-10">
                                    <?php if(!empty($image_name1)){ ?><img src="<?= "../images/products/".$image_name1 ?>" class="img-responsive image-box" alt=""> <?php } ?>
                                    <span>انتخاب یا تغییر تصویر شماره یک</span>
                                    <input type="file" name="image1">
                                    <br>

                                    <?php if(!empty($image_name2)){ ?><img src="<?= "../images/products/".$image_name2 ?>" class="img-responsive image-box" alt=""> <?php } ?>
                                    <span>انتخاب یا تغییر تصویر شماره دو</span>
                                    <input type="file" name="image2">
                                    <br>

                                    <?php if(!empty($image_name3)){ ?><img src="<?= "../images/products/".$image_name3 ?>" class="img-responsive image-box" alt=""> <?php } ?>
                                    <span>انتخاب یا تغییر تصویر شماره سه</span>
                                    <input type="file" name="image3">




                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-2" for="inputSuccess">برند محصول یا برند گوشی *</label>
                                <div class="col-lg-10">
                                    <input type="text" name="brand"  class="form-control" value="<?php if(isset($brand)){ echo $brand ;} ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">موجودی در انبار </label>
                                <div class="col-sm-10">
                                    <input type="number" name="count"  class="form-control" value="<?php if(isset($count)){ echo $count ;} ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label"> ساختار بدنه یا جنس </label>
                                <div class="col-sm-10">
                                    <input type="text" name="structure"  class="form-control" value="<?php if(isset($structure)){ echo $structure ;} ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">وزن گوشی</label>
                                <div class="col-sm-10">
                                    <input type="text" name="weight"  class="form-control" value="<?php if(isset($weight)){ echo $weight ;} ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">ویژگی های خاص محصول</label>
                                <div class="col-sm-10">
                                    <input type="text" name="property"  class="form-control" value="<?php if(isset($property)){ echo $property ;} ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label"> قیمت محصول به تومان</label>
                                <div class="input-group m-bot15">
                                    <span class="input-group-addon">تومان</span>
                                    <input type="text" name="price" class="form-control"  value="<?php if(isset($price)){ echo $price ;} ?>">
                                </div>
                            </div>

                            <input type="hidden" name="img1" value="<?=  $image_name1 ?>">
                            <input type="hidden" name="img2" value="<?=  $image_name2 ?>">
                            <input type="hidden" name="img3" value="<?=  $image_name3 ?>">
                            <input type="hidden" name="id" value="<?= $id_product ?>">
                            <input type="submit" name="submit" class="btn btn-primary btn-lg btn-block" value=" ویرایش و ارسال محصول به فروشگاه" >

                        </form>
                    </div>
                </section>
            </div>

            <?php
            if(isset($_POST['submit'])){
                $id = $_POST['id'];
                $fa_title   = $_POST['fa-title'];
                $one_title   = $_POST['one-title'];
                $content   = $_POST['content'];
                $brand   = $_POST['brand'];
                $count   = $_POST['count'];
                $weight   = $_POST['weight'];
                $price   = $_POST['price'];
                $property  = $_POST['property'];
                $structure   = $_POST['structure'];
                $last_image1 = $_POST['img1'];
                $last_image2 = $_POST['img2'];
                $last_image3 = $_POST['img3'];
                if(isset($_POST['category'])){
                    $category = $_POST['category'];
                }else{
                    $category = $_POST['base_category'];
                }

                if(isset($_FILES['image1']['name'])){
                    $image_name11 = $_FILES['image1']['name'];
                    $exe = explode(".",$image_name11);
                    $exe = end($exe);
                    $image_name11 = "new_products_ghab".rand(0000,9999).".".$exe;
                    $tmp_image = $_FILES['image1']['tmp_name'];
                    $image_path = "../images/products/".$image_name11;
                    $upload_image1 = move_uploaded_file($tmp_image,$image_path);

                    if($upload_image1) {
                        $last_image1 = $image_name11;
                        if (!empty($_POST['img1'])) {
                            $img1 = $_POST['img1'];
                            $image_path = "../images/products/" .$img1;
                            $remove = unlink($image_path);
                        }
                    }
                }
                if(isset($_FILES['image2']['name'])){
                    $image_name22 = $_FILES['image2']['name'];
                    $exe = explode(".",$image_name22);
                    $exe = end($exe);
                    $image_name22 = "new_products_ghab".rand(0000,9999).".".$exe;
                    $tmp_image2 = $_FILES['image2']['tmp_name'];
                    $image_path2 = "../images/products/".$image_name22;
                    $upload_image2 = move_uploaded_file($tmp_image2,$image_path2);

                    if($upload_image2){
                        $last_image2 = $image_name22;
                        if(!empty($_POST['img2'])){
                            $img1 = $_POST['img2'];
                            $image_path = "../images/products/".$img1;
                            $remove = unlink($image_path);
                        }
                    }

                }
                if(isset($_FILES['image3']['name'])){
                    $image_name33 = $_FILES['image3']['name'];
                    $exe = explode(".",$image_name33);
                    $exe = end($exe);
                    $image_name33 = "new_products_ghab".rand(0000,9999).".".$exe;
                    $tmp_image3 = $_FILES['image3']['tmp_name'];
                    $image_path3 = "../images/products/".$image_name33;
                    $upload_image3 = move_uploaded_file($tmp_image3,$image_path3);

                    if($upload_image3) {
                        $last_image3 = $image_name33;
                        if (!empty($_POST['img3'])) {
                            $img1 = $_POST['img3'];
                            $image_path = "../images/products/" . $img1;
                            $remove = unlink($image_path);
                        }
                    }
                }

                $sql2 =  "UPDATE product_ghab SET
                fa_title   ='$fa_title',
                one_title ='$one_title',
                content   ='$content',
                category ='$category',
                weight   ='$weight',
                brand   ='$brand',
                image_1 ='$last_image1',
                image_2 ='$last_image2',
                image_3 ='$last_image3',
                available = '$count',
                property = '$property',
                price   = '$price',
                structure   = '$structure' WHERE id='$id'";
                $res = mysqli_query($conn,$sql2);
                if($res){
                    $_SESSION['update-product-success'] = "<div class='success'> ویرایش انجام شد</div>";
                    redirect(asset('manage_product_ghab.php'));
                    mysqli_close($conn);
                }else{
                    $_SESSION['update-product-error'] = "<div class='error'> ویرایش انجام نشد</div>";
                    redirect(asset('manage_product_ghab.php'));
                    mysqli_close($conn);
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

