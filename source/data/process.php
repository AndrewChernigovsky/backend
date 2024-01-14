<?php
require_once('connect.php');
require_once('./../components/CreateDeleteUpdate.php');
require_once('./../components/DataBase.php');
$removeID = $_GET['id'];
$remove_TABLE = $_GET['remove'];

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
		$href = $_POST['href'];
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

		if (!empty($title) && !empty($href)) {
			$titleNew = new CreateDeleteUpdate($stmt, $conn, 'titles', 'title');
			$titleNewHref = new CreateDeleteUpdate($stmt, $conn, 'titles', 'href');
			$titleNew->setValues(null, $title, null);
			$titleNew->create();
			$titleNewHref->setValues(null, $href, null);
			$titleNewHref->create();
		}
		// header("Location: ./../dashboard.php");
		// header('refresh: 3, url=./../dashboard.php');
		$conn = null;
	} else {
		header('Location: 404.php');
		$conn = null;
		exit();
	}
}
echo isset($remove_TABLE);
if (isset($remove_TABLE)) {
	$titleNew = new CreateDeleteUpdate($stmt, $conn, 'titles', 'title');
	$titleNew->delete(true);
	// header("Location: ./../dashboard.php");
}

?>