<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>single-blog</title>
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
// send comment for blog post
    if (isset($_POST['submit']) & !isset($_SESSION['send-comment-success'])) {
        if (!empty($_POST['full_name']) & !empty($_POST['content'])) {
            $full_name = $_POST['full_name'];
            $content = $_POST['content'];
            $date = date('Y-m-d');
            $post_id = $_POST['id'];
            $category_post = $_POST['category'];
            $confirm = 'yes';
              $sql_search = "select * from comment_tbl where user_name='$full_name' and content='$content'";
              if(isset($conn)){
                  $res_search = mysqli_query($conn,$sql_search);
                  $count = mysqli_num_rows($res_search);
                  if (!empty($_SESSION['email-login'])) {
                      $email = $_SESSION['email-login'];
                      if($count == 0){
                          $sql_comment = "INSERT INTO comment_tbl SET 
                    user_name = '$full_name',
                    email = '$email',
                    post_id = '$post_id',
                    category_post = '$category_post',
                    content='$content',
                    confirmation= '$confirm',
                    date='$date'";
                          $res_comment = mysqli_query($conn, $sql_comment);
                          if ($res_comment) {
                              $_SESSION['send-comment-success'] = "<div class='success'> نظر شما با موفقیت ثبت شد </div>";
                          }
                      }
                  }else{
                      if($count == 0){
                          $sql_comment = "INSERT INTO comment_tbl SET 
                    user_name = '$full_name',
                    post_id = '$post_id',
                    category_post = '$category_post',
                    content='$content',
                    confirmation= '$confirm',
                    date='$date'";
                          $res_comment = mysqli_query($conn, $sql_comment);
                          if ($res_comment) {
                              $_SESSION['send-comment-success'] = "<div class='success'> نظر شما با موفقیت ثبت شد </div>";
                          }
                      }
                  }

              }
        } else {
            $_SESSION['send-comment-error'] = "<div class='alarm'>ارسال نظر موفقیت امیز نبود لطفا همه فیلد ها را پر کنید و دوباره تلاش کنید </div>";
        }
    }

    ?>
    <!-- header-------------------------------->
<?php
//select post for show in page
if(isset($_GET['id']) & isset($_GET['category'])){
    $id_post = $_GET['id'] ;
    $category_post = $_GET['category'] ;
    $sql = "SELECT * FROM weblog_tbl WHERE id='$id_post' AND category='$category_post'";
    if(isset($conn)){
        $res = mysqli_query($conn, $sql);
        if($res){
            $count = mysqli_num_rows($res);
            if($count == 1){
                $rows = mysqli_fetch_assoc($res);
                $base_title = $rows['base_title'];
                $title = $rows['title'];
                $title2 = $rows['title2'];
                $content = $rows['content'];
                $content3 = $rows['content3'];
                $last_content = $rows['last_content'];
                $category_post = $rows['category'];
                $admin_name = $rows['admin_name'];
                $date = $rows['date'];
                $view = $rows['view'];
                $image_name = $rows['image_weblog'];
            }else{
                redirect(BASEURL ."blog.php");
            }
        }else{
            redirect(BASEURL ."blog.php");
        }
    }
}else{
    redirect(BASEURL ."blog.php");
}
?>
    <!-- single-blog--------------------------->
    <main class="main-row mb-2 mt-2 d-block">
        <div class="container-main">
            <div class="d-block">
                <div class="col-lg-9 col-md-8 col-xs-12 pr mt-3">
                    <section class="blog-home">
                        <article class="post-item">
                            <header class="entry-header mb-3">
                                <div class="post-meta date">
                                    <i class="mdi mdi-calendar-month"></i><?= convert_date($date) ?>
                                </div>
                                <div class="post-meta author">
                                    <i class="mdi mdi-account-circle-outline"></i>
                                    ارسال شده توسط <a href="#"> <?php if(!empty($admin_name)){ echo $admin_name ;}else{echo "مدیر وبسایت" ;}
                                        ?> </a>
                                </div>
                                <div class="post-meta category">
                                    <i class="mdi mdi-folder"></i>
                                    <a href="#"><?= $category_post ?></a>
                                </div>
                                <div class="post-meta Visit">
                                    <i class="mdi mdi-eye"></i>
                                    <?= $view ?> بازدید
                                </div>
                            </header>
                            <?php
                            if(isset($_SESSION['send-comment-success'])){
                                echo $_SESSION['send-comment-success'];
                                unset ($_SESSION['send-comment-success']);
?><br>
                            <?php
                            }?>
                            <?php
                            if(isset($_SESSION['send-comment-error'])){
                                echo $_SESSION['send-comment-error'];
                                unset ($_SESSION['send-comment-error']);
                                ?><br>
                                <?php
                            }?>
                            <div class="title">
                                <h4 class="title-tag"><?= $base_title ?> </h4>
                            </div>
                            <div class="post-thumbnail">
                                <img src="<?= 'images/weblog/'.$image_name  ?>"
                                    alt="<?= $title ?> ">
                            </div>
                            <br>

                            <div class="content-blog">
                                <h5 class="title-tag"><?= $title ?> </h5>
                                <per><?= cot_blog($content) ?>
                                </per>
                            </div>
                            <?php
                            if(!empty($title2) ){
                                ?>
                                <div class="content-blog">
                                    <h5 class="title-tag"><?= $title2 ?> </h5>
                                    <?php if( !empty($last_content)){
                                        ?>
                                    <p><?= cot_blog($last_content) ?> </p>
                                    <?php
                                    }?>
                                </div>
                            <?php
                            }
                            ?>
                            <?php
                            if(!empty($content3)){
                                ?>
                                <div class="content-blog">
                                    <p><?= cot_blog($content3) ?>
                                    </p>
                                </div>
                            <?php
                            }
                            ?>
                        </article>
                        <div class="post-comments">
                            <div class="comments-area">
                                <div class="form-comment">
                                    <div class="col-md-12 col-sm-12">
                                        <div class="form-ui">
                                            <form  action="" method="post" id="comment-form">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-row-title mb-2"> نام کامل شما (اجباری)</div>
                                                        <div class="form-row">
                                                            <input class="input-ui pr-2" type="text" name="full_name"
                                                                   placeholder=" نام خود را بنویسید">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 mt-5">
                                                        <div class="form-row-title mb-2">متن نظر شما (اجباری)</div>
                                                        <div class="form-row">
                                                        <textarea class="input-ui pr-2 pt-2" rows="5" name="content"
                                                                  placeholder="متن خود را بنویسید"
                                                                  style="height:120px;"></textarea>
                                                        </div>
                                                        <h3 id="console"></h3>
                                                        <div class="col-12 mt-5 px-0" >
                                                            <input type="hidden" name="category" value="<?= 'وبلاگ'?>">
                                                            <input type="hidden" name="id" value="<?= $id_post?>">
                                                            <input class="btn btn-primary" name="submit" type="submit" value="ارسال">
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                            <span id="comment-massage"></span>
                                            <div id="display-comment"></div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <br>

                                    <?php
                                    $sql_search_comment = "SELECT * FROM comment_tbl WHERE post_id ='$id_post' AND category_post='وبلاگ' ";
                                    if(isset($conn)){
                                        $res_search_comment = mysqli_query($conn, $sql_search_comment);
                                    }
                                    ?>
                                <h2 class="comments-title">
                                    <i class="fa fa-comment-o"></i>
                                    نظرات کاربران
