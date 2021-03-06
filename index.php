<?php
/**
 * Index for the QuizGame, responsible for routing and storing information using the fat free framework.
 *
 * @package QuizGame
 * @author Tyler Bezera <tbezera2@mail.greenriver.edu>
 * @author Brett Yeager <byeager@mail.greenriver.edu>
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
$f3->route('GET /', function($f3) {

    if(isset($_SESSION['correctAnswer'])){
        $f3->set("answer", $_SESSION['correctAnswer']);
    }
    $highscores = getHighscores();

    $f3->set("highscores", $highscores);

    $f3->set("nickname", $_SESSION['nickname']);

    session_unset();

    echo Template::instance()->render('views/home.html');
});


$f3->route('GET /play', function($f3) {

    //Validate nickname on server side
    if($_GET['nickname']!=null){
        $_SESSION['nickname'] = $_GET['nickname'];
        echo Template::instance()->render('views/play.html');
    }else{
        $f3->reroute("/");
    }
});
$f3->route('POST /play', function($f3) {
    //check if post has been submitted
    $correct = false;

    for($i=1; $i<=4; $i++){

        if(isset($_POST[$i])){
            $givenAnswer = $i;

            //check submitted answer, against correct answer in session
            if($_SESSION["question"]->getCorrectIndex()==$givenAnswer){
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
        $f3->set('score', $_SESSION["highscore"]);
        echo Template::instance()->render('views/play.html');
    }else{

        //Save high score
        submitHighscore($_SESSION['nickname'], $_SESSION["highscore"]);
        $_SESSION["highscore"] = 0;
        $_SESSION["correctAnswer"] = $_SESSION["question"]->getCorrectAnswer();
        $f3->reroute("/");
    }
});

//run fat free
$f3->set('DEBUG', 3);
$f3->run();

?>