<?php

namespace UKFast\SDK\SSL;

use UKFast\SDK\Client;
use UKFast\SDK\SSL\Entities\Recommendation;

class RecommendationClient extends Client
{
    protected $basePath = 'ssl/';

    protected $requestMap = [];

    /**
     * @param $domainName
     * @return Recommendation
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getRecommendation($domainName)
    {
        $response = $this->request("GET", 'v1/recommendation/' . $domainName);
        $body = $this->decodeJson($response->getBody()->getContents());

        return new Recommendation($this->apiToFriendly($body->data, $this->requestMap));
    }
}
