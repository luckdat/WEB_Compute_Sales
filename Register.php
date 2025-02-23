<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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

        .form-group select {
            height: 35px;
        }

        .register-link {
            text-align: center;
            margin-top: 15px;
        }
    </style>

    <script>
        function validateForm() {
            var x = document.getElementById("Username").value;
            var y = document.getElementById("Email").value;
            if (x == null || x == "") {
                alert("Username can not be empty!");
                return false;
            } else if (y == null || y == "") {
                alert("Email can not be empty!");
                return false;
            }
        }
    </script>
</head>

<body>
    <div class="login-container">
        <h2>Register</h2>
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
            <div class="form-group">
                <label for="FullName">FullName:</label>
                <input type="FullName" class="form-control" id="FullName" placeholder="Enter your FullName" name="FullName" required>
            </div>

            <div class="form-group">
                <label for="Email">Email:</label>
                <input type="Email" class="form-control" id="Email" placeholder="Enter your Email" name="Email">
            </div>

            <div class="form-group">
                <label for="PhoneNumber">PhoneNumber:</label>
                <input type="PhoneNumber" class="form-control" id="PhoneNumber" placeholder="Enter your PhoneNumber" name="PhoneNumber" required>
            </div>

            <div class="form-group">
                <label for="Address">Address:</label>
                <input type="Address" class="form-control" id="Address" placeholder="Enter your Address" name="Address" required>
            </div>
            <button type="submit" name="submit" class="btn btn-success btn-block">Register</button>
            <div class="register-link">
                <p>Sign in to your account? <a href="Login.php">Login Now</a></p>
            </div>
        </form>
    </div>
    <?php
    include "Connect.php";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $Email = $_POST["Email"];
        $Username = $_POST["Username"];
        $Password = $_POST["Password"];
        $FullName = $_POST["FullName"];
        $PhoneNumber = $_POST["PhoneNumber"];
        $Address = $_POST["Address"];
        $UserRole = $_POST["UserRole"];

        $sql = "INSERT INTO Users (UserRole, Username, Password, Email, FullName, PhoneNumber, Address) VALUES ( '$UserRole','$Username', '$Password', '$FullName', '$Email','$PhoneNumber', '$Address')";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            echo "<script>alert('Add successfully !')</script>";
        } else {
            echo "<script>alert('Add Error !')</script>";
        }
        mysqli_close($conn);
    }
    ?>
</body>

</html>