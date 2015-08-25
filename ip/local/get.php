<?php
/*
通过QQWry获取IP地址等信息
根据参数返回相应的值
*/
require 'QQWry.php';

//未获取IP的话，获取客户端IP
$IP = @$_GET['ip'];
if($IP=='')$IP=QQWry::GetIP();

$info = new QQWry($IP);

$return['country']=$info->Country;
$return['local']=$info->Local;

//返回方式
$mode= @$_GET['mode'];
if($mode=='')$mode='txt';

if($mode=='txt'){
  $strReturn = $info->Country .' '. $info->Local;
}

if($mode=='json'){
  $strReturn = json_encode($return);
}

if($mode=='jstr'){
  $strReturn = 'var remote_ip_info ='.json_encode($return).';';
}

if($mode=='jsfun'){
  $strReturn = 'ipcallback('.json_encode($return).');'; 
}

echo $strReturn;
?>