<?php

function showQuery($sql) {
    echo "<hr>";
    echo $sql;
    echo "<hr>";
}

function redirectTo($location = NULL) {
    if ($location != NULL) {
        header("Location: {$location}");
        exit();
    }
}

?>