<?php

$router->get('',                'PageController@index');
$router->get('add',             'PageController@add');
$router->get('404',             'PageController@error_404');
$router->get('500',             'PageController@error_500');

$router->get('tasks',           'TaskController@index');
$router->get('tasks/details',   'TaskController@show');
$router->post('tasks',          'TaskController@store');
$router->post('tasks/details',  'TaskController@update');
