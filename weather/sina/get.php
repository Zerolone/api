<?php
$city=@$_GET['city'];
//如果城市为空， 则调用ip接口获取当前ip的城市
if($city==''){
  $iparr = file_get_contents('http://int.dpool.sina.com.cn/iplookup/iplookup.php?format=json');
  $iparr = json_decode($iparr);
  $city  = $iparr->city;
  //编码转换一下
  $city = iconv('utf-8', 'gbk//IGNORE',$city);
}
$url = 'http://php.weather.sina.com.cn/xml.php?city='.$city.'&password=DJOYnieT8234jlsK&day=0';
$xml=simplexml_load_file($url);

$xmlarr = (array)$xml->Weather;
var_dump($xmlarr);
?>