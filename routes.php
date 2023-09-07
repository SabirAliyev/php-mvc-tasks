<?php

$router->get('', 'PageController@index');
$router->get('add', 'PageController@add');

$router->get('tasks', 'TaskController@index');
$router->post('tasks', 'TaskController@store');