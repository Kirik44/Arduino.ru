<nav class="navbar sticky-top navbar-expand-lg bg-primary text-white">
	<a class="navbar-brand" href="index.php">ArduinoPRO</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse " id="navbarSupportedContent">
		<ul class="navbar-nav mr-4">
			<li class="nav-item">
				<a class="nav-link active" href="index.php">Главная</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="arduino.php">Arduino</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="sensor.php">Сенсоры</a>
			</li>
			<li class="nav-item">
				<?php if (isset($_SESSION['logged_user'])):?>
				<a class="nav-link" href="logout.php">Выйти</a>
				<?php else :?>
				<a class="nav-link" href="login.php">Войти</a>
				<?php endif;?>
			</li>
		</ul>
	</div>
</nav>