<?php
/**
 * Created by PhpStorm.
 * User: Snow Tyler Bezera
 * Date: 1/18/2018
 * Time: 1:29 PM
 */

//Turn on error reporting
error_reporting(E_ALL);
ini_set('display_errors', TRUE);

//require the autoload file
require_once('vendor/autoload.php');

//create an instance of the Base class
$f3 = Base::instance();

//define a default route
$f3->route('GET /', function() {
    $view = new View;
    echo $view->render('views/home.html');
});

//run fat free
$f3->set('DEBUG', 3);
$f3->run();



?>