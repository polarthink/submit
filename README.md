提交搜索引擎收录

+ [x] 百度
+ [ ] 谷歌
+ [ ] 360搜索
+ [ ] 搜狗

### 安装
```
composer require polarthink/submit
```

### 创建一个提交对象
```php
require_once './vendor/autoload.php';

use submit\Baidu;

$baidu = new Baidu([
    'target' => 'your domain',
    'token'  => 'your token',
]);

$baidu->submit('http://xxx...');
```
### 也支持链式调用
```php
require_once './vendor/autoload.php';

use submit\Baidu;

$baidu = new Baidu;

$baidu->target('your domain')->token('your token')->submit('your url');
```
### 提交结果
```php
use submit\Types;

$res = $object->submit($url);
switch ($res) {
    case Types::SUCCESS:
        echo '成功';
        break;
    case Types::ERROR_REQUEST:
        echo '请求错误';
        break;
    case Types::ERROR_RESPONSE;
        echo '返回错误';
        break;
    case Types::ERROR_SUBMIT:
        echo '提交错误';
        break;
}
```

