<?php
require_once 'lib/db/model.php';
require_once 'lib/db/database.php';
require 'lib/db/users.php';

$users = new users();
$valid = true;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$name = $_POST['name'];

	if (empty($name)) $valid = false;

	if ($valid) {
		$users->name = $name;
		$users->Insert();
	}
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<?php include 'meta.php'; ?>
	<title>Create user</title>
</head>

<body>
	<?php include 'nav.php'; ?>

	<main>
		<form action="create_user.php" method="post">
			<div class="control">
				<label for="name">Name</label>
				<input type="text" name="name" id="name" placeholder="Ex. Pepita">
			</div>
			<button type="submit">Create user</button>
		</form>
	</main>
</body>

</html>