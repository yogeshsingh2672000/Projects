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
    <title>Insert</title>
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
        <h1 align="center">Insert Your Data</h1>
        <hr>
    </div>
    <div>
        <form action="/www/logout.php" method="post">
            <input class="logout" type="submit" value="Logout">
        </form>
    </div>
    <form action="insert.php" method="post">
        <table cellpadding="5" border="0" cellspacing="5" align="center" class="tableBG">
            <tr>
                <td class="text">Name: </td>
                <td><input type="text" name=name></td>
            </tr>
            <tr>
                <td class="text">Age: </td>
                <td><input type="number", name="age"></td>
            </tr>
            <tr>
                <td><input style="background-color:#4CAF50;" class="button" type="submit" value="Submit"></td>
                <td>
                    <a href="/www/home.php">
                        <input style="background-color:#008CBA;" class="button" type="button" value="Back">
                    </a>
                </td>
            </tr>
        </table>
    </form>

    <?php
        $flag = 0;
        if (((isset($_POST["name"])) && (isset($_POST["age"]))) && ((!empty($_POST["name"])) && (!empty($_POST['age'])))){
            $flag = 1;
        }


        if ($flag ===1){

            $servername = "localhost";
            $username = "root";
            $password = "1212";
            $database_name = "demo";


            $conn = new mysqli($servername, $username, $password, $database_name);

            if ($conn->connect_error) {
                die("Connection failed: ");
            }
            // echo "Connection Successfully <br>";
            $name = $_POST["name"];
            $age = $_POST["age"];
            $sql = "INSERT INTO student (name, age) VALUES ('$name', '$age')";

            if ($conn->query($sql) === TRUE) {
                echo '<script>alert("Successfully Inserted")</script>';
                header("Location: home.php");
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            $conn->close();

        }
        
    ?> 
</body>
</html>