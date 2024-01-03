<?php
class CreateDeleteUpdate
{

	public $stmt;
	public $conn;

	public $post;

	public $id;
	public $value;
	public $nameRow;

	public $table;

	public function __construct($stmt, $conn, $table, $nameRow, $value, $post = NULL, $id = NULL)
	{
		$this->conn = $conn;
		$this->stmt = $stmt;
		$this->post = $post;
		$this->id = $id;
		$this->value = $value;
		$this->table = $table;
		$this->nameRow = $nameRow;
	}
	public function create()
	{

		$table = $this->table;
		$row = $this->nameRow;
		$bindRow = ':' . $this->nameRow;
		$value = $this->value;

		$this->stmt = $this->conn->prepare("INSERT INTO $table($row) VALUE($bindRow)");
		$this->stmt->bindParam($bindRow, $value);
		$this->stmt->execute();
	}
	public function delete()
	{

		$table = $this->table;
		$bindRow = ':' . $this->nameRow;
		$id = $this->id;

		$this->stmt = $this->conn->prepare("DELETE FROM $table WHERE id = $bindRow");
		$this->stmt->bindParam($bindRow, $id);
		$this->stmt->execute();
	}
}

?>