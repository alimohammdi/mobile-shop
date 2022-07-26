<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>صفحه وبلاگ</title>
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
    <!-- header-------------------------------->
<?php include('./partials-front/header.php');
$sqli_count_row = "select id from weblog_tbl ";
if(isset($conn)){
    $res_count_row = mysqli_query($conn,$sqli_count_row);
    $count_page = mysqli_num_rows($res_count_row);
}
?>
<!--      php code for connect to database -->


    <!-- blog---------------------------------->
    <main class="main-row mb-2 mt-2">
        <div class="container-main">
            <div class="d-block">
                <section class="content-widget">

                        <?php
                                $sql2 = "SELECT id,category,base_title,image_weblog,date FROM weblog_tbl WHERE category='بازی و سرگرمی' LIMIT 2";
                                    if (isset($conn)) {
                                        $res2 = mysqli_query($conn,$sql2);
                                        if($res2){
                                            $count = mysqli_num_rows($res2);
                                            if($count > 0){
                                                ?>
                                                <div class="col-12 col-md-4 col-lg-4 col-xl-5 items-1 pr">
                                                <?php
                                                while($rows = mysqli_fetch_assoc($res2)){
                                                    $base_title = $rows['base_title'];
                                                    $id  = $rows['id'];
                                                    $image_name = $rows['image_weblog'];
                                                    $category = $rows['category'];
                                                    $date = convert_date($rows['date']);
                                                    ?>
                                                        <article class="blog-item">
                                                            <figure class="figure">
                                                                <div class="post-thumbnail">
                                                                    <img src="<?= "images/weblog/".$image_name ?>"
                                                                        alt="<?= $base_title ?>">
                                                                </div>

                                                                <div class="post-title">
                                                                    <a href="<?= BASEURL.'single-blog.php'?>?id=<?= $id ?>&category=<?= $category?>" class="d-block">
                                                                        <h4><?= $base_title ?> </h4>
                                                                    </a>
                                                                    <span class="post-date">
                                                                        <i class="fa fa-calendar"></i>
                                                                        <?= $date ?>
                                                                    </span>
                                                                </div>
                                                            </figure>
                                                        </article>
                                                        <?php }}  ?>
                                                </div>
                                                    <?php }} ?>

                    <?php
                    $sql2 = "SELECT id,category,base_title,image_weblog,date FROM weblog_tbl WHERE category='اموزشی' OR category='گوشی هوشمند' LIMIT 2";
                    if (isset($conn)) {
                    $res2 = mysqli_query($conn,$sql2);
                    if($res2){
                    $count = mysqli_num_rows($res2);
                    if($count > 0){
                    ?>
                    <div class="col-12 col-md-4 col-lg-4 col-xl-4 items-2 pr">
                        <?php
                        while($rows = mysqli_fetch_assoc($res2)){
                        $base_title = $rows['base_title'];
                        $id  = $rows['id'];
                        $image_name = $rows['image_weblog'];
                        $category = $rows['category'];
                        $date = convert_date($rows['date']);
                        ?>
                        <article class="blog-item">
                            <figure class="figure">
                                <div class="post-thumbnail">
                                    <img src="<?= "images/weblog/".$image_name ?>"
                                        alt="<?= $base_title ?>">
                                </div>

                                <div class="post-title">
                                    <a href="<?= BASEURL.'single-blog.php'?>?id=<?= $id ?>&category=<?= $category?>" class="d-block">
                                        <h4><?= $base_title ?></h4>
                                    </a>
                                    <span class="post-date">
                                        <i class="fa fa-calendar"></i>
                                        <?= $date ?>
                                    </span>
                                </div>
                            </figure>
                        </article>
                            <?php }}  ?>
                            </div>
                        <?php }} ?>
                    <?php
                    $sql2 = "SELECT id,category,base_title,image_weblog,date FROM weblog_tbl WHERE category='تکنولوژی' OR category='برنامه های کاربردی' LIMIT 2";
                    if (isset($conn)) {
                    $res2 = mysqli_query($conn,$sql2);
                    if($res2){
                    $count = mysqli_num_rows($res2);
                    if($count > 0){
                    ?>
                    <div class="col-12 col-md-4 col-lg-4 col-xl-3 items-3 pr">
                        <?php
                        while($rows = mysqli_fetch_assoc($res2)){
                        $base_title = $rows['base_title'];
                        $id  = $rows['id'];
                        $image_name = $rows['image_weblog'];
                        $category = $rows['category'];
                        $date = convert_date($rows['date']);
                        ?>
                        <article class="blog-item">
                            <figure class="figure">
                                <div class="post-thumbnail">
                                    <img src="<?= "images/weblog/".$image_name ?>"
                                        alt="<?= $base_title ?>">
                                </div>

                                <div class="post-title">
                                    <a href="<?= BASEURL.'single-blog.php'?>?id=<?= $id ?>&category=<?= $category?>" class="d-block">
                                        <h4><?= $base_title ?></h4>
                                    </a>
                                    <span class="post-date">
                                        <i class="fa fa-calendar"></i>
                                        <?= $date ?>
                                    </span>
                                </div>
                            </figure>
                        </article>
                        <?php }}  ?>
                        </div>
                    <?php }} ?>
                </section>
                <div class="col-lg-9 col-md-8 col-xs-12 pr mt-3">
                    <section class="content-widget">
                        <?php
                        if(!isset ($_GET['page'])){
                            $page = 1;
                        }else{
                            $page = $_GET['page'];
                        }
                        $result_per_page = 3;
                        $page_first_result = ($page-1)*$result_per_page;


                        $sql1 = "SELECT base_title,id,date,image_weblog,category,content FROM  weblog_tbl LIMIT " . $page_first_result . ',' . $result_per_page;
                        if(isset($conn)){
                        $res1 = mysqli_query($conn, $sql1);
                        if($res1){
                        while($rows = mysqli_fetch_assoc($res1)){
                        $base = $rows['base_title'];
                        $id = $rows['id'];
                        $date = convert_date($rows['date']);
                        $image_name = $rows['image_weblog'];
                        $category = $rows['category'];
                        $content = $rows['content'];
                        ?>

                        <article class="post-item">
                            <div class="post-thumb">
                                <a href="<?= BASEURL.'single-blog.php'?>?id=<?= $id ?>&category=<?= $category?>" class="d-block">
                                    <img src="<?= "images/weblog/".$image_name ?>"
                                        alt="<?= $base ?>>">
                                </a>
                            </div>
                            <div class="post-content">
                                <div class="title">
                                    <a href="<?= BASEURL.'single-blog.php'?>?id=<?= $id ?>&category=<?= $category?>">
                                        <h2 class="title-tag"><?= $base ?></h2>
                                    </a>
                                </div>
                                <div class="excerpt"><?= get_excerpt($content) ?> </div>
                                <span class="post-date">
                                    <i class="fa fa-calendar"></i>
                                    <?= $date ?>
                                </span>
                            </div>
                        </article>
                            <?php
                        }
                        }
                        }

                        ?>

                    </section>
                </div>
