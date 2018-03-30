<?php

    class DatabaseConfig {
        const DSN = "mysql:dbname=genFace;host=;charset=utf8";
        const USER = "";
        const PASS = "";
        const OPTIONS = array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_EMULATE_PREPARES => false,
        );
    }