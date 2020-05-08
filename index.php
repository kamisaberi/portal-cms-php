<?php

echo __DIR__ ."<br>";
echo  $_SERVER["DOCUMENT_ROOT"] . "<br>";

echo $_SERVER["SERVER_NAME"]."<br>";

echo  __FILE__ ."<br>";




function rootUrl($url) {
    $urlParts = preg_split('#(?<!/)/(?!/)#', $url, 2);
    return $urlParts[0] != '' ? $urlParts[0] . '/' : '';
}

// examples:

echo rootUrl('http://user@www.example.com/path/to/file?query=string');
// output: http://user@www.example.com/
echo "<br>";
echo rootUrl('https://www.example.com/');
// output: https://www.example.com/
echo "<br>";
echo rootUrl('https://www.example.com');
// output: https://www.example.com/
echo "<br>";
echo rootUrl('example.com/path/to/file');
// output: example.com/
echo "<br>";
echo rootUrl('/path/to/file');
// output: [empty]
echo "<br>";
echo rootUrl('');
// output: [empty]
echo "<br>";

echo dirname($_SERVER['PHP_SELF']);
echo "<br>";
echo $_SERVER["SERVER_NAME"] . dirname($_SERVER['PHP_SELF']);
echo "<br>";

echo $_SERVER['PHP_SELF'];
echo "<br>";
echo $_SERVER["SERVER_NAME"] . dirname('/');

echo "<br>";

echo $_SERVER['REQUEST_URI'];
?>




<?php
//require_once 'Classes/Member.inc';
//$mmbr = new Member();
//$members = $mmbr->Fill();
//?>
<!---->
<!---->
<!--<!--Main Container-->-->
<!--<main class="container-fluid fixed-nav-offset">-->
<!---->
<!--    <div class="row">-->
<!--        <div class=" col-sm-offset-1 col-sm-10  col-sm-offset-1">-->
<!--            <div class="team-member-header">-->
<!--                <h3>-->
<!--                    <span class="glyphicon glyphicon-user"></span>&nbsp;-->
<!--                    اعضای تیم برنامه نویسان-->
<!--                </h3>-->
<!--            </div>-->
<!---->
<!--        </div>-->
<!--    </div>-->
<!---->
<!--    <div class="row">-->
<!--        --><?php //foreach ($members as $key => $member): ?>
<!--            <div class="col-sm-4">-->
<!--                <div class="team-member">-->
<!--                    <div class="img-box">-->
<!--                        <img src="Admin/images/--><?php //echo $member->ImagePath; ?><!--" alt="" />-->
<!--                    </div>-->
<!--                    <div class="expert-info">-->
<!--                        <span class="member-name">--><?php //echo $member->FirstName . " " . $member->LastName; ?><!--</span>-->
<!--                        <a href="Member.php?id=--><?php //echo $member->MemberId; ?><!--"><span class="member-expert">مشاهده</span></a>-->
<!--                    </div>-->
<!--                    <span class="dashed-line"></span>-->
<!--                </div>-->
<!--            </div>-->
<!--        --><?php //endforeach; ?>
<!--    </div>-->
<!--</main>-->
