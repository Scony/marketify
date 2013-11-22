<?php

class Recipes
{

  public static function isNameAvailable($name)
  {
    /* todo: uncomment (make excuse if staff) */
    /* if(preg_match('/^Y/',$name)) */
    /*   return false; */

    $re = Db::b('select 1 from recipes where name = ?','s',array($name));

    return count($re) ? false : true;
  }

  public static function exists($name)
  {
    $re = Db::b('select 1 from recipes where name = ?','s',array($name));

    return (bool)count($re);
  }

  public static function getNew($limit = 10)
  {
    $limit = (int)$limit;
    return Db::b('select * from recipes order by ts desc limit ?','i',array($limit));
  }

  public static function getOne($name)
  {
    return Db::b('select * from recipes where name = ?','s',array($name));
  }

  public static function getRandom($limit = 1)
  {
    $re = Db::b('select * from recipes order by rand() limit ?','i',array($limit));
    return count($re) ? $re[0] : array();
  }

  public static function getAll($start = 0, $count = 10)
  {
    return Db::b('select * from recipes order by ts desc limit ?, ?','ii',array($start,$count));
  }

  public static function getExamples($start = 0, $count = 10)
  {
    return Db::b('select * from recipes where name like \'Y%\' order by ts desc limit ?, ?','ii',array($start,$count));
  }

  public static function upload($description, $code, $forked = NULL)
  {
    $name = Java::getClassName($code);
    if(!self::isNameAvailable($name))
      return -1;

    file_put_contents('./sh/'.$name.'.java',$code);
    exec('cd sh && ./build.sh '.$name,$out,$re);
    if(!$re)			/* success */
      {
	Db::b('insert into recipes values (?,?,?,?,?,?)','ssssis',array($name,$forked,$description,$code,time(),Settings::root.'jar/'.$name.'.jar'));
	
	exec('mv sh/recipe.jar jar/'.$name.'.jar');

	return $name;
      }
    else			/* failure */
      unlink('./sh/'.$name.'.java');

    return -1;
  }

}