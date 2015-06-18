<?php

class FDTest extends FournisseurDonnees {
	
	public function getId(){
		return "fd_test";
	}
	
	public function getName(){
		return "FD de Test quotient familiale";
	}
	
	public function getProvidedInfo(){
		return array ("quotient"=>"Quotien familiale");
	}
	
	public function getScope(){
		return "revenu_fiscal_de_reference";
	}
	
	protected function getFDURL(){
		return "http://fdp.integ01.dev-franceconnect.fr/quotientFamilial";
	}
	
	public function getInfo($access_token){
		$info = parent::getInfo($access_token);
		return array('quotient' => $info['quotient']) ;
	}

	
}