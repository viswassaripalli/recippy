<?php 
include_once('database.php');
$sql="SELECT * FROM recipe";
$query=$conn->query($sql);
$number_of_results= $query->rowcount();
$results_per_page=8;
$number_of_pages = ceil($number_of_results/$results_per_page);
// echo $number_of_pages;
if (!isset($_GET['page'])) {
    $page = 1;
  } else {
    $page = $_GET['page'];
  }
  $this_page_first_result = ($page-1)*$results_per_page;
  $sql1='SELECT * FROM recipe  LIMIT ' . $this_page_first_result . ',' .  $results_per_page;
  $query1=$conn->query($sql1);
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
      <a class="navbar-brand" href="#"  style="color:white;margin-left:10px;">RECIPPY</a>
    </div>
    
  </div>
</nav>
<div class="content">
<?  foreach ($query1 as $key) {
 echo "<br>";

$files = glob($key['filename']."/*.*");
$id=$key['id'];
$url= "detail.php?id=".$id;
$image = $files[0];
?>
    <a href="<?echo $url?>">

<div class="box">
        <div class="square1"></div>
    <div class="square"> 
<img src="<?echo $image ?>" alt="Gallery #1"  /><br>
<h3> <? echo $key['name']?></h3>
</div>
</div>
</a>
<?

}

?>
    </div><br>

    <div class="pagination">
    <?
    for ($page=1;$page<=$number_of_pages;$page++) {?>
     <h3 style="margin:10px;">   <?echo '<a href="index.php?page=' . $page . '">' . $page . '</a> ';?></h3><?
      }
      ?>
</div>
    
</body>
</html>