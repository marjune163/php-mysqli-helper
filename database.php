<?php

require_once(dirname(__FILE__) . '/../../config/database.php');
/*Please generate your database config file and change the include path above by yourself:
<?php
define('DB_HOST', 'localhost');
define('DB_PORT', '');
define('DB_USERNAME', 'db_user');
define('DB_PASSWORD', 'db_pass');
define('DB_NAME', 'db_name');
define('DB_CHARSET', 'utf8');*/


class Database {
	private $connection;

	function __construct() {
		if (!$this->connection) {
			$this->connection = new mysqli(
				DB_HOST ? DB_HOST : null,
				DB_USERNAME ? DB_USERNAME : null,
				DB_PASSWORD ? DB_PASSWORD : null,
				DB_NAME ? DB_NAME : null,
				DB_PORT ? DB_PORT : null
			);

			$this->connection->set_charset(DB_CHARSET ? DB_CHARSET : 'utf8');
		}
	}

	function __destruct() {
		if ($this->connection) {
			$this->connection->close();
		}
	}

	/*
	 * Execute sql without result
	 */
	public function execute($sql) {
		return $this->connection->query($sql);
	}

	/*
	 * Execute sql and returns result
	 * result is array of entries
	 * entry is associated array with $field => $value
	 */
	public function query($sql) {
		$result = $this->connection->query($sql);
		$arrResult = array();

		while ($entry = $result->fetch_assoc()) {
			array_push($arrResult, $entry);
		}

		return $arrResult;
	}

	/*
	 * Execute sql and returns result
	 * result is associated array with $keyField => $entry of entries
	 * entry is associated array with $field => $value
	 */
	public function queryAssoc($sql, $keyField) {
		$result = $this->connection->query($sql);
		$arrResult = array();

		while ($entry = $result->fetch_assoc()) {
			$arrResult[$entry[$keyField]] = $entry;
		}

		return $arrResult;
	}

	/*
	 * Execute sql and return an array of entry
	 */
	public function queryEntry($sql) {
		$result = $this->connection->query($sql);
		return $result->fetch_assoc();
	}

	/*
	 * Execute sql and returns array of all entrys' first value
	 */
	public function queryValues($sql) {
		$result = $this->connection->query($sql);
		$arrResult = array();

		while ($entry = $result->fetch_array()) {
			array_push($arrResult, $entry[0]);
		}

		return $arrResult;
	}

	/*
	 * Execute sql and returns the first value of the first entry
	 */
	public function queryValue($sql) {
		$result = $this->connection->query($sql);
		$entry = $result->fetch_array();
		return $entry[0];
	}
}