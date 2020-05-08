<?php
if (!(isset($_SESSION))) {
    session_start();
}
?>

<?php
require_once 'Classes/Member.inc';
$member = MemberController::FindOneMember($_SESSION['memberId']);

?>



<?php require_once 'Template/Header.php' ?>

</head>

<body class="md-skin rtls fixed-nav fixed-sidebar boxed-layout mini-navbar">

<div id="wrapper">

    <?php require_once 'Template/SideBarMenu.php' ?>


    <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom ">
            <?php require_once 'Template/TopMenu.php' ?>
        </div>
        <!--<div class="row wrapper border-bottom white-bg page-heading">-->
        <!--<div class="col-lg-10">-->
        <!--<h2>Profile</h2>-->
        <!--<ol class="breadcrumb">-->
        <!--<li>-->
        <!--<a href="index.html">Home</a>-->
        <!--</li>-->
        <!--<li>-->
        <!--<a>Extra Pages</a>-->
        <!--</li>-->
        <!--<li class="active">-->
        <!--<strong>Profile</strong>-->
        <!--</li>-->
        <!--</ol>-->
        <!--</div>-->
        <!--<div class="col-lg-2">-->

        <!--</div>-->
        <!--</div>-->
        <div class="wrapper wrapper-content animated fadeInRight">


            <div class="row m-b-lg m-t-lg">

<!--                --><?php //$_GET['navid']=1; ?>
                <?php MemberUIBuilder::CreateOneMemberHorizontalHeaderWidget($_SESSION['memberId'] ,1) ?>
            </div>


            <div class="row">

                <div class="col-lg-3">

