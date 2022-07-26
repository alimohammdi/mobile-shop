<?php
include('../inc/config.php');


if(isset($_GET['id'])){
    $id = $_GET['id'];

    $sql = "DELETE FROM admin_tbl WHERE id='$id'";

    if (isset($conn)) {
        $res = mysqli_query($conn,$sql);
    }
    if($res){
        $_SESSION['add-admin-error'] = "<div class='error'> ادمین حذف شد  </div>";
        redirect(asset('manage-admin.php'));
        mysqli_close($conn);
    }else{
        $_SESSION['add-admin-error'] = "<div class='error'> ادمین حذف نشد لطفا دوباره تلاش کنید </div>";
        redirect(asset('manage-admin.php'));
        mysqli_close($conn);
    }
}
