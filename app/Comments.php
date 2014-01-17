<?php

class Comments
{

  public static function insert($recipe,$comment,$name = NULL)
  {
    Db::b('insert into comments values(NULL,?,?,?,?)','sssi',array($recipe,$comment,$name,time()));
  }

  public static function addComments($recipeArray)
  {
    for($i = 0; $i < count($recipeArray); $i++)
      $recipeArray[$i]['comments'] = Db::b('select id, comment, coalesce(name,\'Guest\') as name, ts from comments where recipe=? order by ts desc','s',array($recipeArray[$i]['name']));

    return $recipeArray;
  }

}