<?php
namespace submit;

use GuzzleHttp\Client;

abstract class Search
{
    protected $baseUrl = '';
    protected $token = '';
    protected $target = '';
    protected $client;

    public function __construct($config = [])
    {
        if (isset($config['baseUrl'])) {
            $this->baseUrl = $config['baseUrl'];
        }
        if (isset($config['token'])) {
            $this->token = $config['token'];
        }
        if (isset($config['target'])) {
            $this->target = $config['target'];
        }

        $this->client = new Client;
    }

    public function baseUrl($baseUrl)
    {
        $this->baseUrl = $baseUrl;
        return $this;
    }

    public function token($token)
    {
        $this->token = $token;
        return $this;
    }

    public function target($target)
    {
        $this->target = $target;
        return $this;
    }

    abstract public function submit($url);
}
