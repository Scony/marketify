<?php

include('words.php');

if(false && !empty($_GET['prefix']))
  {
    /* TODO: search for matches */
  }
else
  {
    $wordsPrepared = array();
    foreach($words as $word)
      array_push($wordsPrepared,
		 array(
		       'word' => $word,
		       'score' => 300
		       )
		 );
    echo json_encode($wordsPrepared);
  }
