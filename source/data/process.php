<?php
if (isset($_POST['submit'])) {
	require_once('connect.php');
	$titles = $_POST['title'];
	if (isset($_POST['title']) && is_array($_POST['title'])) {
		$stmt = $conn->prepare("INSERT INTO titles(title) VALUES(:title)");

		foreach ($titles as $title) {

			$stmt->bindParam(':title', $title);
			$stmt->execute();
		}
	}


	header('refresh: 1, url=./../dashboard.php');
} else {
	header('Location: dashboard.php?invalidRequest');
	exit();
}

?>