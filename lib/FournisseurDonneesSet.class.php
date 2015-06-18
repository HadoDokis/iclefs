<?php

class FournisseurDonneesSet {
	
	/**
	 * 
	 * @param FranceConnect $franceConnect
	 * @return array FournisseurDonnees
	 */
	public function getAllFD(FranceConnect $franceConnect){
		
		$result = array();
		$glob_all = glob(__DIR__."/FDLib/*.class.php");
		
		foreach($glob_all as $class_file){
			require_once($class_file);
			preg_match("#/([^/]*).class.php$#",$class_file,$matches);
			$result[] = new $matches[1]($franceConnect); 
		}
		
		return $result;
	}
	
	
	
}