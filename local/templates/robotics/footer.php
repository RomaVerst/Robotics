<?php

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) {
    die();
}

Use \Bitrix\Main\Localization\Loc;

Loc::loadLanguageFile(__FILE__);

?>
        <div class="col-md-12 col-lg-4 sidebar">
            <div class="sidebar-box search-form-wrap">
                <form action="#" class="search-form">
                    <div class="form-group">
                        <span class="icon fa fa-search"></span>
                        <input type="text" class="form-control" id="s" placeholder="Type a keyword and hit enter">
                    </div>
                </form>
            </div>
            <!-- END sidebar-box -->
            <?$APPLICATION->IncludeComponent("bitrix:main.include","",Array(
                    "AREA_FILE_SHOW" => "file",
                    "PATH" => "include/mini_blog.php"
                )
            );?>
            <!-- END sidebar-box -->
            <div class="sidebar-box">
                <h3 class="heading">Popular Posts</h3>
                <div class="post-entry-sidebar">
                    <ul>
                        <li>
                            <a href="">
                                <img src="<?=SITE_TEMPLATE_PATH?>/images/img_2.jpg" alt="Image placeholder" class="mr-4">
                                <div class="text">
                                    <h4>There’s a Cool New Way for Men to Wear Socks and Sandals</h4>
                                    <div class="post-meta">
                                        <span class="mr-2">March 15, 2018 </span> &bullet;
                                        <span class="ml-2"><span class="fa fa-comments"></span> 3</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <img src="<?=SITE_TEMPLATE_PATH?>/images/img_4.jpg" alt="Image placeholder" class="mr-4">
                                <div class="text">
                                    <h4>There’s a Cool New Way for Men to Wear Socks and Sandals</h4>
                                    <div class="post-meta">
                                        <span class="mr-2">March 15, 2018 </span> &bullet;
                                        <span class="ml-2"><span class="fa fa-comments"></span> 3</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <img src="<?=SITE_TEMPLATE_PATH?>/images/img_12.jpg" alt="Image placeholder" class="mr-4">
                                <div class="text">
                                    <h4>There’s a Cool New Way for Men to Wear Socks and Sandals</h4>
                                    <div class="post-meta">
                                        <span class="mr-2">March 15, 2018 </span> &bullet;
                                        <span class="ml-2"><span class="fa fa-comments"></span> 3</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- END sidebar-box -->

            <div class="sidebar-box">
                <h3 class="heading">Categories</h3>
                <ul class="categories">
                    <li><a href="#">Courses <span>(12)</span></a></li>
                    <li><a href="#">News <span>(22)</span></a></li>
                    <li><a href="#">Design <span>(37)</span></a></li>
                    <li><a href="#">HTML <span>(42)</span></a></li>
                    <li><a href="#">Web Development <span>(14)</span></a></li>
                </ul>
            </div>
            <!-- END sidebar-box -->

        </div>
        <!-- END sidebar -->

     </div>
    </div>
</section>
<footer class="site-footer">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </div>
        </div>
    </div>
</footer>
<!-- END footer -->

<!-- loader -->
<div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#f4b214"/></svg></div>

<script src="<?=SITE_TEMPLATE_PATH?>/js/jquery-3.2.1.min.js"></script>
<script src="<?=SITE_TEMPLATE_PATH?>/js/jquery-migrate-3.0.0.js"></script>
<script src="<?=SITE_TEMPLATE_PATH?>/js/popper.min.js"></script>
<script src="<?=SITE_TEMPLATE_PATH?>/js/bootstrap.min.js"></script>
<script src="<?=SITE_TEMPLATE_PATH?>/js/owl.carousel.min.js"></script>
<script src="<?=SITE_TEMPLATE_PATH?>/js/jquery.waypoints.min.js"></script>
<script src="<?=SITE_TEMPLATE_PATH?>/js/jquery.stellar.min.js"></script>


<script src="<?=SITE_TEMPLATE_PATH?>/js/main.js"></script>
</body>
</html>
