<?php
require_once('./app/config.php');

$failure = true;

if(!empty($_POST['name']) && !empty($_POST['description']) && !empty($_POST['code']))
  {
    $re = Recipes::upload($_POST['name'],$_POST['description'],$_POST['code']);
    if($re >= 0)
      header('Location: recipe.php?id='.$re);
  }
else
  unset($failure);

include('./tmpl/upload.php');