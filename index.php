<?php

require 'app/bootstrap.php';
use App\App\{Router, Request};

try {
    Router::load('routes.php')
        ->direct(Request::uri(), Request::method());
} catch (Exception $e) {
    error_log("Exception: " . $e->getMessage(), 3, ERROR_LOG_PATH);
}
