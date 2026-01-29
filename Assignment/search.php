<?php
include 'db.php';

$q = $_GET['q'];

$sql = "SELECT * FROM products 
        WHERE name LIKE '%$q%' 
        AND display='Yes'";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<strong>Search Results:</strong><br>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo $row['name'] . "<br>";
    }
} else {
    echo "No product found";
}
?>