<?php
    if(!isset($_SESSION)) session_start();
    if(!empty($_POST) AND (empty($_POST['email']))){
        header('Location: index.php');
        exit();
    }

    include('config.php');

    $email = $_POST['email'];

    $sql = "SELECT * FROM usuarios WHERE email='{$email}'";

    $res = $conn->query($sql);

    $row = $res->fetch_object();

    if($res->num_rows > 0){
        $token = md5(uniqid(""));
      
        $sql2 = "INSERT INTO tokens_recuperacoes (idUsuario, token) VALUES ('{$row->id}' , '{$token}' )";
        
        $res2 = $conn->query($sql2);
        $link = "Você solicitou redefinição de senha no SITE DA BRENDA ! Clique no link a seguir para redefir "."http://localhost:8080/Login/redefinirSenha.php?token={$token}" . " Caso não tenha sido você que fez essa solicitação, ignore este email ! ";
        include("email.php");
        sendEmail($link);
        
        }

    // msg de sucesso do envio de email