<!--                    <div class="ibox">-->
<!--                        <div class="ibox-content">-->
<!--                            <h3>-->
<!--                                درباره-->
<!--                                --><?php //echo $member->FirstName . " " . $member->LastName; ?>
<!--                            </h3>-->
<!---->
<!--                            <p class="small">-->
<!---->
<!--                                --><?php //echo $member->Profile ?>
<!---->
<!--                                <br/>-->
<!--                            </p>-->
<!---->
<!--                            <p class="small font-bold">-->
<!--                                <span><i class="fa fa-circle text-navy"></i>-->
<!--                                    وضعیت آنلاین-->
<!--                                </span>-->
<!--                            </p>-->
<!---->
<!--                        </div>-->
<!--                    </div>-->

                    <div class="ibox">
                        <div class="ibox-content">
                            <h3>
                                دنبال کننده ها و دوستان
                            </h3>
                            <p class="small">


                                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با
                                فیک است. چاپگرها و متون بلکه روزنامه و


                            </p>
                            <div class="user-friends">
                                <a href="profile_2.html"><img alt="image" class="img-circle" src="Template/img/a3.jpg"></a>
                                <a href="profile_2.html"><img alt="image" class="img-circle" src="Template/img/a1.jpg"></a>
                                <a href="profile_2.html"><img alt="image" class="img-circle" src="Template/img/a2.jpg"></a>
                                <a href="profile_2.html"><img alt="image" class="img-circle" src="Template/img/a4.jpg"></a>
                                <a href="profile_2.html"><img alt="image" class="img-circle" src="Template/img/a5.jpg"></a>
                                <a href="profile_2.html"><img alt="image" class="img-circle" src="Template/img/a6.jpg"></a>
                                <a href="profile_2.html"><img alt="image" class="img-circle" src="Template/img/a7.jpg"></a>
                                <a href="profile_2.html"><img alt="image" class="img-circle" src="Template/img/a8.jpg"></a>
                                <a href="profile_2.html"><img alt="image" class="img-circle" src="Template/img/a2.jpg"></a>
                                <a href="profile_2.html"><img alt="image" class="img-circle" src="Template/img/a1.jpg"></a>
                            </div>
                        </div>
                    </div>


                    <div class="ibox">
                        <div class="ibox-content">
                            <h3>
                                پیام خصوصی
                            </h3>

                            <p class="small">
                                ارسال پیام خصوصی به حمید درند
                            </p>

                            <div class="form-group">
                                <label>
                                    عنوان
                                </label>
                                <input type="email" class="form-control" placeholder="عنوان پیام">
                            </div>
                            <div class="form-group">
                                <label>
                                    پیام
                                </label>
                                <textarea class="form-control" placeholder="متن پیام" rows="3"></textarea>
                            </div>
                            <button class="btn btn-primary btn-block">
                                ارسال
                            </button>

                        </div>
                    </div>

                </div>

                <div class="col-lg-5">

                    <div class="row m-b-lg">
                        <?php MemberUIBuilder::CreateOneMemberLastEventsWidget($_SESSION['memberId']) ?>
                        <?php MemberUIBuilder::CreateOneMemberLastTeamsWidget($_SESSION['memberId']) ?>
                        <?php MemberUIBuilder::CreateOneMemberLastProjectsWidget($_SESSION['memberId']) ?>
                        <?php MemberUIBuilder::CreateOneMemberLastProductsWidget($_SESSION['memberId']) ?>
                        <?php MemberUIBuilder::CreateOneMemberLastArticlesWidget($_SESSION['memberId']) ?>

                        <div class="social-feed-box">

                            <div class="pull-left social-action dropdown">
                                <button data-toggle="dropdown" class="dropdown-toggle btn-white">
                                    <i class="fa fa-angle-down"></i>
                                </button>
                                <ul class="dropdown-menu m-t-xs">
                                    <li><a href="profile_2.html#">Config</a></li>
                                </ul>
                            </div>
                            <div class="social-avatar">
                                <a href="profile_2.html" class="pull-right">
                                    <img alt="image" src="Template/img/a1.jpg">
                                </a>
                                <div class="media-body">
                                    <a href="profile_2.html#">
                                        مسعود ثابتی
                                    </a>
                                    <small class="text-muted">
                                        امروز ساعت 04:52
                                    </small>
                                </div>
                            </div>
                            <div class="social-body">
                                <p>

                                    لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان
                                    گرافیک
                                    است. چاپگرها و متون بلکه روزنامه ولورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از
                                    صنعت
                                    چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و


                                </p>


                                <div class="btn-group">
                                    <button class="btn btn-white btn-xs"><i class="fa fa-thumbs-up"></i> Like this!
                                    </button>
                                    <button class="btn btn-white btn-xs"><i class="fa fa-comments"></i> Comment</button>
                                    <button class="btn btn-white btn-xs"><i class="fa fa-share"></i> Share</button>
                                </div>
                            </div>
                            <div class="social-footer">
                                <div class="social-comment">
                                    <a href="profile_2.html" class="pull-right">
                                        <img alt="image" src="Template/img/a1.jpg">
                                    </a>
                                    <div class="media-body">
                                        <a href="profile_2.html#">
                                            محسن ثابتی
                                        </a>

                                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان
                                        گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و
                                        برای شرایط فعلی تکنولوژی


                                        <br/>
                                        <a href="profile_2.html#" class="small"><i class="fa fa-thumbs-up"></i> 26 Like
                                            this!</a> -
                                        <small class="text-muted">12.06.2014</small>
                                    </div>
                                </div>

                                <div class="social-comment">
                                    <a href="profile_2.html" class="pull-right">
                                        <img alt="image" src="Template/img/a2.jpg">
                                    </a>
                                    <div class="media-body">
                                        <a href="profile_2.html#">
                                            مسعود ثابتی
                                        </a>
                                        اپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون
                                        و
                                        سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی


                                        <br/>
                                        <a href="profile_2.html#" class="small"><i class="fa fa-thumbs-up"></i> 11 Like
                                            this!</a> -
                                        <small class="text-muted">10.07.2014</small>
                                    </div>
                                </div>

                                <div class="social-comment">
                                    <a href="profile_2.html" class="pull-right">
                                        <img alt="image" src="Template/img/a3.jpg">
                                    </a>
                                    <div class="media-body">
                                        <textarea class="form-control" placeholder="Write comment..."></textarea>
                                    </div>
                                </div>

                            </div>

                        </div>

                        <div class="social-feed-box">

                            <div class="pull-left social-action dropdown">
                                <button data-toggle="dropdown" class="dropdown-toggle btn-white">
                                    <i class="fa fa-angle-down"></i>
                                </button>
                                <ul class="dropdown-menu m-t-xs">
                                    <li><a href="profile_2.html#">Config</a></li>
                                </ul>
                            </div>
                            <div class="social-avatar">
                                <a href="profile_2.html" class="pull-right">
                                    <img alt="image" src="Template/img/a4.jpg">
                                </a>
                                <div class="media-body">
                                    <a href="profile_2.html#">
                                        محسن ثابتی
                                    </a>
                                    <small class="text-muted">
                                        امروز ساعت 05:45
                                    </small>
                                </div>
                            </div>
                            <div class="social-body">
                                <p>

                                    لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان
                                    گرافیک
                                    است. چاپگرها و متون بلکه روزنامه ولورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از
                                    صنعت
                                    چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و


                                </p>
                                <p>
                                    لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان
                                    گرافیک
                                    است. چاپگرها و متون بلکه روزنامه ولورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از
                                    صنعت
                                    چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و

                                </p>
                                <img src="Template/img/gallery/3.jpg" class="img-responsive">
                                <div class="btn-group">
                                    <button class="btn btn-white btn-xs"><i class="fa fa-thumbs-up"></i> Like this!
                                    </button>
                                    <button class="btn btn-white btn-xs"><i class="fa fa-comments"></i> Comment</button>
                                    <button class="btn btn-white btn-xs"><i class="fa fa-share"></i> Share</button>
                                </div>
                            </div>
                            <div class="social-footer">
                                <div class="social-comment">
                                    <a href="profile_2.html" class="pull-right">
                                        <img alt="image" src="Template/img/a1.jpg">
                                    </a>
                                    <div class="media-body">
                                        <a href="profile_2.html#">
                                            فریدون مقدم
                                        </a>

                                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان
                                        گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و
                                        برای شرایط فعلی تکنولوژی


                                        <br/>
                                        <a href="profile_2.html#" class="small"><i class="fa fa-thumbs-up"></i> 26 Like
                                            this!</a> -
                                        <small class="text-muted">12.06.2014</small>
                                    </div>
                                </div>

                                <div class="social-comment">
                                    <a href="profile_2.html" class="pull-right">
                                        <img alt="image" src="Template/img/a2.jpg">
                                    </a>
                                    <div class="media-body">
                                        <a href="profile_2.html#">
                                            شایان تایید
                                        </a>

                                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان
                                        گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و
                                        برای شرایط فعلی تکنولوژی


                                        <br/>
                                        <a href="profile_2.html#" class="small"><i class="fa fa-thumbs-up"></i> 11 Like
                                            this!</a> -
                                        <small class="text-muted">10.07.2014</small>
                                    </div>
                                </div>

                                <div class="social-comment">
                                    <a href="profile_2.html" class="pull-right">
                                        <img alt="image" src="Template/img/a8.jpg">
                                    </a>
                                    <div class="media-body">
                                        <a href="profile_2.html#">
                                            کورش ترابی
                                        </a>

                                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان
                                        گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و
                                        برای شرایط فعلی تکنولوژی


                                        <br/>
                                        <a href="profile_2.html#" class="small"><i class="fa fa-thumbs-up"></i> 11 Like
                                            this!</a> -
                                        <small class="text-muted">10.07.2014</small>
                                    </div>
                                </div>

                                <div class="social-comment">
                                    <a href="profile_2.html" class="pull-right">
                                        <img alt="image" src="Template/img/a3.jpg">
                                    </a>
                                    <div class="media-body">
                                        <textarea class="form-control" placeholder="Write comment..."></textarea>
                                    </div>
                                </div>

                            </div>

                        </div>


                    </div>


                    <div class="row m-b-lg">

                    </div>

                </div>
                <div class="col-md-4 m-b-lg ">
                    <?php MemberUIBuilder::CreateOneMemberLastExpertsWidget($_SESSION['memberId']); ?>
                </div>
                <div class="col-lg-4 ">
                    <?php MemberUIBuilder::CreateOneMemberVisitStatisticsWidget($_SESSION['memberId']); ?>
                </div>

            </div>

        </div>

        <?php require_once 'Template/Footer.php' ?>


    </div>
</div>


<?php require_once 'Template/Scripts.php' ?>


</body>

</html>

