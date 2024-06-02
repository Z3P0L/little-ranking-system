<?php

class tasks extends model {
	public $id;
	public $name;
	public $points;
	public $user;

	public function Insert() {
		$sql = "INSERT INTO tasks (name, points, user) VALUES (?, ?, ?)";
		$this->database->query($sql, array($this->name, $this->points, $this->user));
	}
}