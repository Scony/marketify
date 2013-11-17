<?php
require_once('../app/config.php');

$users = array('scony','alx','mateusz','fisz','patryk','root');
$in = file_get_contents('php://input');

if(!empty($in))
  {
    $arr = json_decode($in,true);

    if($arr['event']['tag'] != -4)
      {
	if($arr['event']['target'] == 'BROADCAST')
	  foreach($users as $user)
	    Db::b('insert into mock values(NULL,?,?,?)','ssi',array($user,$in,time()));
	else
	  {
	    $tmp = explode('@',$arr['event']['target']);
	    Db::b('insert into mock values(NULL,?,?,?)','ssi',array($tmp[0],$in,time()));
	  }
      }
    else
      {
	if(Db::n('select 1 from mock where target="'.$arr['user']['username'].'"'))
	  {
	    $re = Db::b('select * from mock where target=? order by id desc limit 1','s',array($arr['user']['username']));
	    echo $re[0]['json'];
	    Db::b('delete from mock where id=?','i',array($re[0]['id']));
	  }
      }
  }