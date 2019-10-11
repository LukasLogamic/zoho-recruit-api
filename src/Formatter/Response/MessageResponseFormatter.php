<?php

namespace Humantech\Zoho\Recruit\Api\Formatter\Response;

use Humantech\Zoho\Recruit\Api\Formatter\FormatterInterface;

class MessageResponseFormatter implements FormatterInterface
{
    /**
     * @var array
     */
    private $data;

    /**
     * @inheritdoc
     */
    public function formatter(array $data)
    {
        if (isset($data['data']['response']['result']['message'])) {
            //$data = $data['data']['response']['result']['message'];
            $result['message'] = $data['data']['response']['result']['message'];
            $result['id'] = $data['data']['response']['result']['recorddetail']['FL'][0]['content']; //return object with last ID not only message
        } else {
            //$data = $data['data']['response']['success']['message'];
            $result['message'] = $data['data']['response']['result']['message'];
            $result['id'] = $data['data']['response']['result']['recorddetail']['FL'][0]['content']; //return object with last ID not only message
        }

        $this->data = $result;
    }

    /**
     * @inheritdoc
     */
    public function getOutput()
    {
        return $this->data;
    }
}
