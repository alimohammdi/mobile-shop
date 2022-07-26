<?php include('../inc/functions.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="img/favicon.html">

    <title>login page</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>
<?php
if(isset($_POST['submit']) & !empty($_POST['user_name']) & !empty($_POST['password'])){
    $username = strip_tags($_POST['user_name']);
    $password = md5(strip_tags($_POST['password']));

    $sql = "SELECT * FROM admin_tbl WHERE  user_name='$username' AND password='$password'";
    if(isset($conn)){
        $res = mysqli_query($conn, $sql);
        if($res){
            $count  = mysqli_num_rows($res);
            if($count == 1){
                $rows = mysqli_fetch_assoc($res);
                $pass = $rows['password'];
                    $full_name = $rows['full_name'];
                    $_SESSION['admin-name'] =  $full_name;
                    $_SESSION['login-success'] = "<div class='success'>شما وارد پنل ادمین شدید</div>";
                    redirect(asset("index.php"));

            }else{
                $_SESSION['login-error'] = "<div class='error'>متاسفانه ادمین با نام کاربری وارد شده وجود ندارد</div>";
                redirect(asset("login.php"));

            }
        }
    }
}
?>
  <body class="login-body">

    <div class="container">

      <form class="form-signin"  method="post" action="#">
        <h2 class="form-signin-heading">اگر ادمین هستید وارد پنل مدیریت خود شوید</h2>
        <div class="login-wrap">
            <head>
                <?php
                if(isset($_SESSION['login-error'])){
                    echo $_SESSION['login-error'];
                    unset($_SESSION['login-error']);
                }
                ?>
            </head>
            <input type="text" name="user_name" class="form-control"  placeholder="نام کاربری خود را وارد نمایید" autofocus>
            <input type="password" name="password" class="form-control" placeholder="کلمه عبور">
            <input class="btn btn-lg btn-login btn-block" name="submit" type="submit" value="ورود به پنل ادمین">
        </div>

      </form>

    </div>


  </body>
</html>
