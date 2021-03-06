<?php
//https://datafranceconnect.opendatasoft.com/explore/dataset/acteetatcivil_cnf/?tab=metas

class FDEtatCivil extends FournisseurDonnees {
	
	public function getId(){
		return "fd_etat_civil";
	}
	
	public function getName(){
		return "Etat civil";
	}
	
	public function getScope(){
		return "acteetatcivil_cnf";
	}
	
	public function getProvidedInfo(){
		return array(
				"sexe"=>"Sexe",
			    "date_de_naissance"=>"Date de naissance",
			    "nom_de_naissance"=>"Nom de famille",
			    "acte_de_naissance_mairie"=>"Ville de naissance",
			    "lieu_de_naissance"=>"Code postale ville de naissance",
			    "prenoms"=>"Prénom(s)",
			    "pays_de_naissance"=>"Pays de naissance"
			);
	}
	
	protected function getFDURL(){
		return "https://datafranceconnect.opendatasoft.com/api/records/1.0/search?dataset=acteetatcivil_cnf";
	}
	
	public function getInfo($access_token){
		$info = parent::getInfo($access_token);
		return $info['records'][0]['fields'];
	}
	
}

