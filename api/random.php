<?php
require_once('../app/config.php');

echo json_encode(Recipes::getRandom());