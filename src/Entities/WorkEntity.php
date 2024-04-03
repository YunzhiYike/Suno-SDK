<?php

declare(strict_types=1);
/**
 * This file is part of Yunzhiyike
 */

namespace Yunzhiyike\SunoAiSdk\Entities;

class WorkEntity
{
    protected string $createdAt;

    protected string $id;

    protected string $inputTags;

    protected string $inputText;

    protected bool $isDelete;

    protected bool $isOrigin;

    protected bool $isPublic;

    protected string $currentLanguage;

    protected string $originLanguage;

    protected array $outputAudioUrls;

    protected array $outputImageUrls;

    protected int $status;

    protected string $taskId;

    protected string $uid;

    protected string $updatedAt;

    protected string $userAvatarUrl;

    protected string $userId;

    protected string $userName;

    protected string $inputTitle;

    public function getInputTitle(): string
    {
        return $this->inputTitle;
    }

    public function setInputTitle(string $inputTitle): WorkEntity
    {
        $this->inputTitle = $inputTitle;
        return $this;
    }

    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }

    public function setCreatedAt(string $createdAt): WorkEntity
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(string $id): WorkEntity
    {
        $this->id = $id;
        return $this;
    }

    public function getInputTags(): string
    {
        return $this->inputTags;
    }

    public function setInputTags(string $inputTags): WorkEntity
    {
        $this->inputTags = $inputTags;
        return $this;
    }

    public function getInputText(): string
    {
        return $this->inputText;
    }

    public function setInputText(string $inputText): WorkEntity
    {
        $this->inputText = $inputText;
        return $this;
    }

    public function isDelete(): bool
    {
        return $this->isDelete;
    }

    public function setIsDelete(bool $isDelete): WorkEntity
    {
        $this->isDelete = $isDelete;
        return $this;
    }

    public function isOrigin(): bool
    {
        return $this->isOrigin;
    }

    public function setIsOrigin(bool $isOrigin): WorkEntity
    {
        $this->isOrigin = $isOrigin;
        return $this;
    }

    public function isPublic(): bool
    {
        return $this->isPublic;
    }

    public function setIsPublic(bool $isPublic): WorkEntity
    {
        $this->isPublic = $isPublic;
        return $this;
    }

    public function getCurrentLanguage(): string
    {
        return $this->currentLanguage;
    }

    public function setCurrentLanguage(string $currentLanguage): WorkEntity
    {
        $this->currentLanguage = $currentLanguage;
        return $this;
    }

    public function getOriginLanguage(): string
    {
        return $this->originLanguage;
    }

    public function setOriginLanguage(string $originLanguage): WorkEntity
    {
        $this->originLanguage = $originLanguage;
        return $this;
    }

    public function getOutputAudioUrls(): array
    {
        return $this->outputAudioUrls;
    }

    public function setOutputAudioUrls(array $outputAudioUrls): WorkEntity
    {
        $this->outputAudioUrls = $outputAudioUrls;
        return $this;
    }

    public function getOutputImageUrls(): array
    {
        return $this->outputImageUrls;
    }

    public function setOutputImageUrls(array $outputImageUrls): WorkEntity
    {
        $this->outputImageUrls = $outputImageUrls;
        return $this;
    }

    public function getStatus(): int
    {
        return $this->status;
    }

    public function setStatus(int $status): WorkEntity
    {
        $this->status = $status;
        return $this;
    }

    public function getTaskId(): string
    {
        return $this->taskId;
    }

    public function setTaskId(string $taskId): WorkEntity
    {
        $this->taskId = $taskId;
        return $this;
    }

    public function getUid(): string
    {
        return $this->uid;
    }

    public function setUid(string $uid): WorkEntity
    {
        $this->uid = $uid;
        return $this;
    }

    public function getUpdatedAt(): string
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(string $updatedAt): WorkEntity
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    public function getUserAvatarUrl(): string
    {
        return $this->userAvatarUrl;
    }

    public function setUserAvatarUrl(string $userAvatarUrl): WorkEntity
    {
        $this->userAvatarUrl = $userAvatarUrl;
        return $this;
    }

    public function getUserId(): string
    {
        return $this->userId;
    }

    public function setUserId(string $userId): WorkEntity
    {
        $this->userId = $userId;
        return $this;
    }

    public function getUserName(): string
    {
        return $this->userName;
    }

    public function setUserName(string $userName): WorkEntity
    {
        $this->userName = $userName;
        return $this;
    }

    public static function arrayToEntities(array $dataList): array
    {
        $entities = [];
        foreach ($dataList as $data) {
            $entity = new WorkEntity();
            $entity->setCreatedAt(date('Y-m-d H:i:s', strtotime($data['created_at'])))
                ->setCurrentLanguage($data['current_language'])
                ->setId($data['id'])
                ->setInputTags($data['input_tags'])
                ->setInputText($data['input_text'])
                ->setInputTitle($data['input_title'])
                ->setIsDelete($data['is_delete'])
                ->setIsOrigin($data['is_origin'])
                ->setIsPublic($data['is_public'])
                ->setOriginLanguage($data['origin_language'])
                ->setOutputAudioUrls($data['output_audio_url'])
                ->setOutputImageUrls($data['output_image_url'])
                ->setStatus($data['status'])
                ->setTaskId($data['task_id'])
                ->setUid($data['uid'])
                ->setUpdatedAt(date('Y-m-d H:i:s', strtotime($data['updated_at'])))
                ->setUserAvatarUrl($data['user_avatar'])
                ->setUserId($data['user_id'])
                ->setUserName($data['user_name']);
            $entities[] = $entity;
        }
        return $entities;
    }
}
