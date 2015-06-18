<?php
 include(__DIR__."/../init.php"); 

$fdEtatCivil = new FDEtatCivil($franceConnect);

$fournisseurDonneesSet = new FournisseurDonneesSet();
$fournisseurDonneesSet->


print_r(array($fdEtatCivil->getAllInfo()));