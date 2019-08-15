<?php
namespace Solid\App\Controllers;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use Solid\Core\Mvc\Controller\Classes\Controller;
use Solid\Core\Util\Directory\Classes\Directory;
use Solid\Core\Mvc\View\Classes\View;
/**
 * Description of HomeController
 *
 * @author AdanC
 */
class HomeController extends Controller {

 
    public function __construct($request, $response, $configApp) {
        parent::__construct($request, $response, $configApp);
        $directoryViews = new Directory('../views/modules/home/');
        $this->setView(new View($directoryViews));
    }
    public function index(){
  
        $html = $this->loadView('index.php');
        
        $this->getResponse()->setHtml($html);
        
        return $this->getResponse()->getHtml();
        
    }
}
