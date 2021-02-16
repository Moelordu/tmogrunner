<?php
function loadClass($class)
{
    if (preg_match("/Controller$/", $class))
        require("controller/$class.php");
    else
        require("model/$class.php");
}
spl_autoload_register("loadClass");

Db::connect("localhost", "root", "", "tmogru");
