<!--eDITING FDORM-->
<?php 
$id = $_GET['id'];
$sql = "SELECT * FROM products WHERE id = $id";
$result = $db->query($sql);
$product = $result->fetch(PDO::FETCH_ASSOC);


?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" name="name" id="name" value="<?php echo $product['name']; ?>">
    </div>
    <div class="form-group">
        <label for="price">Price</label>
        <input type="text" class="form-control" name="price" id="price" value="<?php echo $product['price']; ?>">
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" name="description" id="description" placeholder="Description"><?php echo $product['description']; ?></textarea>
    </div>
    <div class="form-group">
        <label for="image">Image</label>
        <input type="file" class="form-control" name="image" id="image">
    </div>
    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    <?php
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $price = $_POST['price'];
        $description = $_POST['description'];
        $image = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];
        move_uploaded_file($image_tmp, "images/$image");
        $sql = "UPDATE products SET name = '$name', price = '$price', description = '$description', pic = '$image' WHERE id = $id";
        $result = $db->query($sql);
        if ($result) {
            echo "Product updated successfully";
            header("Location: index.php");
        } else {
            echo "Error updating product";
        }
    }
    ?>
<form action="<?php echo $this->_tpl_vars['form_action']; ?>
" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="<?php echo $this->_tpl_vars['name']; ?>
">  
    </div>
    <div class="form-group">
        <label for="price">Price</label>
        <input type="text" class="form-control" name="price" id="price" placeholder="Price" value="<?php echo $this->_tpl_vars['price']; ?>
">
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" name="description" id="description" placeholder="Description"><?php echo $this->_tpl_vars['description']; ?>
</textarea>

    </div>
    <div class="form-group">
        <label for="image">Image</label>
        <input type="file" class="form-control" name="image" id="image">
        <img src="images/<?php echo $this->_tpl_vars['image']; ?>
" alt="<?php echo $this->_tpl_vars['image']; ?>
" width="100">
    </div>
    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>