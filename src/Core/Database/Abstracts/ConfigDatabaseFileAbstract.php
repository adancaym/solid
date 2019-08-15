<?php
namespace Solid\Core\Database\Abstracts;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use Solid\Core\Util\Directory\Classes\Directory;
use Solid\Core\Util\File\Classes\SubClasses\FileJson;
use Solid\App\Config\ConfigApp;
/**
 * Description of ConfigDatabaseFileAbstract
 *
 * @author AdanC
 */
abstract class ConfigDatabaseFileAbstract {

    private $file;
    
    public function __construct(ConfigApp $configApp) {
        $directory = new Directory($configApp->getPathDatabaseConnections());
        $this->file = new FileJson($directory, $configApp->getNameFileDatabaseConections());
    }
    
    public function getData(){
        return $this->file->getData();
    }
    
    public function getDsn(){
        $data = $this->getData();
        return $data->sgbd.":host=".$data->host.';port='.$data->port.';dbname='.$data->dbname;
    }
    public function getUser(){
        return $this->getData()->user;
    }
    public function getPassword(){
        return $this->getData()->password;
    }
    
}
