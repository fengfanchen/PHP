<?php

    define("ROOT_PATH", str_replace("\\", "/", dirname(__DIR__)) . "/");
    include ROOT_PATH . "core/App.php";

    \core\App::start();
