<?php
//请将urlsabc.php和urls123.php文件设置为777或755权限
$config = array(
	'title'        => "回天短网址",                      // 网站标题
	'site'         => "https://s.huitianyouwo.com",      // 短网址域名
	'blackList'    => array('*.huitianyouwo.com'),       // 不允许缩短的域名，单个匹配，*表示所有的二级域名
	'use_rewrite'  => 1,                                 // 是否使用伪静态,1使用,2关闭
	'type'         => 'abc',                             // 生成的短网址类型：abc表示字母数字混合，123为纯数字累加方式
	'count'        => 4,                                 // 生成的短网址位数
);
