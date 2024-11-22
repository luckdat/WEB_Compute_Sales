<?php
session_start();
include "Connect.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ProductID = isset($_POST['ProductID']) ? intval($_POST['ProductID']) : 0;

    if ($ProductID > 0) {
        $sql_product = "SELECT * FROM Products WHERE ProductID = $ProductID";
        $result_product = mysqli_query($conn, $sql_product);

        if ($result_product && mysqli_num_rows($result_product) > 0) {
            $product = mysqli_fetch_assoc($result_product);

            // Lưu thông tin sản phẩm vào session giỏ hàng
            $cartItem = [
                'ProductID' => $product['ProductID'],
                'ProductName' => htmlspecialchars($product['ProductName']),
                'Description' => htmlspecialchars($product['Description']),
                'Price' => $product['Price'],
                'ImageURL' => "images/" . htmlspecialchars($product['ImageURL']),
                'Quantity' => 1
            ];

            if (!isset($_SESSION['cart'])) {
                $_SESSION['cart'] = [];
            }

            // Kiểm tra nếu sản phẩm đã có trong giỏ hàng
            $found = false;
            foreach ($_SESSION['cart'] as &$item) {
                if ($item['ProductID'] == $ProductID) {
                    $item['Quantity']++;
                    $found = true;
                    break;
                }
            }
            unset($item);

            if (!$found) {
                $_SESSION['cart'][] = $cartItem;
            }
        } else {
            echo "<p>Không tìm thấy sản phẩm.</p>";
        }
    } else {
        echo "<p>Dữ liệu sản phẩm không hợp lệ.</p>";
    }
}

// Xóa sản phẩm trong giỏ hàng
if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['ProductID'])) {
    $ProductID = intval($_GET['ProductID']);
    foreach ($_SESSION['cart'] as $key => $item) {
        if ($item['ProductID'] == $ProductID) {
            unset($_SESSION['cart'][$key]);
            $_SESSION['cart'] = array_values($_SESSION['cart']);
            break;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
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

                            <li class="nav-item"><a class="nav-link" href="ProductDetail.php">Product Detail</a></li>
                            <li class="nav-item"><a class="nav-link" href="Cart.php"><b>Cart</b></a></li>
                            <li class="nav-item"><a class="nav-link" href="Login.php">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>

        <div class="container">
            <h1 class="mt-4">Here is your shopping cart</h1>

            <div class="container">
                <?php if (!empty($_SESSION['cart'])) : ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ImageURL</th>
                                <th>Product Name</th>
                                <th>Stock</th>
                                <th>Price</th>
                                <th>Total</th>
                                <th>Funcsion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($_SESSION['cart'] as $item) : ?>
                                <tr>
                                    <td><img src="<?php echo $item['ImageURL']; ?>" alt="<?php echo $item['ProductName']; ?>" style="width: 50px;"></td>
                                    <td><?php echo $item['ProductName']; ?></td>
                                    <td><?php echo $item['Quantity']; ?></td>
                                    <td><?php echo number_format($item['Price'], 0, ',', '.'); ?> VNĐ</td>
                                    <td><?php echo number_format($item['Price'] * $item['Quantity'], 0, ',', '.'); ?> VNĐ</td>
                                    <td><a href="Cart.php?action=delete&ProductID=<?php echo $item['ProductID']; ?>" class="btn btn-danger btn-sm">Xóa</a></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <a href="Home.php" class="btn btn-primary">Continue Shopping</a>
                   
                <?php else : ?>
                    <p>Your cart is currently empty!</p>
                    <a href="Home.php" class="btn btn-primary">Return to Store</a>
                <?php endif; ?>
            </div>
           
    </body>

</html>
<?php
mysqli_close($conn);
?>