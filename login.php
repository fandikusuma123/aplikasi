<!DOCTYPE html>
<html>
<?php
session_start();
include "koneksi.php";

if (isset($_POST['submit'])) {
    $user = $_POST['username'];
    $pass = md5($_POST['password']); // It's better to use more secure hashing methods

    $query_cek = $mysqli->query("SELECT * FROM users WHERE username = '$user' AND password = '$pass'");
    
    if ($query_cek->num_rows > 0) {
        $row = $query_cek->fetch_assoc(); // Use fetch_assoc() directly on the result object
        $_SESSION['username'] = $row['username'];

        // Redirect to the dashboard
        header("Location: dashboard.php");
        exit(); // Ensure that the script stops executing after the redirect
    } else {
        echo "salah";
    }
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            max-width: 100%;
            text-align: center;
        }

        label {
            padding-right: 230px;
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        .error-message {
            color: red;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <form action="login.php" method="post"> <!-- Fix the action attribute -->
        <label>username</label><br>
        <input name="username" type="text"><br>
        <label>password</label><br>
        <input name="password" type="password">
        <button name="submit" class="btn">login</button>
    </form>
</body>
</html>
