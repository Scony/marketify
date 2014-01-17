<?php

include('words.php');

$wordsPrepared = array();
foreach($words as $word)
  array_push($wordsPrepared,
	     array(
		   'word' => $word,
		   'score' => 300
		   )
	     );
echo json_encode($wordsPrepared);
