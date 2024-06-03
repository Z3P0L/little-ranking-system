<?php
require_once 'lib/db/model.php';
require_once 'lib/db/database.php';
require 'lib/db/users_tasks.php';

$users_tasks = new users_tasks();
$valid = true;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$user_id = $_POST['user_id'];
	$task_id = $_POST['task_id'];

	if (empty($user_id) || empty($task_id)) $valid = false;

	if ($valid) {
		$users_tasks->user_id = $user_id;
		$users_tasks->task_id = $task_id;
		$users_tasks->Insert();
	}
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<?php include 'meta.php'; ?>
	<title>Check tasks</title>
</head>

<body>
	<?php include 'nav.php'; ?>

	<main>
		<form action="check_tasks.php" method="post">
			<div class="control">
				<label for="user_id">User ID</label>
				<input type="text" name="user_id" id="user_id">
			</div>
			<div class="control">
				<label for="task_id">Task ID</label>
				<input type="number" name="task_id" id="task_id">
			</div>
			<button type="submit">Check tasks</button>
		</form>
	</main>
</body>

</html>