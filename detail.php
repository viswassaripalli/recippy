<?php
$id= $_GET["id"];
include_once("database.php");
$sth = $conn->prepare('SELECT * FROM recipe
    WHERE id = ?');
$sth->bindValue(1, $id);
$sth->execute();
$result= $sth->fetch();

// echo $result[0]."<br>";
// echo $result[1]."<br>";
// echo $result[2]."<br>";
// echo $result[3];
$url = "order.php?id=".$result[0];
?>
<?
$files = glob($result[4]."/*.*");

$id=$result['0'];
// print_r($files);
$url= "detail.php?id=".$id?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>GST Billing system</title>
   
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="detail.css">
</head>
<body>

<nav class="navbar  navbar-default ">
  <div class="container-fluid nav">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php"  style="color:white;margin-left:10px;">RECIPPY</a>
    </div>
    
  </div>
</nav>
    <div class="content">
        
        <?
    for ($i=0; $i<count($files); $i++)

{

$image = $files[$i];?>
<div class="image">
<img src="<?echo $image ?>" alt="Gallery #1" width  />
</div>
<?

}
?>
</div>
<div class="box">
        <div class="square1"></div>
    <div class="square"> 
<span style="float:left;font-size:40px"><?echo $result[1]?></span>
<? if($result[3]=="veg"){?>
<span style="float:right;font-size:40px;color:green"><?echo strtoupper($result[3])?></span><br><br><br><br><?}
else{?>
    
    <span style="float:right;font-size:40px;color:red"><?echo strtoupper($result[3])?></span><br><br><br><br>
    <?}?>
    <h2>Ingridents:<?echo "<br>".$result[5]?></h2>
<h2>Process:<?echo "<br>".$result[2]?></h2>

</div>
</div>

</body>
</html>
