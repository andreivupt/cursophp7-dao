<?php
/**
 * Created by PhpStorm.
 * User: andrei.vupt
 * Date: 23/06/2018
 * Time: 17:10
 */

spl_autoload_register(function ($class_name){

    $filename = "class".DIRECTORY_SEPARATOR.$class_name.".php";

    if (file_exists($filename)){
        require_once ($filename);
    }
});