<?php
    include 'Config.php';
    error_reporting(0);
    session_start();

    if(isset($_POST['apply']))
    {
        $product_name = $_POST['meh_id'];
        $query =  mysqli_query($Conn, "SELECT * FROM `temporary` where Seller_id ='$product_name'");
        $rowCount = mysqli_num_rows($query);
        
        if($rowCount > 0)                                            
        {
            $check_query = mysqli_query($Conn, "UPDATE temporary SET `Quantity`=`Quantity`+1 WHERE `Seller_id` = '$product_name'");
            $ch_query = mysqli_query($Conn, "UPDATE `sell` SET `Quantity`=`Quantity`-1 WHERE `Seller_id` = '$product_name'");
           if($ch_query&&$check_query)
           {
                unset($product_name);
                ?>
                <script>
                window.location.replace("Vegetables.php");
                </script>
                <?php
           }
           else
           {
                unset($product_name);
                echo "Cannot update sell";
                ?>
                <script>
                  window.location.replace("Vegetables.php");
                </script>
                <?php
           }
        }
        else
        {
            $connect = mysqli_query($Conn, "INSERT INTO temporary (Seller_id, Quantity) VALUES ('$product_name', 1)");
            $chec_query = mysqli_query($Conn, "UPDATE `sell` SET `Quantity`=`Quantity`-1 WHERE `Seller_id` = '$product_name'");
            
            unset($product_name);
            if($chec_query)
            {
                ?>
                <script>
                window.location.replace("Vegetables.php");
                </script>
                <?php
            }
            else
            {
                echo "Error found";
                ?>
                <script>
                window.location.replace("Vegetables.php");
                </script>
                <?php
            }
        }
    }
    
