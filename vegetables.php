<?php
    include 'Config.php';
    error_reporting(0);
    session_start();

    if(isset($_POST['submit']))
    {
        
    }

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title>vegetables</title>
         <link rel="stylesheet" href="nav.css"> 
         <link rel="stylesheet" href="vegetables.css"> 
        
    </head>
    <body>
     <nav class="navbar">
        <div class="nav">
            <h1>AGROWCULTURE</h1>
            <div class="nav-items">
                <div class="cart">
                    <a href="#"><img src="user.png" alt=""></a>
                    <a href="cart.php"><img src="cart.png" alt=""><span>0</span></a>
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
    
     <div class="product-container">
         <?php    
                // image fetching
                $img = mysqli_query($Conn, "SELECT image,Seller_id, product_name, unit_price FROM sell where Field='Vegetables'");
                while ($row = mysqli_fetch_array($img)) 
                {   
                    
                    ?>  
                    <div class="product-card">
                    <div class="product-image">
                    <?php
                    echo "<img src='images/".$row['image']."' class='product-thumb' style = 'width:400px;height:400px;' >";   
                    echo "<a class='add-cart' href='#'>Add to cart</a>"; 
                    ?>
                    </div>
                    <div class="product-info">
                    <?php
                    echo "<h2 class='product-brand'>".($row['product_name'])."</h2>";
                    echo "<span class='price' >".($row['unit_price'])."</span><br><br>";
                    $NAME=$row['Seller_id'];
                    ?>
                    <form action="product.php" method="POST" autocomplete="off" class="sign-up-form">
        <?php
                    echo "<button name='apply' value=$NAME class='button-68'  role='button'>Details</button>";
                       // echo "<script>alert('Wow!.')</script>";

                    ?>
                    </form>
                    </div>
                    </div>
                    <?php
                } 
                ?> 
                <!-- <img src="tomato.jpg" class="product-thumb" alt=""> -->
                <!-- <h2 class="product-brand">Tomato</h2> -->
                <!-- <span class="price">130Tk/kg</span><br> -->

     </div>
     <script src="cart.js"></script>
    </body>
</html>