<?php include(config.php)
//Instatiate the SLIM framework
require 'vendor/autoload.php';
$app = new \Slim\Slim();

//Change the http Content-type header to json
$response = $app->response();
$response['Content-Type'] = "application/json; charset=utf-8";
//Internal string encoding is utf-8
mb_internal_encoding("UTF-8"); 

//Load only the needed controllers 
spl_autoload_register(function ($class_name) {
    $file = 'routes/' . $class_name. '.php';
    if (file_exists($file)) {
        require_once($file);
    }
});
//Binds our routes
require "./router.php";

$app->run();
?>
