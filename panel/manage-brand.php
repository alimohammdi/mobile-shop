<?php
include('./partials-panel/header.html');
include('./partials-panel/sidebar.html');
?>
<?php
if (isset($_POST['submit'])) {
    if (!empty($_POST['new-brand']) & isset($_POST['brand1'])) {
        $new_brand = $_POST['new-brand'];
        $category = $_POST['brand1'];
        $sql_search_brand = "select * from  brands_tbl where  title='$new_brand' AND category='$category'";
        if (isset($conn)) {
            $res = mysqli_query($conn, $sql_search_brand);
            if ($res) {
                $count = mysqli_num_rows($res);
                if ($count == 0) {
                    $sql = "insert into brands_tbl set title='$new_brand',category='$category'";
                    if (isset($conn)) {
                        $res1 = mysqli_query($conn, $sql);
                        if ($res1) {
                            $_SESSION['add-brand'] = "<div class='success'> برند با موفقیت اضافه شد  </div>";
                        } else {
                            $_SESSION['add-brand'] = "<div class='error'> متاسفانه مشکلی در اضافه کردن برند رخ داد </div>";
                        }
                    }
                } else {
                    $_SESSION['add-brand'] = "<div class='alarm'> برند وارد شده موجود میباشد   </div>";
                }
            }
        }

    } else {
        $_SESSION['add-brand'] = "<div class='alarm'> لطفا فیلد را پر کنید  </div>";
    }

}
?>
<?php
if(isset($_POST['submit-delete'])){
    if(!empty($_POST['title']) & !empty($_POST['category'])){
        $title = $_POST['title'];
        $category = $_POST['category'];
        $sql2 = "DELETE FROM brands_tbl WHERE title='$title' AND category='$category'";
        if (isset($conn)) {
            $res2 = mysqli_query($conn,$sql2);
            if($res2){
                $_SESSION['delete-brands'] = "<div class='error'> برند حذف شد  </div>";
            }else{
                $_SESSION['delete-brands'] = "<div class='error'>برند حذف نشد لطفا دوباره تلاش کنید </div>";
            }
        }
    }}
?>


<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <div class="col-sm-6">
            <section class="panel">
                <header class="panel-heading">
                    <h2>نمایش برند محصولات</h2>
                    <?php if(isset($_SESSION['add-brand'])){
                        echo $_SESSION['add-brand'];
                        unset ($_SESSION['add-brand']);
                    }
                    if(isset($_SESSION['delete-brands'])){
                        echo $_SESSION['delete-brands'];
                        unset ($_SESSION['delete-brands']);
                    }

                    ?>

                </header>
                <div class="panel-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="full name">نام برند را وارد نمایید  </label>
                            <input type="text" name="new-brand" class="form-control"  >
                            <br>
                            <label for="full name">دسته بندی را انتخاب نمایید</label>
                            <div class="form-group">
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="brand1" id="optionsRadios1" value="گوشی هوشمند" >گوشی هوشمند
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="brand1" id="optionsRadios1" value="لپ تاپ" >لپ تاپ
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="brand1" id="optionsRadios1" value="لوازم جانبی" >لوازم جانبی
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="brand1" id="optionsRadios1" value="قاب و گلس" >قاب و گلس
                                    </label>
                                </div>

                            </div>
                            <input type="submit" value="اضافه کن" name="submit" class="btn btn-info">
                        </div>
                    </form>
                </div>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>     نام برند   </th>
                        <th>     دسته بندی   </th>
                        <th>  </th>
                        <td></td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $num = 1;
                    $sql1 = "SELECT * FROM brands_tbl";

                    if (!empty($conn)) {
                        $res = mysqli_query($conn,$sql1);
                    }
                    if($res){
                        $count = mysqli_num_rows($res);
                        if($count > 0){
                            while($rows=mysqli_fetch_assoc($res)){
                                $id = $rows['id'];
                                $title = $rows['title'];
                                $category = $rows['category'];

                                ?>
                                <tr>
                                    <td><?= $num++ ?> </td>
                                    <td><?= $title ?></td>
                                    <td><?= $category ?></td>
                                    <td></td>
                                    <td>
                                        <form action="" method="post">
                                            <input type="hidden" name="title" value="<?= $title?>">
                                            <input type="hidden" name="category" value="<?= $category?>">
                                            <input type="submit" value="حدف " name="submit-delete" class="btn btn-danger">
                                        </form>
                                    </td>
                                </tr>
                                <?php

                            }
                        }
                    }

                    ?>



                    </tbody>
                </table>
            </section>
        </div>


        <!-- page end-->
    </section>
</section>
<!--main content end-->
<?php





?>
<!-- js placed at the end of the document so the pages load faster -->
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.scrollTo.min.js"></script>
<script src="js/jquery.nicescroll.js" type="text/javascript"></script>


<!--common script for all pages-->
<script src="js/common-scripts.js"></script>