<?php 

class Util {
    public static function writeToConsole($data) {
        $console = 'console.log(' . json_encode($data) . ');';
        $console = sprintf('<script>%s</script>', $console);
        echo $console;
       }
}

?>