<?php

namespace http;

use utils\JsonHelper;

class Response
{
    private $body;
    private $statusCode;
    private $headers = array();

    public function __construct($body, int $statusCode = 200, $headers = array())
    {
        $this->body = $body;
        $this->statusCode = $statusCode;

        $this->headers[] = JsonHelper::getHeader();
        $this->setHeader($headers);
    }

    public function getBody(): string
    {
        return $this->body;
    }

    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    public function getHeaders(): array
    {
        return $this->headers;
    }

    public function setHeader($value)
    {
        if(!empty($value)) {
            if(is_array($value)){
                $this->headers = array_merge($this->headers, array_values($value));
            }else{
                $this->headers[] = $value;
            }
        }
    }

    public function send()
    {
        http_response_code($this->statusCode);

        $this->putHeaders();

        $this->generateResponse();
    }

    public function generateResponse()
    {
        $response                = array();
        $response['success']     = $this->statusCode !== 200 ? false : true;
        $response['status_code'] = $this->statusCode;
        $response['response']    = $this->body;

        echo JsonHelper::toJsonUtf8($response);
    }

    private function putHeaders(){
        if(!empty($this->headers)) {
            foreach ($this->headers as $aux) {
                header("$aux");
            }
        }
    }
}