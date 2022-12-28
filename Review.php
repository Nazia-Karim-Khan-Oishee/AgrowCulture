<?php 

include 'Config.php';

error_reporting(0);

session_start();
$user_name = $_SESSION['user_name'];


    
    $NAME=$_GET['resid'];    
    
    
    if(isset($_POST['reviewing']))
    {
        $Rating = $_POST['rating'];
        if($Rating===null)
        {
            $Err="Select Rating! ";

        }
        else{

            $connect = mysqli_query($Conn, "INSERT INTO `review`(`user_name`, `Seller_id`,`Review`) VALUES ('$user_name','$NAME','$Rating');");
            if($connect)
            {
                $Err1="Your review has been submitted. ";

            }
        }
    //     echo  $NAME;
    //    echo  $user_name;
    //    echo $Rating;


 }



        
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title>Product</title>
        <link rel="stylesheet" href="review.css">
        <link rel="stylesheet" href="nav.css">
     
<script>
      if(window.history.replaceState){
        window.history.replaceState(null,null,window.location.href);
      }
    </script>
</head>
<body>
<nav class="navbar">
            <div class="nav">
                <h1>AGROWCULTURE</h1>
                <div class="nav-items">
                <div class="cart">
                    <a href="dashboard.php"><img src="user.png" alt=""></a>
                    <a href="cart.php"><img src="cart.png" alt=""></a>
                </div> 
                </div>
            </div>
            <ul class="links-container">
            <li class="link-item"><a href="#" class="link">HOME</a></li>
            <li class="link-item"><a href="#" class="link">SERVICES</a></li>
            <li class="link-item"><a href="vegetables.php" class="link">VEGETABLES</a></li>
            <li class="link-item"><a href="fruits.php" class="link">FRUITS</a></li>
            <li class="link-item"><a href="fish.php" class="link">FISH</a></li>
            <li class="link-item"><a href="meat.php" class="link">MEAT</a></li>
            </ul>
         </nav>
   
<form action="" method="post" accept-charset="utf-8">
    <fieldset><legend><h4><b>How much you liked the product!!<b></h4></legend><br>	
    
    <div class="rate">
    <p><label for="rating"><h3><b>Rating<b></h3></label>
    <input type="radio" name="rating" value="1" /> 1 <input type="radio" name="rating" value="2" /> 2
      <input type="radio" name="rating" value="3" /> 3 <input type="radio"
      name="rating" value="4" /> 4 <input type="radio" name="rating" value="5" /> 5</p></div>
    <!-- <p><label for="review">Review</label><textarea name="review" rows="8" cols="40">
       </textarea></p> -->
       <span class="ERR"> <?php echo $Err ;?></span>
       <span> <?php echo $Err1 ;?></span>
       <p><input type="submit" name="reviewing" value="Submit Review">
       <a href="purchase.php">Continue Shopping</a></p>
    <!-- <input type="hidden" name="product_type" value="actual_product_type" id="product_type">
    <input type="hidden" name="product_id" value="actual_product_id" id="product_id"> -->
</fieldset>
</form>
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
</body>
</html>