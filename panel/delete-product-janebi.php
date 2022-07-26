<?php
include('../inc/config.php');
if (isset($_GET['id']) & !empty($_GET['id'])){
    $id = $_GET['id'];
    $sql_image = "SELECT image_1,image_2,image_3  FROM product_janeb WHERE id='$id'";
    if (isset($conn)) {
        $res = mysqli_query($conn, $sql_image);
        if($res) {
            $array_image = mysqli_fetch_array($res);
            $image1 = $array_image['image_1'];
            $image2 = $array_image['image_2'];
            $image3 = $array_image['image_3'];


            if(!empty($image1) || !empty($image2) || !empty($image3) ){
                if(!empty($image1)){
                    $image_path = "../images/products/".$image1;
                    $remove = unlink($image_path);
                    if(!$remove){
                        $_SESSION['delete-product-error'] = "<div class='error'> حدف عکس با مشکل مواجه شد لطفا دوباره تلاش کنید</div>";
                        redirect(asset('manage-product-janebi.php'));
                    }
                }
                if(!empty($image2)){
                    $image_path = "../images/products/".$image2;
                    $remove = unlink($image_path);
                    if(!$remove){
                        $_SESSION['delete-product-error'] = "<div class='error'> حدف عکس با مشکل مواجه شد لطفا دوباره تلاش کنید</div>";
                        redirect(asset('manage-product-janebi.php'));
                    }
                }
                if(!empty($image3)){
                    $image_path = "../images/products/".$image3;
                    $remove = unlink($image_path);
                    if(!$remove){
                        $_SESSION['delete-product-error'] = "<div class='error'> حدف عکس با مشکل مواجه شد لطفا دوباره تلاش کنید</div>";
                        redirect(asset('manage-product-janebi.php'));
                    }
                }
            }
        }
        $sql = "DELETE FROM product_janeb WHERE id='$id'";
        $res = mysqli_query($conn, $sql);
        if($res){
            $_SESSION['delete-product-success'] = "<div class='error'> پست با موفقیت حذف شد </div>";
            redirect(asset('manage-product-janebi.php'));
            mysqli_close($conn);
        }
    }




}else{
    $_SESSION['delete-product-error'] = "<div class='error'> حذف پست با انجام نشد لطفا دوباره تلاش کنید  </div>";
    redirect(asset('manage-product-janebi.php'));
}
