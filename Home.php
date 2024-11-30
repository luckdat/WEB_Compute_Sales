<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="Home.css">
</head>
<body>
    <header>
        <a class="navbar-brand" href="#">Kawaii Computer Store</a>
        <nav>
            <ul>
                <li><a href="#home"><b>Home</b></a></li>
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

    <form method="GET" action="Search.php" class="search">
        <input type="text" name="user_query" placeholder="Search Product"> <br>
        <button name="search">Search</button>
    </form>

    <section id="products">
        <h2 class="text-center">Featured Products About Desktop Computers</h2>
        <div class="products_box">
            <?php
            include "Connect.php";
            $sql = "SELECT * FROM Products LIMIT 15";
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
                    </form>
            <?php
                }
            } else {
                echo "<p>No products found.</p>";
            }
            mysqli_close($conn);
            ?>
        </div>
    </section>

    <section id="about">
        <h2>Giới Thiệu Về Chúng Tôi</h2>
        <p>Chúng tôi chuyên cung cấp các sản phẩm máy tính dễ thương và mạnh mẽ với giá cả phải chăng!</p>
    </section>

    <section id="contact" >
        <h2>Liên Hệ Với Chúng Tôi</h2>
        <p>Email: info@kawaiicomputerstore.com</p>
        <p>Điện thoại: (123) 456-7890</p>
    </section>

    <footer>
        <p>&copy; 2024 Kawaii Computer Store. Tất cả quyền được bảo lưu.</p>
    </footer>
</body>
</html>
