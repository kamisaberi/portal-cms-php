<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Page title -->
    <title>HOMER | WebApp admin theme</title>

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <!--<link rel="shortcut icon" type="image/ico" href="favicon.ico" />-->

    <!-- Vendor styles -->
    <link href="Template/styles/font-awesome.css" rel="stylesheet"/>
    <link href="Template/styles/metisMenu.css" rel="stylesheet"/>
    <link href="Template/styles/animate.css" rel="stylesheet"/>
    <link href="Template/styles/bootstrap.css" rel="stylesheet"/>
    <link href="Template/styles/bootstrap-rtl.min.css" rel="stylesheet"/>

    <link href="Template/styles/bootstrap-editable.css" rel="stylesheet"/>
    <link href="Template/styles/select2.css" rel="stylesheet"/>
    <link href="Template/styles/select2-bootstrap.css" rel="stylesheet"/>
    <link href="Template/styles/jquery.bootstrap-touchspin.min.css" rel="stylesheet"/>
    <link href="Template/styles/awesome-bootstrap-checkbox.css" rel="stylesheet"/>


    <link href="Template/styles/summernote.css" rel="stylesheet"/>
    <!--<link href="styles/summernote-bs3.css" rel="stylesheet" />-->


    <link href="Template/styles/sweet-alert.css" rel="stylesheet"/>


    <link href="Template/styles/pe-icon-7-stroke.css" rel="stylesheet"/>
    <link href="Template/styles/helper.css" rel="stylesheet"/>
    <link href="Template/styles/style.css" rel="stylesheet"/>


</head>
<body class="blank">

<!-- Simple splash screen-->
<div class="splash">
    <div class="color-line"></div>
    <div class="splash-title"><h1>Homer - Responsive Admin Theme</h1>
        <p>Special AngularJS Admin Theme for small and medium webapp with very clean and aesthetic style and feel. </p>
        <img src="images/loading-bars.svg" width="64" height="64"/></div>
</div>
<!--[if lt IE 7]>
<p class="alert alert-danger">You are using an <strong>outdated</strong> browser. Please <a
    href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<div class="color-line"></div>


<div class="register-container">
    <div class="row">
        <div class="col-md-12">
            <div class="text-center m-b-md">
                <h3>ثبت نام</h3>
            </div>
            <div class="hpanel">
                <div class="panel-body">
                    <form action="DoRegister.php" id="loginForm" method="post">
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label>نام</label>
                                <input type="text" value="" id="" class="form-control" name="">
                            </div>
                            <div class="form-group col-lg-6">
                                <label>نام خانوادگی</label>
                                <input type="text" value="" id="" class="form-control" name="">
                            </div>
                            <div class="form-group col-lg-6">
                                <label>شماره همراه</label>
                                <input type="text" value="" id="" class="form-control" name="">
                            </div>
                            <div class="form-group col-lg-12">
                                <label>جنسیت</label>
                                <div class="form-group col-lg-12">
                                    <div class="radio radio-info radio-inline">
                                        <input type="radio" checked name="radio2" id="radio3" value="option1">
                                        <label for="radio3">
                                            مرد
                                        </label>
                                    </div>
                                    <div class="radio radio-info radio-inline">
                                        <input type="radio" name="radio2" id="radio4" value="option2" >
                                        <label for="radio4">
                                            زن
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-lg-12">
                                <label>نام کاربری</label>
                                <input type="" value="" id="" class="form-control" name="">
                            </div>
                            <div class="form-group col-lg-6">
                                <label>رمز عبور</label>
                                <input type="password" value="" id="" class="form-control" name="">
                            </div>
                            <div class="form-group col-lg-6">
                                <label>تکرار رمز عبور</label>
                                <input type="password" value="" id="" class="form-control" name="">
                            </div>
                            <div class="form-group col-lg-6">
                                <label>پست الکترونیکی</label>
                                <input type="email" value="" id="" class="form-control" name="">
                            </div>
                            <div class="form-group col-lg-6">
                                <label>تکرار پست الکترونیکی</label>
                                <input type="email" value="" id="" class="form-control" name="">
                            </div>
                            <!--<div class="checkbox col-lg-12">-->
                            <!--<input type="checkbox" class="i-checks" checked>-->
                            <!--Sigh up for our newsletter-->
                            <!--</div>-->
                        </div>
                        <div class="text-center">
                            <input type="submit" class="btn btn-primary" value="ثبت نام">
                            <button class="btn btn-default">انصراف</button>
                        </div>
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

<!-- Vendor scripts -->
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