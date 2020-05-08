<?php
require_once '../Classes/WidgetBuilder.php';
require_once '../Classes/Product.inc';
require_once '../Classes/Project.inc';
require_once '../Classes/Revenue.inc';
require_once '../Classes/WebStat.inc';
require_once '../Classes/Credit.inc';
?>

<?php
include_once 'Template/Header.php';
?>


<?php
if ($_SESSION['UserType'] == "Admin") {
    ?>
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
    <?php
} elseif ($_SESSION["UserType"] == "User") {
    ?>



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
                        strokeColor: "rgba(220,220,220,1)",
                        pointColor: "rgba(220,220,220,1)",
                        pointStrokeColor: "#fff",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(220,220,220,1)",
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
                        strokeColor: "rgba(253,129,3,0.7)",
                        pointColor: "rgba(253,129,3,1)",
                        pointStrokeColor: "#fff",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(255,145,34,1)",
                        data: [11, 30, 7, 19, 42, 33, 12, 46, 25, 33, 57, 20]
                    },
                    {
                        label: "Project DataSet",
                        fillColor: "transparent",
                        strokeColor: "rgba(180,34,255,0.7)",
                        pointColor: "rgba(180,34,255,1)",
                        pointStrokeColor: "#fff",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(180,34,255,1)",
                        data: [22, 10, 9, 73, 55, 18, 5, 5, 5, 44, 90, 30]
                    },
                    {
                        label: "Competition DataSet",
                        fillColor: "transparent",
                        strokeColor: "rgba(255,69,0,0.7)",
                        pointColor: "rgba(255,69,0,1)",
                        pointStrokeColor: "#fff",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(255,69,0,1)",
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

    <script>

        $(function () {
            /**
             * Pie Chart Data
             */
            var projectPieChartData = [
                {label: "امروز", data: 20, color: "#fad57c", },
                {label: "کل", data: 150, color: "#ffb606", }
            ];
            var creditPieChartData = [
                {label: "امروز", data: 30, color: "#70baeb", },
                {label: "کل", data: 85, color: "#3498db", }
            ];
            var productPieChartData = [
                {label: "امروز", data: 17, color: "#c972ec", },
                {label: "کل", data: 180, color: "#9b59b6", }
            ];

            /**
             * Pie Chart Options
             */
            var pieChartOptions = {
                series: {
                    pie: {
                        show: true
                    }
                },
                grid: {
                    hoverable: true
                },
                tooltip: true,
                tooltipOpts: {
                    content: "%p.0%, %s", // show percentages, rounding to 2 decimal places
                    shifts: {
                        x: 20,
                        y: 0
                    },
                    defaultTheme: false
                }
            };

            $.plot($("#project-flot-pie-chart"), projectPieChartData, pieChartOptions);
            $.plot($("#credit-flot-pie-chart"), creditPieChartData, pieChartOptions);
            $.plot($("#product-flot-pie-chart"), productPieChartData, pieChartOptions);

        });

    </script>


    <?php
}
?>
<?php
include_once 'Template/TopNavbar.php';
include_once 'Template/SideMenu.php';
include_once 'Template/HeadPanel.php';
?>

