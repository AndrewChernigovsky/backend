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
		<div class="wrapper">
			<!-- ./data/process.php -->
			<form action="./data/process.php" method="POST" class="form">
				<div class="titles">
					<?php
					require_once('components/Title.php');

					while ($post = $stmt->fetch(PDO::FETCH_ASSOC)) {
						$item = new Title($post['title'], $post['id'], false);
						echo $post['id'];
						$a = $item->getTitle();
						echo "<div class='title'>$a</div>";
					}
					?>
				</div>
				<hr>
				<label class="form__label">
					<span>Добавить Заголовок</span>
					<input type="text" name="title">
				</label>
				<input type="submit" name='submit' class='form__submit'>
			</form>
			<a href="index.php" class="link">Main Page</a>
		</div>

	</div>


	<script src="./js/dashboard.js" type="module"></script>
</body>

</html>