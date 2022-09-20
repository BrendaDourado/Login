<?php
	if(!isset($_SESSION)) session_start();
	if(!empty($_POST) AND (empty($_POST['email']) OR empty($_POST['senha']))){
		header('Location: index.php');
		exit();
	}
	if(isset($_POST['g-recaptcha-response'])){
		$captcha = $_POST['g-recaptcha-response'];
	} else {
		var_dump("Sem recaptcha");
		die();
	}

	$secretRecaptcha = "6Lf48xUiAAAAABjjoe99O0kA7ymlRxKiNanOjgbC";
	$secretRecaptchaINCORRETO = "6Lf48xUiAAAAABjjoe99O0kA7ymlRxKiNanOjgbC"; # para testes

	$url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretRecaptcha) .  '&response=' . urlencode($captcha);

	include('config.php');

	$response = file_get_contents($url);
	$responseKeys = json_decode($response,true);
	// should return JSON with success as true

	if(!$responseKeys["success"]) {
		var_dump("captcha incorreto");
		echo "<script>alert('Captcha incorreto')</script>";
		echo "<script>window.location.href = '/Login'</script>";
	} else {
		#var_dump("Captcha ok");
		#die();
	}

	$sql = "SELECT * FROM usuarios WHERE email='".$_POST['email']."' AND senha='".md5($_POST['senha'])."'";

	$res = $conn->query($sql);

	$row = $res->fetch_object();

	if($res->num_rows > 0){
		$_SESSION['nome'] = $row->nome;
		print "<script>location.href='index2.php';</script>";
	}else{
		print "<script>alert('Usuário e/ou Senho incorretos');</script>";
		print "<script>location.href='index.php';</script>";
	}