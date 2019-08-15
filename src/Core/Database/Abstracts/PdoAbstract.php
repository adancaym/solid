<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Solid\Core\Database\Abstracts;
use Solid\Core\Database\Abstracts\ConfigDatabaseFileAbstract;
use Solid\Core\Database\Classes\SubClasses\ConfigDatabaseFileProduction;
use Solid\App\Config\ConfigApp;
use Solid\Core\Database\Interfaces\PdoInterface;
/**
 * Description of PdoAbstract
 *
 * @author AdanC
 */
abstract class PdoAbstract implements PdoInterface{
    
    private $configFile;
    private $connection;
    private $query;
    private $result;
    private $sql;

    public function __construct(ConfigApp $configApp) {
        
        switch ($configApp->getEnviroment()){
            
            case 'production':
                $this->configFile = new ConfigDatabaseFileProduction($configApp);
                break;
        }
        
        $this->connect();
    }
    
    public function connect(){
        $this->connection = new \PDO($this->getConfigFile()->getDsn(), $this->getConfigFile()->getUser(), $this->getConfigFile()->getPassword());
    }
    
    public function execute($sql) {
        $this->setSql($sql);
        $this->setQuery($this->getConnection()->prepare($this->getSql()));
        $this->setResult($this->getQuery()->execute());
        return $this;
    }

    public function get($row = false) {
        
        if (!$this->getResult()){
            foreach ( $this->getQuery()->errorInfo() as $error) {
                echo $error.'<br>';
             };
            echo $this->sql;
            exit;
        }
        return $row ? $this->row():$this->rows();
    }

    public function rows() {
        return $this->getQuery()->fetchAll(\PDO::FETCH_CLASS);
    }

    public function row() {
        return $this->getQuery()->fetch(\PDO::FETCH_OBJ);
    }
    
       public function getConfigFile() {
        return $this->configFile;
    }

    public function setConfigFile($configFile) {
        $this->configFile = $configFile;
        return $this;
    }

    public function getConnection(): \PDO {
        return $this->connection;
    }

    public function getQuery(): \PDOStatement {
        return $this->query;
    }

    public function setConnection($connection) {
        $this->connection = $connection;
        return $this;
    }

    public function setQuery($query) {
        $this->query = $query;
        return $this;
    }
    public function getResult() {
        return $this->result;
    }

    public function setResult($result) {
        $this->result = $result;
        return $this;
    }
    public function getSql() {
        return $this->sql;
    }

    public function setSql($sql) {
        $this->sql = $sql;
        return $this;
    }



}
