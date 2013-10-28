<?php
require_once('./app/config.php');

if(!empty($_POST['name']) && !empty($_POST['description']) && !empty($_POST['code']))
  var_dump(Recipes::upload($_POST['name'],$_POST['description'],$_POST['code']));

?>
<form action="" method="POST">
  Class name:<br>
  <input type="text" name="name"><br>
  Description:<br>
  <input type="text" name="description"><br>
  Recipe code:<br>
  <textarea name="code"></textarea><br>
  <input type="submit">
</form>
