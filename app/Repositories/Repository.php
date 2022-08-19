<?php

namespace App\Repositories;

use Core\Database;

abstract class Repository {
    public function __construct() {
        new Database();
    }
}