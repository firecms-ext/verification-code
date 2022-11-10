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
namespace FirecmsExt\VerificationCode\Listeners;

use FirecmsExt\VerificationCode\Contracts\VerificationCodeServiceInterface;
use Hyperf\Event\Contract\ListenerInterface;
use Hyperf\Utils\ApplicationContext;
use Hyperf\Validation\Contract\ValidatorFactoryInterface;
use Hyperf\Validation\Event\ValidatorFactoryResolved;
use Hyperf\Validation\Validator;

class ValidatorFactoryResolvedListener implements ListenerInterface
{
    public function listen(): array
    {
        return [
            ValidatorFactoryResolved::class,
        ];
    }

    public function process(object $event): void
    {
        /** @var ValidatorFactoryInterface $validatorFactory */
        $validatorFactory = $event->validatorFactory;

        $validatorFactory->extend('code', function ($attribute, $value, $parameters, $validator) {
            /* @var Validator $validator */

            $key = reset($parameters);
            $key = $key ?: rtrim($attribute, '_code') . '_key';
            try {
                return ApplicationContext::getContainer()
                    ->get(VerificationCodeServiceInterface::class)
                    ->check($value, $validator->getData()[$key]);
            } catch (\Exception $e) {
                $validator->setCustomMessages([
                    'code' => __('message.' . $e->getMessage()),
                ]);
            }
            return false;
        });

        $validatorFactory->replacer('code', function ($message, $attribute, $rule, $parameters) {
            return str_replace(':code', $attribute, $message);
        });
    }
}
