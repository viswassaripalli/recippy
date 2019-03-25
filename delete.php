<?php
include_once('database.php');
$query1=$conn->query("SELECT * FROM recipe");
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
<link rel="stylesheet" href="style.css">
</head>
<body>

<nav class="navbar  navbar-default ">
  <div class="container-fluid nav">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php"  style="color:white;margin-left:10px;">RECIPPY</a>
    </div>
    
  </div>
</nav>
<body>
<div id="content" align="center">
<table border="1">
<tr>
<td>Item</td>
<td>Quantity</td>
<td>Date</td>
<td></td>
</tr>
<?php

foreach($query1 as $row)
{
?>
<tr>
<td><?php echo $row['name'];?></td>
<td><?php echo $row['description'];?></td>
<td><?php echo $row['ing'];?></td>
<td><a href="delete_last.php?id=<?echo $row['id'];?>&name=<?echo $row['name'];?>">Delete</a></td>
</tr>
<?php
}
?>
</table>
</div>
</body>
</html>