<?php
namespace Solid\App\Config;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ConfigApp
 *
 * @author AdanC
 */
class ConfigApp {

    private $enviroment;
    private $pathDatabaseConnections;
    private $nameFileDatabaseConections;

    
    private $defaultNameSpace ;
    private $defaultController;
    private $defaultNameSpaceApiRest;
    private $defaultMethod ;
    
    
    
    function __construct($enviroment = "production", $defaultNameSpace = 'Solid\\App\\Controllers', $defaultController = 'HomeController', $defaultMethod='index') {
        $this->enviroment = $enviroment;
        $this->defaultNameSpace = $defaultNameSpace;
        $this->defaultController = $defaultController;
        $this->defaultMethod = $defaultMethod;
    }
    
    
    public function getPathDatabaseConnections() {
        return $this->pathDatabaseConnections;
    }

    public function getNameFileDatabaseConections() {
        return $this->nameFileDatabaseConections;
    }

    public function setPathDatabaseConnections($pathDatabaseConnections) {
        $this->pathDatabaseConnections = $pathDatabaseConnections;
        return $this;
    }

    public function setNameFileDatabaseConections($nameFileDatabaseConections) {
        $this->nameFileDatabaseConections = $nameFileDatabaseConections;
        return $this;
    }

        public function getDefaultNameSpaceApiRest() {
        return $this->defaultNameSpaceApiRest;
    }

    public function setDefaultNameSpaceApiRest($defaultNameSpaceApiRest) {
        $this->defaultNameSpaceApiRest = $defaultNameSpaceApiRest;
        return $this;
    }

        function getEnviroment() {
        return $this->enviroment;
    }

    function getDefaultNameSpace() {
        return $this->defaultNameSpace;
    }

    function getDefaultController() {
        return $this->defaultController;
    }

    function getDefaultMethod() {
        return $this->defaultMethod;
    }

    function setEnviroment($enviroment) {
        $this->enviroment = $enviroment;
        return $this;
    }

    function setDefaultNameSpace($defaultNameSpace) {
        $this->defaultNameSpace = $defaultNameSpace;
        return $this;
    }

    function setDefaultController($defaultController) {
        $this->defaultController = $defaultController;
        return $this;
    }

    function setDefaultMethod($defaultMethod) {
        $this->defaultMethod = $defaultMethod;
        return $this;
    }


    
}
