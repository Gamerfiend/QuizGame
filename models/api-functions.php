<?php
session_start();
require_once '../vendor/autoload.php';
if(isset($_POST['action']))
{
    if ($_POST['action'] == 'question')
    {
        getQuestion();
    }
}

function getQuestion()
{

    $rand = rand(1, 10000);

    $client = new GuzzleHttp\Client();
    $res = $client->request('GET', 'https://qriusity.com/v1/questions?page='. $rand .'&limit=1', ['verify' => false]);
    $jsonData = json_decode($res->getBody(), true)[0];

    $question = new Question($jsonData["question"], null, $jsonData["category"]["name"], $jsonData["answers"]);

    $_SESSION["correctAnswer"] = $question;

    echo $res->getBody();
}

