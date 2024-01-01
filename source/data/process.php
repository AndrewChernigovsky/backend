<?php
if (isset($_POST['submit'])) {
	require_once('connect.php');
	$stmt = $conn->prepare("SELECT * FROM titles ORDER BY id DESC");
	$stmt->execute();
	$post = $stmt->fetch(PDO::FETCH_ASSOC);

	$title_id = $post['id'];
	$title = $_POST['title'];
	$newtitle = $_POST['newtitle'];


	$a = (string) $title_id;
	$checked = $_POST[$a];

	echo $title_id;
	echo $checked;
	echo $newtitle;

	if (!empty($title)) {
		$stmt = $conn->prepare("INSERT INTO titles(title) VALUE(:title)");
		$stmt->bindParam(':title', $title);
		$stmt->execute();
	}


	if (isset($newtitle) && $checked == 'on') {
		$stmt = $conn->prepare("DELETE FROM titles WHERE id=$a");
		$stmt->execute();
		echo '123123';

	}


	header('refresh: 1, url=./../dashboard.php');
} else {
	header('Location: dashboard.php?invalidRequest');
	exit();
}

?>