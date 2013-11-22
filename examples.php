<?php
require_once('./app/config.php');

$recipes = Recipes::getExamples();

include('./tmpl/header.php');
include('./tmpl/examples.php');
include('./tmpl/footer.php');