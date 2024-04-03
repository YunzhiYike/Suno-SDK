<?php

declare(strict_types=1);
/**
 * This file is part of Yunzhiyike
 */

namespace Yunzhiyike\SunoAiSdk;

class SunoAi
{
    protected const REMOTE_API_ADDRESS = 'https://sunoai.ai';

    protected Request $request;

    protected string $cookie = '';

    public function __construct(string $cookie, int $clientTimeout = 10)
    {
        $this->request = new Request($clientTimeout);
        $this->cookie = $cookie;
    }

    public function getCookie(): string
    {
        return $this->cookie;
    }

    public function refreshSession()
    {
        $url = self::REMOTE_API_ADDRESS . '/api/auth/session';
        $res = $this->request->get($url);
        var_dump($res->getBody()->getContents());
    }

    public function generateMusic() {}

    public function getLabiray() {}
}
