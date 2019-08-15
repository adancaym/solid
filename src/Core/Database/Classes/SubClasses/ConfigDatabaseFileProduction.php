<?php
namespace Solid\Core\Database\Classes\SubClasses;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use Solid\Core\Database\Classes\ConfigDatabaseFile;
use Solid\App\Config\ConfigApp;
/**
 * Description of ConfigDatabaseFileProduction
 *
 * @author AdanC
 */
class ConfigDatabaseFileProduction extends ConfigDatabaseFile{

    public function __construct(ConfigApp $configApp) {
        parent::__construct($configApp);
    }
    
    public function getData() {
        return parent::getData()->production;
    }
    
    
    
}
