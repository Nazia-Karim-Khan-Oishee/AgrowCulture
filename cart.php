<?php
    include 'Config.php';
    error_reporting(0);
    session_start();
    $user_name = $_SESSION['user_name'];
    // foreach($_SESSION['array'] as $key=>$value)
    // {
    // // and print out the values
    // echo 'The value of $_SESSION['."'".$key."'".'] is '."'".$value."'".' <br />';
    // }
    // if(isset($_POST['apply']))
    // {
    //     $value = $_POST['apply'];
    //     $_SESSION['product_id']=$value;
//         $value2=$_SESSION['product_id'];
//    echo "<script>alert($value2)</script>";
// }
    if(isset($_POST['apply']))
    {

    }
?>
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
                    <a href="dashboard.php">
                        <!-- <img src="user.png" alt=""> -->
                        <?php
                            echo $user_name;
                        ?>
                    </a>
                <!-- <a href="cart.php"><img src="cart.png" alt=""><span>0</span></a> -->
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
            <?php    
                // image fetching
                $cart = mysqli_query($Conn, "SELECT Seller_id, Quantity FROM temporary");
                $rowCount = mysqli_num_rows($cart);
                if($rowCount==0)
                {
                    echo "<p>Cart is empty! <a href='Purchase.php'>Continue shopping</a></p>";
                }
                else{
                    
                while($row=mysqli_fetch_array($cart)) 
                {   
                    $ID = $row['Seller_id'];
                    $Quan = $row['Quantity'];
                    $sales = mysqli_query($Conn, "SELECT Seller_id, product_name, unit_price, Quantity FROM sell where Seller_id='$ID'");
                    $rowCount1 = mysqli_num_rows($sales);
                    // echo "<script>alert('Wow!.')</script>";
                    ?>  
                
                    
                    <div class="product-info">
                    <?php
                    echo "<h2 class='product-name'>".($row['product_name'])."</h2>";
                    // echo "<span class='price' >Seller ID: ".($row['Seller_id'])."</span><br>";
                    echo "<span class='price' >".($row['unit_price'])."Tk/kg</span><br>";
                    echo "<span class='price' >".($Quan)."</span><br>";
                    $total = $row['unit_price'] * $Quan;
                    echo "<span class='price' >".($total)."</span><br><br>";
                    
                    ?>
                        <!-- <form action="" method="POST" autocomplete="off" class="sign-up-form"> -->
                    <?php 
                            // echo "<input type='hidden' name='meh_id' value = $NAME>";
                            // echo "<button name='apply' value = $NAME class='button-68'  role='button'>Add to cart</button>";
                    

                    ?>
                    </form>
                    
                    </div>
                    <?php
                } 
                }
                ?> 
        </div>
        <div class="products">
        </div>
    </div>
    <!-- <script src="cart.js"></script> -->
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
</body>
</html>