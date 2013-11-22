<?php
require_once('../app/config.php');

/* GET:

name string - name of recipe

 */

if(!empty($_GET['name']))
  {
    echo json_encode(Recipes::getOne($_GET['name']));
  }
else
  echo json_encode(array());