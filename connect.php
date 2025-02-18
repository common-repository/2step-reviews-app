<?php

use TwoStepReviews\Client;
defined('ABSPATH') || exit;

function connect(){

    $client = new Client($_POST);

    try{
        $res = $client->authManager->auth();

        $result = array(
            'connected' => $client->authManager->isConnected(),
            'message' =>  'You are now connected to 2StepReviews'
        );

    } catch (Exception $ex){
        $result = array(
            'connected' => false,
            'message' =>  $ex->getMessage()
        );
    }

    return $result;
}

function  disconnect(){
    $client = new Client();
    $client->authManager->logout();
}

function isConnected(){
    $client = new Client();
    return $client->authManager->isConnected();
}