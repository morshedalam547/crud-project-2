<?php
include "db.php";
// include "help.php";



if (isset($_GET['id_new'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id_new']);
    $query = "SELECT * FROM `products` WHERE id = $id";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
}

if (isset($_POST['editproduct'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $desc = mysqli_real_escape_string($conn, $_POST['description']);


    if (file_exists($_FILES['image']['tmp_name']) || is_uploaded_file($_FILES['image']['tmp_name'])) {
        $query = "SELECT * FROM `products` WHERE id = $id";
        $result = mysqli_query($conn, $query);
        $fetch = mysqli_fetch_assoc($result);

      
    if (!empty($_FILES['image']['name'])) {
        $image = $_FILES['image']['name'];
        $target = "uploads/" . basename($image);
        move_uploaded_file($_FILES['image']['tmp_name'], $target);
    }
      
        $update = "UPDATE products SET  name='$name', price='$price', description='$desc', image='$image' WHERE id='$id'";
    } else {
        $update = "UPDATE products SET  name='$name', price='$price', description='$desc' WHERE id='$id'";
    }

    $result = mysqli_query($conn, $update);

    if ($result) {
        header("location: Read.php?success=updated");
        exit;
    } else {
        die("Error updating product: " . mysqli_error($conn));
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class='bg-light'>
    <div class="container">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="container text-light">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Product</h5>
                </div>
                <div class="modal-body">
                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text">Name</span>
                        <input type="text" class="form-control" name="name" value="<?php echo htmlspecialchars($row['name']); ?>">
                    </div>
                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text">Price</span>
                        <input type="number" class="form-control" name="price" value="<?php echo htmlspecialchars($row['price']); ?>">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Description</span>
                        <textarea class="form-control" name="description"><?php echo htmlspecialchars($row['description']); ?></textarea>
                    </div>
                    <img id="showImage" src="uploads/<?php echo htmlspecialchars($row['image']); ?>" width="200px" class="mb-3">
                    <div class="input-group mb-3">
                        <label class="input-group-text">Image</label>
                        <input type="file" class="form-control" name="image" id="image" accept=".jpg,.png,.svg">
                        </div>
                        <div class="text-dark" >
                            <input  type="checkbox" name="cb1" required >
                            <label class="cb1" class="label-inline">Checkbox</label>                                                         
                            </div>               
                         </div>
                <div class="modal-footer ">
                <button type="button" class="btn btn-outline-secondary" onclick="window.location.href='Read.php';">Cancel</button>
                <button type="submit" class="btn btn-success" name="editproduct">Edit</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>






<?php

// function image_upload($img)
// {
//     $tmp_loc = $img['tmp_name'];
//     $new_name = random_int(11111, 99999) . $img['name'];

//     $new_loc = UPLOAD_SRC . $new_name;


//     if (!move_uploaded_file($tmp_loc, $new_loc)) {
//         header("location: Read.php?alert=img_upload");
//         exit;
//     } else {
//         return $new_name;
//     }

// }
// var_dump($unlink); 
// // die;

// function image_remove($img)
// {
//     if (!unlink(UPLOAD_SRC . $img)) {
//         header("location: Read.php?alert=img_rem_fail");
//         exit;
//     } else {
//         echo "not deleted";
//     }
// }


// if (isset($_GET['id_new'])) {
//     $id = mysqli_real_escape_string($conn, $_GET['id_new']);
//     $query = "SELECT * FROM `products` WHERE id = $id";
//     $result = mysqli_query($conn, $query);
//     $row = mysqli_fetch_assoc($result);
// }

// if (isset($_POST['editproduct'])) {
//     $name = mysqli_real_escape_string($conn, $_POST['name']);
//     $price = mysqli_real_escape_string($conn, $_POST['price']);
//     $desc = mysqli_real_escape_string($conn, $_POST['description']);


//     if (file_exists($_FILES['image']['tmp_name']) || is_uploaded_file($_FILES['image']['tmp_name'])) {
//         $query = "SELECT * FROM `products` WHERE id = $id";
//         $result = mysqli_query($conn, $query);
//         $fetch = mysqli_fetch_assoc($result);

      
//     if (!empty($_FILES['image']['name'])) {
//         $image = $_FILES['image']['name'];
//         $target = "uploads/" . basename($image);
//         move_uploaded_file($_FILES['image']['tmp_name'], $target);
//     }
      
//         $update = "UPDATE products SET  name='$name', price='$price', description='$desc', image='$image' WHERE id='$id'";
//     } else {
//         $update = "UPDATE products SET  name='$name', price='$price', description='$desc' WHERE id='$id'";
//     }

//     $result = mysqli_query($conn, $update);

//     if ($result) {
//         header("location: Read.php?success=updated");
//         exit;
//     } else {
//         die("Error updating product: " . mysqli_error($conn));
//     }
// }
?>
<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class='bg-light'>
    <div class="container">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="container text-light w-50" style="background-color: darkgreen;">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Product</h5>
                </div>
                <div class="modal-body">
                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text">Name</span>
                        <input type="text" class="form-control" name="name" value="<?php echo htmlspecialchars($row['name']); ?>">
                    </div>
                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text">Price</span>
                        <input type="number" class="form-control" name="price" value="<?php echo htmlspecialchars($row['price']); ?>">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Description</span>
                        <textarea class="form-control" name="description"><?php echo htmlspecialchars($row['description']); ?></textarea>
                    </div>
                    <img id="showImage" src="uploads/<?php echo htmlspecialchars($row['image']); ?>" width="200px" class="mb-3">
                    <div class="input-group mb-3">
                        <label class="input-group-text">Image</label>
                        <input type="file" class="form-control" name="image" id="image" accept=".jpg,.png,.svg">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                    <button type="submit" class="btn btn-success" name="editproduct">Edit</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
 -->


























<!-- 2nd Way solved it -->


<?php

// function image_upload($img)
// {
//     $tmp_loc = $img['tmp_name'];
//     $new_name = random_int(11111, 99999) . $img['name'];

//     $new_loc = UPLOAD_SRC . $new_name;


//     if (!move_uploaded_file($tmp_loc, $new_loc)) {
//         header("location: Read.php?alert=img_upload");
//         exit;
//     } else {
//         return $new_name;
//     }

// }

// function image_remove($img)
// {
//     if (!unlink(UPLOAD_SRC . $img)) {
//         header("location: Read.php?alert=img_rem_fail");
//         exit;
//     } else {
//         echo "not deleted";
//     }
// }



// if (isset($_GET['id_new'])) {
//     $id = mysqli_real_escape_string($conn, $_GET['id_new']);
//     $row = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `products` WHERE id = $id"));
// }

// if (isset($_POST['editproduct'])) {
//     $name = mysqli_real_escape_string($conn, $_POST['name']);
//     $price = mysqli_real_escape_string($conn, $_POST['price']);
//     $desc = mysqli_real_escape_string($conn, $_POST['description']);
//     $imgPath = $row['image'];

//     // Check if a new image is uploaded
//     if (!empty($_FILES['image']['tmp_name'])) {
//         image_remove($imgPath);
//         $imgPath = image_upload($_FILES['image']);
//     }

//     // Update query
//     $update = "UPDATE products SET name='$name', price='$price', description='$desc', image='$imgPath' WHERE id='$id'";
//     if (mysqli_query($conn, $update)) {
//         header("location: Read.php?success=updated");
//         exit;
//     } else {
//         die("Error updating product: " . mysqli_error($conn));
//     }
// }
?>
<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class='bg-light'>
    <div class="container">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="container text-light w-50" style="background-color: darkgreen;">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Product</h5>
                </div>
                <div class="modal-body">
                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text">Name</span>
                        <input type="text" class="form-control" name="name" value="<?= htmlspecialchars($row['name']); ?>">
                    </div>
                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text">Price</span>
                        <input type="number" class="form-control" name="price" value="<?= htmlspecialchars($row['price']); ?>">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Description</span>
                        <textarea class="form-control" name="description"><?= htmlspecialchars($row['description']); ?></textarea>
                    </div>
                    <img id="showImage" src="uploads/<?= htmlspecialchars($row['image']); ?>" width="200px" class="mb-3">
                    <div class="input-group mb-3">
                        <label class="input-group-text">Image</label>
                        <input type="file" class="form-control" name="image" id="image" accept=".jpg,.png,.svg">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                    <button type="submit" class="btn btn-success" name="editproduct">Edit</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>

 -->
                            <!-- 3rd Way solved it -->



                            
<?php

// function handle_image($img, $current_img = null){
//     if (!empty($img['tmp_name'])) {
//         if ($current_img) unlink(UPLOAD_SRC . $current_img); // Remove existing image
//         $new_name = random_int(11111, 99999) . $img['name'];
//         $new_loc = UPLOAD_SRC . $new_name;

//         if (!move_uploaded_file($img['tmp_name'], $new_loc)) {
//             header("location: Read.php?alert=img_upload");
//             exit;
//         }
//         return $new_name;
//     }
//     return $current_img; // Return current image if no new upload
// }


//              //OR Without Sanitizing input data

// if (isset($_GET['id_new'])) {
//     $id = (int)$_GET['id_new']; // Casting to integer for safety
//     $row = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `products` WHERE id = $id"));
// }

// if (isset($_POST['editproduct'])) {
 
//     $name = ($_POST['name']);
//     $price = $_POST['price']; // Casting to float for numeric safety
//     $desc = ($_POST['description']);
//     $imgPath = handle_image($_FILES['image'], $row['image']);

//     // Update query
//     $update = "UPDATE products SET name='$name', price='$price', description='$desc', image='$imgPath' WHERE id='$id'";
    
//     if (mysqli_query($conn, $update)) {
//         header("location: Read.php?success=updated");
//         exit;
//     } else {
//         die("Error updating product: " . mysqli_error($conn));
//     }
// }

?>

<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class='bg-light'>
    <div class="container">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="container text-light w-50" style="background-color: darkgreen;">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Product</h5>
                </div>
                <div class="modal-body">
                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text">Name</span>
                        <input type="text" class="form-control" name="name" value="<?= htmlspecialchars($row['name']); ?>">
                    </div>
                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text">Price</span>
                        <input type="number" class="form-control" name="price" value="<?= htmlspecialchars($row['price']); ?>">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Description</span>
                        <textarea class="form-control" name="description"><?= htmlspecialchars($row['description']); ?></textarea>
                    </div>
                    <img id="showImage" src="uploads/<?= htmlspecialchars($row['image']); ?>" width="200px" class="mb-3">
                    <div class="input-group mb-3">
                        <label class="input-group-text">Image</label>
                        <input type="file" class="form-control" name="image" accept=".jpg,.png,.svg">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                    <button type="submit" class="btn btn-success" name="editproduct">Edit</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html> -->


                                            <!-- 4th Way solved it -->


                                            
<?php

//             /* 1st work */
// if (isset($_GET['id_new'])) {
//     $id = $_GET['id_new']; 
//     $row = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `products` WHERE id = $id"));
// }


//             /* 2nd  work */
// if (isset($_POST['editproduct'])) {
  
//     $name = ($_POST['name']);
//     $price = $_POST['price'];
//     $desc = ($_POST['description']);
//     $imgPath = $row['image'];


//                 /* 3rd work */
//     // Check if a new image is uploaded
//     if (!empty($_FILES['image']['tmp_name'])) {
//         // Remove the existing image
//         if ($imgPath && file_exists(UPLOAD_SRC . $imgPath)) {
//             unlink(UPLOAD_SRC . $imgPath);
//         }
//         // Handle the new image upload
//         $new_name = random_int(11111, 99999) . $_FILES['image']['name'];
//         $new_loc = UPLOAD_SRC . $new_name;

//                             /* 4th work */
//         if (move_uploaded_file($_FILES['image']['tmp_name'], $new_loc)) {
//             $imgPath = $new_name; // Set the new image path
//         } else {
//             header("location: Read.php?alert=img_upload");
//             exit;
//         }
//     }


//                                 /* 5th work */
//     // Update query
//     $update = "UPDATE products SET name='$name', price='$price', description='$desc', image='$imgPath' WHERE id='$id'";

//     if (mysqli_query($conn, $update)) {
//         header("location: Read.php?success=updated");
//         exit;
//     } else {
//         die("Error updating product: " . mysqli_error($conn));
//     }
// }
?>


?>

<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class='bg-light'>
    <div class="container">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="container text-light w-50" style="background-color: darkgreen;">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Product</h5>
                </div>
                <div class="modal-body">
                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text">Name</span>
                        <input type="text" class="form-control" name="name" value="<?= htmlspecialchars($row['name']); ?>">
                    </div>
                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text">Price</span>
                        <input type="number" class="form-control" name="price" value="<?= htmlspecialchars($row['price']); ?>">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Description</span>
                        <textarea class="form-control" name="description"><?= htmlspecialchars($row['description']); ?></textarea>
                    </div>
                    <img id="showImage" src="uploads/<?= htmlspecialchars($row['image']); ?>" width="200px" class="mb-3">
                    <div class="input-group mb-3">
                        <label class="input-group-text">Image</label>
                        <input type="file" class="form-control" name="image" accept=".jpg,.png,.svg">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                    <button type="submit" class="btn btn-success" name="editproduct">Edit</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
 -->
                                            <!-- 5th Way solved it -->


                                            
   <?php

// function handle_image($img, $current_img = null){
//     if (!empty($img['tmp_name'])) {
//         if ($current_img) unlink(UPLOAD_SRC . $current_img); // Remove existing image
//         $new_name = random_int(11111, 99999) . $img['name'];
//         $new_loc = UPLOAD_SRC . $new_name;

//         if (!move_uploaded_file($img['tmp_name'], $new_loc)) {
//             header("location: Read.php?alert=img_upload");
//             exit;
//         }
//         return $new_name;
//     }
//     return $current_img; // Return current image if no new upload
// }



// if (isset($_GET['id_new'])) {
//     $id = mysqli_real_escape_string($conn, $_GET['id_new']);
//     $row = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `products` WHERE id = $id"));
// }

// if (isset($_POST['editproduct'])) {
//        // Sanitizing input data
//     $name = mysqli_real_escape_string($conn, $_POST['name']);
//     $price = mysqli_real_escape_string($conn, $_POST['price']);
//     $desc = mysqli_real_escape_string($conn, $_POST['description']);
//     $imgPath = handle_image($_FILES['image'], $_POST['image']);

//      // Update query
//     $update = "UPDATE products SET name='$name', price='$price', description='$desc', image='$imgPath' WHERE id='$id'";
    
    
//     if (mysqli_query($conn, $update)) {
//         header("location: Read.php?success=updated");
//         exit;
//     } else {
//         die("Error updating product: " . mysqli_error($conn));
//     }
// }

?>

<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class='bg-light'>
    <div class="container">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="container text-light w-50" style="background-color: darkgreen;">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Product</h5>
                </div>
                <div class="modal-body">
                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text">Name</span>
                        <input type="text" class="form-control" name="name" value="<?= htmlspecialchars($row['name']); ?>">
                    </div>
                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text">Price</span>
                        <input type="number" class="form-control" name="price" value="<?= htmlspecialchars($row['price']); ?>">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Description</span>
                        <textarea class="form-control" name="description"><?= htmlspecialchars($row['description']); ?></textarea>
                    </div>
                    <img id="showImage" src="uploads/<?= htmlspecialchars($row['image']); ?>" width="200px" class="mb-3">
                    <div class="input-group mb-3">
                        <label class="input-group-text">Image</label>
                        <input type="file" class="form-control" name="image" accept=".jpg,.png,.svg">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                    <button type="submit" class="btn btn-success" name="editproduct">Edit</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html> -->
