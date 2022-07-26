<?php
include('./partials-panel/header.html');
if(isset($_GET['post_id']) & isset($_GET['category']) &  isset($_GET['id']) & isset($_GET['show'])){
    $id_comment = $_GET['id'];
    $id = $_GET['post_id'];
    $category = $_GET['category'];
    $position = $_GET['show'];
    if($category == "گوشی هوشمند"){
//        $tbl_name = "products_tbl";

        $sql = "SELECT * FROM  products_tbl WHERE id='$id'";
        if(isset($conn)){
            $res = mysqli_query($conn,$sql);
            if($res){
                $count = mysqli_num_rows($res);
                if($count == 1){
                    $rows = mysqli_fetch_assoc($res);
                    $fa_title   = $rows['fa_title'];
                    $image_name1 = $rows['image_1'];
                    $image_path = "../images/products/";
                }
            }
        }
    }
    if($category == "لپ تاپ"){
//        $tbl_name = "products_tbl";

        $sql = "SELECT * FROM  product_lab WHERE id='$id'";
        if(isset($conn)){
            $res = mysqli_query($conn,$sql);
            if($res){
                $count = mysqli_num_rows($res);
                if($count == 1){
                    $rows = mysqli_fetch_assoc($res);
                    $fa_title   = $rows['fa_title'];
                    $image_name1 = $rows['image_1'];
                    $image_path = "../images/products/";
                }
            }
        }
    }
    if($category == "قاب و گلس"){
//        $tbl_name = "products_tbl";

        $sql = "SELECT * FROM  product_ghab WHERE id='$id'";
        if(isset($conn)){
            $res = mysqli_query($conn,$sql);
            if($res){
                $count = mysqli_num_rows($res);
                if($count == 1){
                    $rows = mysqli_fetch_assoc($res);

                    $fa_title   = $rows['fa_title'];
                    $image_name1 = $rows['image_1'];
                    $image_path = "../images/products/";

                }
            }
        }
    }
    if($category == "لوازم جانبی"){
//        $tbl_name = "products_tbl";

        $sql = "SELECT * FROM  product_janeb WHERE id='$id'";
        if(isset($conn)){
            $res = mysqli_query($conn,$sql);
            if($res){
                $count = mysqli_num_rows($res);
                if($count == 1){
                    $rows = mysqli_fetch_assoc($res);
                    $fa_title   = $rows['fa_title'];
                    $image_name1 = $rows['image_1'];
                    $image_path = "../images/products/";

                }
            }
        }
    }
    if($category == "وبلاگ"){
//        $tbl_name = "products_tbl";

        $sql = "SELECT * FROM  weblog_tbl WHERE id='$id'";
        if(isset($conn)){
            $res = mysqli_query($conn,$sql);
            if($res){
                $count = mysqli_num_rows($res);
                if($count == 1){
                    $rows = mysqli_fetch_assoc($res);
                    $fa_title   = $rows['base_title'];
                    $image_name1 = $rows['image_weblog'];
                    $image_path = "../images/weblog/";

                }
            }
        }
    }

    $sql_content ="select content,answer from comment_tbl where post_id='$id' AND category_post='$category'";
    if(isset($conn)){
        $res_content =mysqli_query($conn,$sql_content);
        if($res_content){
            $rows = mysqli_fetch_assoc($res_content);
            $content = $rows['content'];
            $answer = $rows['answer'];
        }
    }
}else{
    redirect(asset('manage-comments.php'));
}
?>
?>
<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        <h3>مدیریت کامنت ها </h3>

                    </header>
                    <div class="panel-body">
                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal tasi-form" >
                            <div class="form-group">
                                <label class="col-sm-2 control-label">تصویر و عنوان پست </label>
                                <div class="col-lg-10">
                                    <span><?= $fa_title ?></span>
                                    <br>
                                    <br>
                                    <?php if(!empty($image_name1)){ ?><img src="<?php echo  $image_path . $image_name1 ?>" class="img-responsive image-box" alt=""> <?php } ?>
                                    <br>

                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">متن کامنت </label>
                                <div class="col-lg-10">
                                    <span><?= cot_blog($content ) ?></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">پاسخ به کامنت </label>
                                <div class="col-sm-10">
                                    <input type="text" name="answer"  class="form-control" value="<?php if(!empty($answer)){ echo $answer;}?>" >
                                </div>
                            </div>
                            <input type="hidden" name="id" value="<?=  $id_comment ?>">
                            <input type="hidden" name="position" value="<?=  $position ?>">
                            <input type="hidden" name="category" value="<?= $category ?>">
                            <input type="submit" name="submit" class="btn btn-primary btn-lg btn-block" value=" اتمام  و ارسال پاسخ " >

                        </form>
                    </div>
                </section>
            </div>
            <!-- page end-->
    </section>
</section>
<!--main content end-->
<?php
if(isset($_POST['submit'])){
    $id= $_POST['id'];
    $category= $_POST['category'];
    $position= $_POST['position'];
    if(isset($_POST['answer'])){
        $answer = $_POST['answer'];
        $sql_answer = "update comment_tbl set answer='$answer', confirmation='yes' where id='$id' AND category_post='$category'";
        $res_answer = mysqli_query($conn,$sql_answer);
        if($res_answer){
            $_SESSION['send-answer'] = "<div class='success'> پاسخ با موفقیت ارسال شد  </div>";
            redirect(asset('manage-comments.php?show='.$position));
        }
    }
}

?>

<!-- js placed at the end of the document so the pages load faster -->
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.scrollTo.min.js"></script>
<script src="js/jquery.nicescroll.js" type="text/javascript"></script>


<!--common script for all pages-->
<script src="js/common-scripts.js"></script>