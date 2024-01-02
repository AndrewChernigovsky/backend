<?php
if (isset($_POST['submit'])) {
	require_once('connect.php');
	$stmt = $conn->prepare("SELECT * FROM titles ORDER BY id DESC");
	$stmt->execute();
	$post = $stmt->fetchAll(PDO::FETCH_ASSOC);

	$title_id = $post['id'];
	$title = $_POST['title'];
	$newtitles = $_POST['newtitle'];
	$remove = $_POST['remove'];

	if (is_array($newtitles)) {

		for ($i = 0; $i < count($newtitles); $i++) {
			if (isset($newtitles[$i])) {
				$title_id = $post[$i]['id'];
				$stmt = $conn->prepare("UPDATE titles SET title = :title WHERE id = :title_id");
				$stmt->bindParam(':title', $newtitles[$i], PDO::PARAM_INT);
				$stmt->bindParam(':title_id', $title_id, PDO::PARAM_INT);
				$stmt->execute();
				echo $title_id;
			}
		}
	}

	if (is_array($newtitles)) {

		for ($i = 0; $i < count($newtitles); $i++) {

			if (isset($newtitles[$i]) && $remove[$i] == 'on') {
				$title_id = $post[$i]['id'];
				$stmt = $conn->prepare("DELETE FROM titles WHERE id=:title_id");
				$stmt->bindParam(':title_id', $title_id, PDO::PARAM_INT);
				$stmt->execute();
			}

		}
	}

	if (!empty($title)) {
		$stmt = $conn->prepare("INSERT INTO titles(title) VALUE(:title)");
		$stmt->bindParam(':title', $title);
		$stmt->execute();
	}





	header('refresh: 3, url=./../dashboard.php');
} else {
	header('Location: dashboard.php?invalidRequest');
	exit();
}

?>