<?php
include_once('database.php');
$id=$_GET['id'];
$name= $_GET['name'];
$desired_dir=$id."_".$name;echo $desired_dir;
$query=$conn->prepare("DELETE FROM `recipe` WHERE id=".$id);
$result=$query->execute();
// rmdir($desired_dir);
if($result==1)
{
    rrmdir($desired_dir);
   header("location:delete.php");
}
function rrmdir($dir) { 
    if (is_dir($dir)) { 
      $objects = scandir($dir); 
      foreach ($objects as $object) { 
        if ($object != "." && $object != "..") { 
          if (filetype($dir."/".$object) == "dir") rrmdir($dir."/".$object); else unlink($dir."/".$object); 
        } 
      } 
      reset($objects); 
      rmdir($dir); 
    } 
  } 
?>