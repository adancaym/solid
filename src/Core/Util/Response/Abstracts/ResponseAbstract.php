<?php
namespace Solid\Core\Util\Response\Abstracts;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use Solid\Core\Util\Request\Abstracts\RequestAbstract ;
/**
 * Description of ResponseAbstract
 *
 * @author AdanC
 */
class ResponseAbstract {
    
    private $response;
    private $request;
    private $container;
    private $items;
    private $html;
    private $data;
    
    
    function __construct(RequestAbstract $request) {
        $this->request = $request;        
    }
    
    
    public function responseHtml(){
        header("Content-Type: text/html");
        return $this->getHtml();
    }
    
    public function responseJson(){
        header('content-type: application/json; charset=utf-8');
        $this->response = new \stdClass();
        $this->response->container = $this->container ?? $this->request->param('response_container','#main_container'); 
        $this->response->items = $this->items;
        $this->response->html = $this->html;
        $this->response->data = $this->data;
        
        return json_encode($this->response);
    }
    
    public function getData() {
        return $this->data;
    }

    public function setData($key,$data) {
        $this->data[$key] = $data;
        return $this;
    }

        public function getRequest(): RequestAbstract{
        return $this->request;
    }
            function getResponse() {
        return $this->response;
    }

    function getContainer() {
        return $this->container;
    }

    function getItems() {
        return $this->items;
    }

    function getHtml() {
        return $this->html;
    }

    function setResponse($response) {
        $this->response = $response;
        return $this;
    }

    function setContainer($container) {
        $this->container = $container;
        return $this;
    }

    function setItems($items) {
        $this->items = $items;
        return $this;
    }

    function setHtml($html) {
        $this->html = $html;
        return $this;
    }


}
