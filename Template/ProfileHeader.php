<?php
require_once 'Classes/Member.inc';
$member = MemberController::FindOneMember($_SESSION['memberId']);

?>


<div class="row m-b-lg m-t-lg">
    <div class="col-md-6">

        <div class="profile-image">
            <!--            <img src="-->
            <?php //echo "http://" .$_SERVER["SERVER_NAME"] . dirname($_SERVER['PHP_SELF']) . "/Content/Uploads/Members/{$_SESSION['memberId']}/Profile.jpg"; ?><!--" class="img-circle circle-border m-b-md" alt="profile">-->
            <img src="<?php echo "Content/Uploads/Members/{$_SESSION['memberId']}/Profile.jpg"; ?>"
                 class="img-circle circle-border m-b-md" alt="profile">
        </div>
        <div class="profile-info">
            <div class="">
                <div>
                    <h2 class="no-margins">
                        <?php echo $member->FirstName . " " . $member->LastName; ?>
                    </h2>
                    <h4>
                        طراح گرافیک
                    </h4>
                    <small>
                        <?php echo $member->Profile; ?>
                    </small>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <table class="table small m-b-xs">
            <tbody>
            <tr>
                <td>
                    <strong>142</strong>

                    پروژه
                </td>
                <td>
                    <strong>22</strong>

                    دنبال کننده
                </td>

            </tr>
            <tr>
                <td>
                    <strong>61</strong>
                    دیدگاه
                </td>
                <td>
                    <strong>54</strong>
                    مقاله
                </td>
            </tr>
            <tr>
                <td>
                    <strong>154</strong>
                    برچسب
                </td>
                <td>
                    <strong>32</strong>
                    دوست
                </td>
            </tr>
            </tbody>
        </table>
    </div>
    <!--    <div class="col-md-3">-->
    <!--        <small>-->
    <!--            فروش 24 ساعت اخیر-->
    <!--        </small>-->
    <!--        <h2 class="no-margins">206,480</h2>-->
    <!--        <div id="sparkline1"></div>-->
    <!--    </div>-->
    <div class="col-lg-3">
        <div class="widget style1">
            <div class="row">
                <div class="col-xs-4 text-center">
                    <i class="fa fa-trophy fa-5x"></i>
                </div>
                <div class="col-xs-8 text-left">
                                <span>
                                    درآمد امروز
                                </span>
                    <h2 class="font-bold">
                        12,000,000 تومان
                    </h2>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- Personal Navbar Start -->
<div class="row">
    <nav class="navbar navbar-default breadcrumb white-bg m-b-md">
        <div class="container-fluid">
            <ul class="nav navbar-nav">
                <li><a href="#">
                        خلاصه
                    </a></li>
                <li class="active"><a href="#">
                        پروفایل
                    </a></li>
                <li><a href="#">
                        پروژه ها
                    </a></li>
                <li><a href="#">
                        محصولات
                    </a></li>

                <li><a href="#">
تیم ها
                    </a></li>
            </ul>
        </div>
    </nav>

</div>
<!-- Personal Navbar End  -->
