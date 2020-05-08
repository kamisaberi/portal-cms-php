<?php
//require_once '../Classes/Functions.inc';
//session_start();
//$_SESSION["loggedIn"] = FALSE;
//$message = "لطفا نام کاربری و کلمه عبور را وارد کنید";
//if (isset($_POST['CheckLogin'])) {
//    if ($_POST['UserName'] == 1 && $_POST['Password'] == 1) {
//        $_SESSION["loggedIn"] = TRUE;
//        redirectTo("index.php");
//    } else {
//        $_SESSION["loggedIn"] = FALSE;
//        $message = "نام کاربری یا رمزعبور اشتباه است! ";
//    }
//}
//if ($_SESSION['loggedIn']) {
////    echo "YES";
//} else {
////    echo "<br>NOT LOGIN YET";
//}
//?>
<?php //require_once 'Template/LoginTop.php'; ?>
<!DOCTYPE html>
<html>
<head>

    <title>HOMER | WebApp admin theme</title>

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <!--<link rel="shortcut icon" type="image/ico" href="favicon.ico" />-->

    <!-- Vendor styles -->
    <!-- App styles -->

    <title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">


    <link href="Template/styles/font-awesome.css" rel="stylesheet" />
    <link href="Template/styles/metisMenu.css" rel="stylesheet" />
    <link href="Template/styles/animate.css" rel="stylesheet" />
    <link href="Template/styles/bootstrap.css" rel="stylesheet" />
    <link href="Template/styles/bootstrap-rtl.min.css" rel="stylesheet" />

    <link href="Template/styles/bootstrap-editable.css" rel="stylesheet" />
    <link href="Template/styles/select2.css" rel="stylesheet" />
    <link href="Template/styles/select2-bootstrap.css" rel="stylesheet" />
    <link href="Template/styles/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />


    <link href="Template/styles/summernote.css" rel="stylesheet" />
    <!--<link href="styles/summernote-bs3.css" rel="stylesheet" />-->


    <link href="Template/styles/sweet-alert.css" rel="stylesheet" />



    <link href="Template/styles/pe-icon-7-stroke.css" rel="stylesheet" />
    <link href="Template/styles/helper.css" rel="stylesheet" />
    <link href="Template/styles/style.css" rel="stylesheet" />

    <link href="Template/styles/awesome-bootstrap-checkbox.css" rel="stylesheet" />



</head>
<body class="blank">

<!-- Simple splash screen-->
<div class="splash"> <div class="color-line"></div><div class="splash-title"><h1>Homer - Responsive Admin Theme</h1><p>Special AngularJS Admin Theme for small and medium webapp with very clean and aesthetic style and feel. </p><img src="Admin/Template/images/loading-bars.svg" width="64" height="64" /> </div> </div>
<!--[if lt IE 7]>
<p class="alert alert-danger">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<div class="color-line"></div>

<!--<div class="back-link">-->
<!--<a href="index.html" class="btn btn-primary">Back to Dashboard</a>-->
<!--</div>-->

<div class="login-container">
    <div class="row">
        <div class="col-md-12">
            <div class="text-center m-b-md">
                <h3>شرکت جادوی ارتباط افزار</h3>
            </div>
            <div class="hpanel">
                <div class="panel-body">
                    <form action="CheckLogin.php" id="loginForm" method="post" role="form">
                        <div class="form-group">
                            <label class="control-label" for="username">نام کاربری</label>
                            <input type="text" placeholder="نام کاربری خود را وارد نمایید" title="Please enter you username" required value="" name="username" id="username" class="form-control">
<!--                            <span class="help-block small">نام کاربری خود زا وارد نمایید</span>-->
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="password">رمز عبور</label>
                            <input type="password" title="Please enter your password" placeholder="رمز عبور خود را وارد نمایید" required value="" name="password" id="password" class="form-control">
<!--                            <span class="help-block small">رمز عبور خود را وارد نمایید</span>-->
                        </div>


<!--                        <div class="radio radio-info radio-inline">-->
<!--                            <input type="radio" name="radio2" id="radio3" value="option1">-->
<!--                            <label for="radio3">-->
<!--                                One-->
<!--                            </label>-->
<!--                        </div>-->
<!--                        <div class="radio radio-info radio-inline">-->
<!--                            <input type="radio" name="radio2" id="radio4" value="option2" checked>-->
<!--                            <label for="radio4">-->
<!--                                Two-->
<!--                            </label>-->
<!--                        </div>-->
                        <div class="checkbox checkbox-primary">
                            <input type="checkbox" class="styled" id="rememberme" name="rememberme" value="remember" aria-label="Single checkbox One">
                            <label for="singleCheckbox1">
                                به خاطر داشته باش
                            </label>
                        </div>
                        <!--<div class="checkbox">-->
                        <!--<input type="checkbox" class="i-checks" checked>-->
                        <!--Remember login-->
                        <!--<p class="help-block small">(if this is a private computer)</p>-->
                        <!--</div>-->
                        <button class="btn btn-primary btn-block">ورود</button>
                        <a class="btn btn-default btn-block" href="Register.php">ثبت نام</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 text-center">
            <strong>شرکت ناریج</strong>
        </div>
    </div>
</div>


<script src="Template/scripts/jquery.min.js"></script>
<script src="Template/scripts/jquery-ui.min.js"></script>
<script src="Template/scripts/jquery.slimscroll.min.js"></script>
<script src="Template/scripts/bootstrap.min.js"></script>
<!--<script src="scripts/jquery.flot.js"></script>
<script src="scripts/jquery.flot.resize.js"></script>
<script src="scripts/jquery.flot.pie.js"></script>
<script src="scripts/curvedLines.js"></script>
<script src="scripts/index.js"></script>-->
<script src="Template/scripts/metisMenu.min.js"></script>
<script src="Template/scripts/icheck.min.js"></script>
<!-- <script src="scripts/Chart.min.js"></script>
 <script src="scripts/jquery.peity.min.js"></script>-->
<script src="Template/scripts/sparkline_index.js"></script>

<script src="Template/scripts/moment.js"></script>
<script src="Template/scripts/bootstrap-editable.min.js"></script>
<script src="Template/scripts/select2.min.js"></script>
<script src="Template/scripts/jquery.bootstrap-touchspin.min.js"></script>

<script src="Template/scripts/sweet-alert.min.js"></script>
<script src="Template/scripts/summernote.min.js"></script>

<!--<script src="scripts/jquery.validate.min.js"></script>-->
<script src="Template/scripts/homer.js"></script>
<!--<script src="scripts/charts.js"></script>-->



</body>
</html>

