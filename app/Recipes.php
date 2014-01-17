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
    return Db::b(
		 'select recipes.*, avg(rate) as rate from recipes left join rates on name=recipe group by name order by ts desc limit ?',
		 'i',
		 array($limit)
		 );
  }

  public static function getOne($name)
  {
    return Db::b(
		 'select recipes.*, avg(rate) as rate from recipes left join rates on name=recipe where name = ? group by name',
		 's',
		 array($name)
		 );
  }

  public static function getRandom($limit = 1)
  {
    return Db::b(
		 'select recipes.*, avg(rate) as rate from recipes left join rates on name=recipe group by name order by rand() limit ?',
		 'i',
		 array($limit)
		 );
  }

  public static function getMatching($phrase)
  {
    $phrase = '%'.$phrase.'%';
    return Db::b(
		 'select recipes.*, avg(rate) as rate from recipes left join rates on name=recipe group by name having name like ? order by coalesce(avg(rate),0) desc',
		 's',
		 array($phrase)
		 );
  }

  public static function getAll($start = 0, $count = 10)
  {
    return Db::b(
		 'select recipes.*, avg(rate) as rate from recipes left join rates on name=recipe group by name order by coalesce(avg(rate),0) desc limit ?, ?',
		 'ii',
		 array($start,$count)
		 );
  }

  public static function getExamples($start = 0, $count = 10)
  {
    return Db::b(
		 'select recipes.*, avg(rate) as rate from recipes left join rates on name=recipe where name like \'Y%\' group by name order by coalesce(avg(rate),0) desc limit ?, ?',
		 'ii',
		 array($start,$count)
		 );
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

  public static function rate($name, $rate)
  {
    if(in_array($rate,array(1,2,3,4,5)) && count(Db::b('select 1 from recipes where name = ?','s',array($name))))
      {
  	try
  	  {
  	    Db::b('insert into rates values(?,?,?)','sis',array($name,$rate,$_SERVER['REMOTE_ADDR']));
  	  }
  	catch(Exception $e) {}
      }
  }

}