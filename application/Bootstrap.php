<?php

use \Yaf\Bootstrap_Abstract;
use \Yaf\Registry;
use \Yaf\Application;
use \Yaf\Dispatcher;

class Bootstrap extends Bootstrap_Abstract {
    public function _initConfig(Dispatcher $dispatcher){
        Registry::set('config', Application::app()->getConfig());
    }
}
