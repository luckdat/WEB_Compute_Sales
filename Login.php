<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script>
        function validateForm() {
            var x = document.getElementById("Username").value;
            if (x == null || x == "") {
                alert("Username can not be empty!");
                return false;
            }
        }
    </script>
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background-image: url(https://lvgames.net/wallpaper/hinh-anh-nen-florentino-ba-vuong-am-nhac-lien-quan-mobile-29-5-1920-lvgames.net.jpg);
        }

        .login-container {
            width: 400px;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
            background-color: #aeb2f9;
        }

        .login-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .form-group label {
            font-weight: 600;
        }

        .register-link {
            text-align: center;
            margin-top: 15px;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <h2>Login</h2>
        <form action="" onsubmit="return validateForm()" method="POST">
            <div class="form-group">
                <label for="Username">Username:</label>
                <input type="Username" class="form-control" id="Username" placeholder="Enter your Username" name="Username">
            </div>
            <div class="form-group">
                <label for="Password">Password:</label>
                <input type="Password" class="form-control" id="Password" placeholder="Enter your Password" name="Password" required>
            </div>
            <div class="form-group">
                <label for="UserRole">UserRole:</label>
                <select name="UserRole" id="UserRole" class="form-control">
                    <option value=""></option>
                    <option value="Admin">Admin</option>
                    <option value="Customer">Customer</option>
                    <option value="Staff">Staff</option>
                </select>
            </div>
            <button type="submit" name="submit" class="btn btn-success btn-block">Login</button>
            <div class="register-link">
                <p>Don't have an account? <a href="Register.php">Register here</a></p>
            </div>
        </form>
    </div>
    <?php
    include "Connect.php";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $Username = $_POST["Username"];
        $Password = $_POST["Password"];
        $UserRole = $_POST["UserRole"];

        $sql = "select * from Users where Username='$Username' AND Password= '$Password' AND UserRole = '$UserRole'";
        $result = mysqli_query($conn, $sql);

        $check_login = mysqli_num_rows($result);
        if ($check_login == 0) {
            echo "<script>alert('Password or Username, UserRole is incorrect, please try again!')</script>";
            exit();
        }
        if ($check_login > 0) {
            echo "<script>alert('You have logged in successfully !')</script>";
            header("location: Home.php");
        }
    }
    ?>

</body>

</html>