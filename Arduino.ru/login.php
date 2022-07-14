<?php
require "db.php";
$data = $_POST;
if (isset($data['do_login'])) {
	$errors = array();
	$user = R::findOne('users', 'login = ?', array($data['login']));
	if ( $user ) {
		if (password_verify($data['password'], $user->password)) {
			$_SESSION['logged_user'] = $user;
			echo '<div class="alert alert-success" role="alert">Вы успешгно авторизировались на нашем сайте, можете перейти на <a href="index.php">главную страницу.</a></div>';
		}else {
			$errors[] = 'Неверный пароль!';
		}
	}else {
		$errors[] = 'Пользователь не найден!';
	}
	if (! empty($errors)) {
		echo '<div class="alert alert-danger" role="alert"><strong>Ошибка! </strong>'.array_shift($errors).'</div>';	
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Вход</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div class="container-xl">
		<?php include ('nav.php');?>
		<div style="margin-top: 20px;">
			<form action="login.php" method="POST">
				<div class="form-group">
					<label for="exampleInputEmail1">Логин</label>
					<input type="text" class="form-control" name="login" value="<?php echo @$data['login'] ?>">
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">Пароль</label>
					<input type="password" class="form-control" name="password" id="exampleInputPassword1">
				</div>
				<button type="submit" class="btn btn-primary" name="do_login">Войти</button>
			</form>
		</div>
		<p>Ещё не зарегестрированны? <a href="signup.php" style="margin-left: 10px;"><button type="button" class="btn btn-primary btn-sm">Регистрация</button></a></p><br>
	</div>
</body>
</html>