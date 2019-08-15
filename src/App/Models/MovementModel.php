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
        $conn = $this->getDao()->getPdo()->getConnection();
        $sql = "
        set @valid = 0;
        call retiro($idaccount, $iduser, $movement, @valid);
        select @valid;
        ";
        return $conn->prepare($sql)->execute()->fetch(\PDO::FETCH_OBJ);
    }

}