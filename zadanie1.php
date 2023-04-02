<?php
class Pipeline {
    public static function make(...$functions) {
        return function($arg) use ($functions) {
            $result = $arg;
            foreach ($functions as $function) {
                $result = $function($result);
            }
            return $result;
        };
    }
}

$pipeline = Pipeline::make(
    function($var) { return $var * 3; },
    function($var) { return $var + 1; },
    function($var) { return $var / 2; }
);

echo $pipeline(3);