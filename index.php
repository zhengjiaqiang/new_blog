<?php 	
header('content-type:text/html;charset=utf-8');
//开始错误提示
define('APP_DEBUG',TRUE);


define('APP_PATH','./Apps/');      //定义APP_PATH常量 下面Thinkphp读取 自动形成文件夹

require('./ThinkPHP/ThinkPHP.php');

  
// ThinkPHP 就是已经建好的一个类,然后通过 后面加phinfo的利用 /Apps里面的home文件夹/controller里面的类的前面/类里面的方法名/
 ?>