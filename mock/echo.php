<?php
require_once('../app/config.php');

$data = file_get_contents('php://input');

if(!empty($data))
  {
    Db::b('insert into logs values(NULL,?)','s',array($data));
    echo $data;
  }