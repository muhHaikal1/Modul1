<?php

namespace app\Traits;

trait Logger {
    public function log($message) {
        echo "[LOG]: " . $message . PHP_EOL;
    }
}