<!--                                    <p class="count-comment">253 نظر</p>-->
                                </h2>
                                <ol class="comment-list">
                                    <?php
                                    if(isset($res_search_comment)){
                                        while($rows = mysqli_fetch_assoc($res_search_comment)){
                                            $content = $rows['content'];
                                            $user_name = $rows['user_name'];
                                            $id = $rows['id'];
                                            $answer = $rows['answer'];
                                            $date = convert_date($rows['date']);
                                            ?>
                                            <li class="comment-even">
                                                <div class="comment-body">
                                                    <header class="comment-meta">
                                                        <div class="comment-author">
                                                            <img src="assets/images/man.png" class="avator">
                                                            توسط <?= $user_name ?> در تاریخ <?= $date ?>
                                                        </div>
                                                    </header>
                                                    <p><?= $content ?></p>
<!--                                                    <div class="reply text-left">-->
<!--                                                        <a href="#" class="comment-reply-link">پاسخ دادن</a>-->
<!--                                                    </div>-->
                                                    <?php
                                                    if(!empty($answer)){
                                                        ?>
                                                        <div class="questions-list answer-questions">
                                                            <ul class="faq-list">
                                                                <li class="is-question">
                                                                    <div class="section">
                                                                        <div class="faq-header">
                                                                            <p class="h4">
                                                                                 ** پاسخ فروشنده :
                                                                                <span>شهروند موبایل</span>
                                                                            </p>
                                                                        </div>
                                                                        <p><?= $answer ?></p>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>
                                                </div>

                                            </li>
                                    <?php
                                        }
                                    }
                                    ?>

                                </ol>

                            </div>
                        </div>
                    </section>
                </div>
                <!--                sidebar-weblog -->
                <?php include('./partials-front/sidebar-weblog.php') ?>
            </div>
        </div>
    </main>
    <!-- single-blog--------------------------->
<!-- send comment to database and show it-->

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
<!--    -->
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
        <!--    </div>

        </body>
         file js---------------------------------------------------->
<!--    -->
<script src="assets/js/vendor/jquery-3.2.1.min.js"></script>
<script src="assets/js/vendor/bootstrap.js"></script>
<!-- plugin----------------------------------------------------->
<script src="assets/js/vendor/jquery.js"></script>
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