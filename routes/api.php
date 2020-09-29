<?php

$app->group(['prefix' => 'api/'], function ($app) {
    $app->get('login/','AuthController@authenticate');
});