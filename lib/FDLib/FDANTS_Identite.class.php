<?php

//https://datafranceconnect.opendatasoft.com/explore/dataset/ants_identite/?tab=metas
class FDANTS_Identite extends FournisseurDonnees {

	public function getId(){
		return "ants_identite";
	}

	public function getName(){
		return "ANTS Identité";
	}

	public function getScope(){
		return "ods_ants_identite";
	}

	public function getProvidedInfo(){
		return array(
				"numero_passeport"=>"Numéro de passeport",
				"hypothese_documents_d_identite"=>"Type de documents d'identité",
				"sexe"=>"Sexe",
				"numero_cni"=>"Numéro de la Carte Nationnale d'Identité",
				"date_de_naissance"=>"Date de naissance",
				"date_delivrance_cni"=>"Date de délivrance de la CNI",
				"date_delivrance_passeport"=>"Date de délivrance du passeport",
				"couleur_des_yeux"=>"Couleur des yeux",
				"nom_de_naissance"=>"Nom de famille",
				"taille"=>"Taille",
				"lieu_de_naissance"=>"Code postale de la ville de naissance",
				"prenoms"=>"Prénom",
				"pays_de_naissance"=>"Pays de naissance"
					);
	}

	protected function getFDURL(){
		return "https://datafranceconnect.opendatasoft.com/api/records/1.0/search?dataset=ants_identite";
	}

	public function getInfo($access_token){
		$info = parent::getInfo($access_token);
		return $info['records'][0]['fields'];
	}

}