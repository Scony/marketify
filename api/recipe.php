<?php
require_once('../app/config.php');

/* GET:

id int - id of recipe

 */

if(!empty($_GET['id']))
  {
    $_GET['id'] = (int)$_GET['id'];
    echo json_encode(Recipes::getRecipe($_GET['id']));
  }
else
  echo json_encode(array());