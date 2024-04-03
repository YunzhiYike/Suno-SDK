<?php

declare(strict_types=1);
/**
 * This file is part of Yunzhiyike
 */

namespace Yunzhiyike\SunoAiSdk;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Response;

class Request
{
    protected int $clientTimeout;

    protected Client $client;

    public function __construct(int $clientTimeout)
    {
        $this->clientTimeout = $clientTimeout;
        $this->client = new Client(['timeout' => $clientTimeout]);
    }

    /**
     * @throws GuzzleException
     */
    public function post(string $url, array|string $body, array $headers = []): Response
    {
        return $this->client->post($url, ['headers' => $headers, 'body' => $body]);
    }

    /**
     * @throws GuzzleException
     */
    public function get(string $url, array $headers = []): Response
    {
        return $this->client->get($url, ['headers' => $headers]);
    }
}
