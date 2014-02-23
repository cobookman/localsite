<?php
//Instatiate the SLIM framework
require 'vendor/autoload.php';
$app = new \Slim\Slim();

//Load any needed controllers
spl_autoload_register(function ($class_name) {
    $file = 'controllers/' . $class_name. '.php';
    if (file_exists($file)) {
        require_once($file);
    }
});

//Binds our routes
require "./router.php";

$app->run();
?>
