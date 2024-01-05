<?php
include 'head.php';
include 'header.php';
?>
<?php
require_once('data/connect.php');
$stmt = $conn->prepare("SELECT * FROM titles ORDER BY id DESC");
$stmt->execute();
$conn = null;
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