<?php
namespace Solid\Core\Mvc\Model\Abstracts;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use Solid\Core\Database\Classes\Dao;
use Solid\App\Config\ConfigApp;
/**
 * Description of ModelAbstract
 *
 * @author AdanC
 */
abstract class ModelAbstract{
    private $dao;
    public function __construct(ConfigApp $configApp) {
        $dao = new Dao($configApp);
        $this->dao = $dao;
    }   
    public function setTable($table){
        
        $this->getDao()->setTable($table);
        return $this;
    }
    public function setId($id){
        
        $this->getDao()->setId($id);
        return $this;

    }
    public function getDao(): Dao {
        return $this->dao;
    }

    public function setDao($dao) {
        $this->dao = $dao;
        return $this;
    }


}
