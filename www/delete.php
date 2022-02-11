<?php
    session_start();
    if ($_SESSION["status"] != "start") {
        header("Location: login.php");
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    
        $id = $_POST['id'];
        $servername = "localhost";
        $username = "root";
        $password = "1212";
        $database_name = "demo";

        $conn = new mysqli($servername, $username, $password, $database_name);

        if ($conn->connect_error){
            die("Connection Failed");
        }
        $sql = "DELETE FROM student WHERE id='$id'";
        if ($conn->query($sql) === TRUE) {
            // sleep(0.5);
            header("Location: home.php");
            // echo '<script>alert("Successfully Inserted")</script>';;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close(); 

    ?>
</body>
</html>