?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <script>
      if(window.history.replaceState){
        window.history.replaceState(null,null,window.location.href);
      }
    </script>
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
                    <a href="dashboard.php">
                        <!-- <img src="user.png" alt=""> -->
                        <?php
                            echo $_SESSION['user_name'];
                        ?>
                    </a>
                    <a href="cart.php"><img src="cart.png" alt=""><span>
                        <?php
                            $que = mysqli_query($Conn, "SELECT * from `temporary`");
                            $rowCount = mysqli_num_rows($que);
                            echo "$rowCount";
                        ?>
                    </span></a>
                </div> 
            </div>
        </div>
        <ul class="links-container">
        <li class="link-item"><a href="getstartedpage.php" class="link">HOME</a></li>
        <li class="link-item"><a href="4optionss.php"  class="link">SERVICES</a></li>
        <li class="link-item"><a href="crops.php" class="link">CROPS</a></li>
        <li class="link-item"><a href="vegetables.php" class="link">VEGETABLES</a></li>
        <li class="link-item"><a href="fruits.php" class="link">FRUITS</a></li>
        <li class="link-item"><a href="fish.php" class="link">FISH</a></li>
        <li class="link-item"><a href="meat.php" class="link">MEAT</a></li>

        </ul>
     </nav> 
     <div class="bg">
     <div class="product-container">
         <?php    
                // image fetching
                $img = mysqli_query($Conn, "SELECT image, Seller_id, product_name, unit_price, Quantity FROM sell where Field='Vegetables'");

                $rowCount = mysqli_num_rows($img);
                
                if($rowCount==0)
                {
                //   header("Location:ProductEmpty.php");
                echo "<p>No vegetable for sale currently!</p>";
                }
                else{
                while($row=mysqli_fetch_array($img)) 
                {   
                    $ID=$row['Seller_id'];
                    // echo $ID;
                     $fetch_rev = mysqli_query($Conn, "SELECT AVG(Review) AS avg_rev FROM review WHERE Seller_id='$ID'" );
                     $rows = mysqli_fetch_assoc($fetch_rev);
                     $sum = (int)$rows['avg_rev'];
                    //  echo $sum;

                   // echo "<script>alert('Wow!.')</script>";

                    ?>  
                    <div class="product-card">
                    <div class="product-image">
                    <?php
                    echo "<img src='images/".$row['image']."' class='product-thumb' style = 'width:400px;height:400px;' >";   
                    // echo "<a class='add-cart' href='#'>Add to cart</a>"; 
                    ?>
                    </div>
                    <div class="product-info">
                    <?php
                    echo "<h2 class='product-brand'>".($row['product_name'])."</h2>";
                    echo "<span class='price' >Seller ID: ".($row['Seller_id'])."    (Rating: ".$sum." out of 5)"."</span><br>";
                    echo "<span class='price' >Unit Price: ".($row['unit_price'])."Tk/kg</span><br>";
                    $Quantity = $row['Quantity'];
                    if($Quantity == 0)
                    {
                        echo "<span class='price' >Quantity: Sold out</span><br><br>";
                        $NAME = $row['Seller_id'];
                        ?>
                        <form action="" method="POST" autocomplete="off" class="sign-up-form">
                            <?php
                            echo "<input type='hidden' name='meh_id' value = $NAME>";
                            echo "<button name='no_name' value = $NAME class='button-68'  role='button'>Cannot add more</button> ";
                            echo "  ";
                            echo "<button name='review' value = $NAME class='button-68'  role='button'><a href='Review.php'>Add Review</a></button>";
                            ?>
                        </form>
                        <?php
                    }
                    else
                    {
                        echo "<span class='price' >Quantity: ".($row['Quantity'])."</span><br><br>";
                        $NAME = $row['Seller_id'];
                        ?>
                        <form action="" method="POST" autocomplete="off" class="sign-up-form">
                            <?php
                            echo "<input type='hidden' name='meh_id' value = $NAME>";
                            echo "<button name='apply' value = $NAME class='button-68'  role='button'>Add to cart</button>";echo "  ";
                            ?>
                            <form action="Review.php" method="POST" autocomplete="off" class="sign-up-form">
                            <?php
                            echo'<a class="btn" href="Review.php?resid='.$NAME.'">Add Review</a>';
                            ?>
                        </form>
                        </form>
                       <?php 
                    }
                    
                ?>
                    </div>
                    </div>
                    <?php
                } 
                }
                ?> 
                <!-- <img src="tomato.jpg" class="product-thumb" alt=""> -->
                <!-- <h2 class="product-brand">Tomato</h2> -->
                <!-- <span class="price">130Tk/kg</span><br> -->

     </div>
            </div>
            <footer>
<div class="row">
    <div class="col">
        <h3>AGROWCULTURE</h3>
        <p>Agrowculture is a platform created to expand the exposure of the people working in the agricultural sector. On a single platform, Agrowculture connects these people with funders and customers by eliminating intermediaries. It also enables Bangladesh agriculture financing. Anyone can connect through Agrowculture to help finance our farmers.</p>
    </div>
    <div class="col">
        <h5>Address <div class="underline"><span></span></div></h5>
        <p>Islamic University of Technology</p>
        <p>Boardbazar,Gazipur</p>
    </div>
    <div class="col">
        <h5>Links <div class="underline"><span></span></div></h5>
        <ul>
            <li><a href="getstartedpage.php">HOME</a></li>
            <li><a href="4optionss.php">SERVICES</a></li>
            <li><a href="aboutus.php">ABOUT US</a</li>
            <li><a href="aboutus.php">CONTACTS</a</li>

        </ul>
    </div>

    <ul class="social_icon">
        <li><a href="#"><ion-icon name="logo-facebook"></ion-icon></a></li>
        <li><a href="#"><ion-icon name="logo-twitter"></ion-icon></a></li>
        <li><a href="#"><ion-icon name="logo-instagram"></ion-icon></a></li>
        <li><a href="#"><ion-icon name="logo-linkedin"></ion-icon></a></li>
      </ul>
    </div>
    <hr>
    <div class="copyright">
          <p class="copyright">2022 Copyright © Agrowculture. | Legal | Privacy Policy | Design by Namiha</p>
          </div>
</footer>
     <!-- <script src="cart.js"></script> -->
    </body>
</html>