<?php
 include(__DIR__."/../init.php"); 

$fournisseurDonneesSet = new FournisseurDonneesSet();
$fd_list = $fournisseurDonneesSet->getAllFD($franceConnect);

foreach($fd_list as $fd){
	$result[] = $fd->getAllInfo();
}

echo json_encode($result);