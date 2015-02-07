<?php

require_once(dirname(__FILE__) . '/data-condition-helper.php');

class DataDeleteHelper extends DataConditionHelper {
	protected function generateSQL() {
		$table = &$this->table;
		$conditions =& $this->conditions;
		$sql = "DELETE FROM {$table}";

		if ($this->conditions) {
			$sql .= ' WHERE ' . $conditions;
		}

		$sql .= ';';
		return $sql;
	}

	public function execute() {
		$sql = $this->generateSQL();
		return $this->db->execute($sql);
	}
}