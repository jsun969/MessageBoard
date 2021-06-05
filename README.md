# MessageBoard
A simple message board with PHP

先创建一个名为**message**的数据表
```sql
CREATE TABLE `message` (
    `id` int NOT NULL,
    `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `ip` varchar(150) DEFAULT NULL,
    `is_anonymous` tinyint(1) NOT NULL,
    `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
    `email` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
    `message` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
```

使用前需自行添加**config.php**
```php
<?php
// 网站标题
const title = "荆棘留言板";
// 数据库地址
const db_host = "233.233.233.233";
// 数据库名
const db_name = "name";
// 数据库用户名
const db_username = "username";
// 数据库密码
const db_password = "password";
// 数据库端口
const db_port = 3306;
```
