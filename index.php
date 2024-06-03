<?php
require_once 'lib/db/model.php';
require_once 'lib/db/database.php';
require 'lib/db/tasks.php';
require 'lib/db/users.php';

$users = new users();
$tasks = new tasks();

$usersData = $users->getUsersData();

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<?php include 'meta.php'; ?>
	<title>Ranking</title>
</head>

<body>

	<?php include 'nav.php'; ?>

	<main>
		<table>
			<thead>
				<th>ID</th>
				<th>Nombre</th>
				<th>Puntos</th>
			</thead>
			<tbody>
				<?php $users->renderRanking($usersData); ?>
			</tbody>
		</table>
	</main>
</body>

</html>