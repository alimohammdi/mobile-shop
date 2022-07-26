<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>پرسش و پاسخ</title>
    <!-- font---------------------------------------->
    <link rel="stylesheet" href="assets/css/vendor/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/vendor/materialdesignicons.css">
    <!-- plugin-------------------------------------->
    <link rel="stylesheet" href="assets/css/vendor/bootstrap.css">
    <link rel="stylesheet" href="assets/css/vendor/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/vendor/noUISlider.min.css">
    <link rel="stylesheet" href="assets/css/vendor/lightgallery.css">
    <link rel="stylesheet" href="assets/css/vendor/nice-select.css">
    <!-- main-style---------------------------------->
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
</head>

<body>
    <!-- header-------------------------------->
    <?php include('./partials-front/header.php') ?>
    <!-- header-------------------------------->

    <!-- arshive-product----------------------->
    <div class="container-main">
        <div class="d-block">
            <div class="page-content col-12">
                <div class="info-page-faq">
                    <div class="content-info-page">
                        <h2 class="box-rounded_headline">پرتکرارترین پرسش ها</h2>
                        <?php
                        if(isset($_GET['cat'])){
                            $cat = $_GET['cat'];
                            $sql = "select * from faq_tbl where category='$cat'";
                        }else{
                            $sql = "select * from faq_tbl ";
                        }
                        if(isset($conn)){
                            $res = mysqli_query($conn, $sql);
                            if($res){
                                while($row = mysqli_fetch_assoc($res)){
                                    $id = $row['id'];
                                    $question = $row['question'];
                                    $answer = $row['answer'];
                                    ?>
                                    <div class="toggle-box">
                                        <div class="toggle-box-active">
                                            <ul>
                                                <li class="has-sub">
                                                    <a><?= $question ?></a>
                                                    <ul style="display: none;">
                                                        <li class="has-sub"><a href=""><?= cot_blog($answer)  ?></a></li>
                                                    </ul>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>
                        <?php
                                }
                            }else{
                                redirect('404.php');
                        }
                        }else{
                            redirect('404.php');
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- arshive-product----------------------->

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
<script src="assets/js/vendor/lightgallery-all.js"></script>
<script src="assets/js/vendor/jquery.ez-plus.js"></script>
<script src="assets/js/vendor/jquery.nice-select.min.js"></script>
<!-- main js---------------------------------------------------->
<script src="assets/js/main.js"></script>

</html>