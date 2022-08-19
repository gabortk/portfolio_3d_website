<?php

namespace App\Controllers;

use Core\Logger;
use \Core\Response;

class StartPageController extends Controller {

    public function render() {

        $data = [];
        $tpl = $this->twig->load("@templates/start.twig");
        echo $tpl->render($data);
        
    }

    public function blog($params){

        $logger = new Logger();
        $logger->log($params['id'], 'success');

        /*
        $response = new Response(403);
        $response->sendWithView($this->loader, $this->twig);
        */


        $data = [
            'headline' => 'BLOG ' . $params['id']
        ];
        $tpl = $this->twig->load("@templates/start.twig");
        echo $tpl->render($data);

    }
}