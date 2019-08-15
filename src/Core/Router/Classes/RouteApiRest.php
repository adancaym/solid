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
 * Description of RouteApiRest
 *
 * @author AdanC
 */
class RouteApiRest {

    private $name;
    private $nameSpace;
    private $controller;
    private $method;
    private $requestMethod;
    private $response;
    private $configApp;

    private $verbs =[
        'GET'=>'index',
        'PUT'=>'store',
        'DELETE'=>'delete'
    ];
    
    private $extraVerbs=[];

    public function appendVerbMethod($verb,$metodo){
        $this->extraVerbs[$metodo] = $verb;
    }

    public function __construct($name, $namespace ,$controller) {
        $this->name = $name;
        $this->controller = $controller;
        $this->nameSpace = $namespace;
        $this->stringClass = $namespace.'\\'.$controller;
        
    }
    
    public function setMethod($method) {
        $this->method = $method;
        return $this;
    }    
    public function getConfigApp(): ConfigApp {
        return $this->configApp;
    }

    public function setConfigApp($configApp) {
        $this->configApp = $configApp;
        return $this;
    }

        
    public function getResponse(): ResponseAbstract {
        return $this->response;
    }

    public function setResponse($response) {
        $this->response = $response;
        return $this;
    }

    public function response(){
        $controller = new $this->stringClass($this->getResponse()->getRequest(), $this->getResponse(), $this->getConfigApp());
        $method = $this->getMethod();
        $response = call_user_func_array(array($controller, $this->getMethod()) , array());
        
        return $response;  
    }
    
    public function getMethod(){
        
        if($this->extraVerbs[$this->method] == $this->getRequestMethod()){
            $method = $this->method;
            
        }else{
            if($this->method == ''){
                $method = $this->verbs[$this->getRequestMethod()] ;    
            }else{
                throw new \Exception('No esta definida esta ruta verifica el archivo routes');
            }
        }
        return $method;
                
    }

    public function getRequestMethod() {
        return $this->requestMethod;
    }

    public function setRequestMethod($requestMethod) {
        $this->requestMethod = $requestMethod;
        return $this;
    }

        public function getName() {
        return $this->name;
    }

    public function getController() {
        return $this->controller;
    }

    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    public function setController($controller) {
        $this->controller = $controller;
        return $this;
    }

    public function getNameSpace() {
        return $this->nameSpace;
    }

    public function setNameSpace($nameSpace) {
        $this->nameSpace = $nameSpace;
        return $this;
    }


}
