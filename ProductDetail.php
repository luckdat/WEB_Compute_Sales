<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Detail</title>
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

                $sql = "SELECT * FROM Products LIMIT 8";
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
            <footer>
                <p>&copy; 2024 Kawaii Computer Store. Tất cả quyền được bảo lưu.</p>
            </footer>
</body>

</html>