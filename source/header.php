<?php
require_once('data/connect.php');
$stmt = $conn->prepare("SELECT * FROM titles ORDER BY id DESC");
$stmt->execute();
$conn = null;
?>

<body>
	<noscript>
		<div
			style='min-width: 100%; min-height: 100%; background-color: white; position: fixed; z-index: 100; display: flex; align-items: center; justify-content: center; flex-direction: column'>
			<h1 style='color: black; font-size: 60px'>Включите пожалуйста Javascript</h1>
			<p style='color: black; font-size: 40px'>Ваш браузер устарел, установите последнию версию</p><a
				href='https://www.google.com/intl/ru/chrome/update/'><span
					style='display: block; width: 160px; height: 160px; background-position: 0px -320px; background-image: url('
					https://sun9-64.userapi.com/z-b3Lt-FUb8UfMl209s1EB_0Colx6SjgM8ss9g/NTQrhHbDN2g.png')'></span><span
					style='color: black; font-size: 40px'>Chrome</span></a>
		</div>
	</noscript>
	<header class='header'>
		<div class='container'>
			<div class='logoWrapper'><a class='logo link'>
					<svg viewBox='0 0 50 50' width='80' height='80' fill='white'>
						<use xlink:href='img/sprite.svg#logo'></use>
					</svg>
					<div class='logo-text'>
						<p>БытРемонт</p>
						<p>Ремонт</p>
						<p>Бытовой Техники</p>
					</div>
				</a></div>
			<input class='menu-toggle' id='nav-toggle' type='checkbox'>
			<label class='button-toggle' for='nav-toggle'><span class='icon'></span></label>
			<div class='background'></div>
			<nav class='navigation'>
				<div class='navigation__wrapper'>
					<ul class='navigation__list'>

						<?php
						require_once('components/Title.php');

						while ($post = $stmt->fetch(PDO::FETCH_ASSOC)) {
							$item = new Title($post['title'], $post['id'], true);
							$a = $item->getTitle();
							echo "<li class='navigation__list-item'>$a</li>";
						}
						?>
				</div>

				<!-- <li class='navigation__list-item'><a class='navigation__list-link base-text link' href='#aboutUs'>О
						нас</a></li>
				<li class='navigation__list-item'><a class='navigation__list-link base-text link'
						href='#service'>Услуги</a></li>
				<li class='navigation__list-item'><a class='navigation__list-link base-text link'
						href='#stepsWorking'>Этапы работы</a>
				</li>
				<li class='navigation__list-item'><a class='navigation__list-link base-text link'
						href='#contacts'>Контакты</a></li> -->
				<li class='navigation__list-item'>
					<div class='infoWrapper'>
						<p>Прием заявок с 9.00 до 21.00</p><a class='link' href='tel:+79260000000'>+7 (926)
							000-00-00</a>
					</div>
				</li>
				</ul>
		</div>
		</nav>
		</div>
	</header>