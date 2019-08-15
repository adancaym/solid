<?php
namespace Solid\App\Models;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use Solid\Core\Mvc\Model\Classes\Model;
use Solid\App\Config\ConfigApp;
/**
 * Description of UserModel
 *
 * @author AdanC
 */
class UserModel extends Model{
    
    public function __construct(ConfigApp $configApp) {
        parent::__construct($configApp);
        $this->setId('iduser')->setTable('user');
    }

    public function getUserbyCuenta($account){
        $sql = "select * From user inner join account on account.iduser = user.iduser
                where account.account = $account
            ";
        $this->getDao()->setSql($sql);
        $return = $this->getDao()->get(true);
        $return = $return ?? false;
        return $return;
    }

    
}
