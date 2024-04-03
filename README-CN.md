[English](README.md) | 中文 | [日本語](./README-JP.md)

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

# 非官方 Suno PHP-SDK
这是一个基于 PHP 的非官方 Suno API；它为所有 Suno 接口提供支持。

## 安装 🔨

```bash
composer require yunzhiyike/suno-ai-sdk
```

## 方法 📖

- [x] `generateMusic` [说明： 生成音乐， 返回 `uid` ]
- [x] `refreshSession` [说明： 延长会话时间, 返回 `PersonalInfoEntity` ]
- [x] `getUserInfoByEmail` [说明： 通过电子邮件获取用户信息, 返回 `PersonalInfoEntity` ]
- [x] `getWorkList` [说明：获取生成的音乐列表, 返回 `WorkEntity[]` ]
- [x] `getAvailableTimes` [说明： 获取可用次数, 返回  `int` ]


## Cookie提取 🚗

> 在此之前你需要先登录！

![img_1.png](img_1.png)


## 示例 🌲
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
