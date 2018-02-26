<?php 
// mysql 常见错误
select host, user,password from user;
//更改数据库密码
UPDATE user SET Password=PASSWORD('newpassword') where USER='root';
skip_grant_tables
1045  权限问题
GRANT ALL PRIVILEGES ON *.* TO 'c65_pangyou'@'%'   IDENTIFIED BY 'admin888' WITH GRANT OPTION;
flush privileges;
1060  可能3306端口没开,可能防火墙没关
一,通过设置权限
GRANT ALL PRIVILEGES ON *.* TO 'root'@'192.168.1.35' IDENTIFIED BY 'admin888' WITH GRANT OPTION;
GRANT ALL PRIVILEGES ON *.* TO 'root'@'%'WITH GRANT OPTION; //任何远程主机都可以访问数据库
flush privileges;
二,通过修改表解决
update user set host = '%' where user = 'root' and host='localhost';
select host, user,password from user;
三, 3306端口 未对外开放
10038 
查一下你的MYSQL用户表里, 是否允许远程连接
1、授权
mysql>grant all privileges on *.*  to  'root'@'%'  identified by 'admin888'  with grant option;
mysql>flush privileges;
2、修改/etc/mysql/my.conf
找到bind-address = 127.0.0.1这一行
改为bind-address = 0.0.0.0即可
3,防火墙未清空
iptables -F
iptables -X
iptables -Z



四,不能(Cant not) connect to local MySQL server through socket 问题解决  
mysql 数据库的权限问题：chmod 777 -r /var/lib/mysql;

注意数据库用户：chown -R mysql:mysql /var/lib/mysql


五,MySQL Daemon failed to start.

六,Too many arguments (first extra is 'status').
mysqld_safe --user=mysql &












