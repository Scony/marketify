<?php

class Utils
{
  const text_max_length = 300;

  public static function enshort($in)
  {
    if(strlen($in) > self::text_max_length)
      return substr($in,0,self::text_max_length).' (...)';
    return $in;
  }

}
