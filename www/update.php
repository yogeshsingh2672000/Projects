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
    <style>
        .button {
            color:white;
            font-size:16px;
            padding:5px 20px;
            background-color:#4CAF50;
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
</head>
<body>
    <div>
        <h1 align="center">Enter the Values</h1>
        <hr>
    </div>
    <div>
        <form action="/www/logout.php" method="post">
            <input class="logout" type="submit" value="Logout">
        </form>
    </div>
    <div align="center">
        <form action="update.php" method="post">
            <table class="tableBG">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Action</th>
                </tr>
                <tr>
                    <td><input type="number" name="id" value="<?php echo $_POST['id']; ?>" readonly></td>
                    <td><input type="text" name="name"></td>
                    <td><input type="number" name="age"></td>
                    <td><input class="button" type="submit" name="submit"></td>
                    <td>
                        <a href="/www/home.php">
                            <input style="background-color:#008CBA;" class="button" type="button" value="Back">
                        </a>
                    </td>
                </tr>
            </table>
        </form>
    </div>
    <?php
        $flag = 0;
        if (((isset($_POST["name"])) && (isset($_POST["age"]))) && ((!empty($_POST["name"])) && (!empty($_POST['age'])))){
            $flag = 1;
        }

        if ($flag == 1){
            $servername = "localhost";
            $username = "root";
            $password = "1212";
            $database_name = "demo";
            $conn = new mysqli($servername, $username, $password, $database_name);

            if ($conn->connect_error) {
                die("Connection failed: ");
            }
            $id = $_POST['id'];
            $name = $_POST["name"];
            $age = $_POST["age"];
            $sql = "UPDATE student SET name='$name', age='$age' WHERE id='$id'";
            // die($id);
            if ($conn->query($sql) === TRUE) {
                sleep(0.5);
                header("Location: home.php");
                // echo '<script>alert("Successfully Inserted")</script>';;
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            $conn->close();


        }
    
    ?>
</body>
</html>