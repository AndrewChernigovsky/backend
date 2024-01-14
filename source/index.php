<?php
include 'head.php';
// include 'header.php';
?>
<?php
require_once('data/connect.php');
if ($conn != null) {
	$stmt = $conn->prepare("SELECT * FROM titles ORDER BY id DESC");
	$stmt->execute();
}

?>

<body>
	<div class="container">
		<?php
		// require_once('components/Title.php');
		require_once('components/MenuComponent.php');
		$menu = new MenuComponent;
		$menu->setSTMT($stmt);
		echo $menu->menu();
		?>
	</div>
	<!-- <script src="./js/dashboard.js" type="module"></script> -->
</body>

</html>