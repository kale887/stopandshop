<!DOCTYPE html>
<html lang="en">

<head>
    <?php 
        error_reporting(E_ALL);
        ini_set('display_errors', '1');
        include_once("includes/head.php");       
    ?>  
</head>

<body>
   <?php include_once("includes/header.php"); ?>
   
    <!-- Page Content -->
    <div class="container">
             <?php include_once("includes/home-body.php"); ?>
    </div>
    <!-- /.container -->
<?php
    include_once("includes/footer.php"); 
?>
</body>

</html>