<?php
namespace Solid\Core\Mvc\Controller\Classes;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use Solid\Core\Mvc\Controller\Abstracts\ControllerAbstract;
use Solid\Core\Mvc\Controller\Interfaces\ControllerInterface;
use Solid\Core\Util\Directory\Classes\Directory;
use Solid\Core\Mvc\View\Classes\View;

/**
 * Description of Controller
 *
 * @author AdanC
 */
class Controller extends ControllerAbstract implements ControllerInterface{

    protected $template ;
    protected $view;
    public function __construct($request, $response,$configApp) {
        parent::__construct($request, $response,$configApp);
        $directory = new Directory('../views/template/');
        $this->setTemplate(new View($directory));
    }
    public function getTemplate(): View {
        return $this->template;
    }

    public function getView() : View{
        return $this->view;
    }

    public function setTemplate($template) {
        $this->template = $template;
        return $this;
    }

    public function setView($view) {
        $this->view = $view;
        return $this;
    }
    
    public function loadView($name,$params = array()){
        
        $params['body'] =  $this->getView()->getView($name)->parse($params)->getHtml();
        $html = $this->getTemplate()->getView('index.php')->parse($params)->getHtml();
        return $html;
        
    }

}
