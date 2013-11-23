<?php
require_once('./app/config.php');

$re = Db::f('select count(*) as cnt from recipes');
$rc = $re[0]['cnt'];
$rpp = 10;
$pc = ceil((float)$rc/$rpp);

$p = !empty($_GET['p']) ? (int)$_GET['p'] : 1;
if($p < 0 || $p > $pc)
  $p = 1;

$recipes = Recipes::getAll(($p-1)*$rpp,$rpp);

include('./tmpl/header.php');
include('./tmpl/explore.php');
include('./tmpl/footer.php');