<?php
if ($_SESSION['UserType'] == "Admin") {
    ?>

    <div class="row">
        <div style="" class="col-sm-12">
            <div class="hpanel horange  animated zoomIn">
                <div class="panel-heading panel-heading-bg">
                    <div class="panel-tools">
                        <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                        <a class="fullscreen"><i class="fa fa-expand"></i></a>
                        <a class="closebox"><i class="fa fa-times"></i></a>
                    </div>
                    نمودار خطی
                </div>
                <div class="panel-body">

                    <div class="row">
                        <div class="col-sm-1">
                        </div>
                        <div class="col-sm-10">
                            <div class="text-center small">
                                <i class="fa fa-laptop"></i> فعالیت کاربران در سال جاری
                            </div>
                            <div>
                                <canvas width="520" style="width: 416px; height: 194px;" id="lineOptions" height="242"></canvas>
                            </div>
                        </div>
                        <div class="col-sm-1"></div>
                    </div>

                </div>
                <div style="display: block;" class="panel-footer">
                    <span>
                        آخرین به روز رسانی در بهمن 1394
                    </span>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <?php RevenueUIBuilder::CreateTotalRevenueWidget(); ?>
        <?php ProductUIBuilder::CreateTotalProductWidget(); ?>
        <?php ProjectUIBuilder::CreateTotalProjectWidget(); ?>
        <?php WebStatUIBuilder::CreateTotalPageViewWidget(); ?>
    </div>

    <div class="row">
        <?php RevenueUIBuilder::CreateTodayRevenueWidget(); ?>
        <?php ProductUIBuilder::CreateTodayProductWidget(); ?>
        <?php ProjectUIBuilder::CreateTodayProjectWidget(); ?>
        <?php WebStatUIBuilder::CreateTodayPageViewWidget(); ?>
    </div>

    <div class="row">
        <?php ProjectUIBuilder::CreateProjectBriefTable(5, SearchMethods::Newest); ?>
        <?php ProductUIBuilder::CreateProductBriefTable(5, SearchMethods::Newest); ?>
    </div>
    <div class="row">
        <?php ProjectUIBuilder::CreateProjectBriefTable(5, SearchMethods::Popular); ?>
        <?php ProductUIBuilder::CreateProductBriefTable(5, SearchMethods::Popular); ?>
    </div>
    <div class="row">
        <?php ProjectUIBuilder::CreateProjectBriefTable(5, SearchMethods::BestSelling); ?>
        <?php ProductUIBuilder::CreateProductBriefTable(5, SearchMethods::BestSelling); ?>
    </div>

    <?php
} elseif ($_SESSION["UserType"] == "User") {
    ?>
    <div class="row">
        <div style="" class="col-sm-12">
            <div class="hpanel horange animated zoomIn">
                <div class="panel-heading panel-heading-bg">
                    <div class="panel-tools">
                        <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                        <a class="fullscreen"><i class="fa fa-expand"></i></a>
                        <a class="closebox"><i class="fa fa-times"></i></a>
                    </div>
                    نمودار خطی
                </div>
                <div class="panel-body">

                    <div class="row">
                        <div class="col-sm-1">
                        </div>
                        <div class="col-sm-10">
                            <div class="text-center small">
                                <i class="fa fa-laptop"></i> فعالیت کاربر در سال جاری
                            </div>
                            <div>
                                <canvas width="520" style="width: 416px; height: 194px;" id="lineOptions" height="242"></canvas>
                            </div>
                        </div>
                        <div class="col-sm-1"></div>
                    </div>

                </div>
                <div style="display: block;" class="panel-footer">
                    <span>
                        آخرین به روز رسانی در بهمن 1394
                    </span>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <?php ProjectUIBuilder::CreateTotalPerTodayProjectForMemberWidget(0); ?>
        <?php ProjectUIBuilder::CreateTodayProjectForMemberWidget(0); ?>
        <?php ProjectUIBuilder::CreateTotalProjectForMemberWidget(0); ?>
    </div>

    <div class="row">
        <?php CreditUIBuilder::CreateTotalPerTodayCreditForMemberWidget(0); ?>
        <?php CreditUIBuilder::CreateTodayCreditForMemberWidget(0); ?>
        <?php CreditUIBuilder::CreateTotalCreditForMemberWidget(0); ?>
    </div>

    <div class="row">
        <?php ProductUIBuilder::CreateTotalPerTodayProductForMemberWidget(0); ?>
        <?php ProductUIBuilder::CreateTodayProductForMemberWidget(0); ?>
        <?php ProductUIBuilder::CreateTotalProductForMemberWidget(0); ?>
    </div>
    <?php
}
?>


<?php
include_once 'Template/LeftSideBar.php';
include_once 'Template/Footer.php';
?>


