<?php

require_once(__DIR__."/../init.php");

$sup_scope = array("acteetatcivil_cnf");


//"revenu_fiscal_de_reference","attestation_droit","adresse_postale");
//$sup_scope = array();
$franceConnect->authenticationRedirect($url_callback,$sup_scope);

