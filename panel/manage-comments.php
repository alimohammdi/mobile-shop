<?php
include('./partials-panel/header.html');

include('./partials-panel/sidebar.html');
if(isset($_GET['show'])){
    $position = $_GET['show'];
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
                        <h2>مدیریت کامنت کاربران</h2>
                        <?php
                        if(isset($_SESSION['delete-comment'])) {
                            echo $_SESSION['delete-comment'];
                            unset ($_SESSION['delete-comment']);
                        }

                        if (isset($_SESSION['send-answer'])) {
                            echo $_SESSION['send-answer'];
                            unset ($_SESSION['send-answer']);
                        }
                        ?>
                        <table class="table table-striped border-top" >
                            <thead>
                            <tr>
                                <th>#</th>
                                <th> عنوان کامنت </th>
                                <th class="hidden-phone">نام فرستنده</th>
                                <th class="hidden-phone">دسته بندی </th>
<!--                                <th class="hidden-phone">موجود در فروشگاه</th>-->
                                <th class="hidden-phone">وضعیت</th>
                                <th class="hidden-phone"></th>
                            </tr>
                            </thead>

                            <?php
                            if($position == 'all'){
                                $n = 1;
                                $sql = "SELECT  *  FROM   comment_tbl";
                                if (isset($conn)) {
                                    $res = mysqli_query($conn,$sql);
                                    if($res){
                                        $count = mysqli_num_rows($res);
                                        if($count > 0){
                                            while($rows = mysqli_fetch_assoc($res)){
                                                $id = $rows['id'];
                                                $name = $rows['user_name'];
                                                $category = $rows['category_post'];
                                                $post_id = $rows['post_id'];
                                                $answer = $rows['answer'];
                                                $content = $rows['content'];
                                                $confirmed = $rows['confirmation'];
                                                ?>

                                                <tbody>
                                                <tr>
                                                    <td><?= $n++ ?></td>
                                                    <td> <?= get_excerpt_comment($content) ?></td>
                                                    <td class="hidden-phone"><?=  $name ?></td>
                                                    <td class="center hidden-phone"><?=  $category?></td>
                                                    <?php
                                                    if(!empty($answer)){
                                                        ?>
                                                        <td class="hidden-phone success" >پاسخ داده شده</td>
                                                        <?php
                                                    }else{
                                                        ?>
                                                        <td class="hidden-phone error" >پاسخ داده نشده</td>
                                                        <?php
                                                    }
                                                    ?>


                                                    <td>
                                                        <form action="" method="post" >
                                                            <input type="hidden" name="id" value="<?= $id ?>">
                                                            <a href="<?= 'answer-to-comment.php'?>?post_id=<?= $post_id ?>&category=<?= $category ?>&id=<?= $id ?>&show=<?= $position ?>"><button type="button" class="btn btn-warning">نمایش و پاسخ</button></a>
                                                            <!--                                                        <button type="submit" name="submit1" class="btn btn-success">تایید</button>-->
                                                            <button type="submit" name="submit2" class="btn btn-danger">حذف</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                </tbody>
                                                <?php
                                            }
                                        }
                                    }
                                }
                            }if($position == 'Not-answer'){
                                $n = 1;
                                $sql = "SELECT  *  FROM   comment_tbl where answer = '' ";
                                if (isset($conn)) {
                                    $res = mysqli_query($conn,$sql);
                                    if($res){
                                        $count = mysqli_num_rows($res);
                                        if($count > 0){
                                            while($rows = mysqli_fetch_assoc($res)){
                                                $id = $rows['id'];
                                                $name = $rows['user_name'];
                                                $category = $rows['category_post'];
                                                $post_id = $rows['post_id'];
                                                $answer = $rows['answer'];
                                                $content = $rows['content'];
                                                $confirmed = $rows['confirmation'];
                                                ?>

                                                <tbody>
                                                <tr>
                                                    <td><?= $n++ ?></td>
                                                    <td> <?= get_excerpt_comment($content) ?></td>
                                                    <td class="hidden-phone"><?=  $name ?></td>
                                                    <td class="center hidden-phone"><?=  $category?></td>
                                                        <td class="hidden-phone error" >پاسخ داده نشده</td>
                                                    <td>
                                                        <form action="#" method="post" >
                                                            <input type="hidden" name="id" value="<?= $id ?>">
                                                            <a href="<?= 'answer-to-comment.php'?>?post_id=<?= $post_id ?>&category=<?= $category ?>&id=<?= $id ?>&show=<?= $position ?>"><button type="button" class="btn btn-warning">نمایش و پاسخ</button></a>
                                                            <!--                                                        <button type="submit" name="submit1" class="btn btn-success">تایید</button>-->
                                                            <button type="submit" name="submit2" class="btn btn-danger">حذف</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                </tbody>
                                                <?php
                                            }
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
<?php
if (isset($_POST['submit2'])) {
    $id = $_POST['id'];
    $sql_delete = "DELETE FROM comment_tbl WHERE id='$id'";
    if (isset($conn)){
        $res_delete = mysqli_query($conn, $sql_delete);
        if ($res_delete) {
            $_SESSION['delete-comment'] = "<div class='success'> حذف کامنت با موفقیت انجام شد </div>";
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
<script type="text/javascript" src="assets/data-tables/jquery.dataTables.js"></script>
<script type="text/javascript" src="assets/data-tables/DT_bootstrap.js"></script>


<!--common script for all pages-->
<script src="js/common-scripts.js"></script>

<!--script for this page only-->
<script src="js/dynamic-table.js"></script>
