    <?php
    include "Connect.php";
    session_start();

    $UserID = $_SESSION['UserID'];
    // Truy vấn thông tin giỏ hàng của người dùng
    $sql_cart = "
        SELECT 
            c.CartID, 
            c.Quantity, 
            p.ProductName, 
            p.Price, 
            p.ImageURL
        FROM Cart c
        INNER JOIN Products p ON c.ProductID = p.ProductID
        WHERE c.UserID = $UserID
    ";
    $result_cart = mysqli_query($conn, $sql_cart);

    // Tính tổng giá tiền
    $total_price = 0;
    ?>
    <!DOCTYPE html>
    <html lang="vi">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home</title>
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
                            <li class="nav-item"><a class="nav-link active" aria-current="page" href="#home"><b>Home</b></a></li>
                            <li class="nav-item"><a class="nav-link" href="Product.php">Product Management</a></li>

                            <li class="nav-item"><a class="nav-link" href="ProductDetail.php?id=<?php echo $ProductID; ?>">Product Detail</a></li>
                            <li class="nav-item"><a class="nav-link" href="Cart.php?ProductID=<?php echo $ProductID; ?>">Cart</a></li>
                            <li class="nav-item"><a class="nav-link" href="Login.php">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>

        <div class="container">
            <h1>Giỏ hàng của bạn</h1>

            <?php if ($result_cart && mysqli_num_rows($result_cart) > 0) : ?>
                <table border="1" cellpadding="10" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Hình ảnh</th>
                            <th>Tên sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Giá</th>
                            <th>Thành tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($cart_item = mysqli_fetch_assoc($result_cart)) : ?>
                            <?php
                            $ProductName = htmlspecialchars($cart_item['ProductName']);
                            $Price = $cart_item['Price'];
                            $Quantity = $cart_item['Quantity'];
                            $ImageURL = htmlspecialchars("images/" . $cart_item['ImageURL']);
                            $subtotal = $Price * $Quantity;
                            $total_price += $subtotal;
                            ?>
                            <tr>
                                <td><img src="<?php echo $ImageURL; ?>" alt="<?php echo $ProductName; ?>" style="width: 100px;"></td>
                                <td><?php echo $ProductName; ?></td>
                                <td><?php echo $Quantity; ?></td>
                                <td><?php echo number_format($Price, 0, ',', '.'); ?> VNĐ</td>
                                <td><?php echo number_format($subtotal, 0, ',', '.'); ?> VNĐ</td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
                <h3>Tổng cộng: <?php echo number_format($total_price, 0, ',', '.'); ?> VNĐ</h3>
                <a href="Checkout.php" class="btn btn-primary">Thanh toán</a>
                <a href="Home.php" class="btn btn-secondary">Tiếp tục mua sắm</a>
            <?php else : ?>
                <p>Giỏ hàng của bạn đang trống.</p>
                <a href="Home.php" class="btn btn-secondary">Tiếp tục mua sắm</a>
            <?php endif; ?>
        </div>
    </body>

    </html>

    <?php
    mysqli_close($conn);
    ?>