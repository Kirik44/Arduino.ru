<?php 
require "db.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Sensor</title>
</head>
<body>
	<div class="container-xl">
		<?php include ('nav.php');?>
		<div class="content">
			<nav class="nav_text" aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="index.php">Home</a></li>
					<li class="breadcrumb-item active" aria-current="page">Sensor</li>
				</ol>
			</nav>
			<div class="row">
				<div class="col-12 col-sm-6 col-lg-4 col-xl-3 py-3">
					<div class="card card_s border-primary" style="width: 16rem;">
					  <img src="img/sensor/1.jpg" class="card-img-top img-thumbnail" alt="...">
					  <div class="card-body">
					    <h5 class="card-title">BME280</h5>
					    <p class="card-text"></p>
					    <form action="products.php" method="POST">
					    	<button type="submit" class="btn btn-primary" name="id_sens" value="BME280">Подробнее</button>
					    </form>
					  </div>
					</div>
				</div>
				<div class="col-12 col-sm-6 col-lg-4 col-xl-3 py-3">
					<div class="card card_s border-primary" style="width: 16rem;">
					  <img src="img/sensor/2.jpg" class="card-img-top img-thumbnail" alt="...">
					  <div class="card-body">
					    <h5 class="card-title">DS3231</h5>
					    <p class="card-text"></p>
					    <form action="products.php" method="POST">
					    	<button type="submit" class="btn btn-primary" name="id_sens" value="DS3231">Подробнее</button>
					    </form>
					  </div>
					</div>
				</div>
				<div class="col-12 col-sm-6 col-lg-4 col-xl-3 py-3">
					<div class="card card_s border-primary" style="width: 16rem;">
					  <img src="img/sensor/3.jpg" class="card-img-top img-thumbnail" alt="...">
					  <div class="card-body">
					    <h5 class="card-title">DHT22</h5>
					    <p class="card-text"></p>
					    <form action="products.php" method="POST">
					    	<button type="submit" class="btn btn-primary" name="id_sens" value="DHT22">Подробнее</button>
					    </form>
					  </div>
					</div>
				</div>
			</div>
		</div>
		<div class="footer"></div>
	</div>
</body>
</html>