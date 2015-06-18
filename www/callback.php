<?php
require_once(__DIR__."/../init.php");

$_SESSION['user_info'] = $franceConnect->callback();
$access_token = $_SESSION['user_info']['access_token']; 

$fdEtatCivil = new FDEtatCivil($franceConnect);
$_SESSION['fd_user_info'][$fdEtatCivil->getId()] = $fdEtatCivil->getInfo($access_token);


header("Location: index.php");
