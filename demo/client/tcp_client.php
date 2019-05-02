<?php

//必须连接 swoole tcp服务
//SWOOLE_SOCK_TCP 是swoole自带的一个系统常量 创建tcp socket
$client = new Swoole_client(SWOOLE_SOCK_TCP);

if (!$client->connect("127.0.0.1",9502)){
    echo "连接失败";
    exit;
}

// php cli常量
fwrite(STDOUT,"请输入消息");
$msg = trim(fgets(STDOUT));

//发送消息给 tcp server服务器
$client->send($msg);

//接受来自server 的数据
$result = $client->recv();
echo $result;