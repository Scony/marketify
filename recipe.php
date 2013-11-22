<?php
require_once('./app/config.php');

$recipe;

if(isset($_GET['name']))
  {
    $recipe = Recipes::getOne($_GET['name']);
    if($recipe != array())
      $recipe = $recipe[0];
    else
      unset($recipe);
  }

include('./tmpl/recipe.php');