<?php
if(isset($conn)){
    mysqli_close($conn);
}
?>
<footer class="footer-main-site">
    <section class="d-block d-xl-block d-lg-block d-md-block d-sm-block order-1">
        <div class="footer-shopping-features">
            <div class="container-fluid">
                <div class="col-12">
                    <div class="item">
                                <span class="icon-shopping">
                                    <img src="assets/images/footer/features/delivery-truck.svg" width="50"
                                         alt="تحویل اکسپرس" class="img-shopping">
                                </span>
                        <span class="title-shopping">ارسال فوری</span>
                        <span class="desc-shopping">در کمترین زمان دریافت کنید</span>
                    </div>
                    <div class="item">
                                <span class="icon-shopping">
                                    <img src="assets/images/footer/features/24-hours-support.svg" width="50"
                                         alt="پشتیبانی ۲۴ ساعته" class="img-shopping">
                                </span>
                        <span class="title-shopping">پشتیبانی ۲۴ ساعته</span>
                        <span class="desc-shopping"> پشتیبانی هفت روز هفته</span>
                    </div>
                    <div class="item">
                                <span class="icon-shopping">
                                    <img src="assets/images/footer/features/income.svg" width="50" alt="پرداخت در محل"
                                         class="img-shopping">
                                </span>
                        <span class="title-shopping">پرداخت انلاین</span>
                        <span class="desc-shopping">به اسانی و به سرعت سفارش دهید</span>
                    </div>
                    <div class="item">
                                <span class="icon-shopping">
                                    <img src="assets/images/footer/features/easy-return.svg" width="50"
                                         alt="۷ روز ضمانت بازگشت" class="img-shopping">
                                </span>
                        <span class="title-shopping">۷ روز ضمانت بازگشت</span>
                        <span class="desc-shopping">هفت روز مهلت بازگشت شامل گارانتی کالا</span>
                    </div>
                    <div class="item">
                                <span class="icon-shopping">
                                    <img src="assets/images/footer/features/original.svg" width="50"
                                         alt="ضمانت اصل‌بودن کالا" class="img-shopping">
                                </span>
                        <span class="title-shopping">ضمانت اصل‌بودن کالا</span>
                        <span class="desc-shopping">تایید اصالت کالا</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="d-block d-xl-block d-lg-block d-md-block d-sm-block order-1">
        <div class="container-fluid">
            <div class="col-12">
                <div class="footer-middlebar">
                    <div class="col-lg-8 d-block pr">
                        <div class="footer-links">
                            <div class="col-lg-3 col-md-3 col-xs-12 pr">
                                <div class="row">
                                    <section class="footer-links-col">
                                        <div class="headline-links">
                                            <a href="#">
                                                با شهروند موبایل
                                            </a>
                                        </div>
                                        <ul class="footer-menu-ul">
                                            <li class="menu-item-type-custom">
                                                <a href="faq.php">
                                                    پاسخ به پرسش های متداول
                                                </a>
                                            </li>
                                            <li class="menu-item-type-custom">
                                                <a href="contact-us.php">
                                                    ادرس فروشگاه
                                                </a>
                                            </li>
                                            <li class="menu-item-type-custom">
                                                <a href="about.php">
                                                    اشنایی با شهروند موبایل
                                                </a>
                                            </li>
                                            <li class="menu-item-type-custom">
                                                <a href="contact-us.php">
                                                    تماس با شهروند موبایل
                                                </a>
                                            </li>
<!--                                            <li class="menu-item-type-custom">-->
<!--                                                <a href="#">-->
<!--                                                    -->
<!--                                                </a>-->
<!--                                            </li>-->
                                        </ul>
                                    </section>
                                </div>
                            </div>
