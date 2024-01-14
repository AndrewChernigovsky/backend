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
require_once('components/DataBase.php');

$db = new DataBase(null, $conn);
$stmt = $db->createTable('titles', ['id int', 'title VARCHAR(255) NOT NULL', 'href VARCHAR(255) NOT NULL']);

?>

<body>
	<div class="container">
		<div class="wrapper">
			<form action="./data/process.php" method="POST" class="form">
				<div class="titles">
					<?php
					require_once('components/Title.php');


					try {
						if ($stmt != false && $stmt != true) {

							while ($post = $stmt->fetch(PDO::FETCH_ASSOC)) {
								$item = new Title($post['title'], $post['id'], false);
								echo $post['id'];
								$a = $item->getTitle();
								echo "<div class='title'>$a</div>";
							}
						} else {
							echo "Необходимые данные были запрошены, но их не существует, создать?";
						}
					} catch (PDOException $e) {
						echo "Ошибка при выполнении запроса: " . $e->getMessage();
					}

					?>
				</div>
				<hr>
				<div style="display: flex; gap: 20px;">
					<label class="form__label">
						<span>Добавить Заголовок</span>
						<input type="text" name="title">
					</label>
					<label class="form__label">
						<span>Добавить ссылку</span>
						<input type="text" name="href">
					</label>
				</div>
				<input type="submit" name='submit' class='form__submit'>
				<a href="./data/process.php?remove=titles'">Удалить все меню</a>
			</form>
			<a href="index.php" class="link">Main Page</a>
		</div>

	</div>


	<script src="./js/dashboard.js" type="module"></script>
</body>

</html>