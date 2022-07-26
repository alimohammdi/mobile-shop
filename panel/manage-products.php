<?php
include('./partials-panel/header.html');
?>
<?php
include('./partials-panel/sidebar.html');
if(isset($_GET['category'])){
    $category = $_GET['category'];
}
?>
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        <h2>مدیریت محصول <?= $category ?> </h2>
                        <?php
                                if(isset($_SESSION['delete-product-error'])) {
                                    echo $_SESSION['delete-product-error'];
                                    unset ($_SESSION['delete-product-error']);
                                }

                                if (isset($_SESSION['delete-product-success'])) {
                                    echo $_SESSION['delete-product-success'];
                                    unset ($_SESSION['delete-product-success']);
                                }
                        if (isset($_SESSION['update-product-success'])) {
                            echo $_SESSION['update-product-success'];
                            unset ($_SESSION['update-product-success']);
                        }
                        if (isset($_SESSION['update-product-error'])) {
                            echo $_SESSION['update-product-error'];
                            unset ($_SESSION['update-product-error']);
                        }
                                ?>

                        <table class="table table-striped border-top" >
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>عنوان</th>
                                <th class="hidden-phone">دسته بندی</th>
                                <th class="hidden-phone">قیمت</th>
                                <th class="hidden-phone">موجود در فروشگاه</th>
                                <th class="hidden-phone">فروخته شده</th>
                                <th class="hidden-phone"></th>
                            </tr>
                            </thead>

                            <?php
                            $n = 1;
                            if($category == "گوشی هوشمند"){
                                $sql = "SELECT  id,fa_title,category,price,available,sold  FROM   products_tbl   order by id DESC ";
                            }else if($category == "لپ تاپ"){
                                $sql = "SELECT  id,fa_title,category,price,available,sold  FROM   product_lab   order by id DESC ";
                            }

                            if (isset($conn)) {
                                $res = mysqli_query($conn,$sql);
                                if($res){
                                    $count = mysqli_num_rows($res);
                                    if($count > 0){
                                        while($rows = mysqli_fetch_assoc($res)){
                                            $id = $rows['id'];
                                            $title = $rows['fa_title'];
                                            $category = $rows['category'];
                                            $price = $rows['price'];
                                            $count_pro = $rows['available'];
                                            $sold = $rows['sold'];
                                            ?>

                                            <tbody>
                                            <tr>
                                                <td><?= $n++ ?></td>
                                                <td> <?= $title ?></td>
                                                <td class="center hidden-phone"><?=  $category?></td>
                                                <td class="hidden-phone"><?= $price ?> تومان</td>
                                                <td class="hidden-phone"><?= $count_pro ?></td>
                                                <td class="center hidden-phone"><?= $sold ?></td>

                                                <td>
                                                    <a href="<?= '../show-test-product.php' ?>?id=<?= $id ?>&category=<?= $category ?>"><button type="button" class="btn btn-warning">نمایش</button></a>
                                                    <?php
                                                    if($category == "گوشی هوشمند"){
                                                    ?>
                                                        <a href="<?= asset('update-product.php')?>?id=<?= $id ?>"><button type="button" class="btn btn-info">ویرایش</button></a>
                                                            <?php
                                                    }else if($category == "لپ تاپ"){
                                                    ?>
                                                        <a href="<?= asset('update-product-lab.php')?>?id=<?= $id ?>"><button type="button" class="btn btn-info">ویرایش</button></a>
                                                            <?php
                                                    }
                                                    ?>
                                                    <a href="<?= asset('delete-product.php')?>?id=<?= $id ?>&category=<?= $category ?>"><button type="button" class="btn btn-danger">حذف</button></a>
                                                </td>
                                            </tr>
                                            </tbody>
                                            <?php
                                        }
                                    }
                                }
                            }
                            ?>

                        </table>

                </section>
            </div>
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
<script type="text/javascript" src="assets/data-tables/jquery.dataTables.js"></script>
<script type="text/javascript" src="assets/data-tables/DT_bootstrap.js"></script>


<!--common script for all pages-->
<script src="js/common-scripts.js"></script>

<!--script for this page only-->
<script src="js/dynamic-table.js"></script>
