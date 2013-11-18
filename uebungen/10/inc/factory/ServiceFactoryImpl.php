<?php

require_once("ServiceFactory.php");
class ServiceFactoryImpl implements ServiceFactory {

    private static $instance = NULL;

    private function __construct()
    {

    }

    public static function getInstance()
    {
        //create new instance if not existing
        if (!self::$instance)
        {
            self::$instance = new ServiceFactoryImpl();
        }
        return self::$instance;
    }
    public function get_service($service)
    {
        if($service=='kantone') {
                return new CantonService();

        }
    }
}

?>