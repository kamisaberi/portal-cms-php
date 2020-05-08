<?php

class WebStatController {

    public static function GetAllPageViews() {
        return 12700000;
    }

}

class WebStatUIBuilder {

    public static function CreateTotalPageViewWidget() {
        $count = number_format(WebStatController::GetAllPageViews());
        $file = "../Content/Widgets/Col3TwoSideTitlesCenterContent.php";
        WidgetBuilder::createWidget($file, array("value" => $count, "smalltext" => 'بازدید صفحات', "bigtext" => 'آمار بازدید کل ', "color" => 'orange', "image" => 'pe-7s-monitor'));
    }

    public static function CreateTodayPageViewWidget() {
        $count = number_format(WebStatController::GetAllPageViews());
        $file = "../Content/Widgets/Col3TwoSideTitlesCenterContent.php";
        WidgetBuilder::createWidget($file, array("value" => $count, "smalltext" => 'بازدید صفحات', "bigtext" => 'بازدید امروز', "color" => 'orange', "image" => 'pe-7s-monitor'));
    }

}
