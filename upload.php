<?php
require_once('./app/config.php');

$failure = true;

if(!empty($_POST['description']) && !empty($_POST['code']))
  {
    $re = Recipes::upload($_POST['description'],$_POST['code'],!empty($_POST['forked']) ? $_POST['forked'] : NULL);
    if($re != -1)
      header('Location: recipe.php?name='.$re);
  }
else
  {
    if(!empty($_POST['fname']) && !empty($_POST['nname']) && Recipes::exists($_POST['fname']) && Recipes::isNameAvailable($_POST['nname']))
      {
	$base = Recipes::getOne($_POST['fname']);

	$fname = $_POST['fname'];
	$fdescription = htmlspecialchars($base[0]['description']);
	$fcode = htmlspecialchars(str_replace($_POST['fname'],$_POST['nname'],$base[0]['code']));
      }

    unset($failure);
  }

include('./tmpl/upload.php');