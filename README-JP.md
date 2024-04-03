[English](README.md) | [中文](./README-CN.md) | 日本語

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

# 非公認 Suno PHP-SDK
これはPHPベースの非公式なSuno APIで、Sunoのすべてのインターフェースをサポートしています。

## インストール

```bash
composer require yunzhiyike/suno-ai-sdk
```

## メソッド
-[x] `generateMusic` > [記述: ジェネレート・ミュージック, 戻る, `uid` ]
-[x] `refreshSession` > [記述: セッション生存時間の延長, 戻る `PersonalInfoEntity` ]
-[x] `getUserInfoByEmail` > [記述: 電子メールによるユーザー情報の取得, 戻る `PersonalInfoEntity` ]
-[x] `getWorkList` > [記述: 生成された楽曲リストの取得, 戻る `WorkEntity[]` ]
-[x] `getAvailableTimes` > [記述: 利用可能回数取得, 戻る  `int` ]
