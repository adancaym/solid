<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Solid\Core\Database\Abstracts;
use Solid\App\Config\ConfigApp;
use Solid\Core\Database\Classes\Pdo;

/**
 * Description of DaoAbstract
 *
 * @author AdanC
 */
abstract class DaoAbstract {

	private $table;
	private $id;
	private $pdo;
	private $sql;

	public function __construct(ConfigApp $configApp) {
		$this->pdo = new Pdo($configApp);
	}
	public function select($fields = '*') {
		$this->concatSql("select $fields ");
		return $this;
	}
	public function from($table = '') {
		$tabla = $table == '' ? $this->getTable() : $table;
		$this->concatSql("from $tabla ");
		return $this;
	}
	public function join($table,$idTable){
        $tabla =  $this->getTable() ;
        $this->concatSql("inner join $table on $table.$idTable = $tabla.$idTable");
        return $this;
    }
	public function where($field, $value, $operator = '=') {
		$this->concatSql(" where $field $operator '$value'");
		return $this;
	}
    public function and($field, $value, $operator = '=') {
        $this->concatSql(" and $field $operator '$value'");
        return $this;
    }
	public function limit($limit) {
		$this->concatSql(" limit $limit");
		return $this;
	}
	public function order($field, $order) {
		$this->concatSql(" order by $field $order");
	}
	public function get($row = false) {

		return $row ? $this->getPdo()->execute($this->getSql())->row() : $this->getPdo()->execute($this->getSql())->rows();
	}
	protected function concatSql($string) {
		$this->setSql($this->getSql() . $string);
	}
	public function update($id, $params) {
		if (sizeof($params) > 0) {
			$table = $this->getTable();
			$this->concatSql("update $table set ");
			foreach ($params as $field => $value) {
				$this->concatSql(" $field = '$value',");
			}
			$this->setSql(substr($this->getSql(), 0, -1));
			$this->where($this->getId(), $id)->get(true);
            return $this->getPdo()->getResult() == false ? false: $params[$this->getId()];
		}
		else {
			return false;
		}
	}
	public function store($params) {
		$table = $this->getTable();
		$this->concatSql("insert into $table ");
		$params[$this->getId()] = null;
		foreach ($params as $column => $value) {
			$columns[] = $column;
			$values[] = $value == null ? 'null' : "'" . $value . "'";
		}
		$this->concatSql('(' . implode(',', $columns) . ") values (" . implode(',', $values) . ")");
		$this->get(true);
		return $this->getPdo()->lastInsertId();
	}

	public function getTable() {
		return $this->table;
	}

	public function getId() {
		return $this->id;
	}

	public function getPdo(): PdoAbstract {
		return $this->pdo;
	}

	public function setTable($table) {
		$this->table = $table;
		return $this;
	}

	public function setId($id) {
		$this->id = $id;
		return $this;
	}

	public function setPdo($pdo) {
		$this->pdo = $pdo;
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
