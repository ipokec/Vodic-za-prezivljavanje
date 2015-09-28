<?php

session_start();
session_destroy();
setcookie('zapamti');
setcookie('zapamtiP');
header("Location: prijava.php");

?>