<?php
 include('../inc/config.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if (isset($_GET['image'])) {
        $image = $_GET['image'];
        if($image){
            $image_path = "../images/weblog/".$image;
            $remove = unlink($image_path);
            if(!$remove){
                $_SESSION['delete-post-error'] = "<div class='error'> حدف عکس با مشکل مواجه شد لطفا دوباره تلاش کنید</div>";
                redirect(asset('manage-weblog.php'));
            }
        }
        $sql = "DELETE FROM weblog_tbl WHERE  id ='$id'";
        if (isset($conn)) {
            $res = mysqli_query($conn, $sql);
            if ($res) {
                $_SESSION['delete-post-success'] = "<div class='success'> پست با موفقیت حذف شد </div>";
                redirect(asset('manage-weblog.php'));
                mysqli_close($conn);
            }
        }

    } else {
        redirect(asset('manage-weblog.php'));
        die();
    }
} else {
    redirect(asset('manage-weblog.php'));
    die();
}
