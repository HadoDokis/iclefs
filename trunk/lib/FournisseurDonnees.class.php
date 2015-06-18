<?php
//https://datafranceconnect.opendatasoft.com/login/?next=/explore/

abstract class FournisseurDonnees {

	private $franceConnect;
	
	abstract public function getId();
	abstract public function getName();
	abstract protected function getFDURL();
	abstract public function getProvidedInfo();
	abstract public function getScope();	
	
	public function __construct(FranceConnect $franceConnect){
		$this->franceConnect = $franceConnect;
	}
	
	public function getInfo($access_token){
		return $this->franceConnect->getInfoFromFD($this->getFDURL(), $access_token);
	}
	
	public function getAllInfo(){
		return array(
				"fd_name" => $this->getName(),
				"fd_provided_info" =>$this->getProvidedInfo(),
				);
	}
		
	
} 