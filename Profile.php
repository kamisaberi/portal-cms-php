<?php require_once 'Classes/Functions.inc'; ?>
<?php require_once 'Classes/Member.inc'; ?>
<?php require_once 'Template/Header.php'; ?>
<?php require_once 'Template/Menu.php'; ?>

<div class="row">
    <div class="col-sm-3">

        <?php MemberUIBuilder::CreateOneMemberWidget(6); ?>
        <?php MemberUIBuilder::CreateOneMemberContestScoreWidget(6); ?>
        <?php MemberUIBuilder::CreateOneMemberExpertsWidget(6); ?>
        <?php MemberUIBuilder::CreateOneMemberStatsWidget(6); ?>
        <?php MemberUIBuilder::CreateOneMemberVisitsStatsWidget(6); ?>
    </div>

    <div class="col-sm-9">
        <div class="row">
            <?php CourseUIBuilder::CreateOneCourseWidget(1); ?>
            <?php CourseUIBuilder::CreateOneCourseWidget(1); ?>
            <?php CourseUIBuilder::CreateOneCourseWidget(1); ?>
        </div>

        <div class="row projects">
            <?php ProjectUIBuilder::CreateOneProjectDetailedWidget(2); ?>
            <?php ProjectUIBuilder::CreateOneProjectDetailedWidget(5); ?>
        </div>


        <div class="row">

            <?php CourseUIBuilder::CreateCourseExerptTable(5, SearchMethods::Newest) ?>

            <?php MemberUIBuilder::CreateOneMemberMessagesWidget(5); ?>
        </div>
    </div>
</div>
<?php require_once 'Template/Footer.php'; ?>