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
        .TBcontainer {
            height:190px;
            width:350px;
            background-color:#EEF5F7;
            align:center;
        }
    </style>
</head>
<body>
    <div align="center">
        <h1>Log In</h1>
        <hr>
    </div">
    <div class="TBcontainer">
        <form action="/www/login.php" method="post">
            <table class="tableBG">
                <tr>
                    <td class="heading">Username</td>
                </tr>
                <tr>
                    <td><input class="input" type="email" name="email" placeholder="email"></td>
                </tr>
                <tr>
                    <td class="heading">Password</td>
                </tr>
                <tr>
                    <td><input class="input" type="password" name="password" placeholder="password"></td>
                </tr>
                <tr>
                    <td>
                        <input style="background-color:#008CBA;" class="button" type="submit" value="Login">
                        <a href="/www/signup.php">
                            <input class="button" type="button" value="Register">
                        </a>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>
<?php
    $flag = 0;
    if ( (isset($_POST['email'])) && (isset($_POST["password"])) ){// && ( (!empty($_POST["email"])) && (!empty($_POST["passwrod"])) ) ){
        if ( (!empty($_POST['email'])) && (!empty($_POST['password'])) ){
            $flag = 1;
        }
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

        $sql = "SELECT * FROM users";
        $result = $conn->query($sql);
        $users = array();
        while ($row=$result->fetch_assoc())
        {
            $users[$_POST['email']] = $row['password'];
        }
        
        $username = $conn->real_escape_string($_POST['email']);
        $password = $conn->real_escape_string($_POST['password']);
        $conn->close();

        if (in_array($username, array_keys($users))){
            if (password_verify($password, $users[$username]) == 1){
                // die("inside the loop");
                session_start();
                $_SESSION["status"] = "start";
                header("Location: /www/home.php");
            }
        }else{
            echo "Check your username and password";
        }

    }
?>