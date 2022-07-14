<?php
require "db.php";
if (isset($_POST['id_sens'])) {
	$_SESSION['id_sensor'] = $_POST['id_sens'];
}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/content.css">
</head>
<body>
	<div class="container-xl" style="margin-bottom: 50px;">
		<?php include ('nav.php');?>
		<nav class="nav_text" aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="index.php">Home</a></li>
				<li class="breadcrumb-item"> <?php if ($_SESSION['id_sensor'] == 'BME280' or $_SESSION['id_sensor'] == 'DS3231' or $_SESSION['id_sensor'] == 'DHT22' or $_SESSION['id_sensor'] == 'LCD2004' or $_SESSION['id_sensor'] == 'LCD_1602') {?>
					<a href="sensor.php">Sensor</a>
				<?php }else {?> <a href="arduino.php">Arduino</a><?php }?> </li>
				<li class="breadcrumb-item active" aria-current="page"><?php print($_SESSION['id_sensor']);?></li>
			</ol>
		</nav>
		<div class="content">
			<?php
			if ($_SESSION['id_sensor'] == 'BME280') {
			 	include ('products/BME280.php');
			}elseif ($_SESSION['id_sensor']  == 'DS3231') {
			 	include ('products/DS3231.php');
			}elseif ($_SESSION['id_sensor']  == 'DHT22') {
				include ('products/DHT22.php');
			}elseif ($_SESSION['id_sensor']  == 'LCD2004') {
				include ('products/LCD2004.php');
			}elseif ($_SESSION['id_sensor']  == 'LCD_1602') {
				include ('products/LCD_1602.php');
			}elseif ($_SESSION['id_sensor']  == 'Uno') {
			 	include ('products/Uno.php');
			}elseif ($_SESSION['id_sensor']  == 'Nano') {
				include ('products/Nano.php');
			}elseif ($_SESSION['id_sensor']  == 'Leonardo') {
				include ('products/Leonardo.php');
			}?>
		</div>
		<div class="coment">
			<form style="margin-top: 50px;" action="coment.php" name="coment" method="post">
				<div class="row">
					<div class="input-group mb-3">
						<div style="margin:auto 25px;">Оставить комментарий: </div>
						<input type="text" name="text_coment" style="width: 500px;" class="form-control" id="validationDefault03" required>
						<div class="input-group-append">
							<?php if (isset($_SESSION['logged_user'])):?>
								<button class="btn btn-outline-secondary" type="submit" name="do_coment" id="button-addon2">Отправить</button>
							<?php else:?>
								<button class="btn btn-outline-secondary" id="button-addon2" disabled>Отправить</button>
							<?php endif;?>
						</div>
					</div>
				</div>
			</form>
		</div>
		<div class="comment_print">
			<?php 
			$com_text = R::getAll("SELECT * FROM `comment`");
			foreach($com_text as $item){
				if ($item['id_url'] == $_SESSION['id_sensor']) {
					?>
					<div <?php if($item['name_user'] == 'Admin'){?>class="card text-white bg-dark mb-3"<?php }else{ ?>class="card bg-light mb-3"<?php } ?>  style="max-width: 72rem;">
						<div class="card-header">Пользователь: <?php print($item['name_user']);?></div>
						<div class="card-body"><p class="card-text">Комментарий : <?php print($item['comment']);?></p>
						</div>
					</div>
					<?php
				}
            }
            ?>
		</div>
	</div>
</body>
</html>