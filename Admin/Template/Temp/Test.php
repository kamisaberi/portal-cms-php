
<?php
if (!(isset($_SESSION))) {
    session_start();
}
?>

﻿<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">


        <link href="styles/font-awesome.css" rel="stylesheet" />
        <link href="styles/metisMenu.css" rel="stylesheet" />
        <link href="styles/animate.css" rel="stylesheet" />
        <link href="styles/bootstrap.css" rel="stylesheet" />
        <link href="styles/bootstrap-rtl.min.css" rel="stylesheet" />
        <link href="styles/pe-icon-7-stroke.css" rel="stylesheet" />
        <link href="styles/helper.css" rel="stylesheet" />
        <link href="styles/style.css" rel="stylesheet" />


    </head>
    <body>
        <!-- Simple splash screen-->
        <div class="splash"> <div class="color-line"></div><div class="splash-title"><h1></h1><p></p><img src="Template1/images/loading-bars.svg" width="64" height="64" /> </div>
        </div>
        <!--[if lt IE 7]>
        <p class="alert alert-danger">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <!-- Header -->
        <div id="header">
            <div class="color-line">
            </div>
            <div id="logo" class="light-version">
                <span class="logo-text">سایت ناریج</span>
            </div>
            <nav role="navigation">
                <div class="header-link hide-menu"><i class="fa fa-bars"></i></div>
                <div class="small-logo">
                    <span class="text-primary"></span>
                </div>
                <form role="search" class="navbar-form-custom" method="post" action="#">
                    <div class="form-group">
                        <input type="text" placeholder="جستجو . . ." class="form-control" name="search">
                    </div>
                </form>
                <div class="mobile-menu">
                    <button type="button" class="navbar-toggle mobile-menu-toggle" data-toggle="collapse" data-target="#mobile-collapse">
                        <i class="fa fa-chevron-down"></i>
                    </button>
                    <div class="collapse mobile-navbar" id="mobile-collapse">
                        <ul class="nav navbar-nav">
                            <li>
                                <a class="" href="#">ورود</a>
                            </li>
                            <li>
                                <a class="" href="#">خروج</a>
                            </li>
                            <li>
                                <a class="" href="#">پروفایل من</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="navbar-left">
                    <ul class="nav navbar-nav no-borders">
                        <li class="dropdown">
                            <a class="dropdown-toggle" href="#" data-toggle="dropdown">
                                <i class="pe-7s-speaker"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-right hdropdown notification animated flipInX">
                                <li>
                                    <a>
                                        <span class="label label-success">جدید</span> این متن برای تست است
                                    </a>
                                </li>
                                <li>
                                    <a>
                                        <span class="label label-warning">هشدار</span> این متن برای تست است
                                    </a>
                                </li>
                                <li>
                                    <a>
                                        <span class="label label-danger">خطا</span> این متن برای تست است
                                    </a>
                                </li>
                                <li class="summary"><a href="#">مشاهده همه اعلان ها</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" href="#" data-toggle="dropdown">
                                <i class="pe-7s-keypad"></i>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right hdropdown bigmenu animated flipInX">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <a href="#">
                                                    <i class="pe pe-7s-portfolio text-info"></i>
                                                    <h5>طرح ها</h5>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="#">
                                                    <i class="pe pe-7s-mail text-warning"></i>
                                                    <h5>پست الکترونیک</h5>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="#">
                                                    <i class="pe pe-7s-users text-success"></i>
                                                    <h5>مخاطبان</h5>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="#">
                                                    <i class="pe pe-7s-comment text-info"></i>
                                                    <h5>انجمن</h5>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="#">
                                                    <i class="pe pe-7s-graph1 text-danger"></i>
                                                    <h5>تجزیه و تحلیل</h5>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="#">
                                                    <i class="pe pe-7s-box1 text-success"></i>
                                                    <h5>اسناد</h5>
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle label-menu-corner" href="#" data-toggle="dropdown">
                                <i class="pe-7s-mail"></i>
                                <span class="label label-orange">4</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-right hdropdown animated flipInX">
                                <li class="title">
                                    شما چهار پیام جدید دارید
                                </li>
                                <li>
                                    <a>
                                        این متن تست می باشد
                                    </a>
                                </li>
                                <li>
                                    <a>
                                        این متن تست می باشد
                                    </a>
                                </li>
                                <li>
                                    <a>
                                        این متن تست می باشد
                                    </a>
                                </li>
                                <li>
                                    <a>
                                        این متن تست می باشد
                                    </a>
                                </li>
                                <li class="summary"><a href="#">مشاهده همه پیام ها</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" id="sidebar" class="right-sidebar-toggle">
                                <i class="pe-7s-upload pe-7s-news-paper"></i>
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="#">
                                <i class="pe-7s-upload pe-rotate-270"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- Navigation -->
        <aside id="menu">
            <div id="navigation">
                <div class="profile-picture">
                    <a href="#">
                        <img src="images/profile.jpg" class="img-circle m-b orange-border box-shadow profile-img" alt="logo">
                    </a>

                    <div class="stats-label text-color">
                        <span class="label-orange-color font-extra-bold medium-line-height">سینا هدایتی</span>

                        <div class="dropdown">
                            <a class="dropdown-toggle" href="#" data-toggle="dropdown">
                                <small class="text-muted">بنیان گذار برنامه <b class="caret"></b></small>
                            </a>
                            <ul class="dropdown-menu animated fadeInLeft m-t-xs">
                                <li><a href="#">مخاطبان</a></li>
                                <li><a href="#">پروفایل</a></li>
                                <li><a href="#">تجزیه و تحلیل</a></li>
                                <li class="divider"></li>
                                <li><a href="Logoff.php">خروج</a></li>
                            </ul>
                        </div>


                        <div id="sparkline1" class="small-chart m-t-sm"></div>
                        <div>
                            <h4 class="m-b-xs">
                                120,000
                                <br />
                                <span class="small">تومان</span>
                            </h4>
                            <small class="text-muted">درآمد شما از سال گذشته برای فروش محصول</small>
                        </div>
                    </div>
                </div>

                <ul class="nav" id="side-menu">
                    <li class="active">
                        <a href="index.php"> <span class="nav-label">داشبرد</span> <span class="label label-orange pull-left">نسخه 1</span> </a>
                    </li>
                    <!--            <li>
                                    <a href="#"> <span class="nav-label">تجزیه و تحلیل</span><span class="label label-orange pull-left">تازه</span> </a>
                                </li>-->
                    <li>
                        <a href="#"><span class="nav-label">رابط کاربری</span><span class="fa arrow"></span> </a>
                        <ul class="nav nav-second-level">
                            <li><a href="#">پروفایل</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><span class="nav-label">محصولات</span><span class="fa arrow"></span> </a>
                        <ul class="nav nav-second-level">
                            <li><a href="Products.php">فهرست محصولات</a></li>
                            <li><a href="ProductCategories.php">دسته بندی محصولات</a></li>
                            <li><a href="ProductProperties.php">خاصیت محصولات</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><span class="nav-label">پروژه ها</span><span class="fa arrow"></span> </a>
                        <ul class="nav nav-second-level">
                            <li><a href="Projects.php">فهرست پروژه ها</a></li>
                            <li><a href="Posts.php">پست های پروژه</a></li>
                            <li><a href="ProjectCategories.php">دسته بندی پروژه ها</a></li>
                            <li><a href="ProjectSituationTypes.php">وضعیت های پروژه ها</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><span class="nav-label">اعضای وبسایت</span><span class="fa arrow"></span> </a>
                        <ul class="nav nav-second-level">
                            <li><a href="#"> فهرست اعضاء</a></li>
                            <li><a href="#">فهرست انواع اعضاء</a></li>
                        </ul>
                    </li>
                    <!--            <li>
                                    <a href="#"> <span class="nav-label">ویدجت</span> <span class="label label-orange pull-left">ویژه</span></a>
                                </li>-->
                    <li>
                        <a href="#"><span class="nav-label"> تخصص ها</span><span class="fa arrow"></span> </a>
                        <ul class="nav nav-second-level">
                            <li><a href="#"> فهرست تخصص ها</a></li>
                            <li><a href="#">فهرست دوره ها</a></li>
                            <li><a href="#">دسته بندی تخصص ها</a></li>
                            <li><a href="#">فهرست آزمون ها</a></li>
                            <li><a href="#">انواع آزمون ها</a></li>
                            <li><a href="#">فهرست سوالات</a></li>
                            <li><a href="#">انواع سوالات</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"> <span class="nav-label">تنظیمات قالب</span></a>
                    </li>
                    <li>
                        <a href="#"> <span class="nav-label">سیستم شبکه ای</span></a>
                    </li>
                    <li>
                        <a href="#"> <span class="nav-label">صفحه نخست</span></a>
                    </li>
                    <li>
                        <a href="#"> <span class="nav-label">سایر نسخه ها</span></a>
                    </li>
                </ul>
            </div>
        </aside>
        <!-- Main Wrapper -->
        <div id="wrapper">

            <div class="normalheader transition animated zoomIn">
                <div class="hpanel">
                    <div class="panel-body">
                        <a class="small-header-action" href="">
                            <div class="clip-header">
                                <i class="fa fa-arrow-up"></i>
                            </div>
                        </a>

                        <div id="hbreadcrumb" class="pull-left m-t-lg">
                            <ol class="hbreadcrumb breadcrumb ltr-dir">
                                <li><a href="javascript:void(0);" class="active">Dashboard</a></li>
                            </ol>
                        </div>
                        <h2 class="font-light m-b-xs">
                            پروفایل
                        </h2>
                        <small>شما در اینجا هستید</small>
                    </div>
                </div>
            </div>

            <div class="content">

            </div>




            <!-- Right sidebar -->
            <div id="right-sidebar" class="animated fadeInLeft">
                <button id="sidebar-close" class="right-sidebar-toggle sidebar-button btn btn-default m-b-md">
                    <i class="pe pe-7s-close"></i>
                </button>
            </div>

            <!-- Footer-->
            <footer class="footer">
                <span class="pull-right small">
                    تمامی حقوق این سایت نزد صاحب آن محفوظ است
                </span>
                <span class="pull-left small">
                    Copyright © 2016 <a href="#" class="s-link">MyWebSite.com</a>
                </span>
            </footer>

        </div>


        <script src ="scripts/jquery.min.js"></script>
        <script src="scripts/jquery-ui.min.js"></script>
        <script src="scripts/jquery.slimscroll.min.js"></script>
        <script src="scripts/bootstrap.min.js"></script>
        <script src="scripts/jquery.flot.js"></script>
        <script src="scripts/jquery.flot.resize.js"></script>
        <script src="scripts/jquery.flot.pie.js"></script>
        <script src="scripts/curvedLines.js"></script>
        <script src="scripts/index.js"></script>
        <script src="scripts/metisMenu.min.js"></script>
        <script src="scripts/icheck.min.js"></script>
        <script src="scripts/Chart.min.js"></script>
        <script src="scripts/jquery.peity.min.js"></script>
        <script src="scripts/sparkline_index.js"></script>

        <script src="scripts/homer.js"></script>
        <!--<script src="scripts/charts.js"></script>-->


        <script>


            $(function () {


                /**
                 * Options for Line chart
                 */
                var lineData = {
                    //labels: ["January", "February", "March", "April", "May", "June", "July"],
                    labels: ["فروردین", "اردیبهشت", "خرداد", "تیر", "مرداد", "شهریور", "مهر", "آبان", "آذر", "دی", "بهمن", "اسفند"],
                    datasets: [
                        {
                            label: "Visit DateSet",
                            fillColor: "transparent",
                            strokeColor: "rgba(204,197,28,1)",
                            pointColor: "rgba(204,197,28,,1)",
                            pointStrokeColor: "#fff",
                            pointHighlightFill: "#fff",
                            pointHighlightStroke: "rgba(204,197,28,1)",
                            data: [22, 44, 67, 43, 76, 45, 12, 80, 11, 15, 19, 20]
                        },
                        {
                            label: "Product DataSet",
                            fillColor: "transparent",
                            strokeColor: "rgba(98,203,49,0.7)",
                            pointColor: "rgba(98,203,49,1)",
                            pointStrokeColor: "#fff",
                            pointHighlightFill: "#fff",
                            pointHighlightStroke: "rgba(26,179,148,1)",
                            data: [16, 32, 18, 26, 42, 33, 44, 33, 25, 89, 99, 10]
                        },
                        {
                            label: "Tutorial DataSet",
                            fillColor: "transparent",
                            strokeColor: "rgba(255,230,0,0.7)",
                            pointColor: "rgba(255,230,0,1)",
                            pointStrokeColor: "#fff",
                            pointHighlightFill: "#fff",
                            pointHighlightStroke: "rgba(255,230,0,1)",
                            data: [11, 30, 7, 19, 42, 33, 12, 46, 25, 33, 57, 20]
                        },
                        {
                            label: "Project DataSet",
                            fillColor: "transparent",
                            strokeColor: "rgba(240,90,40,0.7)",
                            pointColor: "rgba(240,90,40,1)",
                            pointStrokeColor: "#fff",
                            pointHighlightFill: "#fff",
                            pointHighlightStroke: "rgba(240,90,40,1)",
                            data: [22, 10, 9, 73, 55, 18, 5, 5, 5, 44, 90, 30]
                        },
                        {
                            label: "Competition DataSet",
                            fillColor: "transparent",
                            strokeColor: "rgba(185,0,110,0.7)",
                            pointColor: "rgba(185,0,110,1)",
                            pointStrokeColor: "#fff",
                            pointHighlightFill: "#fff",
                            pointHighlightStroke: "rgba(185,0,110,1)",
                            data: [10, 10, 67, 68, 73, 40, 10, 5, 19, 33, 10, 20]
                        }
                    ]
                };

                var lineOptions = {
                    scaleShowGridLines: true,
                    scaleGridLineColor: "rgba(253,129,3,0.1)",
                    scaleGridLineWidth: 1,
                    bezierCurve: false,
                    bezierCurveTension: 0.4,
                    pointDot: true,
                    pointDotRadius: 6,
                    pointDotStrokeWidth: 1,
                    pointHitDetectionRadius: 20,
                    datasetStroke: true,
                    datasetStrokeWidth: 3,
                    datasetFill: true,
                    responsive: true,
                    scaleOverride: true,
                    scaleSteps: 10,
                    scaleStepWidth: 10,
                    scaleStartValue: 0
                };


                var ctx = document.getElementById("lineOptions").getContext("2d");
                var myNewChart = new Chart(ctx).Line(lineData, lineOptions);

            });


        </script>



    </body>
</html>
