<?php
include('./partials-panel/header.html');
?>
<?php
if(isset($_GET['id']) & !empty($_GET['id'])){
    $id_product =  $_GET['id'];
    $sql  = " SELECT * FROM product_lab WHERE id='$id_product' ";
    if (isset($conn)) {
        $res = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($res);
        if($count > 0){
            $rows = mysqli_fetch_assoc($res);
            $fa_title   = $rows['fa_title'];
            $en_title = $rows['en_title'];
            $content   = $rows['content'];
            $brand = $rows['brand'];
            $dimensions = $rows['dimensions'];
            $weight = $rows['weight'];
            $battery = $rows['battery'];
            $property   = $rows['property'];
            $cash = $rows['cash'];
            $cpu_mark = $rows['cpu_mark'];
            $cpu_model = $rows['cpu_model'];
            $cpu_graf   = $rows['cpu_graf'];
            $screen   = $rows['screen'];
            $systm   = $rows['systm'];
            $garanty   = $rows['garanty'];
            $ram   = $rows['ram'];
            $rom   = $rows['rom'];
            $count   = $rows['available'];
            $price   = $rows['price'];
            $port_tc   = $rows['port_typec'];
            $port_u3   = $rows['port_usb3'];
            $port_u2   = $rows['port_usb2'];
            $connect   = $rows['connect'];
            $image_name1 = $rows['image_1'];
            $image_name2 = $rows['image_2'];
            $image_name3 = $rows['image_3'];
            $image_name4 = $rows['image_4'];
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
                        <h3>ویرایش <?= $fa_title?></h3>

                    </header>
                    <div class="panel-body">
                        <form action="#" method="post" enctype="multipart/form-data" class="form-horizontal tasi-form" >
                            <div class="form-group">
                                <label class="col-sm-2 control-label">عنوان اصلی محصول (فارسی)*</label>
                                <div class="col-sm-10">
                                    <input type="text" name="fa-title"  class="form-control" value="<?php if(isset($fa_title)){ echo $fa_title ;} ?>" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">عنوان محصول به (انگلیسی)*</label>
                                <div class="col-sm-10">
                                    <input type="text" name="en-title"  class="form-control" value="<?php if(isset($en_title)){ echo $en_title ;} ?>" >
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
                                    <input type="text" name="Property"  class="form-control" value="<?php if(isset($property)){ echo $property ;} ?>" >
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">بررسی صفحه نمایش</label>
                                <div class="col-sm-10">
                                    <input type="text" name="screen"  class="form-control" value="<?php if(isset($screen)){ echo $screen ;} ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">بررسی RAM</label>
                                <div class="col-sm-10">
                                    <input type="text" name="ram"  class="form-control" value="<?php if(isset($ram )){ echo $ram ;} ?>" >
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">حافظه Cache</label>
                                <div class="col-sm-10">
                                    <input type="text" name="cash"  class="form-control" value="<?php if(isset($cash)){ echo $cash ;} ?>" >
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">وزن </label>
                                <div class="col-sm-10">
                                    <input type="text" name="weight"  class="form-control" value="<?php if(isset($weight)){ echo $weight ;} ?>" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">ابعاد</label>
                                <div class="col-sm-10">
                                    <input type="text" name="dimensions"  class="form-control" value="<?php if(isset($dimensions)){ echo $dimensions ;} ?>" >
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
                                    <br>
                                    <?php if(!empty($image_name4)){ ?><img src="<?= "../images/products/".$image_name4 ?>" class="img-responsive image-box" alt=""> <?php } ?>
                                    <span>انتخاب یا تغییر تصویر شماره چهار</span>
                                    <input type="file" name="image4">
                                    <br>

                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label"> برند  </label>
                                <div class="col-sm-10">
                                    <input type="text" name="brand"  class="form-control" value="<?php if(isset($brand)){ echo $brand ;} ?>" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label"> سیستم عامل </label>
                                <div class="col-sm-10">
                                    <input type="text" name="systm"  class="form-control" value="<?php if(isset($systm)){ echo $systm ;} ?>" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">گارانتی یا ضمانت </label>
                                <div class="col-sm-10">
                                    <input type="text" name="garanty"  class="form-control" value="<?php if(isset($garanty)){ echo $garanty ;} ?>" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">برسی حافظه داخلی</label>
                                <div class="col-sm-10">
                                    <input type="text" name="rom"  class="form-control" value="<?php if(isset($rom)){ echo $rom ;} ?>"  >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">موجودی در انبار *</label>
                                <div class="col-sm-10">
                                    <input type="number" name="count"  value="<?php if(isset($count)){ echo $count ;} ?>" class="form-control" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">درگاه ها ارتباطی </label>
                                <div class="col-sm-10">
                                    <input type="text" name="connect"  class="form-control" value="<?php if(isset($connect)){ echo $connect ;} ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">پورت USB_2</label>
                                <div class="col-sm-10">
                                    <input type="number" name="port_u2"  value="<?php if(isset($port_u2)){ echo $port_u2 ;} ?>" class="form-control" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">پورتUSB_3</label>
                                <div class="col-sm-10">
                                    <input type="number" name="port_u3"  value="<?php if(isset($port_u3)){ echo $port_u3 ;} ?>" class="form-control" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">پورت type C</label>
                                <div class="col-sm-10">
                                    <input type="number" name="port_tc"  value="<?php if(isset($port_tc)){ echo $port_tc ;} ?>" class="form-control" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">اندازه صفحه نمایش</label>
                                <div class="col-sm-10">
                                    <input type="text" name="screen"  value="<?php if(isset($screen)){ echo $screen ;} ?>" class="form-control" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">سازنده پردازنده</label>
                                <div class="col-sm-10">
                                    <input type="text" name="cpu_mark"  value="<?php if(isset($cpu_mark)){ echo $cpu_mark ;} ?>" class="form-control" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">توضیحات پردازنده </label>
                                <div class="col-sm-10">
                                    <input type="text" name="cpu_model"  class="form-control" value="<?php if(isset($cpu_model)){ echo $cpu_model ;} ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">توضیحات باتری</label>
                                <div class="col-sm-10">
                                    <input type="text" name="battery"  class="form-control" value="<?php if(isset($battery)){ echo $battery ;} ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">توضیحات پردازنده گرافیکی</label>
                                <div class="col-sm-10">
                                    <input type="text" name="cpu_graf"  value="<?php if(isset($cpu_graf)){ echo $cpu_graf ;} ?>" class="form-control" >
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">  قیمت محصول به تومان *</label>
                                <div class="input-group m-bot15">
                                    <span class="input-group-addon">تومان</span>
                                    <input type="text" name="price" class="form-control" value="<?php if(isset($price)){ echo $price ;} ?>" >
                                </div>
                            </div>
                            <input type="hidden" name="img1" value="<?=  $image_name1 ?>">
                            <input type="hidden" name="img2" value="<?=  $image_name2 ?>">
                            <input type="hidden" name="img3" value="<?=  $image_name3 ?>">
                            <input type="hidden" name="img4" value="<?=  $image_name4 ?>">
                            <input type="hidden" name="id" value="<?= $id_product ?>">
                            <input type="submit" name="submit" class="btn btn-primary btn-lg btn-block" value=" اتمام و ارسال محصول به فروشگاه" >

                        </form>
                    </div>
                </section>
            </div>
            <?php
            if(isset($_POST['submit'])){
                $id = $_POST['id'];
                $fa_title   = $_POST['fa-title'];
                $en_title   = $_POST['en-title'];
                $content   = $_POST['content'];
                $brand = $_POST['brand'];
                $dimensions = $_POST['dimensions'];
                $weight = $_POST['weight'];
                $battery = $_POST['battery'];
                $property   = $_POST['Property'];
                $cash = $_POST['cash'];
                $cpu_mark = $_POST['cpu_mark'];
                $cpu_model = $_POST['cpu_model'];
                $cpu_graf   = $_POST['cpu_graf'];
                $screen   = $_POST['screen'];
                $systm   = $_POST['systm'];
                $garanty   = $_POST['garanty'];
                $ram   = $_POST['ram'];
                $rom   = $_POST['rom'];
                $count   = $_POST['count'];
                $price   = $_POST['price'];
                $port_tc   = $_POST['port_tc'];
                $port_u3   = $_POST['port_u3'];
                $port_u2   = $_POST['port_u2'];
                $connect   = $_POST['connect'];
                $last_image1 = $_POST['img1'];
                $last_image2 = $_POST['img2'];
                $last_image3 = $_POST['img3'];

                if(isset($_FILES['image1']['name'])){
                    $image_name11 = $_FILES['image1']['name'];
                    $exe = explode(".",$image_name11);
                    $exe = end($exe);
                    $image_name11 = "new_products_".rand(0000,9999).".".$exe;
                    $tmp_image = $_FILES['image1']['tmp_name'];
                    $image_path = "../images/products/".$image_name11;
                    $upload_image = move_uploaded_file($tmp_image,$image_path);

                    if($upload_image) {
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
                    $image_name22 = "new_products_".rand(0000,9999).".".$exe;
                    $tmp_image2 = $_FILES['image2']['tmp_name'];
                    $image_path2 = "../images/products/".$image_name22;
                    $upload_image2 = move_uploaded_file($tmp_image2,$image_path2);

                    if($upload_image2){
                        $last_image2 = $image_name22;
                        if(!empty($_POST['img2'])){
                            $img2 = $_POST['img2'];
                            $image_path = "../images/products/".$img2;
                            $remove = unlink($image_path);
                        }
                    }

                }
                if(isset($_FILES['image3']['name'])){
                    $image_name33 = $_FILES['image3']['name'];
                    $exe = explode(".",$image_name33);
                    $exe = end($exe);
                    $image_name33 = "new_products_".rand(0000,9999).".".$exe;
                    $tmp_image3 = $_FILES['image3']['tmp_name'];
                    $image_path3 = "../images/products/".$image_name33;
                    $upload_image3 = move_uploaded_file($tmp_image3,$image_path3);

                    if($upload_image3) {
                        $last_image3 = $image_name33;
                        if (!empty($_POST['img3'])) {
                            $img3 = $_POST['img3'];
                            $image_path = "../images/products/" . $img3;
                            $remove = unlink($image_path);
                        }
                    }
                }
                if(isset($_FILES['image4']['name'])){
                    $image_name44 = $_FILES['image4']['name'];
                    $exe = explode(".",$image_name44);
                    $exe = end($exe);
                    $image_name44 = "new_products_".rand(0000,9999).".".$exe;
                    $tmp_image4 = $_FILES['image4']['tmp_name'];
                    $image_path4 = "../images/products/".$image_name44;
                    $upload_image4 = move_uploaded_file($tmp_image4,$image_path4);

                    if($upload_image4) {
                        $last_image4 = $image_name44;
                        if (!empty($_POST['img4'])) {
                            $img4 = $_POST['img4'];
                            $image_path = "../images/products/" . $img4;
                            $remove = unlink($image_path);
                        }
                    }
                }

                $sql2 =  "UPDATE product_lab SET
                fa_title   =  '$fa_title',
                en_title   = '$en_title',
                content   = '$content',
                property   = '$property',
                brand = '$brand',
                cash = '$cash',
                cpu_mark = '$cpu_mark',
                cpu_graf   = '$cpu_graf',
                systm   = '$systm',
                garanty   = '$garanty',
                ram   = '$ram',
                cpu_model = '$cpu_model',
                weight = '$weight',
                battery = '$battery',
                dimensions ='$dimensions',
                rom   = '$rom',
                image_1 = '$last_image1',
                image_2 = '$last_image2',
                image_3 = '$last_image3',
                image_4 = '$last_image4',
                available   = '$count',
                price   = '$price',
                screen   = '$screen',
                connect   = '$connect',
                port_typec   = '$port_tc',
                port_usb2   = '$port_u2',
                port_usb3   = '$port_u3' WHERE id='$id'";
                $res = mysqli_query( $conn,$sql2);
                if($res){
                    $_SESSION['update-product-success'] = "<div class='success'> ویرایش انجام شد</div>";
                    redirect(asset('manage-products.php?category=لپ تاپ'));
                    mysqli_close($conn);
                }else{
                    $_SESSION['update-product-error'] = "<div class='error'> ویرایش انجام نشد</div>";
                    redirect(asset('manage-products.php?category=لپ تاپ'));
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
