<?php
include('./partials-panel/header.html')
?>
<?php
include('./partials-panel/sidebar.html')
?>
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              <!--state overview start-->
              <div class="row state-overview">
                  <div class="col-lg-3 col-sm-6">
                      <section class="panel">
                          <div class="symbol terques">
                              <i class="icon-user"></i>
                          </div>
                          <?php
                          $sql_count_user = "select id from customer_tbl";
                          if(isset($conn)){
                              $res_count_user = mysqli_query($conn,$sql_count_user);
                          }
                          ?>
                          <div class="value">
                              <h1><?= mysqli_num_rows($res_count_user) ?></h1>
                              <p>کاربران سایت </p>
                          </div>
                      </section>
                  </div>
<!--                  <div class="col-lg-3 col-sm-6">-->
<!--                      <section class="panel">-->
<!--                          <div class="symbol red">-->
<!--                              <i class="icon-tags"></i>-->
<!--                          </div>-->
<!--                          <div class="value">-->
<!--                              <h1>140</h1>-->
<!--                              <p>فروش</p>-->
<!--                          </div>-->
<!--                      </section>-->
<!--                  </div>-->
                  <div class="col-lg-3 col-sm-6">
                      <section class="panel">
                          <div class="symbol yellow">
                              <i class="icon-shopping-cart"></i>
                          </div>
                          <div class="value">
                              <h1>0</h1>
                              <p>سفارش جدید</p>
                              <p>فعال نشده</p>
                          </div>
                      </section>
                  </div>
<!--                  <div class="col-lg-3 col-sm-6">-->
<!--                      <section class="panel">-->
<!--                          <div class="symbol blue">-->
<!--                              <i class="icon-bar-chart"></i>-->
<!--                          </div>-->
<!--                          <div class="value">-->
<!--                              <h1>34,500</h1>-->
<!--                              <p>سود خالص</p>-->
<!--                          </div>-->
<!--                      </section>-->
<!--                  </div>-->
                  <div class="col-lg-3 col-sm-6">
                      <section class="panel">
                          <?php
                          $sql_count_user = "select id from comment_tbl";
                          if(isset($conn)){
                              $res_count_user = mysqli_query($conn,$sql_count_user);
                          }
                          ?>
                          <div class="symbol blue ">
                              <i class="icon-comment"></i>
                          </div>
                          <div class="value">
                              <h1><?= mysqli_num_rows($res_count_user) ?></h1>
                              <p>کامنت های سایت</p>
                          </div>
                      </section>
                  </div>
              </div>
              <!--state overview end-->
          </section>
      </section>
      <!--main content end-->


    <!-- js placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/jquery-1.8.3.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="js/jquery.sparkline.js" type="text/javascript"></script>
    <script src="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
    <script src="js/owl.carousel.js" ></script>
    <script src="js/jquery.customSelect.min.js" ></script>

    <!--common script for all pages-->
    <script src="js/common-scripts.js"></script>

    <!--script for this page-->
    <script src="js/sparkline-chart.js"></script>
    <script src="js/easy-pie-chart.js"></script>

  <script>

      //owl carousel

      $(document).ready(function() {
          $("#owl-demo").owlCarousel({
              navigation : true,
              slideSpeed : 300,
              paginationSpeed : 400,
              singleItem : true

          });
      });

      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>


