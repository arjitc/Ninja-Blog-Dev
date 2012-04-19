<!DOCTYPE html>
  <link href="http://servphp.org/beta/blog/style.css" rel="stylesheet">
    <style>
      body {
        padding-top: 10px; /* 60px to make the container go all the way to the bottom of the topbar */
      }
    </style>

<?php
include('header.php');
$output = glob("posts/*.txt");
if (!$output)
$output[0]="defaultpost.txt"; 
echo "<div id='posts'>";
if (isset($_GET['p']))
$numeropost = $_GET['p'];
else
$numeropost = count($output);
for ($x=$numeropost-1; $x>$numeropost-$ppp-1; $x--){
if ($x<0)
break; 
echo date("d/m/o H:i ",filemtime($output[$x]))."<br>";
if (!include($output[$x])) {
echo "<a href='".$_SERVER['PHP_SELF']."'>".$nopost."</a>";
$x=-1;
break; }
echo "<br><hr>";
} //fin del FOR
if (++$x>0) 
echo "<div id='older'><a href='index.php?p=".$x."'>".$olderposts."</a></div>";
if (isset($_GET['p'])&&count($output)>$_GET['p']) {
$x = $numeropost+$ppp;
echo "<div id='newer'><a href='index.php?p=".$x."'>".$newerposts."</a></div>"; }
echo "</div><div id='ads'>";
include("comment.html");
echo "</div>";
echo "<div id='footer'><center><p id='footer'>".$pagegen." ".date('d/m/Y H:i').". ".$copyright."</p></center></div></div></body></html>";
?>
</html>