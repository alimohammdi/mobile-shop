<?php
include('./inc/functions.php');
if(isset($_SESSION['user-login'])){
    unset($_SESSION['user-login']);
        redirect(BASEURL.'home.php');
}