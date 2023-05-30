<?php 

require __DIR__ . '\vendor\autoload.php';
 

$request = $_SERVER['REQUEST_URI'];

switch ($request) {

    
    case '/':
        require __DIR__ . '/View/home.php';
        break;

    case '/login':
        require __DIR__ . '/View/login.php';
        break;

    case '/views/authors':
        require __DIR__ . '/views/authors.php';
        break;

    case '/about':
        require __DIR__ . '/views/aboutus.php';
        break;

    default:
        http_response_code(404);
        require __DIR__ . '/View/Utils/404.php';
        break;
}