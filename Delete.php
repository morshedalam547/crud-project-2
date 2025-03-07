<?php

include "db.php";
require("help.php");



if (isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];

    $query = "SELECT * FROM products WHERE id =$id";

    $result = mysqli_query($conn,$query);
    $row = mysqli_fetch_assoc($result);

    image_remove($row['image']);

 

    $query = "DELETE FROM `products` WHERE id = $id";

    if (mysqli_query($conn,$query)) {

        header("location: Read.php?success=removed");
    }else{
        header("location: Read.php?alert=removed_failed");
       }
    
    }



    
    // if (isset($_GET['rem']) && $_GET['rem'] > 0) {
    //     $query = "SELECT * FROM products WHERE id = '$_GET[rem]'";
    //     $result = mysqli_query($conn, $query);
    //     $row = mysqli_fetch_assoc($result);
    
    //     image_remove($row['image']);
    
    //     $query = "DELETE FROM products WHERE id = '$_GET[rem]'";
    //     if (mysqli_query($conn, $query)) {
    //         header("location: Read.php?success=removed");
    //     } else {
    //         header("location: Read.php?alert=removed_failed");
    //     }
    // }
    
    
    
    
    
    




    




