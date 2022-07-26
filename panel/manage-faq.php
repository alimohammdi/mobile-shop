
<?php
include('./partials-panel/header.html');
include('./partials-panel/sidebar.html');
?>
<?php
if (isset($_POST['submit'])) {
    if (!empty($_POST['question']) & !empty($_POST['answer']) & !empty($_POST['category'])) {
        $question = $_POST['question'];
        $answer = $_POST['answer'];
        $category = $_POST['category'];
        $sql_search_color = "select * from  faq_tbl where  question='$question' AND category='$category'";
        if (isset($conn)) {
            $res = mysqli_query($conn, $sql_search_color);
            if ($res) {
                $count = mysqli_num_rows($res);
                if ($count == 0) {
                    $sql = "insert into faq_tbl set question='$question',answer='$answer',category='$category'";
                    if (isset($conn)) {
                        $res1 = mysqli_query($conn, $sql);
                        if ($res1) {
                            $_SESSION['add-question'] = "<div class='success'> پرسش با موفقیت اضافه شد  </div>";
                        } else {
                            $_SESSION['add-question'] = "<div class='error'> متاسفانه مشکلی در اضافه کردن پرسش رخ داد </div>";
                        }
                    }
                } else {
                    $_SESSION['add-question'] = "<div class='alarm'> پرسش وارد شده موجود میباشد   </div>";
                }
            }
        }

    } else {
        $_SESSION['add-question'] = "<div class='alarm'> لطفا هر دو فیلد را پر کنید  </div>";
    }

}
?>
<?php
if(isset($_POST['submit-delete'])){
    if(!empty($_POST['ques']) & !empty($_POST['id'])){
        $question = $_POST['ques'];
        $id = $_POST['id'];
        $sql2 = "DELETE FROM faq_tbl WHERE question='$question' AND id='$id'";
        if (isset($conn)) {
            $res2 = mysqli_query($conn,$sql2);
            if($res2){
                $_SESSION['delete-question'] = "<div class='error'> پرسش مورد نظر حذف شد  </div>";
            }else{
                $_SESSION['delete-question'] = "<div class='error'>پرسش مورد نظر حذف نشد لطفا دوباره تلاش کنید </div>";
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
                    <h2>مدیریت پرسش های متداول </h2>
                    <?php if(isset($_SESSION['add-question'])){
                        echo $_SESSION['add-question'];
                        unset ($_SESSION['add-question']);
                    }
                    if(isset($_SESSION['delete-question'])){
                        echo $_SESSION['delete-question'];
                        unset ($_SESSION['delete-question']);
                    }

                    ?>

                </header>
                <div class="panel-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="full question">پرسش متداول را وارد نمایید  </label>

                            <input type="text" name="question" class="form-control"  >
                            <br>
                            <label for="full answer">جواب پرسشی که مطرح کردید را در کادر زیر وارد کنید</label>
                            <br>
                            <textarea class="form-control" name="answer"   cols="60" rows="5" ></textarea>
                            <br>
                            <label for="full answer">دسته بندی پرسش را انتخاب نمایید</label>

                            <select class="form-control m-bot15" name="category">
                                <option>نحوه ثبت سفارش</option>
                                <option>خرید اقساطی</option>
                                <option>کارت حکمت</option>
                                <option>رویه ارسال سفارش</option>
                                <option>شیوه های پرداخت</option>

                            </select>
                            <br>
                            <input type="submit" value="اضافه کن" name="submit" class="btn btn-info">
                        </div>
                    </form>
                </div>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>    پرسش    </th>
                        <th>    پاسخ   </th>
                        <th>    دسته بندی   </th>
                        <td></td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $num = 1;
                    $sql1 = "SELECT * FROM faq_tbl";
                    if (!empty($conn)) {
                        $res = mysqli_query($conn,$sql1);
                    }
                    if($res){
                        $count = mysqli_num_rows($res);
                        if($count > 0){
                            while($rows=mysqli_fetch_assoc($res)){
                                $id = $rows['id'];
                                $question = $rows['question'];
                                $answer = $rows['answer'];
                                $category = $rows['category'];

                                ?>
                                <tr>
                                    <td><?= $num++ ?> </td>
                                    <td><?= get_excerpt2($question) ?></td>
                                    <td><?= get_excerpt2($answer) ?></td>
                                    <td><?php if(!empty($category)){echo $category ; } ?></td>
                                   <td></td>
                                    <td>
                                        <form action="" method="post">
                                            <input type="hidden" name="ques" value="<?= $question?>">
                                            <input type="hidden" name="id" value="<?= $id?>">
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
                <div class="panel-body">
                    <a href=" <?= BASEURL.'faq.php'  ?>">
                        <input type="submit" value="نمایش صفحه پرسش ها" name="submit" class="btn btn-primary">
                    </a>
                </div>
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