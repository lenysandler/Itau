<?php
$fp = fopen('testefor.txt', 'w');
fwrite($fp, 'Ativado');
fclose($fp);
header("Location: index.php");
?>
