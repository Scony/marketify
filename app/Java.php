<?php

class Java
{

  public static function getClassName($code)
  {
    $re = preg_match('/class [^ ]+ extends YReceipt/',$code,$matches);
    if($re != 1)
      return NULL;

    $xpl = explode(' ',$matches[0]);
    return $xpl[1];
  }

}