<?php
    include 'database.php';

    if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM admin WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    $stmt->close();
    }

    if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $product = $_POST['product'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    $sql = "UPDATE admin SET name = ?, product = ?, price = ?, quantity = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssiii", $name, $product, $price, $quantity, $id);

    if ($stmt->execute()) {
        header("Location: admin.php");
        exit(); 
    } else {
        echo "<script>alert('Data not updated');</script>";
    }

    $stmt->close();
    $conn->close();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Update</title>
</head>
<body>
<form method="POST">
    <div class="form-container">
    <h2>Consumer Product Update Form</h2>
        <div class="form-group">
            <label class="required">Consumer Name:</label>
            <input type="text" name="name" required value="<?php echo isset($row['name']) ? $row['name'] : ''; ?>" placeholder="Enter full name">
        </div>

        <div class="form-group">
            <label class="required">Consumer ID:</label>
            <input type="number" name="id" required value="<?php echo isset($row['id']) ? $row['id'] : ''; ?>" placeholder="Enter ID number" readonly>
        </div>

        <div class="form-group">
            <label class="required">Product Name:</label>
            <input type="text" name="product" required value="<?php echo isset($row['product']) ? $row['product'] : ''; ?>" placeholder="Enter product name">
        </div>

        <div class="form-group">
            <label class="required">Product Price:</label>
            <input type="number" name="price" required value="<?php echo isset($row['price']) ? $row['price'] : ''; ?>" placeholder="Enter price in ₹">
        </div>

        <div class="form-group">
            <label class="required">Product Quantity:</label>
            <input type="number" name="quantity" required value="<?php echo isset($row['quantity']) ? $row['quantity'] : ''; ?>" placeholder="Enter quantity">
        </div>

        <div class="button-container">
            <input type="submit" name="update" value="Update Entry">
            <input type="reset" name="reset" value="Clear Form">
        </div>
    </div>
</form>

<style>
    .form-container {
        max-width: 500px;
        margin: 50px auto;
        padding: 30px;
        background-color: #f8f9fa;
        border-radius: 10px;
        box-shadow: 0 0 20px rgba(0,0,0,0.1);
        font-family: 'Arial', sans-serif;
    }

    h2 {
        text-align: center;
        color: #2c3e50;
        margin-bottom: 30px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    label {
        display: block;
        margin-bottom: 8px;
        color: #34495e;
        font-weight: bold;
    }

    input[type="text"],
    input[type="number"] {
        width: 100%;
        padding: 12px;
        border: 2px solid #bdc3c7;
        border-radius: 6px;
        font-size: 16px;
        transition: border-color 0.3s ease;
    }

    input[type="text"]:focus,
    input[type="number"]:focus {
        border-color: #3498db;
        outline: none;
    }

    input[type="submit"],
    input[type="reset"] {
        width: 48%;
        padding: 12px;
        border: none;
        border-radius: 6px;
        font-size: 16px;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    input[type="submit"] {
        background-color: #2ecc71;
        color: white;
        float: left;
    }

    input[type="reset"] {
        background-color: #e67e22;
        color: white;
        float: right;
    }

    input[type="submit"]:hover {
        background-color: #27ae60;
    }

    input[type="reset"]:hover {
        background-color: #d35400;
    }

    .button-container {
        margin-top: 30px;
        overflow: hidden;
    }

    .required::after {
        content: "*";
        color: #e74c3c;
        margin-left: 4px;
    }
</style> 

</body>
</html>
