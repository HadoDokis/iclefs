<?php
//https://datafranceconnect.opendatasoft.com/api/records/1.0/search?dataset=caf_qf
class FDFaiContact extends FournisseurDonnees {

	public function getId(){
		return "fai_contact";
	}

	public function getName(){
		return "Fournisseur d'accès à Internet";
	}

	public function getScope(){
		return "ods_fai_contact";
	}

	public function getProvidedInfo(){
		return array(
				"commune"=>"Commune",
			    "tel_fixe"=>"Téléphone Fixe",
				"code_postal" => "Code postale",
				"sexe" => "Sexe",
				"date_de_naissance" => "Date de naissance",
				"adresse" => "Adresse",
				"tel_portable" => "Téléphone portable",
				"nom_d_usage" => "Nom d'usage",
				"justif_de_domicile" => "Justificatif de domicile",
				"nom_de_naissance" => "Nom de naissance",
				"mail" => "Email",
				"lieu_de_naissance"=>"Lieu de naissance",
				"prenoms" => "Prénom(s)",
				"pays_de_naissance" => "Pays de naissance",
				"hypothese_contact" => "Hypothèse de contact",
			);
	}

	protected function getFDURL(){
		return "http://datafranceconnect.opendatasoft.com/api/records/1.0/search?dataset=fai_contact";
	}

	public function getInfo($access_token){
		$info = parent::getInfo($access_token);
		return $info['records'][0]['fields'];
	}

}