<?php

require_once(__DIR__."/../init.php");


$fournisseurDonneesSet = new FournisseurDonneesSet();
$fd_list = $fournisseurDonneesSet->getAllFD($franceConnect);

foreach($fd_list as $fd){
	$scope[$fd->getScope()] = true;
}


$scope = array_keys($scope);

$franceConnect->authenticationRedirect($url_callback,$scope);

