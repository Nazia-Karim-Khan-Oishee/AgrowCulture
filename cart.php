<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Store : Cart</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel&family=Lato&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/87c14fe863.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="cart.css">
    <link rel="stylesheet" href="nav.css"> 
</head>
<body>

    <nav class="navbar">
        <div class="nav">
            <h1>AGROWCULTURE</h1>
                <div class="cart">
                    <a href="#"><img src="user.png" alt=""></a>
                <a href="cart.php"><img src="cart.png" alt=""><span>0</span></a>
            </div> 
           
            </div>
        </div>
        <ul class="links-container">
        <li class="link-item"><a href="purchase.php" class="link">HOME</a></li>
        <li class="link-item"><a href="#" class="link">SERVICES</a></li>
        <li class="link-item"><a href="vegetables.html" class="link">VEGETABLES</a></li>
        <li class="link-item"><a href="fruits.php" class="link">FRUITS</a></li>
        <li class="link-item"><a href="fish.php" class="link">FISH</a></li>
        <li class="link-item"><a href="meat.php" class="link">MEAT</a></li>
        </ul>
     </nav> 
    
    <div class="products-container">
        <div class="product-header">
            <h5 class="product-title">PRODUCT</h5>
            <h5 class="price">PRICE</h5>
            <h5 class="quantity">QUANTITY</h5>
            <h5 class="total">TOTAL</h5>
        </div>
        <div class="products">
        </div>
    </div>
    <script src="cart.js"></script>
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
</body>
</html>