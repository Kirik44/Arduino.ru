<?php
header('Location: products.php');
require "db.php";
$data = $_POST;
$data['id_sensor'] = $_SESSION['id_sensor'];
if (!trim($data['text_coment'] == '')) {
	if (isset($data['do_coment'])) {
		$com = R::dispense('comment');
		$com->id_URL = $data['id_sensor'];
		$com->name_user = $_SESSION['logged_user']->login;
		$com->comment = $data['text_coment'];
		R::store($com);
		}
	}
?>