<?php
require_once('connect.php');
require_once('./../components/CreateDeleteUpdate.php');
require_once('./../components/DataBase.php');
$removeID = $_GET['id'];

if (isset($removeID)) {
	$titleRemove = new CreateDeleteUpdate($stmt, $conn, 'titles', 'title');
	$titleRemove->setValues($removeID, null, null);
	$titleRemove->delete();
	header("Location: ./../dashboard.php");
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {

	if (isset($_POST['submit'])) {
		$selectAllbyID = new DataBase($stmt, $conn, 'titles', null);
		$selectAll = new DataBase($stmt, $conn, 'titles', 'title');
		$post = $selectAllbyID->selectAllbyID();
		$oldtitles = $selectAll->selectAll();
		$title = $_POST['title'];
		$newtitles = $_POST['newtitles'];

		if (empty($title)) {

			if (is_array($newtitles)) {
				$totalCount = count($newtitles);

				for ($i = 0; $i < $totalCount; $i++) {
					if (isset($newtitles[$i]) && isset($oldtitles[$i]['title'])) {

						if ($newtitles[$i] !== $oldtitles[$i]['title']) {
							$titleUpdate = new CreateDeleteUpdate($stmt, $conn, 'titles', 'title');
							$titleUpdate->setValues($post[$i]['id'], null, $newtitles[$i]);
							$titleUpdate->update();
						}
					}
				}
			}
		}

		if (!empty($title)) {
			$titleNew = new CreateDeleteUpdate($stmt, $conn, 'titles', 'title');
			$titleNew->setValues(null, $title, null);
			$titleNew->create();
		}

		header('refresh: 3, url=./../dashboard.php');
		$conn = null;
	} else {
		header('Location: dashboard.php?invalidRequest');
		$conn = null;
		exit();
	}
}


?>