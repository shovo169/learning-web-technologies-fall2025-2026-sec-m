<?php include 'db.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Product</title>
</head>
<body>

<h2>Add Product</h2>

<form method="post">
    Name: <input type="text" name="name" required><br><br>
    Buying Price: <input type="number" name="buying_price" required><br><br>
    Selling Price: <input type="number" name="selling_price" required><br><br>
    Display:
    <select name="display">
        <option value="Yes">Yes</option>
        <option value="No">No</option>
    </select><br><br>
    <input type="submit" name="save" value="Save">
</form>

<?php
if (isset($_POST['save'])) {
    $name = $_POST['name'];
    $buy = $_POST['buying_price'];
    $sell = $_POST['selling_price'];
    $display = $_POST['display'];

    $sql = "INSERT INTO products VALUES (NULL,'$name','$buy','$sell','$display')";
    mysqli_query($conn, $sql);

    echo "Product Added Successfully";
}
?>

</body>
</html>
