<?php


namespace Solid\App\Models;


use Solid\App\Config\ConfigApp;
use Solid\Core\Mvc\Model\Classes\Model;

class AccountModel extends Model
{
    public function __construct(ConfigApp $configApp) {
        parent::__construct($configApp);
        $this->setId('idaccount')->setTable('account');
    }
    public function getAcountByAccountAndIdUser($account,$iduser){
        return $this->getDao()->
        select('account.*,((sum_arit_by_idaccount(account.idaccount)+account.limit_money)/1.1) as monto_credito,abs(sum_arit_by_idaccount(account.idaccount)) monto,account_type.account_type')->
        from()->
        join('account_type','idaccount_type')->
        where('account',$account)->and('iduser',$iduser)->get(true);

    }
    

}