<?php

require_once(dirname(__FILE__) . '/data-condition-helper.php');

class DataUpdateHelper extends DataConditionHelper {
	private $updates = '';

	private function setValue($field, $value) {
		if ($this->updates) {
			$this->updates .= ',';
		}

		$this->updates .= $field . '=' . $value;
	}

	public function setString($field, $value) {
		$this->setValue(
			self::filterKeyword($field),
			self::singleQuote(self::filterString($value))
		);
	}

	public function setKeyword($field, $value) {
		$this->setValue(
			self::filterKeyword($field),
			self::filterKeyword($value)
		);
	}

	public function setInteger($field, $value) {
		$this->setValue(
			self::filterKeyword($field),
			self::filterInteger($value)
		);
	}

	public function setFloat($field, $value) {
		$this->setValue(
			self::filterKeyword($field),
			self::filterFloat($value)
		);
	}

	public function setValues($arrValues) {
		if (!is_array($arrValues)) return;

		foreach ($arrValues as $field => $value) {
			if (is_string($value)) {
				$this->setString($field, $value);
			} elseif (is_float($value)) {
				$this->setFloat($field, $value);
			} elseif (is_integer($value)) {
				$this->setInteger($field, $value);
			} else {
				$this->setKeyword($field, $value);
			}
		}
	}

	protected function generateSQL() {
		$table = &$this->table;
		$conditions =& $this->conditions;
		$updates =& $this->updates;

		$sql = "UPDATE {$table} SET {$updates}";

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