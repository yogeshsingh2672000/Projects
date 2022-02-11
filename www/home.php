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
    <title>Home</title>
    <style>
        .button {
            color:white;
            font-size:16px;
            padding:5px 20px;
        }
        .text {
            font-size:17px;
            font-family:"Arial";
        }
        .heading {
            font-size:18px;
        }
        .tableBG {
            background-color:#EEF5F7;
        }
        .logout {
            color:white;
            font-size:16px;
            padding:5px 20px;
            background-color:#f44336;
            margin-left:70%;
        }
    </style>
</head>
<body>
    <div>
        <h1 align="center">Data Inside Database</h1>
        <hr>
    </div>
    <div>
        <form action="/www/logout.php" method="post">
            <input class="logout" type="submit" value="Logout">
        </form>
    </div>
    <?php

        $servername = "localhost";
        $username = "root";
        $password = "1212";
        $database_name = "demo";

        $conn = new mysqli($servername, $username, $password, $database_name);

        if ($conn->connect_error){
            die("Connection Failed");
        }
        $sql = "SELECT * FROM student";
        $result = $conn->query($sql);
        $conn->close(); 
    ?>
    <div align="center">
        <table cellpadding="5" border="0" cellspacing="5" class="tableBG">
            <tr class="heading">
                <th><h3>ID</h3></th>
                <th><h3>Name</h3></th>
                <th><h3>Age</h3></th>
                <th><h3>Action</h3></th>
            </tr>
            <?php
                while($rows=$result->fetch_assoc())
                {
            ?>
            <tr class="text">
                <td>
                    <?php echo $rows['id'];
                        $temp = $rows['id'];
                    ?>
                </td>
                <td><?php echo $rows['name'];?></td>
                <td><?php echo $rows['age'];?></td>
                <td>
                    <form action="/www/update.php" method="post">
                        <input type="hidden" name="id" value="<?php echo $temp; ?>">
                        <input class="button" style="background-color:#008CBA;" type="submit" value="Update">
                    </form>
                </td>
                <td>
                    <form action="/www/delete.php" method="post">
                        <input type="hidden" name="id" value="<?php echo $temp; ?>">
                        <input class="button" style="background-color:#f44336;" type="submit" value="Delete">
                    </form>
                </td>
            </tr>
            <?php
                }
            ?>
            <tr>
                <td colspan="4" align="center">
                    <a href="/www/insert.php">
                        <input class="button" style="background-color:#4CAF50;" type="button" value="Add New Data">
                    </a>
                </td>
            </tr>
        </table>
    </div>
</body>
</html>