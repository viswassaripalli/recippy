<?php
include_once("database.php");

$imageData = array();
if(isset($_POST['submit'])){
    $id=$_POST["id"];
    $name=$_POST["name"];
    $description=$_POST['desc'];
    $type = $_POST['type'];
    $ing= $_POST['ingri'];
    echo $type; 

if(isset($_FILES['files'])){
    $errors= array();
	foreach($_FILES['files']['tmp_name'] as $key => $tmp_name ){
        $file_name = $key.$_FILES['files']['name'][$key];
        echo $file_name;

		$file_tmp =$_FILES['files']['tmp_name'][$key];
        echo $file_tmp;
        
        array_push($imageData, $file_name);
       
        $desired_dir=$id."_".$name;
        echo $desired_dir;
        if(empty($errors)==true){
            if(is_dir($desired_dir)==false){
                mkdir("$desired_dir", 0755,true);		// Create directory if it does not exist
            }
            if(is_dir("$desired_dir/".$file_name)==false){
                move_uploaded_file($file_tmp,$desired_dir."/".$file_name);
            }else{									
                			
            }
            		
        }else{
                print_r($errors);
        }
    }
	if(empty($error)){
		//echo "Success";
		//print_r($imageData);
		//echo sizeof($imageData);
		//for($i=0;$i<sizeof($imageData);$i++){
		//	echo $imageData[$i];			
		//}
		$imgDt = implode("|", $imageData);
		 $query="INSERT into recipe(`id`,`name`,`description`,`type`,`filename`,`ing`) VALUES('$id','$name','$description','$type','$desired_dir','$ing'); ";
        // mysql_query($query);	
        $result=$conn->prepare($query);
        $result->execute();
	}
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>RECIPPY</title>
   
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="insert.css">
</head>
<body>

<nav class="navbar  navbar-default ">
  <div class="container-fluid nav">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php"  style="color:white;margin-left:10px;">RECIPPY</a>
    </div>
    <ul class="nav navbar-nav navbar-right">
     
      <li><a href="delete.php"  style="color:white"><span class="glyphicon glyphicon-log-in"></span> Delete</a></li>
    </ul>
  </div>
</nav>
<div class="content">
<div class="square1"></div>
    <div class="square">
        <!-- <h1 id="label"> RECIEPPY </h1> -->
<form action="insert.php" method="post" enctype="multipart/form-data">
<h2>id:</h2> <input type="number" name="id" id="id"><br>
<h2>  name:</h2> <input type="text" name="name" id="name"><br>
<h2> Ingredients:</h2> <textarea rows = "5" cols = "50" name = "ingri">
            
         </textarea><br>
  <h2> description:</h2> <textarea rows = "5" cols = "50" name = "desc">
            
         </textarea><br>
    <h2>Type:</h2> <select name="type" id="">
    <option value="veg">veg</option>
    <option value="nonveg">non veg</option>
    </select>
    <h2>Upload:</h2> <input type="file" name="files[]" id="images" multiple ><br>
    <input type="submit" name="submit" value="submit">
     </form>
</div>
</div>

</body>
</html>
