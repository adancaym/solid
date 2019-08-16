<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Solid\App\ApiRest;

use Solid\App\Config\ConfigApp;
use Solid\App\Models\AccountModel;
use Solid\App\Models\MovementModel;
use Solid\Core\Mvc\Controller\Classes\ApiRestController;
use Solid\Core\Util\Request\Abstracts\RequestAbstract;
use Solid\Core\Util\Response\Abstracts\ResponseAbstract;

/**
 * Description of CuentaApiRest
 *
 * @author AdanC
 */
class CuentaApiRest extends ApiRestController{
    public function __construct(RequestAbstract $request, ResponseAbstract $response, ConfigApp $configApp) {
        parent::__construct($request, $response, $configApp);
        $this->setModel(new AccountModel($configApp));
    }
    public function getAcountByAccountAndIdUser(){
        $account = $this->getRequest()->param('account');
        $iduser= $this->getRequest()->param('iduser');
        $return = $this->getModel()->getAcountByAccountAndIdUser($account,$iduser);
        $return = $return ?? false;

        $this->getResponse()->setData('account',$return);
        return $this->getResponse()->responseJson();
    }

    public function retiroDebito(){
        $iduser = $this->param('iduser');
        $idaccount = $this->param('idaccount');
        $movemet = $this->param('movement');
        $modelMovement = new MovementModel($this->getConfigApp());
        $success =  $modelMovement->retiro($idaccount,$iduser,$movemet);
        if($success){
            $account = $this->getModel()->getAcountByIdAccountAndIdUser($idaccount,$iduser);
            $this->getResponse()->setData('account',$account);
        }
        return $this->getResponse()->responseJson();
    }
    public function retiroCredito(){
        $iduser = $this->param('iduser');
        $idaccount = $this->param('idaccount');
        $movemet = $this->param('movement');
        $modelMovement = new MovementModel($this->getConfigApp());
        $success =  $modelMovement->retiroCredito($idaccount,$iduser,$movemet);
        if($success){
            $account = $this->getModel()->getAcountByIdAccountAndIdUser($idaccount,$iduser);
            $this->getResponse()->setData('account',$account);
        }
        return $this->getResponse()->responseJson();
    }
    public function deposito(){
        $iduser = $this->param('iduser');
        $idaccount = $this->param('idaccount');
        $movemet = $this->param('movement');
        $modelMovement = new MovementModel($this->getConfigApp());
        $success =  $modelMovement->deposito($idaccount,$iduser,$movemet);
        if($success){
            $account = $this->getModel()->getAcountByIdAccountAndIdUser($idaccount,$iduser);
            $this->getResponse()->setData('account',$account);
        }
        return $this->getResponse()->responseJson();
    }
    
}
