<?php

declare(strict_types=1);
/**
 * This file is part of FirecmsExt VerificationCode.
 *
 * @link     https://www.klmis.cn
 * @document https://www.klmis.cn
 * @contact  zhimengxingyun@klmis.cn
 * @license  https://github.com/firecms-ext/verification-code/blob/master/LICENSE
 */
namespace FirecmsExt\VerificationCode;

use FirecmsExt\VerificationCode\Contracts\VerificationCodeServiceInterface;
use FirecmsExt\VerificationCode\Listeners\ValidatorFactoryResolvedListener;
use FirecmsExt\VerificationCode\Services\VerificationCodeService;

class ConfigProvider
{
    public function __invoke(): array
    {
        return [
            'dependencies' => [
                VerificationCodeServiceInterface::class => VerificationCodeService::class,
            ],
            'commands' => [
            ],
            'annotations' => [
                'scan' => [
                    'paths' => [
                        __DIR__,
                    ],
                ],
            ],
            'listeners' => [
                ValidatorFactoryResolvedListener::class,
            ],
            'publish' => [
                [
                    'id' => 'config',
                    'description' => 'The config for verification code.',
                    'source' => __DIR__ . '/../publish/verification_code.php',
                    'destination' => BASE_PATH . '/config/autoload/verification_code.php',
                ],
            ],
        ];
    }
}
