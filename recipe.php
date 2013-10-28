<?php
require_once('./app/config.php');

$recipe;

if(isset($_GET['id']))
  {
    $_GET['id'] = (int)$_GET['id'];
    $recipe = Recipes::getRecipe($_GET['id']);
    if($recipe != array())
      $recipe = $recipe[0];
    else
      unset($recipe);
  }

include('./tmpl/recipe.php');