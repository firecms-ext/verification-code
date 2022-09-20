# firecms-ext/verification-code

```shell
# 验证码 依赖安装
composer require firecms-ext/verification-code
# 发布配置
php bin/hyperf.php vendor:publish firecms-ext/verification_code

# 加密解密 依赖安装
composer require firecms-ext/crypt
# 发布配置
php bin/hyperf.php vendor:publish firecms-ext/crypt
# 生成密钥
php bin/hyperf.php gen:app-key
```
