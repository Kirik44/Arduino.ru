<?php 
require "db.php";
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Arduino</title>
</head>
<body>
	<div class="container-xl">
		<?php include ('nav.php');?>
		<div class="content">
			<nav class="nav_text" aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="index.php">Home</a></li>
					<li class="breadcrumb-item active" aria-current="page">Arduino</li>
				</ol>
			</nav>
			<div class="row">
				<div class="col-12 col-sm-6 col-lg-4 col-xl-3 py-3">
					<div class="card card_s border-primary" style="width: 16rem;">
					  <img src="img/arduino/1.jpg" class="card-img-top img-thumbnail" alt="...">
					  <div class="card-body">
					    <h5 class="card-title">Arduino Uno</h5>
					    <p class="card-text"></p>
					    <form action="products.php" method="POST">
					    	<button type="submit" class="btn btn-primary" name="id_sens" value="Uno">Подробнее</button>
					    </form>
					  </div>
					</div>
				</div>
				<div class="col-12 col-sm-6 col-lg-4 col-xl-3 py-3">
					<div class="card card_s border-primary" style="width: 16rem;">
					  <img src="img/arduino/2.jpeg" class="card-img-top img-thumbnail" alt="...">
					  <div class="card-body">
					    <h5 class="card-title">Arduino Nano</h5>
					    <p class="card-text"></p>
					    <form action="products.php" method="POST">
					    	<button type="submit" class="btn btn-primary" name="id_sens" value="Nano">Подробнее</button>
					    </form>
					  </div>
					</div>
				</div>
				<div class="col-12 col-sm-6 col-lg-4 col-xl-3 py-3">
					<div class="card card_s border-primary" style="width: 16rem;">
					  <img src="img/arduino/3.jpg" class="card-img-top img-thumbnail" alt="...">
					  <div class="card-body">
					    <h5 class="card-title">Arduino Leonardo</h5>
					    <p class="card-text"></p>
					    <form action="products.php" method="POST">
					    	<button type="submit" class="btn btn-primary" name="id_sens" value="Leonardo">Подробнее</button>
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