<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Solid\Core\Database\Classes;
use Solid\Core\Database\Abstracts\DaoAbstract;
/**
 * Description of Dao
 *
 * @author AdanC
 */
class Dao extends DaoAbstract{

    public function __construct(\Solid\App\Config\ConfigApp $configApp) {
        parent::__construct($configApp);
    }
}
