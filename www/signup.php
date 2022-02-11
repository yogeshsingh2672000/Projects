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
            background-color:#E94F4F;
        }
        .heading {
            font-size:17px;
            font-family:"Arial";
        }
        .tableBG {
            background-color:#EEF5F7;
        }
        .input {
            border: none;
            background-color: white;
            line-height: 30px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div align="center">
        <h1>Register</h1>
    </div>
    <hr>
    <div>
        <form action="/www/signup.php" method="post">
            <table border="0" class="tableBG" align="center" cellspacing="15" cellpadding="2">
                <tr>
                    <td class="heading">Name</td>
                </tr>
                <tr>
                    <td><input class="input" type="text" name="name" placeholder="Name"></td>
                </tr>
                <tr>
                    <td class="heading">Username</td>
                </tr>
                <tr>
                    <td><input class="input" type="email" name="email" placeholder="Email"></td>
                </tr>
                <tr>
                    <td class="heading">Password</td>
                </tr>
                <tr>
                    <td><input class="input" type="password" name="password" placeholder="password"></td>
                </tr>
                <tr>
                    <td><input style="background-color:#008CBA;" class="button" type="submit" value="Register">
                    <a href="/www/login.php">
                        <input class="button" type="button" value="Login">
                    </a>
                    </td>
                </tr>
            </table>
        </form>
    </div>
    <?php

        $flag = 0;
        if (((isset($_POST["name"])) && (isset($_POST["email"])) && (isset($_POST["password"]))) && ((!empty($_POST["name"])) && (!empty($_POST['email'])) && (!empty($_POST['password'])))){
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
            
            $name = $conn->real_escape_string($_POST['name']);
            $email = $conn->real_escape_string($_POST['email']);
            $password = password_hash($conn->real_escape_string($_POST['password']), PASSWORD_ARGON2ID);
            // password_hash($var, PASSWORD_ARGON2ID)

            $sql = "SELECT * FROM users";
            $result = $conn->query($sql);
            $users = array();
            while ($row=$result->fetch_assoc())
            {
                $users[] = $row['email'];
            }

            $sql = "INSERT INTO users VALUES ('$name', '$email', '$password')";

            if (!in_array($email, $users))
            {
                if ($conn->query($sql) === TRUE) {
                    header("Location: login.php");
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            } else {
                $var = "User Already Exist";
                echo "<h2 align='center'> $var </h2>";
            }
        $conn->close();

        }
    ?>
</body>
</html>