<?php 
require_once(__DIR__."/../init.php");

try {
	
	if (empty($_GET['id_btn'])){
				
	}
	
	$fournisseurDonneesSet = new FournisseurDonneesSet();
	$fd_list = $fournisseurDonneesSet->getAllFD($franceConnect);
	
	foreach($fd_list as $fd){
		$scope[$fd->getScope()] = true;
	}
	
	
	$scope = array_keys($scope);
	
	$franceConnect->authenticationRedirect($url_callback,$scope);

} catch (Exception $e){
	header("HTTP/1.1 500 Internal Server Error");
	echo "Une erreur est survenu : " . $e->getMessage();
} 

