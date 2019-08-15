<?php
namespace Solid\Core\Mvc\Controller\Abstracts;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use Solid\Core\Util\Request\Abstracts\RequestAbstract;
use Solid\Core\Util\Response\Abstracts\ResponseAbstract;
use Solid\App\Config\ConfigApp;
use Solid\Core\Mvc\Model\Abstracts\ModelAbstract;
use Solid\Core\Mvc\View\Classes\View;
/**
 * Description of ControllerAbstract
 *
 * @author AdanC
 */
abstract class ControllerAbstract {

    private $request;
    private $response;
    private $configApp;
    private $model;
    private $view;
    

    public function __construct(RequestAbstract $request, ResponseAbstract $response, ConfigApp $configApp) {
        $this->request = $request;
        $this->response = $response;
        $this->configApp = $configApp;
    }
    
    function getRequest(): RequestAbstract {
        return $this->request;
    }

    function getResponse(): ResponseAbstract{
        return $this->response;
    }
    public function getConfigApp() {
        return $this->configApp;
    }

    public function setConfigApp($configApp) {
        $this->configApp = $configApp;
        return $this;
    }

    public function getModel() : ModelAbstract {
        return $this->model;
    }

    public function setModel(ModelAbstract $model) {
        $this->model = $model;
        return $this;
    }
    public function getView() : View{
        return $this->view;
    }

    public function setView($view) {
        $this->view = $view;
        return $this;
    }

    public function param($key='',$default=null){
        return $this->getRequest()->param($key,$default);
    }

    
}
