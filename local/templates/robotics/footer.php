<?php

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) {
    die();
}

Use \Bitrix\Main\Localization\Loc;

Loc::loadLanguageFile(__FILE__);

?>

        <div class="col-md-12 col-lg-4 sidebar">
            <?$APPLICATION->IncludeComponent("bitrix:main.include","",[
                  "AREA_FILE_SHOW" => "file",
                  "PATH" => SITE_DIR . "include/search_input.php"
              ]);?>
            <!-- END sidebar-box -->
            <?$APPLICATION->IncludeComponent("bitrix:main.include","", [
                    "AREA_FILE_SHOW" => "file",
                    "PATH" => SITE_DIR . "include/mini_blog.php"
             ]);?>
            <!-- END sidebar-box -->
            <?$APPLICATION->IncludeComponent("bitrix:main.include","", [
                "AREA_FILE_SHOW" => "file",
                "PATH" => SITE_DIR . "include/popular_posts.php"
            ]);?>
            <!-- END sidebar-box -->
            <?$APPLICATION->IncludeComponent("bitrix:main.include","", [
                "AREA_FILE_SHOW" => "file",
                "PATH" => SITE_DIR . "include/categories.php"
            ]);?>
            <!-- END sidebar-box -->
        </div>
        <!-- END sidebar -->
     </div>
    </div>
</section>
<?$APPLICATION->ShowViewContent('related_post');?>
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
