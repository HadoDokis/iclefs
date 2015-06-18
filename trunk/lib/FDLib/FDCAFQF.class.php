<?php
//https://datafranceconnect.opendatasoft.com/api/records/1.0/search?dataset=caf_qf
class FDCAFQF extends FournisseurDonnees {

	public function getId(){
		return "caf_qf";
	}

	public function getName(){
		return "CAF Quotient Familial";
	}

	public function getScope(){
		return "caf_qf";
	}

	public function getProvidedInfo(){
		return array(
				    "nombre_d_enfants":"Nombre d'enfant",
    "sexe"=>"SQexe",
    "date_de_naissance"=>"Date de naissance",
    "quotient_familial"=>"Quotient familial",
    "hypothese_caf"=>"Hypothèse CAF",
    "attestation_droits"=>"Attestation de droits",
    "ayants_droits"=>"Ayants droits",
    "nom_de_naissance"=>"Nom de famille",
    "prestations_caf_mensuelles"=>"Prestations CAF Mensuelles",
    "prenoms"=>"Prénom(s)",
    "pays_de_naissance"=>"Pays de naissance",
    "situation_foyer"=>"Situation du foyer"
				);
	}

	protected function getFDURL(){
		return "https://datafranceconnect.opendatasoft.com/api/records/1.0/search?dataset=caf_qf";
	}

	public function getInfo($access_token){
		$info = parent::getInfo($access_token);
		return $info['records'][0]['fields'];
	}

}