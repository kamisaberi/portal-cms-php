<!DOCTYPE html>
<?php
if (!(isset($_SESSION))) {
    session_start();
}
?>

<html>
    <head>
        <title></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <link href="Template/styles/font-awesome.css" rel="stylesheet" />
        <link href="Template/styles/metisMenu.css" rel="stylesheet" />
        <link href="Template/styles/animate.css" rel="stylesheet" />
        <link href="Template/styles/bootstrap.css" rel="stylesheet" />
        <link href="Template/styles/bootstrap-rtl.min.css" rel="stylesheet" />
        <link href="Template/styles/pe-icon-7-stroke.css" rel="stylesheet" />
        <link href="Template/styles/helper.css" rel="stylesheet" />
        <link href="Template/styles/style.css" rel="stylesheet" />

        <script src="Template/scripts/jquery.min.js"></script>
        <script src="Template/scripts/jquery-ui.min.js"></script>
        <script src="Template/scripts/jquery.slimscroll.min.js"></script>
        <script src="Template/scripts/bootstrap.min.js"></script>
        <script src="Template/scripts/jquery.flot.js"></script>
        <script src="Template/scripts/jquery.flot.resize.js"></script>
        <script src="Template/scripts/jquery.flot.pie.js"></script>
        <script src="Template/scripts/curvedLines.js"></script>
        <script src="Template/scripts/index.js"></script>
        <script src="Template/scripts/metisMenu.min.js"></script>
        <script src="Template/scripts/icheck.min.js"></script>
        <script src="Template/scripts/Chart.min.js"></script>
        <script src="Template/scripts/jquery.peity.min.js"></script>
        <script src="Template/scripts/sparkline_index.js"></script>

        <script src="Template/scripts/homer.js"></script>
        <!--<script src="scripts/charts.js"></script>-->


        <?php
        require_once '../Classes/Member.inc';

        $user = new Member();
        $user->Username = "ali1394";
        $user->Password = "1234";
        $user->FirstName = "Alireza";
        $user->LastName = "Rezaei";

        $tpe = new MemberType();
        $tpe->Title = "User";
        $user->MemberTypes[0] = $tpe;

        $_SESSION['UserType'] = $tpe->Title;
        ?>

















