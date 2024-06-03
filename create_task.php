<?php
require_once 'lib/db/model.php';
require_once 'lib/db/database.php';
require 'lib/db/tasks.php';

$tasks = new tasks();
$valid = true;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$name = $_POST['name'];
	$points = $_POST['points'];

	if (empty($name) || empty($points)) $valid = false;

	if ($valid) {
		$tasks->name = $name;
		$tasks->points = $points;
		$tasks->Insert();
	}
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<?php include 'meta.php'; ?>
	<title>Create task</title>
</head>

<body>
	<?php include 'nav.php'; ?>

	<main>
		<form action="create_task.php" method="post">
			<div class="control">
				<label for="name">Name</label>
				<input type="text" name="name" id="name" placeholder="Ex. Study 10 minutes">
			</div>
			<div class="control">
				<label for="points">Points</label>
				<input type="number" name="points" id="points" min="0.1" step="0.1">
			</div>
			<button type="submit">Create task</button>
		</form>
	</main>
</body>

</html>