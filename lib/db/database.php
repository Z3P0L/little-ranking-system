<?php

class database
{

	private $connection;

	public function __construct($host, $user, $password, $database)
	{
		$this->connection = mysqli_connect($host, $user, $password, $database);

		if (!$this->connection) {
			exit("Couldn't connect to the database");
		}
	}

	public function query($sql, $params = array())
	{
		$stmt = $this->connection->prepare($sql);

		if (!$stmt) {
			exit($this->connection->error);
		}

		if (!empty($params)) {
			$types = '';
			foreach ($params as $param) {
				if (is_int($param)) {
					$types .= 'i';
				} else if (is_float($param) == true || is_numeric($param) == true) {
					$types .= 'd';
				} else {
					$types .= 's';
				}
			}
			$stmt->bind_param($types, ...$params);
		}

		$stmt->execute();

		$result = $stmt->get_result();
		return $result;
	}
}
