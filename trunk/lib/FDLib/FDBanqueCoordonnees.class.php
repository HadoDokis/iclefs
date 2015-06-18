<?php
//https://datafranceconnect.opendatasoft.com/api/records/1.0/search?dataset=banque_coordonnees
class FDBanqueCoordonnees extends FournisseurDonnees {

	public function getId(){
		return "banque_coordonnees";
	}

	public function getName(){
		return "Banque Coordonnées";
	}

	public function getScope(){
		return "banque_coordonnees";
	}

	public function getProvidedInfo(){
		return array(
				     "date_de_naissance"=>"Date de naissance",
    "bic_1"=>"BIC",
    "nom_de_naissance"=>"Nom de famille",
    "etablissement_1"=>"Etablissement bancaire",
    "iban_1"=>"IBAN",
    "lieu_de_naissance"=>"Ville de naissance",
    "prenoms"=>"Prénom(s)",
    "pays_de_naissance"=>"Pays de naissance",
    "sexe"=>"Sexe"
				);
	}

	protected function getFDURL(){
		return "https://datafranceconnect.opendatasoft.com/api/records/1.0/search?dataset=banque_coordonnees";
	}

	public function getInfo($access_token){
		$info = parent::getInfo($access_token);
		return $info['records'][0]['fields'];
	}

}