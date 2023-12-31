<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Main</title>
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
		<?php
		require_once('components/Title.php');

		while ($post = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$item = new Title($post['title'], $post['id'], true);
			$a = $item->getTitle();
			echo "<div class='title'>$a</div>";
		}
		?>
	</div>
	<script src="./js/dashboard.js" type="module"></script>
</body>

</html>