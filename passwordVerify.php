<?php

// 用户注册时：生成密码哈希
$password = 'UserPlainPassword123';
$hash = password_hash($password, PASSWORD_DEFAULT);

// 存入数据库
echo "Password hash: " . $hash . PHP_EOL;


// 用户登录时：验证密码
$inputPassword = 'UserPlainPassword123';

if (password_verify($inputPassword, $hash)) {
    echo "Password correct";
} else {
    echo "Password incorrect";
}
