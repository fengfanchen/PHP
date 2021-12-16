<?php

namespace core;
class Controller{

    protected $smarty;

    public function __construct(){

        include VENDOR_PATH . "smarty/Smarty.class.php";
        $this->smarty = new \Smarty();
        $this->smarty->template_dir = APP_PATH . P . "/view/";
        $this->smarty->compile_dir = RESOURCES_PATH . "views";
    }

    protected function assign($name, $value = ""){

        $this->smarty->assign($name, $value);
    }

    protected function display($template = ""){

        try {

            $this->smarty->display($template);
        }
        catch (\SmartyException | \Exception $e){

            $e->getMessage();
        }
    }
}