<?php

namespace Core;

use Performance\Performance;
use Core\Logger;

class Application
{
    private $container;

    private $twig;

    public function __construct($container) {
        $this->container = $container;
    }

    public function run() {

        $logger = $this->container->get('logger');

        try {
            //https://github.com/bvanhoekelen/performance
            Performance::point();

            $this->container->get('dotEnv');
            $this->showErrors();

            //$this->container->get('setTimeZone');
            $this->twig = $this->container->get('twig');
            $this->container->get('dispatcher');

            if(getenv('APP_PERFORMANCE') == 'true') {
                Performance::results();
            }
        } catch(\Exception $e) {

            $logger = new Logger();
            $logger->log($e->getMessage(), 'error');

            $tpl = $this->twig->load("@templates/errors/500.twig");
            header("HTTP/1.1 500 Internal Server Error");
            echo $tpl->render([]);
            exit;
        }

    }

    private function showErrors() {
        if(getenv('APP_DEBUG') == 'true') {
            ini_set("DISPLAY_ERRORS", 1);
            error_reporting(E_ALL);
        } else {
            ini_set('display_errors', 'Off');
        }
    }
}