<?php
include('./inc/config.php');
if (isset($_GET['p_id']) & isset($_GET['p_category']) & isset($_GET['color']) ) {
    $p_id = $_GET['p_id'];
    $p_category = $_GET['p_category'];
    $color = $_GET['color'];
    if (isset($_COOKIE["ipUserEcommerce"])) {
        $ip = $_COOKIE["ipUserEcommerce"];
    } else {
        $ip = getIp();
        setcookie('ipUserEcommerce', $ip, time() + 1206900);
    }
    $sql = "SELECT * FROM cart_tbl WHERE p_id='$p_id' AND p_category='$p_category' AND ip_add='$ip' AND color='$color'";
    if (isset($conn)) {
        $res = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($res);
        $row = mysqli_fetch_assoc($res);

        if ($count > 0) {
            $sql2 = "delete from cart_tbl WHERE p_id='$p_id' AND p_category='$p_category' AND ip_add='$ip' AND color='$color'";
            $res2 = mysqli_query($conn, $sql2);
            if($res2){
                $_SESSION['delete-cart-success'] = "<div class='error'> محصول از سبد خرید شما حذف شد </div>";
                redirect($_SERVER['HTTP_REFERER']);
            }
        } else {
           redirect ($_SERVER['HTTP_REFERER']);
        }
    }
}