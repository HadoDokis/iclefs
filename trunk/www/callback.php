<?php
require_once(__DIR__."/../init.php");

$_SESSION['user_info'] = $franceConnect->callback();
$access_token = $_SESSION['user_info']['access_token']; 

$fournisseurDonneesSet = new FournisseurDonneesSet();
$fd_list = $fournisseurDonneesSet->getAllFD($franceConnect);

foreach($fd_list as $fd){
	$_SESSION['fd_user_info'][$fd->getId()] = $fd->getInfo($access_token);
}

header("Location: index.php");
