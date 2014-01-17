<?php
require_once('../app/config.php');

/* GET:

page int - page number
limit int - recipes limit per page

 */

$limit = !empty($_GET['limit']) ? (int)$_GET['limit'] > 0 ? (int)$_GET['limit'] : 10 : 10;

if(!empty($_GET['page']))
  {
    $page = (int)$_GET['page'];
    echo json_encode(Recipes::getAll(($page-1<=0 ? 0 : $page-1)*$limit,$limit));
  }
else
  echo json_encode(Recipes::getAll(0,$limit));
