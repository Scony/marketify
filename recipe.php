<?php
require_once('./app/config.php');

$recipe;

if(isset($_GET['name']))
  {
    if(!empty($_GET['rate']))
      Recipes::rate($_GET['name'],$_GET['rate']);

    if(!empty($_POST['comment']))
      if(!empty($_POST['name']))
	Comments::insert($_GET['name'],$_POST['comment'],$_POST['name']);
      else
	Comments::insert($_GET['name'],$_POST['comment']);

    $recipe = Recipes::getOne($_GET['name']);
    if($recipe != array())
      {
	$recipe = Comments::addComments($recipe);
	$recipe = $recipe[0];
      }
    else
      unset($recipe);
  }

include('./tmpl/recipe.php');