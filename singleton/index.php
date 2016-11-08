<?php

/**
 * Created by PhpStorm.
 * User: HAUTRUONG
 * Date: 11/8/2016
 * Time: 8:29 PM
 */
interface Singleton {
    /*
     * Get instance
     */
    public static function getInstance();
}

class Logger implements Singleton {
    private static $instance;

    private function __construct() {
    }

    private function __clone() {
        // TODO: Implement __clone() method.
    }

    public static function getInstance() {
        if (NULL === self::$instance) {
            echo 'new';
            self::$instance = new Logger();
            return self::$instance;
        }
        echo 'old';
        return self::$instance;
    }
}

echo 'First: ';
Logger::getInstance();
echo 'Second: ';
Logger::getInstance();