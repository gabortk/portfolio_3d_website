<?php

namespace Core;

class Response
{
    private $headers = [];
    private $statusCode;
    private $body;

    public function __construct($statusCode = Http\StatusCode\Success::OK, $headers = []) {
        $this->statusCode = $statusCode;
        $this->headers = $headers;
    }

    public function setBody($body, $jsonEncode = false) {
        $this->body = $jsonEncode ? json_encode($body) : $body;
    }

    public function setHeaders($headers = []) {
        $this->headers = $headers;
    }

    public function setStatusCode($statusCode = Http\StatusCode\Success::OK) {
        $this->statusCode = $statusCode;
    }

    public function send() {
        http_response_code($this->statusCode);
        foreach($this->headers as $header => $value) {
            header($header . ': ' . $value);
        }

        echo $this->body;
        exit;
    }

    public function sendWithView($loader, $twig) {
        $reasonPhrase = new Http\StatusCode\ReasonPhrase();
        header("HTTP/1.1 " . $this->statusCode . " ". $reasonPhrase->getReasonPhraseByStatusCode($this->statusCode));
        $data = [
            'code' => $this->statusCode,
            'phrase' => $reasonPhrase->getReasonPhraseByStatusCode($this->statusCode)
        ];

        $loader->addPath(getenv('APP_TEMPLATE_DIR'), 'templates');
        $tpl = $twig->load("@templates/errors/response.twig");
        echo $tpl->render($data);

        exit;
    }
}