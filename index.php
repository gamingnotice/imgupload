<?php
declare(strict_types=1);

require_once 'Router.php';

$router = new Router($_GET['path']);

$router->addRoute('upload', 'Controller/UploadController');
$router->addRoute('show', 'Controller/ShowController');
$router->addRoute('admin', 'Controller/AdminController');
$router->addRoute('logout', 'Controller/AdminController', 'logout');
$router->addRoute('login', 'Controller/AdminController', 'handleLogin');

$router->dispatch();
