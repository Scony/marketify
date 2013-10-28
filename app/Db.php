<?php

/* TODO: exceptions in bind */

Db::init();

class Db
{
  public static $db;

  public static function init()
  {
    if(phpversion() < '5.3')
      throw new Exception('Use php greater or equal than 5.3');

    self::$db = new mysqli(
			   Settings::host,
			   Settings::user,
			   Settings::password,
			   Settings::base
			   );
    if(self::$db->connect_error)
      throw new Exception('Connect Error (' . mysqli_connect_errno() . ') '. mysqli_connect_error());

    self::$db->set_charset('utf8');
  }

  public static function close()
  {
    self::$db->close();
  }

  public static function ping()
  {
    self::$db->ping();
  }

  public static function q($q)
  {
    return self::query($q);
  }

  public static function query($query)
  {
    $re = self::$db->query($query);

    if(!$re)
      throw new Exception('Query error '.$query.' '.self::$db->error);

    return $re;
  }

  public static function f($q)
  {
    return self::fetch($q);
  }

  public static function fetch($query)
  {
    $rows = array();

    $result = self::query($query);
    while($row = $result->fetch_assoc())
      $rows[] = $row;

    return $rows;
  }

  public static function ii()
  {
    return self::insert_id();
  }

  public static function insert_id()
  {
    return self::$db->insert_id;
  }

  public static function ar()
  {
    return self::affected_rows();
  }

  public static function affected_rows()
  {
    if(self::$db->affected_rows < 0)
      throw new Exception('Error while getting affected_rows: '.self::$db->error);

    return self::$db->affected_rows;
  }

  public static function n($q)
  {
    return self::num_rows($q);
  }

  public static function num_rows($query)
  {
    $result = self::query($query);

    return $result->num_rows;
  }

  /* EXAMPLE */
  /* Db::b('select * from user_settings where force_private=?','i',array(1)) */
  /*  */
  public static function b($q,$t,$v)
  {
    return self::bind($q,$t,$v);
  }

  public static function bind($query,$types,$variables)
  {
    if(!is_array($variables))
      throw new Exception('$variables must be an array');

    $refArr = array();
    foreach($variables as $key => $value)
      $refArr[$key] = &$variables[$key];

    $stmt = mysqli_prepare(self::$db,$query);
    call_user_func_array('mysqli_stmt_bind_param',array_merge(array($stmt,$types),$refArr));

    mysqli_stmt_execute($stmt);

    $re = array();

    $md = mysqli_stmt_result_metadata($stmt);
    if($md)
      {
	$columns = array();
	$finfo = mysqli_fetch_fields($md);
	foreach($finfo as $val)
	  $columns[$val->name] = NULL;

	$refReArr = array();
	foreach($columns as $key => $value)
	  $refReArr[$key] = &$columns[$key];

	call_user_func_array('mysqli_stmt_bind_result',array_merge(array($stmt),$refReArr));

	while ($stmt->fetch())
	  $re[] = json_decode(json_encode($refReArr),true);
      }

    mysqli_stmt_close($stmt);

    return $re;
  }
}