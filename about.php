<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>درباره ما</title>
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
<?php
include ('./partials-front/header.php');

$sql_content = "select * from about_us";
if(isset($conn)){
    $res = mysqli_query($conn, $sql_content);
    if($res){
        $row = mysqli_fetch_assoc($res);
        $title = $row['title_1'];
        $title2 = $row['title_2'];
        $content = $row['content_1'];
        $content2 = $row['content_2'];
    }else{
        redirect(BASEURL. "404.php");
    }
}else{
     redirect(BASEURL. "404.php");
}
?>

<!-- about----------------------------------->
<div class="container-main">
    <div class="col-12">
        <div id="content">
            <div class="about">
                <div class="about-us-head">
                    <div class="about-us-head-inner">
                        <h1><?= $title ?></h1>
                        <div class="about-us-head-content mt-4 text-right">
                            <p>
                                <?php
                                if (!empty($content)){
                                    echo cot_blog($content);
                                }else{
                                    redirect(BASEURL . "404.php");
                                }
                                    ?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="page-content-about">
                        <h6><?php if(!empty($title2)){echo $title2;}?></h6>
                    <div class="page-content-about-paragraph">
                        <p>
                            <?php
                            if (!empty($content2)){
                                echo cot_blog($content2);
                            }else{
                                redirect(BASEURL . "404.php");
                            }
                            ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- about----------------------------------->
    
<!-- footer-------------------------------->
<?php
include ('./partials-front/footer.php')?>
<!-- scroll_Progress------------------------->
<div class="progress-wrap">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
    </svg>
</div>
<!-- scroll_Progress------------------------->
<!-- Page Loader----------------------------->
<!--<div class="P-loader">-->
<!--    <div class="P-loader-content">-->
<!--        <div class="logo-loader">-->
<!--            <img src="assets/images/logo.png" alt="logo">-->
<!--        </div>-->
<!--        <div class="pic-loader text-center">-->
<!--            <img src="assets/images/three-dots.svg" width="50" alt="">-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!--</div>-->
<!-- Page Loader----------------------------->

</body>
<!-- file js---------------------------------------------------->
<script src="assets/js/vendor/jquery-3.2.1.min.js"></script>
<script src="assets/js/vendor/bootstrap.js"></script>
<!-- plugin----------------------------------------------------->
<script src="assets/js/vendor/owl.carousel.min.js"></script>
<script src="assets/js/vendor/jquery.countdown.js"></script>
<script src="assets/js/vendor/jquery.nice-select.min.js"></script>
<script src="assets/js/vendor/jquery.jqZoom.js"></script>
<!-- main js---------------------------------------------------->
<script src="assets/js/main.js"></script>

</html>

