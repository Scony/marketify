<?php
require_once('./app/config.php');

$recipe;

if(isset($_GET['name']))
  {
    if(!empty($_GET['rate']))
      Recipes::rate($_GET['name'],$_GET['rate']);

    $recipe = Recipes::getOne($_GET['name']);
    if($recipe != array())
      $recipe = $recipe[0];
    else
      unset($recipe);
  }

include('./tmpl/recipe.php');