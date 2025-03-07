<?php 

$conn = mysqli_connect('localhost', 'root','','crud-project-2') or die('connection failed');




define("UPLOAD_SRC",$_SERVER['DOCUMENT_ROOT']."/crud-php/crud-project-2/uploads/");

define("FETCH_SRC","http://localhost/crud-php/crud-project-2/uploads/");




