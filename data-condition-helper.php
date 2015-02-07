<?php

require_once(dirname(__FILE__) . '/data-helper.php');

abstract class DataConditionHelper extends DataHelper {
	protected $conditions = '';


	//condition
	protected function addCondition($condition) {
		if ($this->conditions) {
			$this->conditions .= ' AND ';
		}

		$this->conditions .= $condition;
	}

	public function addConditionGreaterThan($field, $value) {
		$this->addCondition(
			self::filterKeyword($field) . ' > ' . self::filterKeyword($value)
		);
	}

	public function addConditionGreaterThanEqual($field, $value) {
		$this->addCondition(
			self::filterKeyword($field) . ' >= ' . self::filterKeyword($value)
		);
	}

	public function addConditionLessThan($field, $value) {
		$this->addCondition(
			self::filterKeyword($field) . ' < ' . self::filterKeyword($value)
		);
	}

	public function addConditionLessThanEqual($field, $value) {
		$this->addCondition(
			self::filterKeyword($field) . ' <= ' . self::filterKeyword($value)
		);
	}

	public function addConditionEqual($field, $value) {
		$this->addCondition(
			self::filterKeyword($field) . ' = ' . self::filterKeyword($value)
		);
	}

	public function addConditionEqualString($field, $value) {
		$this->addCondition(
			self::filterKeyword($field) . ' = ' . self::singleQuote(self::filterString($value))
		);
	}

	public function addConditionContains($field, $value) {
		$this->addCondition(
			self::filterKeyword($field) . ' LIKE ' . self::singleQuote("%" . self::filterString($value) . "%")
		);
	}

	public function addConditionStartsWith($field, $value) {
		$this->addCondition(
			self::filterKeyword($field) . ' LIKE ' . self::singleQuote(self::filterString($value) . "%")
		);
	}

	public function addConditionEndsWith($field, $value) {
		$this->addCondition(
			self::filterKeyword($field) . ' LIKE ' . self::singleQuote("%" . self::filterString($value))
		);
	}

	public function addConditionInKeywords($field, $values) {
		$strValue = '';
		if (is_array($values)) {
			foreach ($values as $value) {
				if ($strValue) {
					$strValue .= ',';
				}
				$strValue .= self::filterKeyword($value);
			}
		} else {
			$strValue .= self::filterKeyword($values);
		}

		$this->addCondition(
			self::filterKeyword($field) . ' IN (' . $strValue . ')'
		);
	}

	public function addConditionInStrings($field, $values) {
		$strValue = '';
		if (is_array($values)) {
			foreach ($values as $value) {
				if ($strValue) {
					$strValue .= ',';
				}
				$strValue .= self::singleQuote(self::filterString($value));
			}
		} else {
			$strValue .= self::singleQuote(self::filterString($values));
		}

		$this->addCondition(
			self::filterKeyword($field) . ' IN (' . $strValue . ')'
		);
	}
}