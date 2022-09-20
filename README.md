# firecms-ext/verification-code

```shell
# 验证码 依赖安装
composer require firecms-ext/verification-code
# 发布配置
php bin/hyperf.php vendor:publish firecms-ext/verification-code

# 加密解密 依赖安装
composer require firecms-ext/crypt
# 发布配置
php bin/hyperf.php vendor:publish firecms-ext/crypt
# 生成密钥
php bin/hyperf.php gen:app-key
```

## 发布 Session 配置

> Session 组件的配置储存于 config/autoload/session.php 文件中，如文件不存在，您可通过 php bin/hyperf.php vendor:publish
> hyperf/session 命令来将 Session 组件的配置文件发布到 Skeleton 去。

```shell
php bin/hyperf.php vendor:publish hyperf/session
```

## 配置 Session 中间件

> 在使用 Session 之前，您需要将 Hyperf\Session\Middleware\SessionMiddleware 中间件配置为 HTTP Server
> 的全局中间件，这样组件才能介入到请求流程进行对应的处理，config/autoload/middlewares.php 配置文件示例如下：

```php
<?php

return [
    // 这里的 http 对应默认的 server name，如您需要在其它 server 上使用 Session，需要对应的配置全局中间件
    'http' => [
        \Hyperf\Session\Middleware\SessionMiddleware::class,
    ],
];
```

## 表单验证

```php
<?php

use Hyperf\Validation\Request\FormRequest;

class VerificationCodeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'captcha_code' => 'required|captcha:captcha_key',
        ];
    }

    public function messages() : array{
         return [
         'captcha_code.captcha'=>'验证码 无效'
        ];
    }
}

```

> **注意：** 
> captcha_code 验证码；
> captcha_key 密文；可选，默认读取 属性名称 + _key
> 