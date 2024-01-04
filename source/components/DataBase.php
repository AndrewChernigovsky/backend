<?php

class DataBase
{
	public $stmt;
	public $conn;
	public $nameRow;
	public $table;

	public function __construct($stmt, $conn, $table, $nameRow)
	{
		$this->conn = $conn;
		$this->stmt = $stmt;
		$this->table = $table;
		$this->nameRow = $nameRow;
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