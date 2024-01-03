<?php
require_once('connect.php');
require_once('./../components/CreateDeleteUpdate.php');
$removeID = $_GET['id'];

if (isset($removeID)) {

	// $stmt2 = $conn->prepare("DELETE FROM titles WHERE id = :title_id");
	// $stmt2->bindParam(':title_id', $removeID, PDO::PARAM_INT);
	// $stmt2->execute();
	$titleNew = new CreateDeleteUpdate($stmt, $conn, $table = 'titles', $nameRow = 'title', $id = $removeID);
	$titleNew->delete();
	header("Location: ./../dashboard.php");
}

if (isset($_POST['submit'])) {
	$stmt = $conn->prepare("SELECT * FROM titles ORDER BY id DESC");
	$stmt->execute();
	$post = $stmt->fetchAll(PDO::FETCH_ASSOC);

	$stmt1 = $conn->prepare("SELECT title FROM titles");
	$stmt1->execute();
	$post1 = $stmt1->fetchAll(PDO::FETCH_ASSOC);

	$oldtitles = $post1;
	$title_id = $post['id'];
	$title = $_POST['title'];

	$newtitles = $_POST['newtitles'];

	if (empty($title)) {


		if (is_array($newtitles)) {
			$totalCount = count($newtitles);

			for ($i = 0; $i < $totalCount; $i++) {
				if (isset($newtitles[$i]) && isset($oldtitles[$i]['title'])) {

					if ($newtitles[$i] !== $oldtitles[$i]['title']) {
						$title_id = $post[$i]['id'];
						$stmt = $conn->prepare("UPDATE titles SET title = :title WHERE id = :title_id");
						$stmt->bindParam(':title', $newtitles[$i], PDO::PARAM_STR);
						$stmt->bindParam(':title_id', $title_id, PDO::PARAM_INT);
						if (!$stmt->execute()) {
							echo "Ошибка при обновлении записи с ID $title_id";
						}
					}
				}
			}
		}
	}

	if (!empty($title)) {
		$titleNew = new CreateDeleteUpdate($stmt, $conn, $table = 'titles', $nameRow = 'title', $value = $title);
		$titleNew->create();
	}

	header('refresh: 3, url=./../dashboard.php');
	$conn = null;
} else {
	header('Location: dashboard.php?invalidRequest');
	$conn = null;
	exit();
}

?>