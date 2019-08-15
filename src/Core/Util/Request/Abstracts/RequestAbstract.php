<?php
namespace Solid\Core\Util\Request\Abstracts;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RequestAbstract
 *
 * @author AdanC
 */
abstract class RequestAbstract {
    
    private $post;
    private $get;
    private $cookie;
    private $files;
    private $session;
    private $server;
    private $paramters;

    public function __construct() {
        $this->setPost($_POST);
        $this->setGet($_GET);
        $this->setCookie($_COOKIE);
        $this->setFiles($_FILES);
        $this->setSession($_SESSION);
        $this->setServer($_SERVER);
        $this->setParamters($this->mergeParameters());
    }
 
    public function addParameter($key,$value){
        $this->paramters[$key] = $value;
    }

    public function param($key=null,$defualt = null){
        return $key != null ? isset($this->paramters[$key]) ? $this->paramters[$key]: $defualt : $this->paramters;
    }

    protected function mergeParameters(){
        return array_merge($this->getPost(), $this->getGet(), $this->getCookie(), $this->getFiles(), $this->getSession(), $this->getServer());
    }

    public function getSessionVar($key){
        return $this->session[$key];
    }
    public function setSessionVar($key,$value){
        $_SESSION[$key] = $value;
        $this->session[$key] =$value;
    }
    public function unsetSessionVar($key){
        unset($this->session[$key]);
        unset($_SESSION[$key]);
    }
    public function unsetSession(){
        $this->session=array();
        session_unset();
    }
    function getServer() {
        return $this->server;
    }
    function setServer($server) {
        $this->server = $server;
        return $this;
    }

        
    function getPost() {
        return $this->post ?? array();;
    }

    function getGet() {
        return $this->get ?? array();;
    }

    function getCookie() {
        return $this->cookie ?? array();
    }

    function getFiles() {
        return $this->files ?? array();;
    }

    function getSession() {
        return $this->session ?? array();;
    }

    function getParamters() {
        return $this->paramters ?? array();;
    }

    function setPost($post) {
        $this->post = $post;
        return $this;
    }

    function setGet($get) {
        $this->get = $get;
        return $this;
    }

    function setCookie($cookie) {
        $this->cookie = $cookie;
        return $this;
    }

    function setFiles($files) {
        $this->files = $files;
        return $this;
    }

    function setSession($session) {
        $this->session = $session;
        return $this;
    }

    function setParamters($paramters) {
        $this->paramters = $paramters;
        return $this;
    }


    
    
    
}
