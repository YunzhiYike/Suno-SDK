English | [中文](./README-CN.md) | [日本語](./README-JP.md)

<p align="center"><a href="https://sunoai.ai/" target="_blank" rel="noopener noreferrer"><img width="100" src="img.png" alt="suno Logo"></a></p>

<p align="center">
  <a href="https://github.com/YunzhiYike/Suno-SDK/releases"><img src="https://poser.pugx.org/yunzhiyike/suno-ai-sdk/v/stable" alt="Stable Version"></a>
  <a href="https://www.php.net"><img src="https://img.shields.io/badge/php-%3E=8.0-brightgreen.svg?maxAge=2592000" alt="Php Version"></a>
  <a href="https://github.com/YunzhiYike/Suno-SDK/main/LICENSE"><img src="https://img.shields.io/github/license/yunzhiyike/suno-ai-sdk.svg" alt="dtm-client License"></a>
</p>
<p align="center">
  <a href="https://packagist.org/packages/yunzhiyike/suno-ai-sdk"><img src="https://poser.pugx.org/yunzhiyike/suno-ai-sdk/downloads" alt="Total Downloads"></a>
  <a href="https://packagist.org/packages/yunzhiyike/suno-ai-sdk"><img src="https://poser.pugx.org/yunzhiyike/suno-ai-sdk/d/monthly" alt="Monthly Downloads"></a>
</p>

# Unofficial Suno PHP-SDK
This is an unofficial Suno API based on PHP; it provides support for all Suno interfaces.

## Installation 🔨

```bash
composer require yunzhiyike/suno-ai-sdk
```

## Methods 📖

- [x] `generateMusic`  [description: generate music, return `uid` ]
- [x] `refreshSession` [description: Increase session survival time, return `PersonalInfoEntity` ]
- [x] `getUserInfoByEmail` [description: Obtaining user information via e-mail, return `PersonalInfoEntity` ]
- [x] `getWorkList` [description: Obtaining generated music list, return `WorkEntity[]` ]
- [x] `getAvailableTimes` [description: Getting the number of times available, return  `int` ]


## Cookie Extraction 🚗

> Before that you need to login!

![img_1.png](img_1.png)


## Demo 🌲
```php
<?php

declare(strict_types=1);
/**
 * This file is part of Yunzhiyike
 */

namespace Yunzhiyike\Test;

use PHPUnit\Framework\TestCase;
use Yunzhiyike\SunoAiSdk\SunoAi;

/**
 * @internal
 * @coversNothing
 */
class SunoAiTest extends TestCase
{
    public function test()
    {
        $cookie = 'your suno-ai cookie';
        $timeOut = 60;
        $sunoApi = new SunoAi($cookie, $timeOut);
        $info = $sunoApi->refreshSession();
        $userInfo = $sunoApi->getUserInfoByEmail($info->getEmail());
        $page = 1;
        $res = $sunoApi->getWorkList($userInfo->getUserId(), $page);
        foreach ($res as $r) {
            var_dump($r);
        }
        var_dump($sunoApi->getAvailableTimes($userInfo->getUserId()));
        var_dump($sunoApi->generateMusic($userInfo->getUserId(), 'music title', 'music text', 'music tags', true));
    }
}

```
