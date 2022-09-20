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
namespace FirecmsExt\VerificationCode\Contracts;

interface VerificationCodeServiceInterface
{
    public function create(array $options = []);

    public function check(string $code, string $key);
}
