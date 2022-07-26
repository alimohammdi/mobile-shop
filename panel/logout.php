<?php
include("../inc/config.php");
if(!empty($_SESSION['login-success'])){
    session_destroy();
    redirect(asset("login.php"));
}
