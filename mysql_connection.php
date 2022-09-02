<?php 
$conn = mysqli_connect("localhost","root","1234","testdb");
if(!$conn){
    die("bad". mysqli.error());
}