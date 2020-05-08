<?php

class CreditController {

    public static function GetCreditForMember($memberid) {
        return 1500;
    }

}

class CreditUIBuilder {

    public static function CreateTotalPerTodayCreditForMemberWidget($memberid) {
        $count = ProjectController::Count();
        $file = "../Content/Widgets/Col4PieChartBlue.widget";
        WidgetBuilder::createWidget($file, array('نمودار وضعیت اعتبار', 'کل', 'امروز'));
    }

    public static function CreateTotalCreditForMemberWidget($memberid) {
        $count = number_format(CreditController::GetCreditForMember($memberid));
        $file = "../Content/Widgets/Col4CenterContent.widget";
        WidgetBuilder::createWidget($file, array('color' => 'blue', 'buttoncolor' => 'info', 'bigtext' => 'تعداد اعتبارات امروز', 'value' => $count, 'buttontext' => 'مشاهده اطلاعات'));
    }

    public static function CreateTodayCreditForMemberWidget($memberid) {
        $count = number_format(CreditController::GetCreditForMember($memberid));
        $file = "../Content/Widgets/Col4CenterContent.widget";
        WidgetBuilder::createWidget($file, array('color' => 'blue', 'buttoncolor' => 'info', 'bigtext' => 'تعداد کل اعتبارات', 'value' => $count, 'buttontext' => 'مشاهده اطلاعات'));
    }

}
