<?php
//https://datafranceconnect.opendatasoft.com/api/records/1.0/search?dataset=ban-departement-75

class FDBANDpt75 extends FournisseurDonnees {

	public function getId(){
		return "fd_ban_dpt75";
	}

	public function getName(){
		return "BAN Département 75";
	}

	public function getScope(){
		return "ban-departement-75";
	}

	public function getProvidedInfo(){
		return array(
				    "commune"=>"Commune",
				    "code_post"=>"Code postal",
				    "geo_point_2d"=>"Coordonnées géolocalisée 2D",
				    "nom_voie"=>"Nom de la voie",
				    "numero"=>"Numéro de la voie",
				    "code_insee"=>"Code INSEE",
				    "y"=>"Coordonnée y",
				    "x"=>"Coordonnée x"
				);
	}

	protected function getFDURL(){
		return "https://datafranceconnect.opendatasoft.com/api/records/1.0/search?dataset=situation-pro_contrats";
	}

	public function getInfo($access_token){
		$info = parent::getInfo($access_token);
		return $info['records'][0]['fields'];
	}

}