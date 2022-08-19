
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Product Mangment</h1>
            <a href="index.php?action=add" class="btn btn-primary">Add New Product</a>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $sql = "SELECT * FROM products";
                $result = $db->query($sql);
                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>";
                    echo "<td>{$row['id']}</td>";
                    echo "<td>{$row['name']}</td>";
                    echo "<td>{$row['price']}</td>";
                    echo "<td>{$row['description']}</td>";
                    echo "<td><img src=images/'{$row['pic']}'></td>";
                    echo "<td>";
                    echo "<a href='index.php?action=edit&id={$row['id']}' class='btn btn-primary'>Edit</a>";
                    echo "<a href='index.php?action=delete&id={$row['id']}' class='btn btn-danger'>Delete</a>";
                    echo "</td>";
                    echo "</tr>";
                }
                ?>
                </tbody>
            </table>
        </div>