<!--                sidebar-weblog -->
                <?php include('./partials-front/sidebar-weblog.php') ?>
<!--                =----------------------------->

                <div class="pagination-product pr-3 pl-3 pr">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <?php


                            $number_of_page = ceil($count_page/$result_per_page);
                            $pagLink = "";
                            if($page>=2){
                                echo "<li class='page-item'>
                                <a class= 'page-link' href='blog.php?page=".($page-1)."' aria-label='Next'>
                                    <span aria-hidden='true'> &laquo;</span>
                                </a>
                            </li>";
                                ?>

                            <?php

                            }
                            for ($i=1; $i<=$number_of_page; $i++) {
                                if ($i == $page) {
                                    $pagLink .= "<li class='page-item'>
                                        <a class='page-link' href='blog.php?page=". $i ."' >".$i." </a>
                                    </li>";
                                    ?>

                            <?php
                                }
                                else  {
                                    $pagLink .= "<li class='page-item'>
                                        <a class='page-link' href='blog.php?page=". $i ."' >".$i." </a>
                                    </li>";

                                }
                            }
                            echo $pagLink;
                            if($page<$number_of_page){
                                echo "<li class='page-item'>
                                <a class= 'page-link' href='blog.php?page=".($page+1)."' aria-label='Next'>
                                    <span aria-hidden='true'>&raquo;  </span>
                                </a>
                            </li>";
                            }
                            ?>
                            <!--                            -->
<!--                            <li class="page-item">-->
<!--                                <a class="page-link" href="#" aria-label="Previous">-->
<!--                                    <span aria-hidden="true">«</span>-->
<!--                                </a>-->
<!--                            </li>-->
<!--                            <li class="page-item">-->
<!--                                <a class="page-link active" href="#">1</a>-->
<!--                            </li>-->
<!--                            <li class="page-item">-->
<!--                                <a class="page-link" href="#">2</a>-->
<!--                            </li>-->
<!--                            <li class="page-item">-->
<!--                                <a class="page-link" href="#">3</a>-->
<!--                            </li>-->
<!--                            <li class="page-item">-->
<!--                                <a class="page-link" href="#">...</a>-->
<!--                            </li>-->
<!--                            <li class="page-item">-->
<!--                                <a class="page-link" href="#">8</a>-->
<!--                            </li>-->
<!--                            <li class="page-item">-->
<!--                                <a class="page-link" href="#" aria-label="Next">-->
<!--                                    <span aria-hidden="true">»</span>-->
<!--                                </a>-->
<!--                            </li>-->
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </main>
    <!-- blog---------------------------------->
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