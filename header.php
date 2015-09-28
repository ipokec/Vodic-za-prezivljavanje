<?php
include_once './baza.class.php';
$baza = new Baza();

require_once 'smarty-3.1.24/libs/Smarty.class.php';
$smarty = new Smarty();

$smarty->display('predlosci/header.tpl');



?>