<?php

require_once(__DIR__."/../init.php");

session_destroy();

$franceConnect->logout();
