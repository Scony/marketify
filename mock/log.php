<?php
header("Content-Type: text/plain; charset=utf-8");
require_once('../app/config.php');

$re = Db::f('select * from mock where target=\'root\' order by ts');

foreach($re as $r)
{
  $json = json_decode($r['json'],true);
  echo date('H:i:s d.m.Y',$r['ts']).' <'.$json['user']['username'].'> '.$json['values']['text']['value']."\n";
}
