<?php
require_once('./app/config.php');

$recipes = Recipes::getExamples();

include('./tmpl/examples.php');
