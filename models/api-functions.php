<?php

/**
 *
 */
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
    $res = $client->request('GET', 'https://qriusity.com/v1/questions?page='. $rand .'&limit=1');

    //
//    echo $res->getStatusCode();
//
//    echo $res->getHeader('content-type');
    echo $res->getBody();
}

