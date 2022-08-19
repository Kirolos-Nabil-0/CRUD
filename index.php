<?php
require_once "db.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Mangment</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

</head>
<body>


    <?php 
if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'add':
            echo "Add product";
            require_once "includes/add.php";
            break;
        case 'edit':
            echo "Edit product";
            require_once "includes/update.php";
            break;
        case 'delete':
            $id = $_GET['id'];
            $sql = "DELETE FROM products WHERE id = $id";
            $result = $db->query($sql);
            if ($result) {
                echo "Product deleted successfully";
                header("Location: index.php");
            } else {
                echo "Error deleting product";
            }
            break;
        default:
            echo "Product Mangment";
     require_once "includes/view_all.php";
            break;
    }
       
} else {
    include "includes/view_all.php";
}


?>
</body>
</html>