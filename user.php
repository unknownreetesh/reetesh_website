<!DOCTYPE html>
<html lang="en">
<head>
    <title>User</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <nav>
      <ul>
        <li><a href="index.html">Home</a></li>
        <li><a href="about.html">About</a></li>
        <li><a href="contact.html">Contact</a></li>
        <li><a href="user.php">Product Entry</a></li>
        <li><a href="login.html">Admin</a></li>
      </ul>
    </nav>
  </header>
<form method="POST">
    <div class="form-container">
    <h2>Consumer Product Entry Form</h2>
        <div class="form-group">
            <label class="required">Consumer Name:</label>
            <input type="text" name="name" required placeholder="Enter full name">
        </div>

        <div class="form-group">
            <label class="required">Consumer ID:</label>
            <input type="number" name="id" required placeholder="Enter ID number">
        </div>

        <div class="form-group">
            <label class="required">Product Name:</label>
            <input type="text" name="product" required placeholder="Enter product name">
        </div>

        <div class="form-group">
            <label class="required">Product Price:</label>
            <input type="number" name="price" required placeholder="Enter price in रु">
        </div>

        <div class="form-group">
            <label class="required">Product Quantity:</label>
            <input type="number" name="quantity" required placeholder="Enter quantity">
        </div>

        <div class="button-container">
            <input type="submit" name="submit" value="Submit Entry">
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

    <?php
    
         if(isset($_POST['submit']))
         {
            extract($_POST);

            include 'database.php';

            $sql = "insert into admin(name,id,product,price,quantity) values('$name','$id','$product','$price','$quantity')";
            $r = $conn->query($sql);
            if(!$r)
            {
                echo "data not inserted successfully";
            }
            else
            {
                echo "<script>alert('Data successfully inserted');</script>";
            }
            $conn->close();
         }

?>
</body>
</html>