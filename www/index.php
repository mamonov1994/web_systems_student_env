<?php
include_once "bootstrap.php"; //вызывает (module).routes.php
include_once "routing.php"; //вызывает (module).routes.php
bootstrap::startLoad();
$routes = new Router();
$routes->get("profile\/(\w+)", profile);
$routes->get("", home);
$routes->post("contact",contactUs);
$routes->process($_SERVER ['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);