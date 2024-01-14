<?php
class CreateDeleteUpdate
{

	public $stmt;
	public $conn;
	public $id;
	public $value;
	public $nameRow;
	public $table;
	public $arrayRows;

	public function __construct($stmt, $conn, $table, $nameRow)
	{
		$this->conn = $conn;
		$this->stmt = $stmt;
		$this->table = $table;
		$this->nameRow = $nameRow;
	}
	public function setValues($id = null, $value = null, $array = null)
	{
		$this->id = $id;
		$this->value = $value;
		$this->arrayRows = $array;
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
	public function delete($all = null)
	{

		$table = $this->table;
		$bindRow = ':' . $this->nameRow;
		$id = $this->id;

		$this->stmt = $this->conn->prepare("DELETE FROM $table WHERE id = $bindRow");
		$this->stmt->bindParam($bindRow, $id, PDO::PARAM_INT);
		$this->stmt->execute();

		if ($all) {
			$this->stmt = $this->conn->prepare("DROP TABLE  $table");
			$this->stmt->execute();
		}
	}
	public function update()
	{

		$table = $this->table;
		$nameRow = $this->nameRow;
		$bindRow = ':' . $this->nameRow;
		$id = $this->id;
		$bindID = ':id';
		$arrayRows = $this->arrayRows;

		$this->stmt = $this->conn->prepare("UPDATE $table SET $nameRow = $bindRow WHERE id = $bindID");
		$this->stmt->bindParam($bindRow, $arrayRows, PDO::PARAM_STR);
		$this->stmt->bindParam($bindID, $id, PDO::PARAM_INT);

		if (!$this->stmt->execute()) {
			echo "Ошибка при обновлении записи с ID $id";
		}
	}
}

?>