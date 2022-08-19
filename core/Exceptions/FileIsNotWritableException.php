<?php

namespace Core\Exceptions;

class FileIsNotWritableException extends \Exception {
    public function __construct($filename) {
        parent::__construct('Critical error: the '. $filename . ' is not writable!');
    }
}