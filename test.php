<?php

/* var_dump(shell_exec('javac')); */
exec('cp SconyReceipt.java sh/');
exec('cd sh && ./build.sh SconyReceipt',$out,$re);
/* $out = system('javac -cp ify.jar:android.jar SconyReceipt.java',$re); */
/* $out = system('ls -al',$re); */
/* $out = system('whoami',$re); */

var_dump($out);
var_dump($re);
