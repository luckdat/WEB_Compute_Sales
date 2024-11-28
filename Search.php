<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="home.css">
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
                <a href='ProductDetail.php?id=$ProductID'>Details</a>
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