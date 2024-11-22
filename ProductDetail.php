<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Detail</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        body {
            background-color: #e8f0fe;

        }

        .hero {
            height: 100px;
            display: flex;
            justify-content: center;
            align-items: center;
            color: black;
            text-align: center;
        }

        .hero h2 {
            font-size: 48px;
        }

        .product-item {
            text-align: center;
            margin-bottom: 30px;
        }

        footer {
            background-color: #343a40;
            color: white;
            padding: 20px 0;
            text-align: center;
        }

        .search {
            margin: 20px 0;
        }

        .products_box {
            display: flex;
            flex-wrap: wrap;
            gap: 50px;
            justify-content: center;
        }

        .single_product {
            border: 1px solid black;
            padding: 10px;
            text-align: center;
            width: 280px;
            height: auto;
            background-color: white;
        }

        .single_product img {
            width: 180px;
            height: 180px;
            border: 2px solid black;
        }

        .single_product:hover img {
            opacity: 0.7;
        }
    </style>
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
                        <li class="nav-item"><a class="nav-link" href="Product.php">Product Management</a></li>
                        <li class="nav-item"><a class="nav-link" href="ProductDetail.php"><b>Product Detail</b></a></li>
                        <li class="nav-item"><a class="nav-link" href="Cart.php">Cart</a></li>
                        <li class="nav-item"><a class="nav-link" href="Login.php">Logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>


    <div class="container">
        <?php
        include "Connect.php";
        // Kiểm tra xem tham số id có tồn tại trong URL không
        if (isset($_GET["id"]) && is_numeric($_GET["id"])) {
            $id = $_GET["id"];
            $sql = "SELECT * FROM Products WHERE ProductID={$id}";
            $result = mysqli_query($conn, $sql);

            // Kiểm tra nếu có dữ liệu trả về từ truy vấn
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $ProductID = $row['ProductID'];
        ?>
                    <div class="row mt-5">
                        <div class="col-md-6">
                            <img src="images/<?php echo $row['ImageURL']; ?>" class="img-fluid" alt="Product Image">
                        </div>
                        <div class="col-md-6">
                            <h2>Name Of Product: <?php echo $row['ProductName']; ?></h2>
                            <p style="color: black;">Stock: <?php echo $row['Stock'] . " Pieces"; ?></p>
                            <p style="color: red;">Price: <?php echo $row['Price'] . " $"; ?></p>
                            <!-- <a href='Cart.php?ProductID=<?php echo $ProductID; ?>'>
                                <button class="btn btn-primary">Add to Cart</button>
                            </a> -->
                            <form action="Cart.php" method="POST">
                                <input type="hidden" name="ProductID" value="<?php echo $ProductID; ?>">
                                <input type="hidden" name="Quantity" value="1">
                                <button type="submit" class="btn btn-success">Add to Cart</button>
                            </form>
                            <h3 class="mt-4">Basic product info:</h3>
                            <p><?php echo $row["Description"]; ?></p>
                        </div>
                    </div>
        <?php
                }
            } else {
                echo "<div class='alert alert-danger mt-5'>Product not found!</div>";
            }
        } else {
            echo "<div class='alert alert-danger mt-5'>Please select products to Display</div>";
        }
        mysqli_close($conn);
        ?>
        <section id="products" class="container mt-5">

            <div class="products_box">

                <?php
                include "Connect.php";

                $sql = "SELECT * FROM Products LIMIT 12";
                $result = mysqli_query($conn, $sql);

                if ($result && mysqli_num_rows($result) > 0) {
                    // Lặp qua từng hàng dữ liệu
                    while ($row_product = mysqli_fetch_assoc($result)) {

                        $ProductID = $row_product['ProductID'];
                        $ProductName = $row_product['ProductName'];
                        $Description = $row_product['Description'];
                        $Price  = $row_product['Price'];
                        $Stock  = $row_product['Stock'];
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
                            <input type="hidden" name="Quantity" value="1"> <!-- Mặc định số lượng là 1 -->
                            <button type="submit" class="btn btn-success">Add to Cart</button>
                        </form>
                <?php
                    }
                } else {
                    echo "<p class='text-center'>No products found.</p>";
                }
                mysqli_close($conn);

                ?>
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