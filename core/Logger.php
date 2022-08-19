<?php

namespace Core;

use Core\Exceptions\FileIsNotWritableException;

class Logger {

    private $logFile;

    private $writeMod = 'w';

    private $levels = [
        "error" => "ERROR",
        "success" => "SUCCESS",
    ];

    public function __construct() {
        $this->logFile = getenv('APP_BASE_PATH') . 'application.log';

        if(file_exists($this->logFile)) {
            $this->writeMod = 'a+';

            if( ! is_writeable($this->logFile)) {
                throw new FileIsNotWritableException($this->logFile);
            }
        }

    }

    public function log($message, $level = 'error') {
        $row = "[". $this->levels[$level] . "] [" . date('Y/M/d')." ".date('H:i:s') . "] ". $message." \r\n";

        $handle = fopen($this->logFile, $this->writeMod);
        fprintf($handle, $row);
        fclose($handle);

    }
}