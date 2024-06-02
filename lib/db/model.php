<?php

class model
{

	protected $database;

	public function __construct()
	{
		$this->database = new database("ip_address", "user", "password", "name");
	}

	private function getTableName()
	{
		return get_class($this);
	}

	public function getAll()
	{
		$tableName = $this->getTableName();
		$sql = "SELECT * FROM " . $tableName;
		$result = $this->database->query($sql);
		return $result->fetch_all(MYSQLI_ASSOC);
	}

	public function getById($ID)
	{
		$tableName = $this->getTableName();
		$sql = "SELECT * FROM " . $tableName . " WHERE ID = ?";
		$result = $this->database->query($sql, array($ID));
		return $result->fetch_object();
	}

	public function deleteById($ID)
	{
		$tableName = $this->getTableName();
		$sql = "DELETE FROM " .  $tableName . " WHERE ID = ?";
		$this->database->query($sql, array($ID));
		return true;
	}
}
