<?php
//$connection = mysqli_connect('localhost', 'root', '');
$connection = mysqli_connect('mysql2.000webhost.com', 'a2318832_siddu', 'siddartha6.');
if (!$connection){
    die("Database Connection Failed" . mysqli_error());
}
$select_db = mysqli_select_db($connection,'a2318832_news');
if (!$select_db){
    die("Database Selection Failed" . mysqli_error());
}