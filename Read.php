
<?php 

include "db.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">    <title>Crud project 2</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </head>
<body class="bg-light">
   
<div class="container bg-dark text-white rounded p-3 my-4">
  <div class="d-flex align-items-center justify-content-between px-3">
  <h2>
    <a href="Read.php" class="text-white text-decoration-none" >
       Product Store
    </a>
   
  </h2>

  <button type="button" class="btn btn-success fs-6" data-bs-toggle="modal" data-bs-target="#add_products">
  <i class="bi bi-plus-lg"></i>Add Product
</button>
</div>

</div>

<div class="container bg-light mt-4 p-0">
    <table class=" table table-border table-hover ">
        <thead class="table-dark text-center">
        <tr>
      <th>Sr. No.</th>
      <th >image</th>
      <th >name</th>
      <th>price</th>
      <th >description</th>
      <th >Action</th>
    </tr>
        </thead>
          <tbody class="bg-white text-center">
          <?php 
            
            $query = "SELECT * FROM products";

            $result = mysqli_query($conn,$query);

            $i=1;
            $fetch_src=FETCH_SRC;
  
                while($row = mysqli_fetch_assoc($result)){
            ?>
          <tr class="align-middle">
          <td scope="row"><?php echo $i; ?></td>            
            <td><img src="<?php echo $fetch_src . $row['image']; ?>" width="80px" > </td>           
            <td><?php echo $row ["name"]; ?></td>
            <td><?php echo "$" .$row ["price"]; ?></td>
            <td><?php echo $row ["description"]; ?></td>
            <td>
            <a href="update.php?id_new=<?php echo $row ["id"]; ?>" class="btn btn-success me-2"><i class="bi bi-pencil-square"></i></a> 
            <a href="Delete.php?delete_id=<?php echo $row ["id"]; ?>" class="btn btn-danger" onclick="return confirm('Are you sure delete this name?')" ><i class="bi bi-trash"></i></a> 
           </td>
       </tr>
       <?php 
       $i++;
            }
      ?> 
        </tbody>
    </table>
    </div>

<div class="modal fade" id="add_products" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    
<form action="create.php" method="POST" enctype="multipart/form-data" >
<div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">add products</h5>
      </div>
      <div class="modal-body">
   <div class="input-group input-group-sm mb-3">
      <span class="input-group-text">Name</span>
      <input type="text" class="form-control" name="name">
   </div>
   <div class="input-group input-group-sm mb-3">
      <span class="input-group-text">Price</span>
      <input type="number" class="form-control" name="price">
   </div>
   <div class="input-group">
  <span class="input-group-text">Description</span>
  <textarea class="form-control" name="desc" ></textarea>
</div>
<div class="input-group mb-3">
  <label class="input-group-text">Image</label>
  <input type="file" class="form-control" name="image" accept=".jpg,.png,.svg">
</div>
      <div class="modal-footer">
        <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary" name="addProducts" >Add</button>
      </div>
    </div>
</form>

  </div>
</div>

<!--Update Edit option start---->
