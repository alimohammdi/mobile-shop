<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>پروفایل</title>
    <!-- font---------------------------------------->
    <link rel="stylesheet" href="assets/css/vendor/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/vendor/materialdesignicons.css">
    <!-- plugin-------------------------------------->
    <link rel="stylesheet" href="assets/css/vendor/bootstrap.css">
    <link rel="stylesheet" href="assets/css/vendor/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/vendor/noUISlider.min.css">
    <link rel="stylesheet" href="assets/css/vendor/nice-select.css">
    <!-- main-style---------------------------------->
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
</head>

<body>
   <?php include('./partials-front/header.php') ?>
    <!-- header-------------------------------->

    <!-- profile------------------------------->
    <div class="container-main">
        <div class="d-block">
            <section class="profile-home">
                <div class="col-lg">
                    <div class="post-item-profile order-1 d-block">
                        <?php include('./partials-front/sidebar-profile.php') ?>

                            </div>
                        </div>
                        <div class="col-lg-9 col-md-9 col-xs-12 pl">
                            <div class="profile-content">
                                <?php
                                if(isset($_SESSION['delete-comment'])) {
                                    echo $_SESSION['delete-comment'];
                                    unset ($_SESSION['delete-comment']);
                                }
                                ?>
                                <div class="profile-stats">

                                    <div class="profile-comment">
                                        <table class="table table-borderless table-profile-comment">
                                            <thead>
                                                <tr>
                                                    <th scope="col"></th>
                                                    <th scope="col">نام محصول</th>
                                                    <th scope="col">نظر</th>
                                                    <th scope="col">پاسخ</th>
                                                    <th scope="col">وضعیت</th>
                                                    <th scope="col">عملیات</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            if(isset($_SESSION['user-login']) & isset($_SESSION['email-login'])){
                                                $user_name = $_SESSION['user-login'];
                                                $email = $_SESSION['email-login'];
                                                $sql_comment = "SELECT * FROM comment_tbl WHERE user_name='$user_name' AND email='$email'";
                                                if(isset($conn)){
                                                    $res = mysqli_query($conn, $sql_comment);
                                                    $count_comment = mysqli_num_rows($res);
                                                    if($count_comment > 0){
                                                        while($row= mysqli_fetch_array($res)){
                                                            $id = $row['id'];
                                                            $post_id = $row['post_id'];
                                                            $category = $row['category_post'];
                                                            $question = $row['content'];
                                                            $answer = $row['answer'];
                                                            $confirm = $row['confirmation'];

                                                            $obj_product = new product();
                                                            $rows = $obj_product->get_product_properties($conn,$category,$post_id);
                                                            $fa_title   = $rows['fa_title'];
                                                            $image_name1 = $rows['image_1'];
                                                            ?>
                                                            <tr>
                                                                <th scope="row" class="th-img">
                                                                    <div class="thumb-img">
                                                                        <a href="#">
                                                                            <img

                                                                                    src="./images/products/<?= $image_name1 ?>">
                                                                        </a>
                                                                    </div>
                                                                </th>
                                                                <td>
                                                                    <?= $fa_title ?>
                                                                </td>
                                                                <td><?= $question ?></td>
                                                                <td><?php if(!empty($answer)){echo $answer;}
                                                                    else{echo 'پاسخ داده نشده';} ?></td>
                                                                <td>
                                                                    <?php if($confirm == 'yes'){
                                                                        ?><span class="profile-comment-status-approved">تایید شده</span>
                                                                    <?php
                                                                    }else{?>
                                                                        <span class="error">در حال برسی</span>
                                                                <?php
                                                                    }?>

                                                                </td>
                                                                <td>
                                                                    <form action="" method="post" >
                                                                        <input type="hidden" name="id" value="<?= $id ?>">
                                                                    <button type="submit" name="submit2" class="profile-comment-remove"><i class="fa fa-trash"></i></button>
                                                                    </form>
                                                                </td>
                                                            </tr>

                                                            <?php
                                                        }
                                                    }else{
                                                        ?>
                                                        <tr>
                                                            <td>
                                                                <span class="error"> کامنت یا پرسشی از شما یافت نشد  </span>
                                                            </td>
                                                            <td></td>

                                                        </tr>
                                            <?php

                                                    }
                                                }
                                            }
                                            ?>
                                            </tbody>
                                        </table>
                                        <div class="profile-comment-thumb">
                                            <div class="profile-comment-img">
                                                <a href="#">
                                                    <img src="assets/images/slider-product/SL1200_-300x300.jpg">
                                                </a>
                                            </div>
                                            <div class="profile-comment-content">
                                                <h4>
                                                    لپ تاپ چووی الترابوک 14 اینچ پرو
                                                    <span class="profile-comment-status-review">تایید شده</span>
                                                    <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با
                                                        استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله
                                                        در ستون و سطرآنچنان که لازم است</p>
                                                </h4>
                                                <ul class="profile-comment-actions mb-0">
                                                    <li>
                                                        <button class="profile-comment-remove"><i
                                                                class="fa fa-trash"></i></button>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <!-- profile------------------------------->
   <?php
   if (isset($_POST['submit2']) & isset($_POST['id'])) {
       $id = $_POST['id'];
       $sql_delete = "DELETE FROM comment_tbl WHERE id='$id'";
       if (isset($conn)){
           $res_delete = mysqli_query($conn, $sql_delete);
           if ($res_delete) {
               $_SESSION['delete-comment'] = "<div class='success'> حذف کامنت با موفقیت انجام شد </div>";
               redirect('profile-comment.php');
           }
       }
   }

   ?>
    <!-- footer-------------------------------->
   <?php include('./partials-front/footer.php') ?>
    <!-- footer------------------------------------------->
    <!-- scroll_Progress------------------------->
    <div class="progress-wrap">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>
    <!-- scroll_Progress------------------------->
    <!-- Page Loader----------------------------->
<!--    <div class="P-loader">-->
<!--        <div class="P-loader-content">-->
<!--            <div class="logo-loader">-->
<!--                <img src="assets/images/logo.png" alt="logo">-->
<!--            </div>-->
<!--            <div class="pic-loader text-center">-->
<!--                <img src="assets/images/three-dots.svg" width="50" alt="">-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
    <!-- Page Loader----------------------------->

</body>
<!-- file js---------------------------------------------------->
<script src="assets/js/vendor/jquery-3.2.1.min.js"></script>
<script src="assets/js/vendor/bootstrap.js"></script>
<!-- plugin----------------------------------------------------->
<script src="assets/js/vendor/owl.carousel.min.js"></script>
<script src="assets/js/vendor/jquery.countdown.js"></script>
<script src="assets/js/vendor/ResizeSensor.min.js"></script>
<script src="assets/js/vendor/theia-sticky-sidebar.min.js"></script>
<script src="assets/js/vendor/wNumb.js"></script>
<script src="assets/js/vendor/nouislider.min.js"></script>
<script src="assets/js/vendor/jquery.nice-select.min.js"></script>
<!-- main js---------------------------------------------------->
<script src="assets/js/main.js"></script>

</html>