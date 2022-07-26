<?php
include('./partials-panel/header.html');
include('./partials-panel/sidebar.html');
?>
<?php
if (isset($_POST['submit'])) {
    if (!empty($_POST['new-color']) & isset($_POST['color-id'])) {
        $new_color = $_POST['new-color'];
        $color_id = $_POST['color-id'];
        $sql_search_color = "select * from  color_tbl where  color_name='$new_color' AND color_code='$color_id'";
        if (isset($conn)) {
            $res = mysqli_query($conn, $sql_search_color);
            if ($res) {
                $count = mysqli_num_rows($res);
                if ($count == 0) {
                    $sql = "insert into color_tbl set color_name='$new_color',color_code='$color_id'";
                    if (isset($conn)) {
                        $res1 = mysqli_query($conn, $sql);
                        if ($res1) {
                            $_SESSION['add-color'] = "<div class='success'> رنگ با موفقیت اضافه شد  </div>";
                        } else {
                            $_SESSION['add-color'] = "<div class='error'> متاسفانه مشکلی در اضافه کردن رنگ رخ داد </div>";
                        }
                    }
                } else {
                    $_SESSION['add-color'] = "<div class='alarm'> رنگ وارد شده موجود میباشد   </div>";
                }
            }
        }

    } else {
        $_SESSION['add-color'] = "<div class='alarm'> لطفا فیلد را پر کنید  </div>";
    }

}
?>
<?php
if(isset($_POST['submit-delete'])){
    if(!empty($_POST['color_name']) & !empty($_POST['color_code'])){
        $color_name = $_POST['color_name'];
        $color_code = $_POST['color_code'];
        $sql2 = "DELETE FROM color_tbl WHERE color_name='$color_name' AND color_code='$color_code'";
        if (isset($conn)) {
            $res2 = mysqli_query($conn,$sql2);
            if($res2){
                $_SESSION['delete-color'] = "<div class='error'> رنگ مورد نظر حذف شد  </div>";
            }else{
                $_SESSION['delete-color'] = "<div class='error'>رنگ مورد نظر حذف نشد لطفا دوباره تلاش کنید </div>";
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
                    <?php if(isset($_SESSION['add-color'])){
                        echo $_SESSION['add-color'];
                        unset ($_SESSION['add-color']);
                    }
                    if(isset($_SESSION['delete-color'])){
                        echo $_SESSION['delete-color'];
                        unset ($_SESSION['delete-color']);
                    }

                    ?>

                </header>
                <div class="panel-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="full name">نام رنگ را وارد نمایید  </label>

                            <input type="text" name="new-color" class="form-control"  >
                            <br>
                            <label for="full name">با کلیک بر روی باکس رنگ مورد نظر را انتخاب نمایید </label>
                            <br>
                            <input type="color" name="color-id"    >
                            <br>
                            <br>
                            <br>
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
                                <tr>
                                    <td><?= $num++ ?> </td>
                                    <td><?= $color_name ?></td>
                                    <td><input type="submit" value=" " class="btn" style="<?= $back_color ?>"></td>
                                    <td></td>
                                    <td>
                                        <form action="" method="post">
                                            <input type="hidden" name="color_name" value="<?= $color_name?>">
                                            <input type="hidden" name="color_code" value="<?= $color_code?>">
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