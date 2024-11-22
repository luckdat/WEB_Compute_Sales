<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        body {
            background-color: #e8f0fe;
        }

        .login-container {
            margin-top: 10px;
            margin-left: 0%;
            padding: 20px;
        }

        .product-item {
            text-align: center;
            margin-bottom: 30px;
        }

        .single_product {
            border: 1px solid black;
            padding: 10px;
            text-align: center;
            width: 235px;
            height: auto;
            margin: 20px;
            box-sizing: border-box;
            background-color: white;

        }

        .single_product img {
            width: 150px;
            height: 150px;
            border: 2px solid black;

        }

        .single_product:hover img {
            opacity: 0.7;
        }

        footer {
            background-color: #343a40;
            color: white;
            padding: 20px 0;
            text-align: center;
        }

        .products_box {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            justify-content: flex-start;
        }

        .form-group {
            margin-left: 0px;
            padding: 7px;
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Kawaii Computer Store</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="Home.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#productmanagement"><b>Product Management</b></a></li>

                        <li class="nav-item"><a class="nav-link" href="ProductDetail.php">Product Detail</a></li>
                        <li class="nav-item"><a class="nav-link" href="Cart.php?">Cart</a></li>
                        <li class="nav-item"><a class="nav-link" href="Login.php">Logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-4">
                <div class="login-container">
                    <h2>New Product</h2>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="ProductName">Product Name:</label>
                            <input type="text" class="form-control" id="ProductName" placeholder="Enter Product Name" name="ProductName" required>
                        </div>
                        <div class="form-group">
                            <label for="Description">Description:</label>
                            <input type="text" class="form-control" id="Description" placeholder="Enter Description" name="Description" required>
                        </div>
                        <div class="form-group">
                            <label for="Price">Price:</label>
                            <input type="number" class="form-control" id="Price" placeholder="Enter Price" name="Price" required>
                        </div>
                        <div class="form-group">
                            <label for="Stock">Stock:</label>
                            <input type="number" class="form-control" id="Stock" placeholder="Enter Stock" name="Stock" required>
                        </div>
                        <div class="form-group">
                            <label for="CategoryID">Category ID:</label>
                            <input type="number" class="form-control" id="CategoryID" placeholder="Enter Category ID" name="CategoryID" required>
                        </div>
                        <div class="form-group">
                            <label for="ImageURL">Image URL:</label>
                            <input type="file" class="form-control" id="ImageURL" name="ImageURL" required>
                        </div>
                        <button type="submit" class="btn btn-success btn-block" style="margin: 20px;" name="Products">Add Product</button>
                    </form>
                </div>
            </div>

            <div class="col-md-8">
                <h2 class="text-center">View Information Products</h2>
                <div class="products_box">
                    <?php
                    include "Connect.php";


                    $sql = "SELECT * FROM Products LIMIT 6";
                    $result = mysqli_query($conn, $sql);

                    if ($result && mysqli_num_rows($result) > 0) {

                        while ($row_product = mysqli_fetch_assoc($result)) {
                            $ProductID = $row_product['ProductID'];
                            $ProductName = $row_product['ProductName'];
                            $Description = $row_product['Description'];
                            $Price = $row_product['Price'];
                            $Stock = $row_product['Stock'];
                            $CategoryID = $row_product['CategoryID'];
                            $ImageURL = $row_product['ImageURL'];
                    ?>

                            <!-- Hiển thị sản phẩm -->
                            <form class="single_product" action="Cart.php" method="POST">
                                <h3><?php echo htmlspecialchars($ProductName); ?></h3>
                                <img src="<?php echo htmlspecialchars("images/$ImageURL"); ?>" alt="<?php echo htmlspecialchars($ProductName); ?>">
                                <p style="margin: 10px;"><?php echo htmlspecialchars($Description); ?></p>
                                <p><b>Price: <?php echo number_format($Price, 0, ',', '.'); ?> VNĐ</b></p>
                                <a href="ProductDetail.php?id=<?php echo $ProductID ?>" class="btn btn-info">Details</a>
                                <!-- Ẩn giá trị ProductID để gửi qua POST -->
                                <input type="hidden" name="ProductID" value="<?php echo $ProductID; ?>">
                                <input type="hidden" name="Quantity" value="1">
                                <button type="submit" class="btn btn-success">Add to Cart</button>
                            </form>
                    <?php
                        }
                    } else {
                        echo "<p class='text-center'>No products found.</p>";
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
            </div>
        </div>
    </div>

    <section id="about" class="container mt-5 text-center">
        <h2>Giới Thiệu Về Chúng Tôi</h2>
        <p>Chúng tôi chuyên cung cấp các sản phẩm máy tính dễ thương và mạnh mẽ với giá cả phải chăng!</p>
    </section>

    <section id="contact" class="container mt-5 text-center">
        <h2>Liên Hệ Với Chúng Tôi</h2>
        <p>Email: info@kawaiicomputerstore.com</p>
        <p>Điện thoại: (123) 456-7890</p>
    </section>

    <footer>
        <p>&copy; 2024 Kawaii Computer Store. Tất cả quyền được bảo lưu.</p>
    </footer>
</body>

</html>