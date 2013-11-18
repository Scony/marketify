<?php

class Recipes
{

  public static function getNew($limit = 10)
  {
    $limit = (int)$limit;
    return Db::b('select * from recipes order by add_ts desc limit ?','i',array($limit));
  }

  public static function getRecipe($id)
  {
    return Db::b('select * from recipes where id = ?','i',array($id));
  }

  public static function getRandom()
  {
    $re = Db::f('select * from recipes order by rand() limit 1');
    return count($re) ? $re[0] : array();
  }

  public static function getAll()
  {
    return Db::f('select * from recipes order by add_ts desc');
  }

  public static function addDummy()
  {
    $rnd = rand(1,10000);
    Db::b('insert into recipes values (NULL,MD5(?),MD5(MD5(?)),MD5(MD5(MD5(\'xxx\'))),?,MD5(MD5(MD5(MD5(?)))))','iiii',array($rnd,$rnd,time(),$rnd));
  }

  public static function upload($name,$description,$code)
  {
    file_put_contents('./sh/'.$name.'.java',$code);
    exec('cd sh && ./build.sh '.$name,$out,$re);
    if(!$re)			/* success */
      {
	Db::b('insert into recipes values (NULL,?,?,?,?,"")','sssi',array($name,$description,$code,time()));
	$ii = Db::ii();
	Db::b('update recipes set url = ? where id = ?','si',array(Settings::root.'jar/recipe'.$ii.'.jar',$ii));
	
	exec('mv sh/recipe.jar jar/recipe'.$ii.'.jar');

	return $ii;
      }
    else			/* failure */
      unlink('./sh/'.$name.'.java');

    return -1;
  }

}