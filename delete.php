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

        $sql = "delete from admin where id = $id";
        $r = $conn->query($sql);
        if($r)
        {
            header("Location: admin.php");
        }
        $conn->close();
?>