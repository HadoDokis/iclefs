<?php

class FournisseurDonneesSQL {
	
	public function getAllFD(FranceConnect $franceConnect){
		return array(new FDEtatCivil($franceConnect));
	}
	
	
	
}