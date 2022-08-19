<?php


namespace App\Controllers;

use App\Repositories\ContentRepository as Repository;
use Core\Request;

class ContentController extends Controller {

    private $repository;

    public function __construct($loader, $twig) {
        parent::__construct($loader, $twig);
        $this->repository = new Repository();
    }

    public function cms() {

        $content = $this->repository->getContentById(1);

        $template = $this->twig->load("@templates/cms.twig");
        echo $template->render([]);
    }

    public function save($params, Request $request) {
        $data = [
            "body" => $request->getBody()->blocks
        ];

        $prevContent = $this->repository->getContentById(1);

        if( ! $prevContent) {
            $this->repository->insertContent($data);
        }
        dd($prevContent);


    }
}