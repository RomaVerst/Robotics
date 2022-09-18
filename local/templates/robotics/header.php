<?php

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) {
    die();
}

use \Bitrix\Main\Localization\Loc;
use \Bitrix\Main\Page\Asset;

Loc::loadLanguageFile(__FILE__);

?>
<!doctype html>
<html lang="<?=LANGUAGE_ID?>">
<head>
    <title><?$APPLICATION->ShowTitle()?></title>
    <?$APPLICATION->ShowHead();?>

    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300, 400,700" rel="stylesheet">

    <?Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/css/bootstrap.css");?>
    <?Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/css/animate.css");?>
    <?Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/css/bootstrap.css");?>
    <?Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/css/owl.carousel.min.css");?>
    <?Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/fonts/ionicons/css/ionicons.min.css");?>
    <?Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/fonts/fontawesome/css/font-awesome.min.css");?>
    <?Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/fonts/flaticon/font/flaticon.css");?>

    <!-- Theme Style -->
    <?Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/css/style.css");?>
</head>
<body>
<header role="banner">
    <?$APPLICATION->ShowPanel();?>
    <div class="top-bar">
        <div class="container">
            <div class="row">
                <div class="col-9 social">
                    <a href="#"><span class="fa fa-twitter"></span></a>
                    <a href="#"><span class="fa fa-facebook"></span></a>
                    <a href="#"><span class="fa fa-instagram"></span></a>
                    <a href="#"><span class="fa fa-youtube-play"></span></a>
                    <a href="#"><span class="fa fa-vimeo"></span></a>
                    <a href="#"><span class="fa fa-snapchat"></span></a>
                </div>
                <div class="col-3 search-top">
                    <!-- <a href="#"><span class="fa fa-search"></span></a> -->
                    <form action="#" class="search-top-form">
                        <span class="icon fa fa-search"></span>
                        <input type="text" id="s" placeholder="Type keyword to search...">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="container logo-wrap">
        <div class="row pt-5">
            <div class="col-12 text-center">
                <a class="absolute-toggle d-block d-md-none" data-toggle="collapse" href="#navbarMenu" role="button" aria-expanded="false" aria-controls="navbarMenu"><span class="burger-lines"></span></a>
                <h1 class="site-logo"><a href="index.html">Balita</a></h1>
            </div>
        </div>
    </div>

    <nav class="navbar navbar-expand-md  navbar-light bg-light">
        <div class="container">
            <?$APPLICATION->IncludeComponent(
                "bitrix:menu",
                "robotics_top",
                [
                    "ALLOW_MULTI_SELECT" => "N",
                    "CHILD_MENU_TYPE" => "left",
                    "DELAY" => "N",
                    "MAX_LEVEL" => "2",
                    "MENU_CACHE_GET_VARS" => array(""),
                    "MENU_CACHE_TIME" => "3600",
                    "MENU_CACHE_TYPE" => "N",
                    "MENU_CACHE_USE_GROUPS" => "Y",
                    "ROOT_MENU_TYPE" => "top",
                    "USE_EXT" => "N"
                ]
            );?>
        </div
    </nav>
</header>
<!-- END header -->
