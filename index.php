<?php
session_start();
require "init.php";

$router = new RouterController();
$router->process(array($_SERVER["REQUEST_URI"]));
$router->printView();
