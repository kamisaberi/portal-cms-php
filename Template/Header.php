<?php
if (!(isset($_SESSION))) {
    session_start();
}
?>
<?php

if ((isset($_GET['id']))) {
    $_SESSION['memberId'] = $_GET['id'];
} else {
    $_SESSION['memberId'] = 1;
}


?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>INSPINIA | Profile 2</title>

    <link href="Template/css/bootstrap.min.css" rel="stylesheet">
    <link href="Template/css/bootstrap-rtl.min.css" rel="stylesheet">
    <link href="Template/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="Template/css/animate.css" rel="stylesheet">


    <!--<link href="css/style.css" rel="stylesheet">-->
    <link href="Template/css/style-md-skin.css" rel="stylesheet">
