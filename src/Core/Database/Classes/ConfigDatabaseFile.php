<?php
namespace Solid\Core\Database\Classes;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use Solid\Core\Database\Abstracts\ConfigDatabaseFileAbstract;
use Solid\Core\Database\Interfaces\ConfigDatabaseFileInterface;
use Solid\App\Config\ConfigApp;
/**
 * Description of ConfigDatabaseFile
 *
 * @author AdanC
 */
class ConfigDatabaseFile extends ConfigDatabaseFileAbstract implements ConfigDatabaseFileInterface{

    public function __construct(ConfigApp $configApp) {
        parent::__construct($configApp);
    }
    
    public function getData() {
        return parent::getData();
    }
    
}
