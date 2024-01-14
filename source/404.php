<?php header("Refresh: 3; url=./dashboard.php") ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Status 404 | источник не найден</title>
</head>

<body>
	<h2>Данный источник по этому адресу не найден, вы будете переадресованы на главную страницу через
		<span>3</span>
	</h2>
	<script>
		let span = document.querySelector('span');
		let seconds = 3;

		function countdown(seconds) {
			if (seconds >= 0) {
				setTimeout(function () {
					countdown(seconds - 1);
					span.textContent = seconds;
				}, 1000);
			}
		}
		countdown(3);
	</script>
</body>

</html>

// $id = ['12', '23', '34'];
// $tag3 = new Tag('p', ['class' => 'text yellow red', 'id' => 'Text'], 'Ghbdtn');
// $tags = [];
// foreach ($id as $i) {
// $tag = new Tag('a', ['class' => 'highlight yellow red', 'id' => 'yellow', 'href' => $i], $tag3->getHTML());
// $newtag = $tag->getHTML();
// array_push($tags, $newtag);
// }

// $tag2 = new Tag('span', ['class' => 'highlight yellow red', 'id' => 'yellow'], '');
// $tag2->addTags($tags);
// echo $tag2->getHTML();


// public function __construct($newTag, $newAttributes = [], $newContent = '')
// {
// $this->newTag = $newTag;
// $this->newAttributes = $newAttributes;
// $this->newContent = $newContent;
// }