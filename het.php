<?php
$file=fopen("text.txt","w");
/*$con=fread($file,filesize("text.txt"));
echo $con;*/
fwrite($file,"\nMy name is Nitish");

fclose($file);
?>