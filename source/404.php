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