<?php
 mysql_connect("localhost","root","") or die(mysql_error());
 mysql_select_db("products") or die(mysql_error());

 $id = stripslashes($_REQUEST['id']);

 $image = mysql_query("SELECT * FROM store WHERE id=$id");
 $image = mysql_fetch_assoc($image);
 $image = $image['image'];

 header("Content-type: image/jpeg")

 echo $image;

?>
