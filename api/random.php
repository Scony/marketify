<?php
require_once('../app/config.php');

echo json_encode(Comments::addComments(Recipes::getRandom()));