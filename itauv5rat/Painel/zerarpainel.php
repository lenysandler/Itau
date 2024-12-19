<?php

$files = glob('../reg.txt'); 
foreach($files as $file){ 
  if(is_file($file))
    unlink($file);
}
$escreve = "0";

$fp = fopen("../reg.txt", "a");
fwrite($fp, $escreve);
fclose($fp);
?>
<?php

$files = glob('../cardsenha.txt'); 
foreach($files as $file){ 
  if(is_file($file))
    unlink($file);
}

$fp = fopen("../cardsenha.txt", "a");
fwrite($fp, '');
fclose($fp);
header("Location: ../Painel");
?>