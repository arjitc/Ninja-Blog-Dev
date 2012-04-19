<?php require('_login.php'); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-2" />
<title>Ninja-Blog Admin Area</title>

</head>

<body>
<div class="navbar">
  <div class="navbar-inner">
    <div class="container">
      <ul class="nav">
  <li class="active">
    <a>Welcome back <?php echo $login->username; ?>,</a>
  </li>
  <li><a href="logout.php">Logout</a></li>
</ul>
    </div>
  </div>
</div>  
<div class="container">  
<h1><?php echo "<a href='".$_SERVER['PHP_SELF']."'>";?>Ninja-Blog Admin Area</a></h1>  
<br>
<h2>Make a new post :</h2>
<div id="postmkr" class="modal hide fade in" style="display: none; ">  
<div class="modal-header">  
<h3>Ninja-Blog Post Maker</h3>  
</div>  
<div class="modal-body">  
<?php
if (isset($_POST["texto"])) {
if (isset($_POST['id'])) {
$numero=$_POST['id'];
if (!unlink("posts/".$numero.".txt"))
echo "Error accesing archive, chown the posts folder<br>"; }
else {
$output = glob("posts/*.txt");
if (!$output)
$numero=0;
else
$numero=count($output); }
if (file_put_contents("posts/".$numero.".txt", $_POST["texto"]))
echo "Posted.<br>";
else
echo "Error accessing Archive, chmod the Archive folder<br>";
}
$texto="";
?>
<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript">
//<![CDATA[
  bkLib.onDomLoaded(function() {
        new nicEditor().panelInstance('area1');
        new nicEditor({fullPanel : true}).panelInstance('area2');
        new nicEditor({iconsPath : '../nicEditorIcons.gif'}).panelInstance('area3');
        new nicEditor({buttonList : ['fontSize','bold','italic','underline','strikeThrough','subscript','superscript','html','image']}).panelInstance('area4');
        new nicEditor({maxHeight : 100}).panelInstance('area5');
  });
  //]]></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
<textarea rows="20" cols="60" name="texto" style="width: 500px; height: 300px;">
<?php 
if (isset($_GET['id']))  {
include("posts/".$_GET['id'].".txt"); 
echo "</textarea><input type='hidden' name='id' value='".$_GET['id']."'>";
}
else
echo "</textarea>";
?>
<br>
<input type="submit" name="submit" value="Post !" class="btn btn-primary"> |  <a href="#" data-dismiss="modal" class="btn btn-danger">Cancel</a>  
</form>
</body>
</html>              
</div>  
</div>  
<p><a data-toggle="modal" href="#postmkr" class="btn btn-primary btn-large">Launch Post Maker</a></p>  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>  
<script src="http://twitter.github.com/bootstrap/assets/js/bootstrap-modal.js"></script>  
<br>
<h2>Edit / Delete :</h2>
<?php
if (isset($_GET['id']))
echo "Post ".$_GET['id'].".txt has been opened in the editor, click Launch Post Maker to edit the post.<br>";
//else
//echo "Error opening ".$_GET['id'].".txt<br>";
if (isset($_GET['del']))
if (unlink("posts/".$_GET['del'].".txt"))
echo "Post deleted.<br>";
else
echo "Can't delete post.<br>";
$output = glob("posts/*.txt");
if (!$output)
echo "No hay posts.";
else {
$numeroposts=count($output)-1;
for ($x=$numeroposts; $x>=0; $x--) {
echo substr($output[$x],strrpos($output[$x],"/")+1)." - <a href='admin.php?id=".$x."'>Edit</a> - <a href='".$_SERVER['PHP_SELF']."?del=".$x."'>Delete</a><br>";
}
}

?>

</html>