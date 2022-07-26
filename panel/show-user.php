<?php
include('./partials-panel/header.html');
include('./partials-panel/sidebar.html');
if(isset($_GET['id'])){
    $id_user = $_GET['id'];
        $sql = "SELECT  *  FROM   customer_tbl WHERE id='$id_user'";
            if (isset($conn)) {
                $res = mysqli_query($conn, $sql);
                if ($res) {
                    $count = mysqli_num_rows($res);
                    if ($count > 0) {
                        while ($rows = mysqli_fetch_assoc($res)) {
                            $id = $rows['id'];
                            $name = $rows['full_name'];
                            $email = $rows['email'];
                            $phone_number = $rows['phone_number'];
                            $address = $rows['address'];
                            $city = $rows['city'];
                            $province = $rows['province'];
                            $code_meli = $rows['code_meli'];
                            $date = $rows['date'];
                        }
                    }
                }
            }

}else{
    redirect(asset('manage-users.php'));
}
?>
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <div class="col-lg-9 col-md-9 col-xs-12 pl">
                        <div class="profile-content">
                            <div class="profile-stats">

                                <table class="table table-profile">
                                    <tbody>
                                    <tr>
                                        <td class="w-50">
                                            <div class="title">نام و نام خانوادگی:</div>
                                            <div class="value"><?= $name ?> </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="title">پست الکترونیک :</div>
                                            <div class="value"><?= $email ?></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="title">شماره تلفن همراه:</div>
                                            <div class="value"><?php if(!empty($phone_number)){echo $phone_number;}else {echo "-";} ?></div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="title">تاریخ عضویت:</div>
                                            <div class="value"><?= convert_date($date) ?></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="title"> کد ملی :</div>
                                            <div class="value"><?php if(!empty($code_meli)){echo $code_meli;}else {echo "-";} ?></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="title"> ادرس :</div>
                                            <div class="value"><?php if(!empty($address)){echo $address;}else {echo "-";} ?></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="title"> استان :</div>
                                            <div class="value"><?php if(!empty($province)){echo $province;}else {echo "-";} ?></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="title"> شهرستان :</div>
                                            <div class="value"><?php if(!empty($city)){echo $city;}else {echo "-";} ?></div>
                                        </td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <!-- page end-->
    </section>
</section>
<!--main content end-->


<!-- js placed at the end of the document so the pages load faster -->
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.scrollTo.min.js"></script>
<script src="js/jquery.nicescroll.js" type="text/javascript"></script>
<script type="text/javascript" src="assets/data-tables/jquery.dataTables.js"></script>
<script type="text/javascript" src="assets/data-tables/DT_bootstrap.js"></script>


<!--common script for all pages-->
<script src="js/common-scripts.js"></script>

<!--script for this page only-->
<script src="js/dynamic-table.js"></script>