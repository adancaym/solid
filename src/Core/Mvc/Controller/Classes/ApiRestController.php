<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Solid\Core\Mvc\Controller\Classes;
use Solid\Core\Mvc\Controller\Abstracts\ControllerAbstract;
use Solid\Core\Mvc\Controller\Interfaces\ApiRestControllerInterface;
/**
 * Description of ApiRestController
 *
 * @author AdanC
 */
class ApiRestController extends ControllerAbstract implements ApiRestControllerInterface{

    
    public function delete() {
        return 'delete';
    }

    public function index() {
        $items = $this->getModel()->findAll();
        $this->getResponse()->setItems($items);
        return $this->getResponse()->responseJson();
    }

    public function store() {
        return 'store';
    }

}
