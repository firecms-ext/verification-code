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
return [
    // 是否启用验证
    'enable' => true,
    // 验证码位数
    'length' => 5,
    // 验证码字符集合
    'codeSet' => '2345678abcdefhijkmnpqrstuvwxyzABCDEFGHJKLMNPQRTUVWXY',
    // 验证码过期时间
    'expire' => 1800,
    // 是否使用中文验证码
    'useZh' => false,
    // 是否使用数字验证码
    'userNum' => true,
];
