<?php

class RevenueController {

    public static function GetAllRevenue() {
        return 12700000;
    }

}

class RevenueUIBuilder {

    public static function CreateTotalRevenueWidget() {
        $count = number_format(RevenueController::GetAllRevenue());
        $file = "../Content/Widgets/Col3CenterContent.php";
        WidgetBuilder::createWidget($file, array("value" => $count, "smalltext" => 'تومان', "bigtext" => 'میزان کل فروش', "color" => 'violet', "image" => 'pe-7s-graph1'));
    }

    public static function CreateTodayRevenueWidget() {
        $count = number_format(RevenueController::GetAllRevenue());
        $file = "../Content/Widgets/Col3CenterContent.php";
        WidgetBuilder::createWidget($file, array("value" => $count, "smalltext" => 'تومان', "bigtext" =>'میزان فروش امروز', "color" => 'violet', "image" => 'pe-7s-graph1'));
    }

}
