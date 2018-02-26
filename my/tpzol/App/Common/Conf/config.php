<?php
return array(
	//'配置项'=>'配置值'
	 /* 数据库设置 */
    'DB_TYPE'               =>  'mysql',     // 数据库类型
    'DB_HOST'               =>  '127.0.0.1', // 服务器地址
    'DB_NAME'               =>  'c65_pangyou',          // 数据库名
    'DB_USER'               =>  'c65_pangyou',      // 用户名
    'DB_PWD'                =>  'admin888',          // 密码
    'DB_PORT'               =>  '3306',        // 端口
    'DB_PREFIX'             =>  'zol_',    // 数据库表前缀
    'DB_CHARSET'            =>  'utf8',      // 数据库编码默认采用utf8 (框架已设置,可以不写)
    'DB_PARAMS'          	=>  array(), // 数据库连接参数  (框架有设置)
    'TMPL_TEMPLATE_SUFFIX'  =>'.php' ,  // 默认模板文件后缀
    'TMPL_L_DELIM'          =>  '{{',   // 模板引擎普通标签开始标记
    'TMPL_R_DELIM'          =>  '}}',    // 结束符
);