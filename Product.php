<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f4f8fd;
            color: #333;
            margin: 0;
        }

        header {
            background: #34495e;
            color: white;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
        }

        .navbar-brand {
            font-size: 24px;
            font-weight: bold;
            text-decoration: none;
        }

        nav ul {
            list-style: none;
            display: flex;
            gap: 15px;
        }

        nav ul li a {
            color: white;
            text-decoration: none;
            font-size: 16px;
            padding: 5px 10px;
            transition: background 0.3s;
        }

        nav ul li a:hover {
            background: #2c3e50;
            border-radius: 4px;
        }

        .hero {
            background: #1abc9c;
            color: white;
            text-align: center;
            padding: 40px;
            margin-bottom: 30px;
        }

        .row-container {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            padding: 20px;
            padding-left: 70px;
            padding-top: 40px;
            gap: 20px;
        }

        .col-md-4 {
            flex: 1;
            max-width: 400px;
        }

        .products-container {
            flex: 2;
            padding-left: 70px;
        }



        .login-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }

        .login-container h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            font-size: 1em;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        button.btn {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1em;
        }

        button.btn:hover {
            background-color: #45a049;
        }

        .products_box {
            display: flex;
            flex-wrap: wrap;
            gap: 25px;
            justify-content: flex-start;
        }

        .single_product {
            background: white;
            border: 1px solid #ddd;
            border-radius: 8px;
            width: 250px;
            padding: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .single_product img {
            width: 180px;
            height: 180px;
            border-radius: 8px;
            margin-bottom: 10px;
        }

        .single_product h3 {
            font-size: 18px;
            margin-bottom: 10px;
            color: #34495e;
        }

        .single_product p {
            font-size: 14px;
            margin-bottom: 10px;
        }

        .single_product a,
        .single_product button {
            padding: 8px 15px;
            font-size: 14px;
            color: white;
            background: #1abc9c;
            border-radius: 4px;
            transition: background 0.3s;
            cursor: pointer;
            border: none;
        }

        .single_product a:hover,
        .single_product button:hover {
            background: #16a085;
        }

        footer {
            background: #34495e;
            color: white;
            text-align: center;
            padding: 20px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <header>
        <a class="navbar-brand" href="#">Kawaii Computer Store</a>
        <nav>
            <ul>
                <li><a href="Home.php"><b>Home</b></a></li>
                <li><a href="Product.php">Product Management</a></li>
                <li><a href="ProductDetail.php">Product Detail</a></li>
                <li><a href="Cart.php">Cart</a></li>
                <li><a href="Login.php">Logout</a></li>
            </ul>
        </nav>
    </header>

    <div class="hero">
        <h2>Welcome to Kawaii Computer Store</h2>
        <p>Your one-stop shop for cute and powerful computers!</p>
    </div>

    <div class="row-container">
        <div class="col-md-4">
        <h2 style="margin-left: 100px">New Product</h2>
            <div class="login-container">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="ProductName">Product Name:</label>
                        <input type="text" id="ProductName" name="ProductName" placeholder="Enter Product Name" required>
                    </div>
                    <div class="form-group">
                        <label for="Description">Description:</label>
                        <input type="text" id="Description" name="Description" placeholder="Enter Description" required>
                    </div>
                    <div class="form-group">
                        <label for="Price">Price:</label>
                        <input type="number" id="Price" name="Price" placeholder="Enter Price" required>
                    </div>
                    <div class="form-group">
                        <label for="Stock">Stock:</label>
                        <input type="number" id="Stock" name="Stock" placeholder="Enter Stock" required>
                    </div>
                    <div class="form-group">
                        <label for="CategoryID">Category ID:</label>
                        <input type="number" id="CategoryID" name="CategoryID" placeholder="Enter Category ID" required>
                    </div>
                    <div class="form-group">
                        <label for="ImageURL">Image URL:</label>
                        <input type="file" id="ImageURL" name="ImageURL" required>
                    </div>
                    <button type="submit" class="btn" name="Products">Add Product</button>
                </form>
            </div>
        </div>

        <div class="products-container">
            <section id="products">
                <h2 class="text-center">Featured Products About Desktop Computers</h2>
                <div class="products_box">
                    <?php
                    include "Connect.php";
                    $sql = "SELECT * FROM Products LIMIT 8";
                    $result = mysqli_query($conn, $sql);
                    if ($result && mysqli_num_rows($result) > 0) {
                        while ($row_product = mysqli_fetch_assoc($result)) {
                            $ProductID = $row_product['ProductID'];
                            $ProductName = $row_product['ProductName'];
                            $Description = $row_product['Description'];
                            $Price = $row_product['Price'];
                            $Stock = $row_product['Stock'];
                            $ImageURL = $row_product['ImageURL'];
                    ?>
                            <form class="single_product" action="Cart.php" method="POST">
                                <h3><?php echo htmlspecialchars($ProductName); ?></h3>
                                <img src="images/<?php echo htmlspecialchars($ImageURL); ?>" alt="<?php echo htmlspecialchars($ProductName); ?>">
                                <p><?php echo htmlspecialchars($Description); ?></p>
                                <p><b>Price: <?php echo number_format($Price, 0, ',', '.'); ?> VNĐ</b></p>
                                <a href="ProductDetail.php?id=<?php echo $ProductID ?>" class="btn btn-info">Details</a>
                                <input type="hidden" name="ProductID" value="<?php echo $ProductID; ?>">
                                <input type="hidden" name="Quantity" value="1">
                                <button type="submit" class="btn btn-success">Add to Cart</button>

                                <button style="margin: 10px ; width: 70px;"  class="btn btn-success">Edit</button>
                                <button  class="btn btn-success">Delete</button>
                            </form>
                    <?php
                        }
                    } else {
                        echo "<p>No products found.</p>";
                    }

                    if (isset($_POST['Products'])) {
                        // Nhận dữ liệu từ form
                        $ProductName = $_POST['ProductName'];
                        $Description = $_POST['Description'];
                        $Price = $_POST['Price'];
                        $Stock = $_POST['Stock'];
                        $CategoryID = $_POST['CategoryID'];

                        $ImageURL = $_FILES['ImageURL']['name'];
                        $ImageURL_tmp = $_FILES['ImageURL']['tmp_name'];

                        move_uploaded_file($ImageURL_tmp, "images/$ImageURL");

                        // Câu truy vấn SQL để thêm sản phẩm
                        $sql = "INSERT INTO Products (ProductName, Description, Price, Stock,CategoryID, ImageURL)
                        VALUES ('$ProductName', '$Description', '$Price', '$Stock','$CategoryID', '$ImageURL')";

                        if (mysqli_query($conn, $sql)) {
                            echo "<script>alert('Add Product Successful');</script>";
                        } else {
                            echo "<script>alert('Add Product Error');</script>";
                        }
                    }
                    mysqli_close($conn);
                    ?>
                </div>
            </section>
        </div>
    </div>

    <footer>
        <p>&copy; 2024 Kawaii Computer Store. All rights reserved.</p>
    </footer>
</body>
</html>