<!--                            <div class="col-lg-3 col-md-3 col-xs-12 pr">-->
<!--                                <div class="row">-->
<!--                                    <section class="footer-links-col">-->
<!--                                        <div class="headline-links">-->
<!--                                            <a href="#">-->
<!--                                                خدمات مشتریان-->
<!--                                            </a>-->
<!--                                        </div>-->
<!--                                        <ul class="footer-menu-ul">-->
<!--                                            <li class="menu-item-type-custom">-->
<!--                                                <a href="faq.php">-->
<!--                                                    پاسخ به پرسش‌های متداول-->
<!--                                                </a>-->
<!--                                            </li>-->
<!--                                            <li class="menu-item-type-custom">-->
<!--                                                <a href="faq.php">-->
<!--                                                    رویه‌های سفارش کالا-->
<!--                                                </a>-->
<!--                                            </li>-->
<!--                                            <li class="menu-item-type-custom">-->
<!--                                                <a href="#">-->
<!--                                                    شرایط استفاده-->
<!--                                                </a>-->
<!--                                            </li>-->
<!--                                            <li class="menu-item-type-custom">-->
<!--                                                <a href="#">-->
<!--                                                    حریم خصوصی-->
<!--                                                </a>-->
<!--                                            </li>-->
<!--                                        </ul>-->
<!--                                    </section>-->
<!--                                </div>-->
<!--                            </div>-->
                            <div class="col-lg-3 col-md-3 col-xs-12 pr">
                                <div class="row">
                                    <section class="footer-links-col">
                                        <div class="headline-links">
                                            <a href="#">
                                                راهنمای خرید از شهروند موبایل
                                            </a>
                                        </div>
                                        <ul class="footer-menu-ul">
                                            <li class="menu-item-type-custom">
                                                <a href="<?= BASEURL.'faq.php?cat=نحوه ثبت سفارش'?>">
                                                    نحوه ثبت سفارش
                                                </a>
                                            </li>
                                            <li class="menu-item-type-custom">
                                                <a href="<?= BASEURL.'faq.php?cat=رویه ارسال سفارش'?>">
                                                    رویه ارسال سفارش
                                                </a>
                                            </li>
                                            <li class="menu-item-type-custom">
                                                <a href="<?= BASEURL.'faq.php?cat=شیوه های پرداخت'?>">
                                                    شیوه‌های پرداخت
                                                </a>
                                            </li>
                                            <li class="menu-item-type-custom">
                                                <a href="<?= BASEURL.'faq.php?cat=خرید اقساطی'?>">
                                                    شرایط خرید اقساطی
                                                </a>
                                            </li>
                                        </ul>
                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="footer-more-info">
                        <div class="col-lg-10 pr">
                            <div class="footer-content d-block">
                                <div class="text pr-1">
                                    <h2 class="title">فروشگاه اینترنتی شهروند موبایل</h2>
                                    <p class="desc"> شهروند موبایل به عنوان یکی از قدیمی‌ترین فروشگاه های دیجیتالی در استان گلستان و شهرستان آزادشهر در تلاش است بعد از چند دهه فعالیت مستمر
                                        در زمینه فروش و تعمیرات تخصصی موبایل ، لپ تاب و لوازم جانبی اینک خود را به عنوان یکی از وبسایت های
                                        تخصصی فروش لوازم دیجیتالی مطرح کند و بتواند به پشتوانه اعتماد مشتریان عزیز که تا کنون ما را همراهی کرده اند در تجربه ای جدید
                                       بار دیگر ثابت قدم باشیم .
                                    </p>
                                </div>
                            </div>
                            <br>
                            <br>
                        </div>
<!--                        <div class="col-lg-2 pl">-->
<!--                            <div class="footer-safety-partner">-->
<!--                                <div class="widget widget-product card mb-0">-->
<!--                                    <div-->
<!--                                        class="product-carousel-symbol owl-carousel owl-theme owl-rtl owl-loaded owl-drag">-->
<!--                                        <div class="owl-stage-outer">-->
<!--                                            <div class="owl-stage"-->
<!--                                                 style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 2234px;">-->
<!--                                                <div class="owl-item active"-->
<!--                                                     style="width: 300.75px; margin-left: 10px;">-->
<!--                                                    <div class="item">-->
<!--                                                        <a href="#" class="d-block hover-img-link">-->
<!--                                                            <img src="assets/images/footer/license/L-1.png"-->
<!--                                                                 class="img-fluid img-brand" alt="">-->
<!--                                                        </a>-->
<!--                                                    </div>-->
<!--                                                </div>-->
<!--                                                <div class="owl-item active"-->
<!--                                                     style="width: 300.75px; margin-left: 10px;">-->
<!--                                                    <div class="item">-->
<!--                                                        <a href="#" class="d-block hover-img-link mt-0">-->
<!--                                                            <img src="assets/images/footer/license/L-2.png"-->
<!--                                                                 class="img-fluid img-brand" alt="">-->
<!--                                                        </a>-->
<!--                                                    </div>-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->

                        <div class="footer-copyright">
                            <div class="footer-copyright-text">
                                <p>تمامی مطالب، عکس ها و... متعلق به سایت فروشگاهی شهروند موبایل می باشد.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</footer>
<!-- footer------------------------------------------->
