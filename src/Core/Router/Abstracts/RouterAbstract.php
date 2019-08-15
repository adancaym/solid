<?php
namespace Solid\Core\Router\Abstracts;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use Solid\Core\Util\Request\Abstracts\RequestAbstract;
use Solid\Core\Util\Response\Abstracts\ResponseAbstract;
use Solid\Core\Router\Classes\RouteApiRest;
use Solid\Core\Router\Classes\RouteController;
use Solid\App\Config\ConfigApp;
/**
 * Description of RouterAbstract
 *
 * @author AdanC
 */
abstract class RouterAbstract {
    
    protected $routes;
    protected $requestMethod;
    protected $requestUri;
    protected $uriArray;
    protected $configApp;
    protected $request;
    protected $response;
    


    public function __construct(RequestAbstract $request, ResponseAbstract $response,ConfigApp $configApp){
        
        $this->requestMethod = $request->param('REQUEST_METHOD');
        $this->requestUri = $request->param('REQUEST_URI');
        $this->uriArray = explode('/', $this->requestUri);
        $this->configApp = $configApp;
        $this->response = $response;
    }
    
    
    public function response(){
        
        $nameSpace = $this->getConfigApp()->getDefaultNameSpace();
        
        $controller = $this->getController() ?? $this->getConfigApp()->getDefaultController();
      
        $method = $this->getMethod() ?? $this->getConfigApp()->getDefaultMethod();
        
        $params = $this->getParametersUri();
        
        $controller = new RouteController($nameSpace, $controller, $method, $params, $this->getResponse(), $this->getConfigApp());
        
        if ($controller->exist()) {
            return $controller->response();
        }else if($this->existApiInRoutes()){
            
             $api = $this->getApiInRoutes();
             
             $api->setMethod($this->getMethod());
         
             $api->setResponse($this->getResponse());
             
             $api->setRequestMethod($this->getRequestMethod());
            
             $api->setConfigApp($this->getConfigApp());
            
             return $api->response();
        }
        
    }
    
    public function getApiRESTByName($name): RouteApiRest {
        return $this->routes[$name];
    }

    public function getApiInRoutes(): RouteApiRest{
        return $this->routes[$this->getUriSegment(1)];
    }

    public function existApiInRoutes(){
        return $this->routes[$this->getUriSegment(1)] != null;
    }

    public function addRouteApiRest($name,$controller){
        
        $this->routes[$name] = new RouteApiRest($name, $this->getConfigApp()->getDefaultNameSpaceApiRest(),$controller, $this->getConfigApp());
        
    }

    public function getResponse(): ResponseAbstract {
        return $this->response;
    }

    public function setResponse($response) {
        $this->response = $response;
        return $this;
    }

        function getRequest() {
        return $this->request;
    }

        public function getController(){
        return $this->getUriSegment(1);
    }
    
    public function getMethod(){
        return $this->getUriSegment(2);
    }
    
    public function getParametersUri(){
        $parametes = [];
        for ($i=3; $i< sizeof($this->getUriArray()); $i++)
            $parametes[] = $this->getUriSegment($i);   
        return $parametes;
    }
    protected  function getUriSegment($index){
        if(isset($this->uriArray[$index])){
            if( $this->uriArray[$index]!=''){
                return  $this->uriArray[$index];
            }else{
                return NULL;
            }
        }
        return  NULL ;
        
    }
   
    function getRoutes() {
        return $this->routes;
    }

    function getRequestMethod() {
        return $this->requestMethod;
    }

    function getRequestUri() {
        return $this->requestUri;
    }

    function getUriArray() {
        return $this->uriArray;
    }

    function setRoutes($routes) {
        $this->routes = $routes;
        return $this;
    }

    function setRequestMethod($requestMethod) {
        $this->requestMethod = $requestMethod;
        return $this;
    }

    function setRequestUri($requestUri) {
        $this->requestUri = $requestUri;
        return $this;
    }

    function setUriArray($uriArray) {
        $this->uriArray = $uriArray;
        return $this;
    }


    function getConfigApp(): ConfigApp {
        return $this->configApp;
    }
}
