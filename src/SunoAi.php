<?php

declare(strict_types=1);
/**
 * This file is part of Yunzhiyike
 */

namespace Yunzhiyike\SunoAiSdk;

use GuzzleHttp\Exception\GuzzleException;
use HttpException;
use Yunzhiyike\SunoAiSdk\Entities\PersonalInfoEntity;
use Yunzhiyike\SunoAiSdk\Entities\WorkEntity;
use Yunzhiyike\SunoAiSdk\Exception\SunoAiException;

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

    /**
     * refresh cookie and return personal info.
     * @throws HttpException
     * @throws SunoAiException
     * @throws GuzzleException
     */
    public function refreshSession(): PersonalInfoEntity
    {
        $url = self::REMOTE_API_ADDRESS . '/api/auth/session';
        $headers = [
            'cookie' => $this->cookie,
        ];
        $res = $this->request->get($url, $headers);
        if ($res->getStatusCode() != 200) {
            throw new HttpException('remote server error.', $res->getStatusCode());
        }
        $res = json_decode($res->getBody()->getContents(), true);
        if (empty($res)) {
            throw new SunoAiException('cookie is not valid.');
        }
        return PersonalInfoEntity::arrayToEntity($res);
    }

    /**
     * generate music return uid.
     * @throws GuzzleException
     * @throws HttpException
     * @throws SunoAiException
     */
    public function generateMusic(string $userId, string $inputTitle, string $inputText, string $inputTags, bool $isPublic): string
    {
        $url = self::REMOTE_API_ADDRESS . '/api/generate/handle';
        $headers = [
            'cookie' => $this->cookie,
        ];
        $data = ['input_tags' => $inputTags, 'user_id' => $userId, 'input_title' => $inputTitle, 'input_text' => $inputText, 'is_public' => $isPublic];
        $res = $this->request->post($url, json_encode($data), $headers);
        if ($res->getStatusCode() != 200) {
            throw new HttpException('remote server error.', $res->getStatusCode());
        }
        $res = json_decode($res->getBody()->getContents(), true);
        if (empty($res)) {
            throw new SunoAiException('cookie is not valid.');
        }
        if (! isset($res['uid'])) {
            throw new SunoAiException($res['msg']);
        }
        return $res['uid'];
    }

    public function getUserInfoByEmail(string $email): PersonalInfoEntity
    {
        $url = self::REMOTE_API_ADDRESS . '/api/user/getUserByEmail';
        $headers = [
            'cookie' => $this->cookie,
        ];
        $data = ['email' => $email];
        $res = $this->request->post($url, json_encode($data), $headers);
        if ($res->getStatusCode() != 200) {
            throw new HttpException('remote server error.', $res->getStatusCode());
        }
        $res = json_decode($res->getBody()->getContents(), true);
        if (empty($res)) {
            throw new SunoAiException('cookie is not valid.');
        }
        return PersonalInfoEntity::arrayToEntityV2($res);
    }

    /**
     * return generated music list.
     * @return WorkEntity []
     * @throws GuzzleException
     * @throws HttpException
     * @throws SunoAiException
     */
    public function getWorkList(string $userId, int $page = 1): array
    {
        $url = self::REMOTE_API_ADDRESS . '/api/works/getWorkList';
        $headers = [
            'cookie' => $this->cookie,
        ];
        $data = ['current_page' => $page, 'user_id' => $userId];
        $res = $this->request->post($url, json_encode($data), $headers);
        if ($res->getStatusCode() != 200) {
            throw new HttpException('remote server error.', $res->getStatusCode());
        }
        $res = json_decode($res->getBody()->getContents(), true);
        if (empty($res)) {
            throw new SunoAiException('cookie is not valid.');
        }
        return WorkEntity::arrayToEntities($res);
    }

    /**
     * return generate music available times.
     * @throws GuzzleException
     * @throws HttpException
     * @throws SunoAiException
     */
    public function getAvailableTimes(string $userId): int
    {
        $url = self::REMOTE_API_ADDRESS . '/api/user/getAvailableTimes?userId=' . $userId;
        $headers = [
            'cookie' => $this->cookie,
        ];
        $res = $this->request->get($url, $headers);
        if ($res->getStatusCode() != 200) {
            throw new HttpException('remote server error.', $res->getStatusCode());
        }
        $res = json_decode($res->getBody()->getContents(), true);
        if (empty($res)) {
            throw new SunoAiException('cookie is not valid.');
        }
        return $res['available_times'];
    }
}
