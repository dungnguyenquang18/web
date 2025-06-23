
<?php
class Logger {
    public static function write($msg) {
        $logFile = __DIR__ . '/../../debug.log';
        $date = date('Y-m-d H:i:s');
        file_put_contents($logFile, "[$date] $msg\n", FILE_APPEND);
    }
}