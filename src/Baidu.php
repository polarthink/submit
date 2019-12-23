<?php
namespace submit;

class Baidu extends Search
{
    /**
     * 剩余多少条
     *
     * @var integer
     */
    protected $remain = -1;

    public function __construct($config = [])
    {
        $config = array_merge([
            'baseUrl' => 'http://data.zz.baidu.com/urls'
        ], $config);
        parent::__construct($config);
    }

    public function submit($url)
    {
        $endpoint = $this->baseUrl . '?site=' . $this->target . '&token=' . $this->token;
        try {
            $resp = $this->client->post($endpoint, [
                'body' => $url,
            ]);

            if ($resp->getStatusCode() != 200) {
                return Types::ERROR_RESPONSE;
            }

            $body = (string)$resp->getBody();
            $body = json_decode($body, true);
            if (isset($body['success']) && $body['success'] == 1) {
                $this->remain = $body['remain'];
                return Types::SUCCESS;
            }

            return Types::ERROR_SUBMIT;
        } catch (\Exception $e) {
            echo $e->getMessage();
            return Types::ERROR_REQUEST;
        }
    }

    public function remain()
    {
        return $this->remain;
    }
}
