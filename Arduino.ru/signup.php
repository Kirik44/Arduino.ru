<?php 
require "db.php";
$data = $_POST;
if (isset($data['do_signup'])) {
    $errors = array();
    if (trim($data['login'] == '')) {
        $errors[] = 'Введите свой логин';
    }elseif (strlen($data['login']) > 16 or strlen($data['login']) < 6) {
        $errors[] = 'Логин должен соддержать от 6 до 16 символов';
    }elseif (trim($data['email'] == '')) {
        $errors[] = 'Введите свой email';
    }elseif ($data['password'] == '') {
        $errors[] = 'Введите свой пароль';
    }elseif ($data['password_2'] != $data['password']) {
        $errors[] = 'Повторный пароль введён неверно';
    }elseif (R::count('users',"email = ?", array($data['email'])) > 0) {
        $errors[] = 'Пользователь с таким email уже существует';
    }elseif (R::count('users',"login = ?", array($data['login'])) > 0) {
        $errors[] = 'Пользователь с таким логином уже существует';
    }
    if (empty($errors)) {
        $user = R::dispense('users');
        $user->login = $data['login'];
        $user->email = $data['email'];
        $user->password = password_hash($data['password'], PASSWORD_DEFAULT);
        $_SESSION['logged_user'] = $user;
        R::store($user);
        echo '<div class="alert alert-success" role="alert">Вы успешгно зарегестрировались на нашем сайте, можете перейти на <a href="index.php">главную страницу.</a></div>';
    }else {
        echo '<div class="alert alert-danger" role="alert"><strong>Ошибка! </strong>'.array_shift($errors).'</div>';
    }
}?>

<!DOCTYPE html>
<html>
<head>
	<title>Регистрация</title>
</head>
<body>
	<div class="container-xl">
		<?php include ('nav.php');?>
		<form style="margin-top: 20px;" action="signup.php" method="POST">
			<div class="form-group">
				<label for="formGroupExampleInput">Ваш логин</label>
				<input type="text" class="form-control" name="login" value="<?php echo @$data['login'] ?>" id="formGroupExampleInput">
			</div>
			<div class="form-group">
				<label for="formGroupExampleInput">Ваш email</label>
				<input type="email" class="form-control" name="email" value="<?php echo @$data['email'] ?>">
			</div>
			<div class="form-group">
				<label for="formGroupExampleInput">Пароль</label>
				<input type="password" class="form-control" name="password">
			</div>
			<div class="form-group">
				<label for="formGroupExampleInput2">Повторите пароль</label>
				<input type="password" class="form-control" name="password_2">
			</div>
			<button type="submit" class="btn btn-primary" name="do_signup">Зарегистрироваться</button>
		</form>
	</div>
</div>
</body>
</html>