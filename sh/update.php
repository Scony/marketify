<?php
exec('./update.sh',$out,$re);

if(!$re)
  echo 'ok';
else
  echo 'err '.$re;
