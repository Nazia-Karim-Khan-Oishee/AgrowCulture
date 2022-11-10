
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

    <script src="https://kit.fontawesome.com/87c14fe863.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="cart.css">
    <link rel="stylesheet" href="nav.css">
   
    
   
</head>
<body>

    <nav class="navbar">
        <div class="nav">
            <h1>AGROWCULTURE</h1>
            <div class="nav-items">
                <a href="#"><img src="user.png" alt=""></a>
                <div class="cart">
                <a href="cart.html"><img src="cart.png" alt=""><span>0</span></a>
            </div> 
           
            </div>
        </div>
        <ul class="links-container">
        <li class="link-item"><a href="#" class="link">HOME</a></li>
        <li class="link-item"><a href="#" class="link">SERVICES</a></li>
        <li class="link-item"><a href="#" class="link">VEGETABLES</a></li>
        <li class="link-item"><a href="#" class="link">FRUITS</a></li>
        <li class="link-item"><a href="#" class="link">FISH</a></li>
        <li class="link-item"><a href="#" class="link">MEAT</a></li>
        </ul>
     </nav> 
    
<!-- 
     <div class="cart-section">
        <div class="product-list">
            <p class="section-heading">your cart</p>
            <div class="cart-container">
                <img src="#" class="empty-img" alt="">
                  <div class="sm-product">
                    <img src="#" class="sm-product-img" alt="">
                    <div class="sm-text">
                        <p class="sm-product-name">Product</p>
                        <p class="sm-des">short des</p>
                    </div>
                    <div class="item-counter">
                        <button class="counter-btn decrement">-</button>
                        <p class="item-count">1</p>
                        <button class="counter-btn increment">+</button>
                    </div>
                    <p class="sm-price">$299</p>
                    <button class="sm-delete-btn"><img src="#" alt=""></button>
                </div> 
            </div>
        </div>

        <div class="checkout-section">
            <div class="checkout-box">
                <p class="text">your total bill,</p>
                <h1 class="bill">$00</h1>
                <a href="/checkout" class="checkout-btn">checkout</a>
            </div>
        </div>
    </div>  -->
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

    
</body>
</html>