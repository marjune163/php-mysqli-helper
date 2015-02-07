<?php

require_once(dirname(__FILE__) . '/database.php');

abstract class DataHelper {
	protected $db;
	protected $table = '';

	function __construct($initTable) {
		$this->setTable($initTable);
		$this->db = new Database();
	}

	//filters
	public static function filterKeyword($str) {
		$str = str_replace("'", "\\'", $str);
		$str = str_replace('"', '\\"', $str);
		$str = str_replace('`', '\\`', $str);
		$str = str_replace(';', '', $str);
		$str = str_replace(' ', '', $str);
		$str = str_replace('[', '', $str);
		$str = str_replace('--', '', $str);
		$str = str_replace('/*', '', $str);
		$str = str_replace('#', '', $str);
		$str = str_replace('@', '', $str);
		$str = str_replace('?', '', $str);
		$str = str_replace('&', '', $str);
		$str = str_replace('=', '', $str);

		return $str;
	}

	public static function filterString($str) {
		$str = str_replace("'", "\\'", $str);
		$str = str_replace('"', '\\"', $str);
		$str = str_replace('`', '\\`', $str);

		return $str;
	}

	public static function filterInteger($str) {
		return intval($str);
	}

	public static function filterFloat($str) {
		return floatval($str);
	}

	public static function singleQuote($str) {
		return "'" . $str . "'";
	}

	public static function doubleQuote($str) {
		return '"' . $str . '"';
	}

	public static function backQuote($str) {
		return '`' . $str . '`';
	}


	//table
	public function setTable($initTable) {
		$this->table = self::filterKeyword($initTable);
	}


	//generate sql
	protected function generateSQL() {
		//not implemented in base class
	}

}