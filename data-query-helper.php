<?php

require_once(dirname(__FILE__) . '/data-condition-helper.php');

class DataQueryHelper extends DataConditionHelper {
	private $fields = '';
	private $orders = '';


	//field
	public function addField($field) {
		if ($this->fields) {
			$this->fields .= ',';
		}

		$this->fields .= self::filterKeyword($field);
	}

	public function addAliasField($field, $alias) {
		if ($this->fields) {
			$this->fields .= ',';
		}

		$this->fields .= self::filterKeyword($field) . ' AS ' . $alias;
	}

	public function addFields($fields) {
		if (is_array($fields)) {
			foreach ($fields as $field) {
				$this->addField($field);
			}
		} else {
			$args = func_get_args();
			foreach ($args as $field) {
				$this->addField($field);
			}
		}
	}

	public function addAliasFields($assocFields) {
		if (is_array($assocFields)) {
			foreach ($assocFields as $alias => $field) {
				$this->addAliasField($field, $alias);
			}
		}
	}


	//condition methods extend
	public function addConditionInQuery($field, DataQueryHelper $subQuery) {
		$this->addCondition(
			self::filterKeyword($field) . ' IN (' . $subQuery->generateSQL() . ')'
		);
	}


	//order
	public function addOrderAsc($field) {
		if ($this->orders) {
			$this->orders .= ',';
		}

		$this->orders .= self::filterKeyword($field) . ' ASC';
	}

	public function addOrdersAsc($fields) {
		if (is_array($fields)) {
			foreach ($fields as $field) {
				$this->addOrderAsc($field);
			}
		}
	}

	public function addOrderDesc($field) {
		if ($this->orders) {
			$this->orders .= ',';
		}

		$this->orders .= self::filterKeyword($field) . ' DESC';
	}

	public function addOrdersDesc($fields) {
		if (is_array($fields)) {
			foreach ($fields as $field) {
				$this->addOrderDesc($field);
			}
		}
	}


	//generate
	protected function generateSQL() {
		$table = &$this->table;
		$fields = $this->fields ? $this->fields : '*';
		$conditions =& $this->conditions;
		$orders =& $this->orders;

		$sql = "SELECT {$fields} FROM {$table}";

		if ($this->conditions) {
			$sql .= ' WHERE ' . $conditions;
		}

		if ($this->orders) {
			$sql .= ' ORDER BY ' . $orders;
		}

		//$sql .= ';';  //not work for sub query embed sql
		return $sql;
	}


	//queries
	public function query() {
		$sql = $this->generateSQL();
		return $this->db->query($sql);
	}

	public function queryAssoc($keyField) {
		$sql = $this->generateSQL();
		return $this->db->queryAssoc($sql, $keyField);
	}

	public function queryEntry() {
		$sql = $this->generateSQL();
		return $this->db->queryEntry($sql);
	}

	public function queryValues() {
		$sql = $this->generateSQL();
		return $this->db->queryValues($sql);
	}

	public function queryValue() {
		$sql = $this->generateSQL();
		return $this->db->queryValue($sql);
	}
}