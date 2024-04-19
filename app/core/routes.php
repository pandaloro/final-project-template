<?php

use app\controllers\UserController;
use app\controllers\MainController;
use app\controllers\ContactController;
use app\controllers\CardController;
$routes = [
    'users' => [
        'controller' => UserController::class,
        'GET' => 'getUsers',
        'POST' => 'saveUsers'
    ],
    'view-users' => [
        'controller' => UserController::class,
        'GET' => 'getUsers',
    ],
    'contact-view' => [
        'controller' => ContactController::class,
        'GET' => 'viewContact',
        'POST' => 'postContact',
    ],
    '#' => [
        'controller' => MainController::class,
        'GET' => 'homepage',
    ],
    'posts' => [
        'controller' => UserController::class,
        'GET' => 'getUsers',
    ],
    'cards' => [
        'controller' => CardController::class,
        'GET' => 'getCards',
    ],
];
