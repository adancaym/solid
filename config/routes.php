<?php
use Solid\Core\Router\Classes\Router;
use Solid\Core\Util\Request\Classes\Request;
use Solid\Core\Util\Response\Classes\Response;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$request = new Request();

$response = new Response($request);

$router = new Router($request,$response,$configApp);


$router->addRouteApiRest('user', 'UserApiRest');

$router->getApiRESTByName('user')->appendVerbMethod('POST', 'isLogged');
$router->getApiRESTByName('user')->appendVerbMethod('POST', 'getUserByAccount');
$router->getApiRESTByName('user')->appendVerbMethod('POST', 'auth');
$router->getApiRESTByName('user')->appendVerbMethod('POST', 'logout');
$router->getApiRESTByName('user')->appendVerbMethod('GET', 'vars');

$router->addRouteApiRest('account', 'CuentaApiRest');
$router->getApiRESTByName('account')->appendVerbMethod('POST', 'getAcountByAccountAndIdUser');
