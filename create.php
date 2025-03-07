<?php 

require("db.php");
require("help.php");

if(isset($_POST['addProducts'])){
    $name = $_POST['name'];
    $price= $_POST['price'];
    $desc = $_POST['desc'];

    $imgPath = image_upload($_FILES['image']);
    
                //or
    // if (!empty($_FILES['image']['name'])) {
    //     $imgPath = $_FILES['image']['name'];
    //     $target = "uploads/" . basename($imgPath);
    //     move_uploaded_file($_FILES['image']['tmp_name'], $target);
    // }
    

$query = "INSERT INTO`products`(`name`, `price`, `description`, `image`)  VALUES ('$name', '$price','$desc','$imgPath')";

$result = mysqli_query($conn,$query);

if(isset($result)){

    header("location: Read.php?success=added");
}else{
    header("location: Read.php?alert=add_failed");
}

   }











   

            //or

   // if(isset($_POST['addProducts'])){
//     foreach ($_POST as $key => $value) {
//         $_POST[$key] = mysqli_real_escape_string($conn, $value);
// }
// $imgPath = image_upload($_FILES['image']);

// $query = "INSERT INTO `products`(`name`, `price`, `description`, `image`) 
//         VALUES ('$_POST[name]','$_POST[price]','$_POST[desc]','$imgPath')";


// if (mysqli_query($conn, $query)) {
//     header("location:Read.php?success=added");
// } else {
// header("location:Read.php?alert=add_failed");

//     }

// }
   