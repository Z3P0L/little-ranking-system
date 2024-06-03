<?php

class users_tasks extends tasks {
	public $id;
	public $task_id;
	public $user_id;

	public function Insert()
	{
		$sql = "INSERT INTO users_tasks (task_id, user_id) VALUES (?, ?)";
		$this->database->query($sql, array($this->task_id, $this->user_id));
	}
}