<?php
namespace Solid\App\ApiRest;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use Solid\App\Config\ConfigApp;
use Solid\Core\Mvc\Controller\Classes\ApiRestController;
use Solid\App\Models\UserModel;
use Solid\Core\Util\Request\Abstracts\RequestAbstract;
use Solid\Core\Util\Response\Abstracts\ResponseAbstract;

/**
 * Description of UserApiRest
 *
 * @author AdanC
 */
class UserApiRest extends ApiRestController{

    public function __construct(RequestAbstract $request, ResponseAbstract $response, ConfigApp $configApp) {
        parent::__construct($request, $response, $configApp);
        $this->setModel(new UserModel($configApp));
    }

    public function getUserByAccount(){
        $account = $this->getRequest()->param('account');
        $user = $this->getModel()->getUserbyCuenta($account);
        return $this->getResponse()->setData('user',$user)->responseJson();
    }

    public function vars(){
        var_dump($this->param());
    }
    public function auth(){
        $iduser = $this->param('iduser');
        $params['iduser'] = $iduser;
        $params['user'] = $this->param('user');
        $params['login'] = $this->param('login') == 'true';
        $params['password'] = $this->param('password');
        $response = $this->getModel()->update($iduser,$params);
        $response = $response!=false ? true:false;
        $this->getRequest()->setSessionVar('isLogged',$response);
        $this->getResponse()->setData('isLogged',$response);

        return $this->getResponse()->responseJson();
    }

    public function logout(){
        $this->getRequest()->setSessionVar('isLogged',false);
        $this->getResponse()->setData('isLogged',false);
        return $this->getResponse()->responseJson();
    }

    public function isLogged(){
        $isLogged = $this->getRequest()->getSessionVar('isLogged') ?? false;
        $this->getResponse()->setData('isLogged', $isLogged);
        return $this->getResponse()->responseJson();
    }

}