<?php
require_once '../vendor/autoload.php';

use submit\Baidu;

$baidu = new Baidu([
    'target' => 'www.hujinxun.com',
    'token'  => '8CldvmfinYx2H5lL',
]);

var_dump($baidu->submit('https://www.hujinxun.com/fastnews/detail-57975.html'));
echo $baidu->remain();
