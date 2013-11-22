<?php
require_once('./app/config.php');

$failure = true;

if(!empty($_GET['name']) && Recipes::exists($_GET['name']))
  {
    $name = $_GET['name'];
    unset($failure);
  }

include('./tmpl/fork.php');