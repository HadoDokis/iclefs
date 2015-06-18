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
	exit;
} 

$buttonSQL = new ButtonSQL($sqlQuery);
$info_button = $buttonSQL->getInfo($id_btn);
	
$buttonDataSQL = new ButtonDataSQL($sqlQuery);
$fd_id_list = $buttonDataSQL->getIdFDList($id_btn);

foreach($fd_id_list as $fd_id){
	if (empty($fd_list[$fd_id])){
		continue;
	}
	$fd = $fd_list[$fd_id];
	$_SESSION['fd_user_info'][$fd->getId()] = $fd->getInfo($access_token);

	$mailHTML = new MailHTML();
	
	$mailHTML->setSubject("[i-clefs] Réception de données");
	$mailHTML->setFrom("no-reply@iclefs.test.adullact.org");
	$mailHTML->setReturnPath("no-reply@iclefs.test.adullact.org");
	$mailHTML->setTo($info_button['email']);
	$mailHTML->setCharset("UTF-8");
	
	ob_start();
	
	include(__DIR__."/../mail/data.php");
	
	$content = ob_get_contents();
	ob_end_clean();
	
	$mailHTML->setHTMLContent($content);
	$mailHTML->send();
	
	header("Location: " . $info_button['url_callback']);
	
}
	


