<?php 
  $conn = mysqli_connect('localhost', 'root', '', 'forum');
  if(!$conn){
    echo 'Connection error: ' . mysqli_connect_error();
  }
?>