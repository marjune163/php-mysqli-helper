<?php

require_once(dirname(__FILE__) . '/data-helper.php');

//only supports to insert 1 item
class DataInsertHelper extends DataHelper {
	private $fields = '';
	private $values = '';

	private function addField($field) {
		if ($this->fields) {
			$this->fields .= ',';
		}

		$this->fields .= $field;
	}

	private function addValue($value) {
		if ($this->values) {
			$this->values .= ',';
		}

		$this->values .= $value;
	}

	public function addString($field, $value) {
		$this->addField(self::filterKeyword($field));
		$this->addValue(
			self::singleQuote(self::filterString($value))
		);
	}

	public function addKeyword($field, $value) {
		$this->addField(self::filterKeyword($field));
		$this->addValue(self::filterKeyword($value));
	}

	public function addInteger($field, $value) {
		$this->addField(self::filterKeyword($field));
		$this->addValue(self::filterInteger($value));
	}

	public function addFloat($field, $value) {
		$this->addField(self::filterKeyword($field));
		$this->addValue(self::filterFloat($value));
	}

	public function addValues($arrValues) {
		if (!is_array($arrValues)) return;

		foreach ($arrValues as $field => $value) {
			if (is_string($value)) {
				$this->addString($field, $value);
			} elseif (is_float($value)) {
				$this->addFloat($field, $value);
			} elseif (is_integer($value)) {
				$this->addInteger($field, $value);
			} else {
				$this->addKeyword($field, $value);
			}
		}
	}

	protected function generateSQL() {
		$table =& $this->table;
		$fields =& $this->fields;
		$values =& $this->values;

		$sql = "INSERT INTO {$table}({$fields}) VALUES({$values});";
		return $sql;
	}

	public function execute() {
		$sql = $this->generateSQL();
		return $this->db->execute($sql);
	}
}