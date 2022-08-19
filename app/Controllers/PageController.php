<?php

namespace App\Controllers;

use Core\Logger;
use \Core\Response;

class PageController extends Controller {

    public function renderAbout() {
        $tpl = $this->twig->load("@templates/about.twig");
        echo $tpl->render([]);
    }

    public function renderServices() {
        $tpl = $this->twig->load("@templates/services.twig");
        echo $tpl->render([]);
    }

    public function renderMaterials() {
        $tpl = $this->twig->load("@templates/materials.twig");
        echo $tpl->render([]);
    }

    public function renderContact() {
        $tpl = $this->twig->load("@templates/contact.twig");
        echo $tpl->render([]);
    }

}