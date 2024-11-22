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
            display: flex;
            flex-direction: column;
            align-items: center;

        }

        .single_product form {
            display: flex;
            justify-content: space-between;
            gap: 10px;
            /* Khoảng cách giữa các nút */
        }

        .single_product img {
            width: 180px;
            height: 180px;
            border: 2px solid black;

        }


        .single_product a,
        .single_product form {
            display: inline-block;
            margin: 3px;
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
                        <li class="nav-item"><a class="nav-link" href="Cart.php">Cart</a></li>
                        <li class="nav-item"><a class="nav-link" href="Login.php">Logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <?php
    include 'Connect.php';

    if (isset($_GET['search'])) {
        // Lấy dữ liệu từ form tìm kiếm
        $search = $_GET['user_query'];
    } else {
        $search = ''; // Trường hợp không có từ khóa tìm kiếm
    }

    ?>

    <div class="products_box">
        <h3>The search results for: <?php echo htmlspecialchars($search); ?></h3>


        <?php
        // Truy vấn cơ sở dữ liệu với từ khóa tìm kiếm
        $sql = "SELECT * FROM Products WHERE ProductName LIKE '%{$search}%'";

        $result = mysqli_query($conn, $sql);

        while ($row_product = mysqli_fetch_array($result)) {
            $ProductID = $row_product['ProductID'];
            $ProductName = $row_product['ProductName'];
            $Price = $row_product['Price'];
            $ImageURL = $row_product['ImageURL'];
            $Stock = $row_product['Stock'];
            $Description = $row_product['Description'];

            echo "
           <div class='single_product'>
                <h3>$ProductName</h3>
                <img src='images/$ImageURL' width='180' height='180' alt='Image of $ProductName' />
                <p>$Description</p>
                <p><b>Price: $Price VNĐ</b></p>
                <a href='ProductDetail.php?id=$ProductID'>
                    <button style='background-color: #00BFFF; color: white;'>Details</button>
                </a>
                <form action='Cart.php' method='POST'>
                    <input type='hidden' name='ProductID' value='$ProductID'>
                    <button type='submit' style='background-color: #32CD32; color: white;'>Add to Cart</button>
                </form>

             </div>
        ";
        }


        ?>


</body>

</html>