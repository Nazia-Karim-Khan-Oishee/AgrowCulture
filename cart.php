<?php
    include 'Config.php';
    error_reporting(0);
    session_start();
    $user_name = $_SESSION['user_name'];
    
    if(isset($_POST['update_update_btn']))
    {
        $quantity = $_POST['up_quantity'];
        $update_value = $_POST['update_quantity'];
        $update_id = $_POST['update_quantity_id'];
        $update_sell_page = mysqli_query($Conn, "UPDATE `sell` SET `Quantity`=`Quantity`+ ('$quantity' -'$update_value') WHERE Seller_id = '$update_id'");
        $update_quantity_query = mysqli_query($Conn, "UPDATE `temporary` SET `Quantity` = '$update_value' WHERE Seller_id = '$update_id'");
        if($update_quantity_query && $update_sell_page){
            header('location:cart.php');
        }
        else
        {
            echo "An error occurred";
            header('cart.php');
        }
    }
     
    if(isset($_POST['remove']))
    {
        $update_value = $_POST['up_quantity'];
        $remove_id = $_POST['remove_id'];
        mysqli_query($Conn, "DELETE FROM `temporary` WHERE Seller_id = '$remove_id'");
        mysqli_query($Conn, "UPDATE `sell` SET `Quantity`=`Quantity`+'$update_value' WHERE Seller_id = '$remove_id'");
        header('location:cart.php');
    }
    if(isset($_POST['checkout']))
    {
        $address = $_POST['Address'];
        if($address==null)
        {
            $message="Insert an address first";
        }
        else{

            $purchase = mysqli_query($Conn, "SELECT * FROM `temporary`");
            if($purchase)
            {
                while($rows = mysqli_fetch_array($purchase))
                {
                    $purSellerID = $rows['Seller_id'];
                    $quant = $rows['Quantity'];
                    mysqli_query($Conn, "INSERT into `purchase` (Purchase_id, user_name, Seller_id, Quantity, Address) VALUES (NULL,'$user_name','$purSellerID','$quant','$address')");
                    mysqli_query($Conn, "DELETE FROM `temporary` WHERE Seller_id = '$purSellerID'");
                }
            }
            header('location:CheckingDone.php');
        }
        //echo "Done";
    }
     
    // if(isset($_POST['chekout']))
    // {
    //     $selectfromtemp = mysqli_query($Conn, "SELECT * FROM `temporary`");
    //     while($row=mysqli_fetch_array($selectfromtemp))
    //     {
    //         $id = $row['Seller_id'];
    //         $quantity = $row['Quantity'];

    //         $update_query = mysqli_query($Conn, "UPDATE `sell` SET `Quantity`=`Quantity`-'$quantity' WHERE `Seller_id` = '$id'");
    //         echo "HIIIIIII";
           
    //         header('location:purchase.php');

    //         //$selectfromsell= mysqli_query($Conn, "SELECT * FROM `sell` where `Seller_id`=$cart_id");
    //         //$fetch_product = mysqli_fetch_assoc($select_product);   
    //     }
    // }
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
        <li class="link-item"><a href="vegetables.php" class="link">VEGETABLES</a></li>
        <li class="link-item"><a href="fruits.php" class="link">FRUITS</a></li>
        <li class="link-item"><a href="fish.php" class="link">FISH</a></li>
        <li class="link-item"><a href="meat.php" class="link">MEAT</a></li>
        </ul>
     </nav> 
    
    <div class="products-container">
        <section class="shopping-cart">
        <div class="product-header">
            <!-- <h5 class="product-title">PRODUCT</h5>
            <h5 class="price">PRICE</h5>
            <h5 class="quantity">QUANTITY</h5>
            <h5 class="total">TOTAL</h5> -->
    <table>

        <thead>
            <tr>
                <th>Name</th>
                <th>Unit price</th>
                <th>Quantity</th>
                <th>Total price</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            <?php
              
            $select_cart = mysqli_query($Conn, "SELECT * FROM `temporary`");
            $grand_total = 0;
            // echo "hi llow";
            if(mysqli_num_rows($select_cart) > 0)
            {
                while($row=mysqli_fetch_array($select_cart))
                {
                    $cart_id = $row['Seller_id'];
                    $select_product = mysqli_query($Conn, "SELECT * FROM `sell` where `Seller_id`=$cart_id");
                    // echo "HIIIIIII";
                    $fetch_product = mysqli_fetch_assoc($select_product);    
                ?>
                <tr>
                    <td><?php echo $fetch_product['product_name']; ?></td>
                    <td>Tk<?php echo number_format($fetch_product['unit_price']); ?>/-</td>
                    <td>
                    <form action="" method="post">
                        <input type="hidden" name="up_quantity" min="1"  value="<?php echo $row['Quantity']; ?>" >
                        <input type="hidden" name="update_quantity_id"  value="<?php echo $row['Seller_id']; ?>" >
                        <input type="number" name="update_quantity" min="1"  value="<?php echo $row['Quantity']; ?>" >
                        <input type="submit" value="update" name="update_update_btn">
                    </form>   
                    </td>
                    <td>Tk<?php echo $sub_total = number_format($fetch_product['unit_price'] * $row['Quantity']); ?>/-</td>
                    <td>
                        <form action="" method="post">
                            <input type="hidden" name="up_quantity" min="1"  value="<?php echo $row['Quantity']; ?>" >
                            <input type="hidden" name="remove_id" value="<?php echo $row['Seller_id']; ?>" >
                            <input type="submit" value="remove" name="remove">
                        </form>
                        <!-- <a href="cart.php?remove=<?php 
                        // $val = $row['Quantity'];
                        // echo $row['Seller_id']; 
                        ?>" 
                        onclick="return confirm('remove item from cart?')" class="delete-btn"> <i class="fas fa-trash"></i> remove</a> -->
                    </td>
                </tr>
                <?php
                $grand_total += $sub_total;  
                };
            };
                ?>
            <tr class="table-bottom">
                <td><a href="purchase.php" class="option-btn" style="margin-top: 0;">continue shopping</a></td>
                <td colspan="2" class="grand-total">Grand Total:</td>
                <td>$<?php echo $grand_total; ?>/-</td>
                <!-- <td><a href="cart.php?delete_all" onclick="return confirm('are you sure you want to delete all?');" class="delete-btn"> <i class="fas fa-trash"></i> delete all </a></td> -->
            </tr>

        </tbody>

    </table>
    <form action="" method="post">
        <div class="checkout-btn">  
            <!-- <p class="address-label">Address: <input class="address-input" type="text" name="Address" value=""><span></span></p> -->
            <label class="address-label"><b>Address: </b></label>
            <input type="text" id="address-input" name="Address" value="" autofocus placeholder="Input Address Here" autocomplete="off"><span class="error"> <?php echo $message;?></span><br>
            <button><input type="submit" value="checkout" name="checkout"></button>
            
            <!-- <button name="checkout" role='button'><a href="checkout.php">procced to checkout</a></button><br><br> -->
        </form>
        <!-- <a href="checkout.php" class="btn <?= ($grand_total > 1)?'':'disabled'; ?>">procced to checkout</a> -->
        </div>
    </section>

            <?php    
                // // image fetching
                // $cart = mysqli_query($Conn, "SELECT Seller_id, Quantity FROM temporary");
                // $rowCount = mysqli_num_rows($cart);
                // if($rowCount==0)
                // {
                //     echo "<p>Cart is empty! <a href='Purchase.php'>Continue shopping</a></p>";
                // }
                // else{
                    
                // while($row=mysqli_fetch_array($cart)) 
                // {   
                //     $ID = $row['Seller_id'];
                //     $Quan = $row['Quantity'];
                //     $sales = mysqli_query($Conn, "SELECT Seller_id, product_name, unit_price, Quantity FROM sell where Seller_id='$ID'");
                //     $rowCount1 = mysqli_num_rows($sales);
                    // echo "<script>alert('Wow!.')</script>";
                    ?>  
                
                    
                    <!-- <div class="product-info"> -->
                    <?php
                    // echo "<h2 class='product-name'>".($row['product_name'])."</h2>";
                    // // echo "<span class='price' >Seller ID: ".($row['Seller_id'])."</span><br>";
                    // echo "<span class='price' >".($row['unit_price'])."Tk/kg</span><br>";
                    // echo "<span class='price' >".($Quan)."</span><br>";
                    // $total = $row['unit_price'] * $Quan;
                    // echo "<span class='price' >".($total)."</span><br><br>";
                    
                    ?>
                        <!-- <form action="" method="POST" autocomplete="off" class="sign-up-form"> -->
                    <?php 
                            // echo "<input type='hidden' name='meh_id' value = $NAME>";
                            // echo "<button name='apply' value = $NAME class='button-68'  role='button'>Add to cart</button>";
                    

                    ?>
                    <!-- </form>
                    
                    </div> -->
                    <?php
                // } 
                // }
                ?> 
        </div>
        <div class="products">
        </div>
    </div>
    <!-- <script src="cart.js"></script> -->
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
</body>
</html>