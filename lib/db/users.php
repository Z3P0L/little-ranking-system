<?php

class users extends model
{
	public $id;
	public $name;

	public function Insert()
	{
		$sql = "INSERT INTO users (name) VALUES (?)";
		$this->database->query($sql, array($this->name));
	}

	public function getUsersData()
	{
		$sql = "SELECT users.id, users.name, COALESCE(SUM(tasks.points), 0) AS total_points FROM users LEFT JOIN users_tasks ON users.id = users_tasks.user_id LEFT JOIN tasks ON users_tasks.task_id = tasks.id GROUP BY users.id ORDER BY total_points DESC";

		$result = $this->database->query($sql);

		return $result->fetch_all(MYSQLI_ASSOC);
	}

	public function renderRanking($usersData)
	{
		if (empty($usersData)) {
			return;
		}

		foreach ($usersData as $user) {
			echo "<tr>";
            echo "<td>{$user['id']}</td>";
            echo "<td>{$user['name']}</td>";
            echo "<td>{$user['total_points']}</td>";
            echo "</tr>";
		}
	}
}
