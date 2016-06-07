<?php
if (PHP_SAPI == 'cli-server') {
    // To help the built-in PHP dev server, check if the request was actually for
    // something which should probably be served as a static file
    $file = __DIR__ . $_SERVER['REQUEST_URI'];
    if (is_file($file)) {
        return false;
    }
}

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use Mbright\Model\FizzBuzz;
use Mbright\Model\Printer;

require '../vendor/autoload.php';

$app = new \Slim\App;
$app->get('/fizzbuzz/{integer}', function (Request $request, Response $response) {
    $integer = $request->getAttribute('integer');
    $fizz_buzz = new FizzBuzz(new Printer());
    $data = $fizz_buzz->handleInteger($integer, 'json');
    $response->getBody()->write($data);
    $response = $response->withHeader('Content-type', 'application/json');

    return $response;
});
$app->run();