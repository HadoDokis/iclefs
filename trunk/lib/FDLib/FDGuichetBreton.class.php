<?php
/*
 *    scopes:     
 *   Aujourd'hui, des données sont provisionnées pour deux utilisateurs : 
 *
 *  Jean Dupond (login: demo@franceconnect.fr/123)
 *   Mireille Binks (login: mireille@binks.fr/123)
 */

class FDGuichetBreton extends FournisseurDonnees {
	
	public function getId(){
		return "fd_breton";
	}
	
	public function getName(){
		return "Guichet des Bretons";
	}
	
	public function getScope(){
		return "revenu_fiscal_de_reference";
	}
	
	protected function getFDURL(){
		return "http://datafranceconnect.opendatasoft.com/api/records/1.0/search?dataset=guichet-des-bretons";
	}
	
	public function getProvidedInfo(){
		return array ("rfr"=>array("revenu_fiscal_de_reference","Revenu fiscal de référence"));
	}
	
	public function getInfo($access_token){
		$info = parent::getInfo($access_token);
		$result = array();
		if (!$info['records']){
			return $result;
		}
		$result['rfr'] = $info['records'][0]['fields']['rfr'];
		return $result;
	}
	
}