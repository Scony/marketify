<?php
require_once('../app/config.php');

$users = array(
	       'scony',
	       'alx',
	       'mateusz',
	       'fisz',
	       'patryk',
	       'root',
	       'alxio',
	       'test1',
	       'test2',
	       'test3',
	       'test4',
	       'test5',
	       'test6',
	       'test7',
	       'test8',
	       'test9',
	       );
$in = file_get_contents('php://input');

if(!empty($in))
  {
    $arr = json_decode($in,true);
    $recipe = $arr['user']['recipe'];
    $group = $arr['user']['group'];
    $user = $arr['user']['username'];

    if($arr['event']['tag'] != -4)
      {
	if($arr['event']['target'] == 'BROADCAST')
	  foreach($users as $user)
	    Db::b('insert into mock values(NULL,?,?,?,?,?)','ssssi',array($recipe,$group,$user,$in,time()));
	else
	  {
	    Db::b('insert into mock values(NULL,?,?,?,?,?)','ssssi',array($recipe,$group,$arr['event']['target'],$in,time()));
	  }
      }
    else
      {
	if(Db::n('select 1 from mock where target="'.$user.'" and team="'.$group.'" and recipe="'.$recipe.'"'))
	  {
	    $re = Db::b('select * from mock where target=? and team=? and recipe=? order by id desc limit 1','sss',array($user,$group,$recipe));
	    echo $re[0]['json'];
	    Db::b('delete from mock where id=?','i',array($re[0]['id']));
	  }
      }
  }