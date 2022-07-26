
<div class="col-lg-3 col-md-4 col-xs-12 pr mt-3 sticky-sidebar">
    <div class="shortcode-widget-area-sidebar">
        <section class="widget-posts">
            <div class="header-sidebar mb-3">
                <h3>جدیدترین نوشته ها</h3>
            </div>
            <div class="content-sidebar">
                <div class="item">
                        <?php
                        $sql = "SELECT base_title,id,date,image_weblog,category FROM  weblog_tbl   LIMIT 4";
                        if(isset($conn)){
                        $res = mysqli_query($conn, $sql);
                        if($res){
                        while($rows = mysqli_fetch_assoc($res)){
                        $base = $rows['base_title'];
                        $id = $rows['id'];
                        $date = convert_date($rows['date']);
                        $image_name = $rows['image_weblog'];
                        $category = $rows['category'];
                        ?>
                    <div class="item-inner">
                        <div class="item-thumb">
                            <a href="<?= BASEURL.'single-blog.php'?>?id=<?= $id ?>&category=<?= $category?>" class="img-holder d-block">
                                <img src="<?= "images/weblog/".$image_name ?>"
                                    alt="<?= $base ?>">
                            </a>
                        </div>
                        <div class="title">
                            <a href="<?= BASEURL.'single-blog.php'?>?id=<?= $id ?>&category=<?= $category?>">
                                <h2 class="title-tag"><?= $base ?></h2>
                            </a>
                            <span class="post-date">
                            <?= $date ?>
                            </span>
                        </div>
                    </div>
                            <?php
                        }
                        }
                        }

                        ?>
                </div>
            </div>
        </section>
    </div>
</div>