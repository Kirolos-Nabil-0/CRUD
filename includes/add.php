<!--Form to add new product-->
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" name="name" id="name" placeholder="Name">
    </div>
    <div class="form-group">
        <label for="price">Price</label>
        <input type="text" class="form-control" name="price" id="price" placeholder="Price">
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" name="description" id="description" placeholder="Description"></textarea>
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
        $sql = "INSERT INTO products (name, price, description, pic) VALUES ('$name', '$price', '$description', '$image')";
        $result = $db->query($sql);
        if ($result) {
            echo "Product added successfully";
            header("Location: index.php");
        } else {
            echo "Error adding product";
        }
    }