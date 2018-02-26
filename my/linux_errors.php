<?php 
#kj24Xk9JSv@
bmz20170104
// linux 常见错误
// 常用指令
// 查看具体信息
cat -n ./error.log
// 检查内容
grep -i 'bmz_test'  postman-2016-12-25.log
// 检查包含 bmz_test 的文件,并且把该文件名打印出来   .表示当前路径 /表示根目录
find .|xargs grep -ri "bmz_test" -l 
// 检查是否安装了MySQL组件。
rpm -qa | grep -i mysql
chkconfig --list | grep -i mysql
netstat -tpnul  //查看运行端口

// 改变 /tmp/a 目录及其下所有文件所有者为lisi ,所属组为lisi
chown -R www:www /www
// 查找文件名为2.php的文件(注意空格)
find / -name mysql
whereis mysql
which mysqld
//查看所有用户
cat /etc/passwd |cut -f 1 -d :

nginx: [emerg] socket() [::]:80 failed (97: Address family not supported by protocol)
解决办法：
vi /etc/nginx/conf.d/default.conf
将
listen       80 default_server;
listen       [::]:80 default_server;
改为：
listen       80;
#listen       [::]:80 default_server;


// jenkins
cd /data/www/message
chown -R www:www ./
git pull origin master
chown -R www:www ./


