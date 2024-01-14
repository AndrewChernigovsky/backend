<?php

require_once 'CreateDeleteUpdate.php';
class DataBase
{
	public $stmt;
	public $conn;
	public $nameRow;
	public $table;

	public function __construct($stmt = null, $conn, $table = null, $nameRow = null)
	{
		$this->conn = $conn;
		$this->stmt = $stmt;
		$this->table = $table;
		$this->nameRow = $nameRow;
	}

	public function createTable($tableName, $params)
	{
		$columns = implode(', ', $params);
		$this->stmt = $this->conn->prepare("CREATE TABLE IF NOT EXISTS " . $tableName . '(' . $columns . ");");
		return $this->stmt->execute();
	}

	public function selectAllbyID()
	{
		$this->stmt = $this->conn->prepare("SELECT * FROM $this->table ORDER BY id DESC");
		$this->stmt->execute();
		$post = $this->stmt->fetchAll(PDO::FETCH_ASSOC);
		return $post;
	}

	public function selectAll()
	{
		$this->stmt = $this->conn->prepare("SELECT $this->nameRow FROM $this->table");
		$this->stmt->execute();
		$post = $this->stmt->fetchAll(PDO::FETCH_ASSOC);
		return $post;
	}
}

?>