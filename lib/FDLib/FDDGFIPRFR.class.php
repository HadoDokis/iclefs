<?php
//https://datafranceconnect.opendatasoft.com/api/records/1.0/search?dataset=dgfip_rfr
class FDDGFIPRFR extends FournisseurDonnees {

	public function getId(){
		return "dgfip_rfr";
	}

	public function getName(){
		return "DGFiP RFR";
	}

	public function getScope(){
		return "dgfip_rfr";
	}

	public function getProvidedInfo(){
		return array(
				"rfr"=>"RFR",
			    "sexe"=>"Sexe",
			    "prenom_de_naissance_enfants"=>"Prénom(s)",
			    "date_de_naissance"=>"Date de naissance",
			    "avisn_3"=>"Avis d'imposition N-3",
			    "avisn_2"=>"Avis d'imposition N-2",
			    "avisn_1"=>"Avis d'imposition N-1",
			    "nombre_de_parts"=>"Nombre de parts",
			    "nom_de_naissance"=>"Nom de famille",
			    "reference_de_l_avis"=>"Référence l'avis",
			    "hypothese_dgfip"=>"Hypothès DGFiP",
			    "situation_foyer"=>"Situation du foyer",
			    "prenom_de_naissance_du_conjoint"=>"Prénom de naissance du conjoint",
			    "prenoms"=>"Prénom(s)",
			    "pays_de_naissance"=>"Pays de naissance",
			    "nom_de_naissance_du_conjoint"=>"Nom de famille du conjoint"     
							);
	}

	protected function getFDURL(){
		return "https://datafranceconnect.opendatasoft.com/api/records/1.0/search?dataset=dgfip_rfr";
	}

	public function getInfo($access_token){
		$info = parent::getInfo($access_token);
		return $info['records'][0]['fields'];
	}

}