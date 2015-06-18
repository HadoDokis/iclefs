<?php 
require_once(__DIR__."/../init.php");

try {
	
	if (empty($_GET['id_btn'])){
		throw new Exception("Pas de id_btn");		
	}
	
	$id_btn = $_GET['id_btn'];
	
	$buttonDataSQL = new ButtonDataSQL($sqlQuery);
	$fd_id_list = $buttonDataSQL->getIdFDList($id_btn);
	
	$fournisseurDonneesSet = new FournisseurDonneesSet();
	$fd_list = $fournisseurDonneesSet->getAllFD($franceConnect);

	$scope = array();
	foreach($fd_id_list as $fd_id){
		if (empty($fd_list[$fd_id])){
			continue;
		}
		$scope[$fd_list[$fd_id]->getScope()] = true; 
	}
	
	$scope = array_keys($scope);
	
	$franceConnect->authenticationRedirect($url_callback,$scope,$id_btn);

} catch (Exception $e){
	header("HTTP/1.1 500 Internal Server Error");
	echo "Une erreur est survenue : " . $e->getMessage();
} 

