<?php

require_once '../Classes/Functions.inc';
session_start();
$_SESSION["loggedIn"] = FALSE;
redirectTo("../index.php");
?>