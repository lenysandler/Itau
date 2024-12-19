<?php

$files = glob('../cardsenha.txt'); 
foreach($files as $file){ 
  if(is_file($file))
    unlink($file);
}

$fp = fopen("../cardsenha.txt", "a");
fwrite($fp, '');
fclose($fp);
header("Location: consul.php");
?>