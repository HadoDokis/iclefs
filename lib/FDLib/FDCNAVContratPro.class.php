<?php
//https://datafranceconnect.opendatasoft.com/api/records/1.0/search?dataset=situation-pro_contrats

require_once("FournisseurDonnees.class.php");

class FDCNAVContratPro extends FournisseurDonnees {

	public function getId(){
		return "fd_cnav_contrat_pro";
	}

	public function getName(){
		return "CNAV Contrat professionnel";
	}

	public function getScope(){
		return "situation-pro_contrats";
	}

	public function getProvidedInfo(){
		return array(
				"emploi_occupe" => "Poste occupé",
				"s21_g00_30_001_nir" => "NIR ",
				"s21_g00_40_007_naturecontrat" => "Type de contrat",
				"dif_aquis_heure" => "Compte Personnel de Formation",
				"s21_g00_40_001_datedebutcontrat" => "Date du début de contrat",
				"s21_g00_62_datefincontrat" => "Date de fin de contrat"
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