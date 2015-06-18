<?php
//https://datafranceconnect.opendatasoft.com/api/records/1.0/search?dataset=men_diplomes
class FDMENDiplomes extends FournisseurDonnees {

	public function getId(){
		return "men_dimples";
	}

	public function getName(){
		return "Diplome d'Etat";
	}

	public function getScope(){
		return "men_diplome";
	}

	public function getProvidedInfo(){
		return array(
				"sexe"=>"Sexe",
			    "mention"=>"Mention",
			    "date_de_naissance"=>"Date de naissance",
			    "serie"=>"Filière",
			    "academie_d_origine"=>"Identifiant d'Académie",
			    "session"=>"Session",
			    "nom_de_naissance"=>"Nom de famille",
			    "examen"=>"Examen",
			    "prenoms"=>"Prénom(s)",
			    "pays_de_naissance"=>"Pays de naissance"
				);
	}

	protected function getFDURL(){
		return "https://datafranceconnect.opendatasoft.com/api/records/1.0/search?dataset=men_diplomes";
	}

	public function getInfo($access_token){
		$info = parent::getInfo($access_token);
		return $info['records'][0]['fields'];
	}

}