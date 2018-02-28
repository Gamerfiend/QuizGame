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
    $client = new GuzzleHttp\Client();
    $res = $client->request('GET', 'https://qriusity.com/v1/questions?page=2&limit=1');

    //
//    echo $res->getStatusCode();
//
//    echo $res->getHeader('content-type');
    echo $res->getBody();
}

