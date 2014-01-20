<?php
require_once('./app/config.php');

if(!empty($_POST['description']) && !empty($_POST['code']))
  {
    $re = Recipes::upload($_POST['description'],$_POST['code'],!empty($_POST['forked']) ? $_POST['forked'] : NULL);
    if(!is_array($re))
      header('Location: recipe.php?name='.$re);
    else
      {
	$failure = $re;
	$fdescription = htmlspecialchars($_POST['description']);
	$fcode = htmlspecialchars($_POST['code']);
	if(!empty($_POST['forked']))
	  $fname = $_POST['forked'];
      }
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
  }

include('./tmpl/upload.php');