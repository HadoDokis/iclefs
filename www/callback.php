<?php
require_once(__DIR__."/../init.php");

$_SESSION['user_info'] = $franceConnect->callback();
$access_token = $_SESSION['user_info']['access_token']; 


$fournisseurDonneesSet = new FournisseurDonneesSet();
$fd_list = $fournisseurDonneesSet->getAllFD($franceConnect);

$id_btn = $_SESSION['user_info']['id_btn'];


if ($id_btn == -1){
	foreach($fd_list as $fd){
		$_SESSION['fd_user_info'][$fd->getId()] = $fd->getInfo($access_token);
	}
	header("Location: test.php");
} 
	
$buttonDataSQL = new ButtonDataSQL($sqlQuery);
$fd_id_list = $buttonDataSQL->getIdFDList($id_btn);
foreach($fd_id_list as $fd_id){
	if (empty($fd_list[$fd_id])){
		continue;
	}
	$fd = $fd_list[$fd_id];
	$_SESSION['fd_user_info'][$fd->getId()] = $fd->getInfo($access_token);

	//TODO send mail
	
	header("Location: test.php");
	
}
	


