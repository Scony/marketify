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

  public static function addDummy()
  {
    $rnd = rand(1,10000);
    Db::b('insert into recipes values (NULL,MD5(?),MD5(MD5(?)),?,MD5(MD5(MD5(?))))','iiii',array($rnd,$rnd,time(),$rnd));
  }

}