<?php
require_once('../app/config.php');

/* GET:

limit int - upper bound of newest recipes ammount

 */

if(!empty($_GET['limit']))
  {
    $_GET['limit'] = (int)$_GET['limit'];
    echo json_encode(Recipes::getNew($_GET['limit']));
  }
else
  echo json_encode(Recipes::getNew());