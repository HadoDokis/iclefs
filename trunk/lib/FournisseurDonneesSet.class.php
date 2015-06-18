<?php

class FournisseurDonneesSet {
	
	public function getAllFD(FranceConnect $franceConnect){
		
		$glob_all = glob(__DIR__."/FDLib/*.class.php");
		
		foreach($glob_all as $class_file){
			require_once($class_file);
			preg_match("#/([^/]*).class.php$#",$class_file,$matches);
			print_r($match);		
		}
		
		
		return array(new FDEtatCivil($franceConnect));
	}
	
	
	
}