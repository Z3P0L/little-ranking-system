<?php

class users extends model {
	public $id;
	public $name;

	public function Insert() {
		$sql = "INSERT INTO users (name) VALUES (?)";
		$this->database->query($sql, array($this->name));
	}
}