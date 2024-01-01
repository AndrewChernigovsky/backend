<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin Panel</title>
	<link rel="stylesheet" href="css/blocks/dashboard.css">
</head>

<?php
require_once('data/connect.php');
// $title = $_POST['title'];
$stmt = $conn->prepare("SELECT * FROM titles ORDER BY id DESC");
$stmt->execute();

?>

<body>
	<div class="container">

		<form action="./data/process.php" method="POST">
			<?php
			require_once('components/Title.php');

			while ($post = $stmt->fetch(PDO::FETCH_ASSOC)) {
				$item = new Title($post['title'], $post['id'], false);
				$a = $item->getTitle();
				echo "<div class='title'>$a</div>";
			}
			?>
			<label>
				<input type="text" name="title">
				<span>Заголовок</span>
			</label>
			<input type="submit" name='submit'>Publish</input>
		</form>
	</div>

	<a href="index.php">Main Page</a>
	<script src="./js/dashboard.js" type="module"></script>
</body>

</html>