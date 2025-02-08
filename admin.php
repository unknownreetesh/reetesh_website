<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin Data</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f9f9f9;
      margin: 0;
      padding: 20px;
    }
    h2 {
      text-align: center;
      color: #333;
      margin-bottom: 20px;
    }
    table {
      width: 80%;
      margin: 0 auto;
      border-collapse: collapse;
      background-color: #fff;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    th {
      background-color: #4CAF50;
      color: #fff;
      padding: 12px;
      border: 1px solid #ddd;
    }
    td {
      padding: 12px;
      border: 1px solid #ddd;
      text-align: center;
    }
    tr:nth-child(even) {
      background-color: #f2f2f2;
    }
    tr:hover {
      background-color: #ddd;
    }
    button {
      padding: 8px 16px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 14px;
    }
    .edit-btn {
      background-color: #007BFF;
      color: #fff;
    }
    .delete-btn {
      background-color: #dc3545;
      color: #fff;
    }
    .edit-btn:hover {
      background-color: #0056b3;
    }
    .delete-btn:hover {
      background-color: #c82333;
    }
    a {
      text-decoration: none;
    }
  </style>
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

<h2>DETAILED INFORMATION</h2>

<?php

include 'database.php';

$sql = "SELECT * FROM admin";
$r = $conn->query($sql);
?>
<table>
  <tr>
    <th>ID</th> 
    <th>Name</th> 
    <th>Product</th> 
    <th>Price</th> 
    <th>Quantity</th> 
    <th colspan="2">Action</th>
  </tr>
  <?php 
    $sd = 1;
    while ($res = mysqli_fetch_array($r)) {
  ?>       
  <tr> 
    <td><?php echo $sd; ?></td>
    <td><?php echo $res['name']; ?></td>
    <td><?php echo $res['product']; ?></td>
    <td><?php echo $res['price']; ?></td>
    <td><?php echo $res['quantity']; ?></td>
    <td>
      <a href="update.php?id=<?php echo $res['id']; ?>">
        <button class="edit-btn">Edit</button>
      </a>
    </td>
    <td>
      <a href="delete.php?id=<?php echo $res['id']; ?>">
        <button class="delete-btn">Delete</button>
      </a>
    </td>
  </tr>
  <?php 
      $sd++;
    }
    $conn->close();
  ?>
</table>

</body>
</html>
