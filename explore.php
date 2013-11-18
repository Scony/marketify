<?php
require_once('./app/config.php');

$recipes = Recipes::getAll();

include('./tmpl/header.php');
include('./tmpl/explore.php');
include('./tmpl/footer.php');