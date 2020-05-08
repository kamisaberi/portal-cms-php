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
<!-- Toastr style -->
<!--<link href="Template/css/plugins/toastr/toastr.min.css" rel="stylesheet">-->

</head>

<body class="md-skin rtls fixed-nav fixed-sidebar boxed-layout mini-navbar">

<div id="wrapper">

    <?php require_once 'Template/SideBarMenu.php' ?>


    <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom ">
            <?php require_once 'Template/TopMenu.php' ?>
        </div>
        <div class="wrapper wrapper-content animated fadeInRight">

            <div class="row m-b-lg m-t-lg">
<!--                --><?php //$_GET['navid']=2; ?>
<!--                --><?php //echo  $_GET['navid']; ?>
                <?php MemberUIBuilder::CreateOneMemberHorizontalHeaderWidget($_SESSION['memberId'],2) ?>
            </div>


            <div class="row">

                <div class="col-lg-9">
                    <div class="wrapper wrapper-content animated fadeInUp">
                        <div class="ibox">
                            <div class="ibox-content">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="m-b-md">
                                            <a href="project_detail.html#" class="btn btn-white btn-xs pull-left">
                                                ویرایش پروژه
                                            </a>
                                            <h2>
                                                پروژه با شرکت آرناهیت تعلق دارد.
                                            </h2>
                                        </div>
                                        <dl class="dl-horizontal">
                                            <dt>
                                                وضعیت:
                                            </dt>
                                            <dd><span class="label label-primary">
                                        فعال
                                    </span></dd>
                                        </dl>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-5">
                                        <dl class="dl-horizontal">

                                            <dt>
                                                ایجاد شده توسط:
                                            </dt>
                                            <dd>
                                                کورش ترابی
                                            </dd>
                                            <dt>
                                                پیغام ها:
                                            </dt>
                                            <dd> 162</dd>
                                            <dt>
                                                مشتری:
                                            </dt>
                                            <dd><a href="project_detail.html#" class="text-navy">
                                                    شرکت زندر
                                                </a></dd>
                                            <dt>
                                                نسخه:
                                            </dt>
                                            <dd> v1.4.2</dd>
                                        </dl>
                                    </div>
                                    <div class="col-lg-7" id="cluster_info">
                                        <dl class="dl-horizontal">

                                            <dt>
                                                آخرین بروزرسانی:
                                            </dt>
                                            <dd>16.08.2014 12:15:57</dd>
                                            <dt>
                                                ایجاد شده:
                                            </dt>
                                            <dd>
                                                10.07.2014 23:36:57
                                            </dd>
                                            <dt>
                                                شركت كنندگان:
                                            </dt>
                                            <dd class="project-people">
                                                <a href="project_detail.html"><img alt="image" class="img-circle"
                                                                                   src="Template/img/a3.jpg"></a>
                                                <a href="project_detail.html"><img alt="image" class="img-circle"
                                                                                   src="Template/img/a1.jpg"></a>
                                                <a href="project_detail.html"><img alt="image" class="img-circle"
                                                                                   src="Template/img/a2.jpg"></a>
                                                <a href="project_detail.html"><img alt="image" class="img-circle"
                                                                                   src="Template/img/a4.jpg"></a>
                                                <a href="project_detail.html"><img alt="image" class="img-circle"
                                                                                   src="Template/img/a5.jpg"></a>
                                            </dd>
                                        </dl>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <dl class="dl-horizontal">
                                            <dt>
                                                تکمیل شده:
                                            </dt>
                                            <dd>
                                                <div class="progress progress-striped active m-b-sm">
                                                    <div style="width: 60%;" class="progress-bar"></div>
                                                </div>
                                                <small>
                                                    این پروژه
                                                    <strong>
                                                        60%
                                                    </strong>
                                                    تکمیل شده است.
                                                </small>
                                            </dd>
                                        </dl>
                                    </div>
                                </div>
                                <div class="row m-t-sm">
                                    <div class="col-lg-12">
                                        <div class="panel blank-panel">
                                            <div class="panel-heading">
                                                <div class="panel-options">
                                                    <ul class="nav nav-tabs">
                                                        <li class="active"><a href="project_detail.html#tab-1"
                                                                              data-toggle="tab">
                                                                پیغام کاربران
                                                            </a></li>
                                                        <li class=""><a href="project_detail.html#tab-2"
                                                                        data-toggle="tab">
                                                                آخرین فعالیت
                                                            </a></li>
                                                    </ul>
                                                </div>
                                            </div>

                                            <div class="panel-body">

                                                <div class="tab-content">
                                                    <div class="tab-pane active" id="tab-1">
                                                        <div class="feed-activity-list">
                                                            <div class="feed-element">
                                                                <a href="project_detail.html#" class="pull-right">
                                                                    <img alt="image" class="img-circle"
                                                                         src="Template/img/a2.jpg">
                                                                </a>
                                                                <div class="media-body ">
                                                                    <small class="pull-left">
                                                                        2 ساعت قبل
                                                                    </small>
                                                                    <strong>
                                                                        کورش ترابی
                                                                    </strong>
                                                                    یک پیغام برای
                                                                    <strong>
                                                                        سینا شعبانی
                                                                    </strong>
                                                                    ارسال کرد.
                                                                    <br>
                                                                    <small class="text-muted">
                                                                        امروز ساعت 03:25 عصر
                                                                    </small>
                                                                    <div class="well">


                                                                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از
                                                                        صنعت چاپ و با استفاده از طراحان گرافیک است.
                                                                        چاپگرها
                                                                        و متون بلکه روزنامه و مجله در ستون و سطرآنچنان
                                                                        که
                                                                        لازم است و برای شرایط فعلی تکنولوژی


                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="feed-element">
                                                                <a href="project_detail.html#" class="pull-right">
                                                                    <img alt="image" class="img-circle"
                                                                         src="Template/img/a3.jpg">
                                                                </a>
                                                                <div class="media-body ">
                                                                    <small class="pull-left">
                                                                        3 ساعت قبل
                                                                    </small>
                                                                    <strong>
                                                                        شایان تایید
                                                                    </strong>
                                                                    تصویری از
                                                                    <strong>
                                                                        روحانی
                                                                    </strong>
                                                                    اضافه کرد.
                                                                    <br>
                                                                    <small class="text-muted">
                                                                        2 روز قبل ساعت 08:30 صبح
                                                                    </small>
                                                                </div>
                                                            </div>
                                                            <div class="feed-element">
                                                                <a href="project_detail.html#" class="pull-right">
                                                                    <img alt="image" class="img-circle"
                                                                         src="Template/img/a4.jpg">
                                                                </a>
                                                                <div class="media-body ">
                                                                    <small class="pull-left text-navy">
                                                                        3 ساعت قبل
                                                                    </small>
                                                                    <strong>
                                                                        شایان تایید
                                                                    </strong>
                                                                    تصویری از
                                                                    <strong>
                                                                        روحانی
                                                                    </strong>
                                                                    اضافه کرد.
                                                                    <br>
                                                                    <small class="text-muted">
                                                                        2 روز قبل ساعت 08:30 صبح
                                                                    </small>
                                                                    <div class="actions">
                                                                        <a class="btn btn-xs btn-white"><i
                                                                                class="fa fa-thumbs-up"></i> Like </a>
                                                                        <a class="btn btn-xs btn-white"><i
                                                                                class="fa fa-heart"></i> Love</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="feed-element">
                                                                <a href="project_detail.html#" class="pull-right">
                                                                    <img alt="image" class="img-circle"
                                                                         src="Template/img/a5.jpg">
                                                                </a>
                                                                <div class="media-body ">
                                                                    <small class="pull-left">
                                                                        2 ساعت قبل
                                                                    </small>
                                                                    <strong>
                                                                        کورش ترابی
                                                                    </strong>
                                                                    یک پیغام برای
                                                                    <strong>
                                                                        سینا شعبانی
                                                                    </strong>
                                                                    ارسال کرد.
                                                                    <br>
                                                                    <small class="text-muted">
                                                                        امروز ساعت 03:25 عصر
                                                                    </small>
                                                                    <div class="well">


                                                                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از
                                                                        صنعت چاپ و با استفاده از طراحان گرافیک است.
                                                                        چاپگرها
                                                                        و متون بلکه روزنامه و مجله در ستون و سطرآنچنان
                                                                        که
                                                                        لازم است و برای شرایط فعلی تکنولوژی


                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="feed-element">
                                                                <a href="project_detail.html#" class="pull-right">
                                                                    <img alt="image" class="img-circle"
                                                                         src="Template/img/profile.jpg">
                                                                </a>
                                                                <div class="media-body ">
                                                                    <small class="pull-left text-navy">
                                                                        3 ساعت قبل
                                                                    </small>
                                                                    <strong>
                                                                        شایان تایید
                                                                    </strong>
                                                                    تصویری از
                                                                    <strong>
                                                                        روحانی
                                                                    </strong>
                                                                    اضافه کرد.
                                                                    <br>
                                                                    <small class="text-muted">
                                                                        2 روز قبل ساعت 08:30 صبح
                                                                    </small>
                                                                    <div class="actions">
                                                                        <a class="btn btn-xs btn-white"><i
                                                                                class="fa fa-thumbs-up"></i> Like </a>
                                                                        <a class="btn btn-xs btn-white"><i
                                                                                class="fa fa-heart"></i> Love</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="feed-element">
                                                                <a href="project_detail.html#" class="pull-right">
                                                                    <img alt="image" class="img-circle"
                                                                         src="Template/img/a7.jpg">
                                                                </a>
                                                                <div class="media-body ">
                                                                    <small class="pull-left text-navy">
                                                                        3 ساعت قبل
                                                                    </small>
                                                                    <strong>
                                                                        شایان تایید
                                                                    </strong>
                                                                    تصویری از
                                                                    <strong>
                                                                        روحانی
                                                                    </strong>
                                                                    اضافه کرد.
                                                                    <br>
                                                                    <small class="text-muted">
                                                                        2 روز قبل ساعت 08:30 صبح
                                                                    </small>
                                                                    <div class="actions">
                                                                        <a class="btn btn-xs btn-white"><i
                                                                                class="fa fa-thumbs-up"></i> Like </a>
                                                                        <a class="btn btn-xs btn-white"><i
                                                                                class="fa fa-heart"></i> Love</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="tab-pane" id="tab-2">

                                                        <table class="table table-striped">
                                                            <thead>
                                                            <tr>
                                                                <th>
                                                                    وضعیت
                                                                </th>
                                                                <th>
                                                                    عنوان
                                                                </th>
                                                                <th>
                                                                    زمان شروع
                                                                </th>
                                                                <th>
                                                                    زمان پایان
                                                                </th>
                                                                <th>
                                                                    دیدگاه ها
                                                                </th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <td>
                                                <span class="label label-primary"><i class="fa fa-check"></i>
                                                    تکمیل شد
                                                </span>
                                                                </td>
                                                                <td>
                                                                    نرم افزار حسابداری
                                                                </td>
                                                                <td>
                                                                    12.07.2014 10:10:1
                                                                </td>
                                                                <td>
                                                                    14.07.2014 10:16:36
                                                                </td>
                                                                <td>
                                                                    <p class="small">
                                                                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از
                                                                        صنعت چاپ و با استفاده از طراحان گرافیک است.
                                                                        چاپگرها
                                                                        و متون بلکه روزنامه و مجله در ستون و سطرآنچنان
                                                                        که
                                                                        لازم است و برای شرایط فعلی تکنولوژی
                                                                    </p>
                                                                </td>

                                                            </tr>
                                                            <tr>
                                                                <td>
                                                <span class="label label-primary"><i class="fa fa-check"></i>
                                                    تایید شد
                                                </span>
                                                                </td>
                                                                <td>
                                                                    سایت سدانا
                                                                </td>
                                                                <td>
                                                                    12.07.2014 10:10:1
                                                                </td>
                                                                <td>
                                                                    14.07.2014 10:16:36
                                                                </td>
                                                                <td>
                                                                    <p class="small">
                                                                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از
                                                                        صنعت چاپ و با استفاده از طراحان گرافیک است.
                                                                        چاپگرها
                                                                        و متون بلکه روزنامه و مجله در ستون و سطرآنچنان
                                                                        که
                                                                        لازم است و برای شرایط فعلی تکنولوژی
                                                                    </p>
                                                                </td>

                                                            </tr>
                                                            <tr>
                                                                <td>
                                                <span class="label label-primary"><i class="fa fa-check"></i>
                                                    ارسال شد
                                                </span>
                                                                </td>
                                                                <td>
                                                                    فروشگاه آنلاین
                                                                </td>
                                                                <td>
                                                                    12.07.2014 10:10:1
                                                                </td>
                                                                <td>
                                                                    14.07.2014 10:16:36
                                                                </td>
                                                                <td>
                                                                    <p class="small">
                                                                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از
                                                                        صنعت چاپ و با استفاده از طراحان گرافیک است.
                                                                        چاپگرها
                                                                        و متون بلکه روزنامه و مجله در ستون و سطرآنچنان
                                                                        که
                                                                        لازم است و برای شرایط فعلی تکنولوژی
                                                                    </p>
                                                                </td>

                                                            </tr>
                                                            <tr>
                                                                <td>
                                                <span class="label label-primary"><i class="fa fa-check"></i>
                                                    گزارش شد
                                                </span>
                                                                </td>
                                                                <td>
                                                                    فروش نرم افزار
                                                                </td>
                                                                <td>
                                                                    12.07.2014 10:10:1
                                                                </td>
                                                                <td>
                                                                    14.07.2014 10:16:36
                                                                </td>
                                                                <td>
                                                                    <p class="small">
                                                                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از
                                                                        صنعت چاپ و با استفاده از طراحان گرافیک است.
                                                                        چاپگرها
                                                                        و متون بلکه روزنامه و مجله در ستون و سطرآنچنان
                                                                        که
                                                                        لازم است و برای شرایط فعلی تکنولوژی
                                                                    </p>
                                                                </td>

                                                            </tr>
                                                            <tr>
                                                                <td>
                                                <span class="label label-primary"><i class="fa fa-check"></i>
                                                    تایید شد
                                                </span>
                                                                </td>
                                                                <td>
                                                                    آی املاک
                                                                </td>
                                                                <td>
                                                                    12.07.2014 10:10:1
                                                                </td>
                                                                <td>
                                                                    14.07.2014 10:16:36
                                                                </td>
                                                                <td>
                                                                    <p class="small">
                                                                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از
                                                                        صنعت چاپ و با استفاده از طراحان گرافیک است.
                                                                        چاپگرها
                                                                        و متون بلکه روزنامه و مجله در ستون و سطرآنچنان
                                                                        که
                                                                        لازم است و برای شرایط فعلی تکنولوژی
                                                                    </p>
                                                                </td>

                                                            </tr>
                                                            <tr>
                                                                <td>
                                                <span class="label label-primary"><i class="fa fa-check"></i>
                                                    ارسال شد
                                                </span>
                                                                </td>
                                                                <td>
                                                                    پروژه دانشجویی
                                                                </td>
                                                                <td>
                                                                    12.07.2014 10:10:1
                                                                </td>
                                                                <td>
                                                                    14.07.2014 10:16:36
                                                                </td>
                                                                <td>
                                                                    <p class="small">
                                                                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از
                                                                        صنعت چاپ و با استفاده از طراحان گرافیک است.
                                                                        چاپگرها
                                                                        و متون بلکه روزنامه و مجله در ستون و سطرآنچنان
                                                                        که
                                                                        لازم است و برای شرایط فعلی تکنولوژی
                                                                    </p>
                                                                </td>

                                                            </tr>
                                                            <tr>
                                                                <td>
                                                <span class="label label-primary"><i class="fa fa-check"></i>
                                                    گزارش شد
                                                </span>
                                                                </td>
                                                                <td>
                                                                    نرم افزار سپیدار
                                                                </td>
                                                                <td>
                                                                    12.07.2014 10:10:1
                                                                </td>
                                                                <td>
                                                                    14.07.2014 10:16:36
                                                                </td>
                                                                <td>
                                                                    <p class="small">
                                                                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از
                                                                        صنعت چاپ و با استفاده از طراحان گرافیک است.
                                                                        چاپگرها
                                                                        و متون بلکه روزنامه و مجله در ستون و سطرآنچنان
                                                                        که
                                                                        لازم است و برای شرایط فعلی تکنولوژی
                                                                    </p>
                                                                </td>

                                                            </tr>
                                                            <tr>
                                                                <td>
                                                <span class="label label-primary"><i class="fa fa-check"></i>
                                                    تکمیل شد
                                                </span>
                                                                </td>
                                                                <td>
                                                                    سایت پنگوئن
                                                                </td>
                                                                <td>
                                                                    12.07.2014 10:10:1
                                                                </td>
                                                                <td>
                                                                    14.07.2014 10:16:36
                                                                </td>
                                                                <td>
                                                                    <p class="small">
                                                                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از
                                                                        صنعت چاپ و با استفاده از طراحان گرافیک است.
                                                                        چاپگرها
                                                                        و متون بلکه روزنامه و مجله در ستون و سطرآنچنان
                                                                        که
                                                                        لازم است و برای شرایط فعلی تکنولوژی
                                                                    </p>
                                                                </td>

                                                            </tr>
                                                            <tr>
                                                                <td>
                                                <span class="label label-primary"><i class="fa fa-check"></i>
                                                    ارسال شد
                                                </span>
                                                                </td>
                                                                <td>
                                                                    سایت ناریج
                                                                </td>
                                                                <td>
                                                                    12.07.2014 10:10:1
                                                                </td>
                                                                <td>
                                                                    14.07.2014 10:16:36
                                                                </td>
                                                                <td>
                                                                    <p class="small">
                                                                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از
                                                                        صنعت چاپ و با استفاده از طراحان گرافیک است.
                                                                        چاپگرها
                                                                        و متون بلکه روزنامه و مجله در ستون و سطرآنچنان
                                                                        که
                                                                        لازم است و برای شرایط فعلی تکنولوژی
                                                                    </p>
                                                                </td>

                                                            </tr>

                                                            </tbody>
                                                        </table>

                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="wrapper wrapper-content project-manager">
                        <h4>
                            توضیحات پروژه
                        </h4>
                        <img src="Template/img/zender_logo.png" class="img-responsive">
                        <p class="small">

                            لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.
                            چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی
                            تکنولوژی
                        </p>
                        <p class="small font-bold">
                        <span><i class="fa fa-circle text-warning"></i>
                            اولویت بالا
                        </span>
                        </p>
                        <h5>
                            برچسب ها
                        </h5>
                        <ul class="tag-list" style="padding: 0">
                            <li><a href="project_detail.html"><i class="fa fa-tag"></i>
                                    زندر
                                </a></li>
                            <li><a href="project_detail.html"><i class="fa fa-tag"></i>
                                    ترابی
                                </a></li>
                            <li><a href="project_detail.html"><i class="fa fa-tag"></i>
                                    آرناهیت
                                </a></li>
                            <li><a href="project_detail.html"><i class="fa fa-tag"></i>
                                    حسابداری
                                </a></li>
                        </ul>
                        <br>
                        <br>
                        <h5>
                            فایل ها
                        </h5>
                        <ul class="list-unstyled project-files">
                            <li><a href="project_detail.html"><i class="fa fa-file"></i> Project_document.docx</a></li>
                            <li><a href="project_detail.html"><i class="fa fa-file-picture-o"></i>
                                    Logo_zender_company.jpg</a></li>
                            <li><a href="project_detail.html"><i class="fa fa-stack-exchange"></i>
                                    Email_from_Alex.mln</a>
                            </li>
                            <li><a href="project_detail.html"><i class="fa fa-file"></i> Contract_20_11_2014.docx</a>
                            </li>
                        </ul>
                        <div class="text-center m-t-md">
                            <a href="project_detail.html#" class="btn btn-xs btn-primary">
                                اضافه کردن فایل
                            </a>
                            <a href="project_detail.html#" class="btn btn-xs btn-primary">
                                گزارش تماس ها
                            </a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer">
            <div class="pull-right">
                10GB of <strong>250GB</strong> Free.
            </div>
            <div>
                <strong>Copyright</strong> Example Company &copy; 2014-2015
            </div>
        </div>

    </div>
