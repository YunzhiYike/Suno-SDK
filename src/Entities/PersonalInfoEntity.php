<?php

declare(strict_types=1);
/**
 * This file is part of Yunzhiyike
 */

namespace Yunzhiyike\SunoAiSdk\Entities;

class PersonalInfoEntity
{
    protected string $name;

    protected string $email;

    protected string $image;

    protected string $expires;

    protected string $user_id;

    public function getUserId(): string
    {
        return $this->user_id;
    }

    public function setUserId(string $user_id): PersonalInfoEntity
    {
        $this->user_id = $user_id;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): PersonalInfoEntity
    {
        $this->name = $name;
        return $this;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): PersonalInfoEntity
    {
        $this->email = $email;
        return $this;
    }

    public function getImage(): string
    {
        return $this->image;
    }

    public function setImage(string $image): PersonalInfoEntity
    {
        $this->image = $image;
        return $this;
    }

    public function getExpires(): string
    {
        return $this->expires;
    }

    public function setExpires(string $expires): PersonalInfoEntity
    {
        $this->expires = $expires;
        return $this;
    }

    public static function arrayToEntity(array $data): PersonalInfoEntity
    {
        $entity = new PersonalInfoEntity();
        return $entity->setEmail($data['user']['email'])
            ->setName($data['user']['name'])
            ->setImage($data['user']['image'])
            ->setUserId('')
            ->setExpires(date('Y-m-d H:i:s', strtotime($data['expires'])));
    }

    public static function arrayToEntityV2(array $data): PersonalInfoEntity
    {
        $entity = new PersonalInfoEntity();
        return $entity->setEmail($data['email'])
            ->setName($data['name'])
            ->setImage($data['image'])
            ->setUserId($data['user_id'])
            ->setExpires('');
    }
}
