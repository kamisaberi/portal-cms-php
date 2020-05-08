<?php
//
//
//if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
//    $ip = $_SERVER['HTTP_CLIENT_IP'];
//} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
//    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
//} else {
//    $ip = $_SERVER['REMOTE_ADDR'];
//}
//
//
//echo $ip;
//
//echo "<br>";
//$ipprts = explode(".", $ip);
//
//for ($i = 0; $i < count($ipprts); $i++) {
//    echo $ipprts[$i] . "<br>";
//    $ipprts[$i] = str_pad($ipprts[$i], 3, "0", STR_PAD_LEFT);
//    echo $ipprts[$i] . "<br>";
//}
//
//$ip = implode($ipprts);
//
//echo $ip;
//
//$strfir ="";
//for ($i = 0; $i < strlen($ip); $i++) {
//    $ch = $ip[$i];
//    //int a = Int32 . Parse(ch);
//    $strfir .= (($ch * $ch + (($i *$ch  ) * (max($ch / 2, 1)))) );
//}
//
//echo "<br>";
//
//echo $strfir;

function generateCode($ip)
{
    $ipprts = explode(".", $ip);
    for ($i = 0; $i < count($ipprts); $i++) {
        echo $ipprts[$i] . "<br>";
        $ipprts[$i] = str_pad($ipprts[$i], 3, "0", STR_PAD_LEFT);
        echo $ipprts[$i] . "<br>";
    }
    $ip = implode($ipprts);
    $strfir ="";
    for ($i = 0; $i < strlen($ip); $i++) {
        $ch = $ip[$i];
        //int a = Int32 . Parse(ch);
        $strfir .= (($ch * $ch + (($i *$ch  ) * (max($ch / 2, 1)))) );
    }

    return $strfir;

}
