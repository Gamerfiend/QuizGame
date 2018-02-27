<?php

function getQuestions()
{
    $client = new GuzzleHttp\Client();
    $res = $client->request('GET', 'https://qriusity.com/v1/questions?page=2&limit=3');

    echo $res->getStatusCode();

    echo $res->getHeader('content-type');

    echo $res->getBody();
}

