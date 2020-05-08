<?php

class WidgetBuilder {

    public static function createWidget($file, $args) {

        foreach ($args as $key => $value) {
            $_GET[$key] = $value;
        }
        include $file;
    }

}
