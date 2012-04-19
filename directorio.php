<?php
if (isset($_GET['id']))
if (unlink("posts/".$_GET['id'].".txt"))
echo "Entrada ".$_GET['id'].".txt borrada.<br>";
else
echo "Error al borrar ".$_GET['id'].".txt<br>";
$output = glob("posts/*.txt");
if (!$output)
echo "No hay posts.";
else {
$numeroposts=count($output)-1;
for ($x=$numeroposts; $x>=0; $x--) {
echo substr($output[$x],strrpos($output[$x],"/")+1)." - <a href='admin.php?id=".$x."'>Edit</a> - <a href='".$_SERVER['PHP_SELF']."?id=".$x."'>Delete</a><br>";
}
}

?>