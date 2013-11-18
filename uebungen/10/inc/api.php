<?php

require_once('data/Canton.php');
require_once('factory/ServiceFactory.php');
require_once('factory/ServiceFactoryImpl.php');
require_once('service/Service.php');
require_once('service/ServiceImpl.php');

class api {

    private $args;
    private $service;
    private $method;
    private $dataService;
    private $serviceFactory;

    public function __construct() {
        //make sure our superglobals are set. 
        if (isset($_GET["service"])) {
            $this->service = $_GET["service"];
        }
        if (isset($_GET["methode"])) {
            $this->methode = $_GET["methode"];
        }

        $this->serviceFactory = ServiceFactoryImpl::getInstance();
        $this->dataService = $this->serviceFactory->get_service($this->service);

        //our main switch
        if ($this->dataService) {
            switch ($this->method) {
                case 'single':
                    if (isset($_GET["id"])) {
                        $data = $this->dataService->getById($_GET["id"]);
                    }
                    break;
                case 'list':
                default:
                    if (isset($_GET["sort"])) {
                        $data = $this->dataService->findAll($_GET["sort"]);
                    } else {
                        $data = $this->dataService->findAll();
                    }
                    break;
            }
            $this->response($data);
        } else {
            // puke out a 404 if we don't find shit. 
            $this->response(null, 404);
        }
    }
    
    private function response($data, $status = 200) {
        header("HTTP/1.1 " . $status . " " . $this->requestStatus($status));
        header('Content-type: application/json');

        $encoded = json_encode($data);
        exit($encoded);
    }

    // stole this from a fellow student, seemed like a good implementation. 
    private function requestStatus($code) {
        $status = array(
            100 => 'Continue',
            101 => 'Switching Protocols',
            200 => 'OK',
            201 => 'Created',
            202 => 'Accepted',
            203 => 'Non-Authoritative Information',
            204 => 'No Content',
            205 => 'Reset Content',
            206 => 'Partial Content',
            300 => 'Multiple Choices',
            301 => 'Moved Permanently',
            302 => 'Found',
            303 => 'See Other',
            304 => 'Not Modified',
            305 => 'Use Proxy',
            306 => '(Unused)',
            307 => 'Temporary Redirect',
            400 => 'Bad Request',
            401 => 'Unauthorized',
            402 => 'Payment Required',
            403 => 'Forbidden',
            404 => 'Not Found',
            405 => 'Method Not Allowed',
            406 => 'Not Acceptable',
            407 => 'Proxy Authentication Required',
            408 => 'Request Timeout',
            409 => 'Conflict',
            410 => 'Gone',
            411 => 'Length Required',
            412 => 'Precondition Failed',
            413 => 'Request Entity Too Large',
            414 => 'Request-URI Too Long',
            415 => 'Unsupported Media Type',
            416 => 'Requested Range Not Satisfiable',
            417 => 'Expectation Failed',
            500 => 'Internal Server Error',
            501 => 'Not Implemented',
            502 => 'Bad Gateway',
            503 => 'Service Unavailable',
            504 => 'Gateway Timeout',
            505 => 'HTTP Version Not Supported'
        );

        return ($status[$code]) ? $status[$code] : $status[500];
    }

}