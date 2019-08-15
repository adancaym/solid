<?php
namespace Solid\Core\Mvc\Model\Classes;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use Solid\Core\Mvc\Model\Abstracts\ModelAbstract;
use Solid\App\Config\ConfigApp;
/**
 * Description of Model
 *
 * @author AdanC
 */
class Model extends ModelAbstract{
    public function __construct(ConfigApp $configApp) {
        parent::__construct($configApp);
    }
    
    public function findAll(){
        return $this->getDao()->select()->from()->get();
    }
    public function update($id,$params){
        return $this->getDao()->update($id,$params) ;
    }
    public function finById($id){
        return $this->getDao()->select()->from()->where($this->getDao()->getId(),$id)->get(true);
    }
}
