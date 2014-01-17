<?php
require_once('../app/config.php');

/* GET:

phrase string - search phrase

 */

if(!empty($_GET['phrase']))
  {
    echo json_encode(Recipes::getMatching($_GET['phrase']));
  }
else
  echo json_encode(array());