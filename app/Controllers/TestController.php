<?php

namespace App\Controllers;

use \Core\Request;

class TestController extends Controller {
    public function test($params, Request $request) {
        
        $data = $request->getBody()->age;
        dump($data);
        echo 'hello ' . $params['id'] ;
    }

    public function testTwo($params)
    {
        echo $params['slug'] . ' - ' . $params['id'];

    }

    public function testMethod($params, Request $request) {
        dd($request);
        $tpl = $this->twig->load("@templates/start.twig");
        echo $tpl->render($request->paramBag);
    }

    public function parsedBody(Request $request) {
        /** @var \App\DataObjects\TestDto $testDto */
        $testDto = $request->getParsedBody('\App\DataObjects\TestDto');

        echo $testDto->email . ": " . $testDto->password;
    }
}