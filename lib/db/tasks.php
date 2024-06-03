<?php

class tasks extends model {
	public $id;
	public $name;
	public $points;

	public function Insert() {
		$sql = "INSERT INTO tasks (name, points) VALUES (?, ?)";
		$this->database->query($sql, array($this->name, $this->points));
	}
}