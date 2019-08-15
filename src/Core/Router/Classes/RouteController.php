<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Solid\Core\Router\Classes;
use Solid\Core\Util\Response\Abstracts\ResponseAbstract;
use Solid\App\Config\ConfigApp;
/**
 * Description of RouteController
 *
 * @author AdanC
 */
class RouteController {

    private $nameSpace;
    private $controller;
    private $method;
    private $params;
    private $stringClass;
    private $configApp;


    public function __construct($nameSpace, $controller, $method, $params,ResponseAbstract $response,ConfigApp $configApp) {
        $this->nameSpace = $nameSpace;
        $this->controller = $controller;
        $this->method = $method;
        $this->params = $params;
        $this->response = $response;
        
        $this->stringClass= $nameSpace.'\\'.$controller;
        $this->configApp = $configApp;
    }

    public function exist(){
        return class_exists($this->stringClass,true);
    }
    public function response(){
        $controller = new $this->stringClass($this->getResponse()->getRequest(), $this->getResponse(), $this->getConfigApp());
        $response = call_user_func_array(array($controller, $this->method), $this->params);
        return $response;  
    }
    
    private function getResponse(): ResponseAbstract{
        return $this->response;
    }
    private function getConfigApp():ConfigApp {
        return $this->configApp;
    }
}