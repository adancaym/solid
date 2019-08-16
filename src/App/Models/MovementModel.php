<?php


namespace Solid\App\Models;
use Solid\App\Config\ConfigApp;
use Solid\Core\Mvc\Model\Classes\Model;

class MovementModel extends Model
{
    public function __construct(ConfigApp $configApp)
    {
        parent::__construct($configApp);
        $this->setTable('movement')->setId('idmovement');
    }
    public function retiro($idaccount,$iduser,$movement){
        $sql = "
        call retiro($idaccount, $iduser, $movement , @valid);
        ";
        $this->getDao()->getPdo()->execute($sql);
        $this->getDao()->getPdo()->execute('select @valid');
        $result = $this->getDao()->getPdo()->get(true);

        return $result == 1;

    }
    public function retiroCredito($idaccount,$iduser,$movement){
        $sql = "
        call retiro_credito($idaccount, $iduser, $movement , @valid);
        ";
        $this->getDao()->getPdo()->execute($sql);
        $this->getDao()->getPdo()->execute('select @valid');
        $result = $this->getDao()->getPdo()->get(true);
        return $result == 1;
    }
    public function deposito($idaccount,$iduser,$movement){
        $sql = "
        call deposito($idaccount, $iduser, $movement , @valid);
        ";
        $this->getDao()->getPdo()->execute($sql);
        $this->getDao()->getPdo()->execute('select @valid');
        $result = $this->getDao()->getPdo()->get(true);
        return $result == 1;
    }

}