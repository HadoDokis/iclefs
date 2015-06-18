<?php

require_once(__DIR__."/../init.php");

$sup_scope = array("acteetatcivil_cnf");


$franceConnect->authenticationRedirect($url_callback,$sup_scope);

