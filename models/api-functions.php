<?php
/**
 * api-functions.php is used to communicate with the api in order to retrieved
 * questions for the user.
 *
 * @package models
 * @author Tyler Bezera <tbezera2@mail.greenriver.edu>
 * @author Brett Yeager <byeager@mail.greenriver.edu>
 */
session_start();
require_once '../vendor/autoload.php';
if(isset($_POST['action']))
{
    //is post is set, make sure the action we want it question
    if ($_POST['action'] == 'question')
    {
        getQuestion();
    }
}

/**
 * Used to communicate with the api and get back a single random
 * question. This is called through ajax, so it echos the resulting
 * json.
 *
 */
function getQuestion()
{

    //get a random number
    $rand = rand(1, 10000);

    //create a guzzle client and send a GET request to the api
    $client = new GuzzleHttp\Client();
    $res = $client->request('GET', 'https://qriusity.com/v1/questions?page='. $rand .'&limit=1', ['verify' => false]);

    //decode the resulting json, to place in Question object
    $jsonData = json_decode($res->getBody(), true)[0];

    //create a question object with data
    $question = new Question($jsonData["question"], null, $jsonData["category"]["name"], $jsonData["answers"]);

    //store the object in session
    $_SESSION["correctAnswer"] = $question;

    //send the json to our ajax call
    echo $res->getBody();
}

