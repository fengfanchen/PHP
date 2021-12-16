<?php
namespace core;

class App{

    private static function setPath(){

        define("CORE_PATH", ROOT_PATH . "core/");
        define("APP_PATH", ROOT_PATH . "app/");
        define("CONFIG_PATH", ROOT_PATH . "config/");
        define("VENDOR_PATH", ROOT_PATH . "vendor/");
        define("RESOURCES_PATH", ROOT_PATH . "resources/");
    }

    private static function setConfig(){

        global $config;
        $config = include CONFIG_PATH . "config.php";
    }

    private static function setDispatch(){

        $controller = "\\" . P . "\\controller\\" . C . "Controller";
        $action = A;
        $object = new $controller;
        $object->$action();
    }

    private static function setUrl(){

        $p = $_REQUEST["p"] ?? "home";
        $c = $_REQUEST["c"] ?? "Index";
        $a = $_REQUEST["a"] ?? "index";
        define("P", $p);
        define("C", $c);
        define("A", $a);
    }

    private static function setAutoLoadFile($class){

        $class = basename($class);
        $coreFile = CORE_PATH . $class . ".php";
        if(file_exists($coreFile)){

            include $coreFile;
        }

        $controllerFile = APP_PATH . P . "/controller/" . $class . ".php";
        if(file_exists($controllerFile)){

            include $controllerFile;
        }

        $modelFile = APP_PATH . P . "/model/" . $class . ".php";
        if(file_exists($modelFile)){

            include "$modelFile";
        }

        $vendorFile = VENDOR_PATH . $class . ".php";
        if(file_exists($vendorFile)){

            include $vendorFile;
        }
    }

    private static function setAutoLoad(){

        spl_autoload_register([__CLASS__, "setAutoLoadFile"]);
    }


    public static function start(){

        self::setPath();
        self::setConfig();
        self::setUrl();
        self::setAutoLoad();
        self::setDispatch();
    }
}