<?php
require_once('./app/config.php');

if(!empty($_POST['name']) && !empty($_POST['description']) && !empty($_POST['code']))
  var_dump(Recipes::upload($_POST['name'],$_POST['description'],$_POST['code']));

?>
<form action="" method="POST">
  <input type="text" name="name"><br>
  <input type="text" name="description"><br>
  <textarea name="code"></textarea><br>
  <input type="submit">
</form>