</div>

<?php require_once 'Template/Scripts.php' ?>
<!-- Mainly scripts -->
<!--<script src="js/jquery-2.1.1.js"></script>-->
<!--<script src="js/bootstrap.min.js"></script>-->
<!--<script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>-->
<!--<script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>-->
<!---->
<!--<!-- Custom and plugin javascript -->-->
<!--<script src="js/inspinia.js"></script>-->
<!--<script src="js/plugins/pace/pace.min.js"></script>-->

<!--<script>-->
<!--    $(document).ready(function () {-->
<!---->
<!--        $('#loading-example-btn').click(function () {-->
<!--            btn = $(this);-->
<!--            simpleLoad(btn, true)-->
<!---->
<!--            // Ajax example-->
<!--//                $.ajax().always(function () {-->
<!--//                    simpleLoad($(this), false)-->
<!--//                });-->
<!---->
<!--            simpleLoad(btn, false)-->
<!--        });-->
<!--    });-->
<!---->
<!--    function simpleLoad(btn, state) {-->
<!--        if (state) {-->
<!--            btn.children().addClass('fa-spin');-->
<!--            btn.contents().last().replaceWith(" Loading");-->
<!--        } else {-->
<!--            setTimeout(function () {-->
<!--                btn.children().removeClass('fa-spin');-->
<!--                btn.contents().last().replaceWith(" Refresh");-->
<!--            }, 2000);-->
<!--        }-->
<!--    }-->
<!--</script>-->


</body>

</html>
