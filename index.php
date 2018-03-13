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
session_start();

require "models/PDO.php";

//create an instance of the Base class
$f3 = Base::instance();

//define a default route
$f3->route('GET /', function() {
    $view = new View;
    echo $view->render('views/home.html');
});

$f3->route('GET /play', function() {
    echo Template::instance()->render('views/play.html');
});
$f3->route('POST /play', function() {
    //check if post has been submitted
    echo print_r($_POST);
    $correct = false;

    for($i=1; $i<=4; $i++){

        if(isset($_POST[$i])){
            $givenAnswer = $i;

            //check submitted answer, against correct answer in session
            if($_SESSION["correctAnswer"]->getCorrectIndex()==$givenAnswer){
                //Correct
                $correct = true;
            }else{
                //Incorrect
                $correct = false;
            }

        }
    }


    //if correct increment correctAnswered and reload page with new question
    if($correct){
        $_SESSION["highscore"] += 1;
        echo Template::instance()->render('views/play.html');
    }else{

        //Save high score
        submitHighscore("name", $_SESSION["highscore"]);
        $_SESSION["highscore"] = 0;
        echo Template::instance()->render('views/home.html');
    }

    echo "score: " . $_SESSION["highscore"];

    //else results page, which will submit to database

});

//run fat free
$f3->set('DEBUG', 3);
$f3->run();

?>