<?php

if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php')) {
    require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
}

AddEventHandler("main", "OnBuildGlobalMenu", ["App\\Robotics\\EventListeners", "addSettingsMenuItem"]);
