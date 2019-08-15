<?php
namespace Solid\Core\Router\Classes;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use Solid\Core\Router\Abstracts\RouterAbstract;
use Solid\Core\Util\Request\Abstracts\RequestAbstract;
use \Solid\Core\Util\Response\Abstracts\ResponseAbstract ;
use Solid\App\Config\ConfigApp;
/**
 * 
 * Description of Router
 *
 * @author AdanC
 */
class Router extends RouterAbstract{
    
    public function __construct(RequestAbstract $request,ResponseAbstract $response,ConfigApp $configApp) {
        parent::__construct($request,$response,$configApp);
    }
}
