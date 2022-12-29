<?php 

include 'Config.php';

error_reporting(0);

session_start();
$user_name = $_SESSION['user_name'];


    
    $NAME=$_GET['resid'];    
    $ID=$NAME;
    // $fetch_rev = mysqli_query($Conn, "SELECT `review_id` FROM `review` WHERE Seller_id='$ID');" );
    // if($fetch_rev)
    // {
    //     echo "here";

    // }
    
    if(isset($_POST['reviewing']))
    {
        $description=$_POST['desc'];
        $Rating = $_POST['rating'];
        if($Rating===null )
        {
            $Err="Select Rating! ";

        }
        else{
      if($description==null)
      {
        $Err="Share your experience.";

      }
      else{

          $connect = mysqli_query($Conn, "INSERT INTO `review`(`user_name`, `Seller_id`,`Review`,`description`) VALUES ('$user_name','$NAME','$Rating','$description');");
          if($connect)
          {
              $Err1="Your review has been submitted. ";

          }
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
        <link rel="stylesheet" href="product.css">
     
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
                    <a href="dashboard.php">
                      <!-- <img src="user.png" alt=""> -->
                      <?php
                            echo $_SESSION['user_name'];
                        ?>
                    </a>
                    <a href="cart.php"><img src="cart.png" alt=""><span class="sp"><?php
                            $que = mysqli_query($Conn, "SELECT * from `temporary`");
                            $rowCount = mysqli_num_rows($que);
                            echo "$rowCount";?></span></a>
                     </div> 
                </div>
            </div>
            <ul class="links-container">
            <li class="link-item"><a href="#" class="link">HOME</a></li>
            <li class="link-item"><a href="#" class="link">SERVICES</a></li>
            <li class="link-item"><a href="purchase.php" class="link">PURCHASE</a></li>
            <li class="link-item"><a href="crops.php" class="link">CROPS</a></li>
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
     <div class="card"> 
  <div class="rating-container"> 
  
    <div class="rating">
      <form class="rating-form">

        <label for="super-happy">
    <input type="radio" name="rating" class="super-happy" id="super-happy" value="5" /> <svg viewBox="0 0 24 24"><path d="M12,17.5C14.33,17.5 16.3,16.04 17.11,14H6.89C7.69,16.04 9.67,17.5 12,17.5M8.5,11A1.5,1.5 0 0,0 10,9.5A1.5,1.5 0 0,0 8.5,8A1.5,1.5 0 0,0 7,9.5A1.5,1.5 0 0,0 8.5,11M15.5,11A1.5,1.5 0 0,0 17,9.5A1.5,1.5 0 0,0 15.5,8A1.5,1.5 0 0,0 14,9.5A1.5,1.5 0 0,0 15.5,11M12,20A8,8 0 0,1 4,12A8,8 0 0,1 12,4A8,8 0 0,1 20,12A8,8 0 0,1 12,20M12,2C6.47,2 2,6.5 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2Z" /></svg>
		</label> 

        <label for="happy">
			<input type="radio" name="rating" class="happy" id="happy" value="4"  />
			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="100%" height="100%" viewBox="0 0 24 24"><path d="M20,12A8,8 0 0,0 12,4A8,8 0 0,0 4,12A8,8 0 0,0 12,20A8,8 0 0,0 20,12M22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12A10,10 0 0,1 12,2A10,10 0 0,1 22,12M10,9.5C10,10.3 9.3,11 8.5,11C7.7,11 7,10.3 7,9.5C7,8.7 7.7,8 8.5,8C9.3,8 10,8.7 10,9.5M17,9.5C17,10.3 16.3,11 15.5,11C14.7,11 14,10.3 14,9.5C14,8.7 14.7,8 15.5,8C16.3,8 17,8.7 17,9.5M12,17.23C10.25,17.23 8.71,16.5 7.81,15.42L9.23,14C9.68,14.72 10.75,15.23 12,15.23C13.25,15.23 14.32,14.72 14.77,14L16.19,15.42C15.29,16.5 13.75,17.23 12,17.23Z" /></svg>
			</label>

        <label for="neutral">
        <input type="radio" name="rating" class="neutral" id="neutral"value="3" /> 
			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="100%" height="100%" viewBox="0 0 24 24"><path d="M8.5,11A1.5,1.5 0 0,1 7,9.5A1.5,1.5 0 0,1 8.5,8A1.5,1.5 0 0,1 10,9.5A1.5,1.5 0 0,1 8.5,11M15.5,11A1.5,1.5 0 0,1 14,9.5A1.5,1.5 0 0,1 15.5,8A1.5,1.5 0 0,1 17,9.5A1.5,1.5 0 0,1 15.5,11M12,20A8,8 0 0,0 20,12A8,8 0 0,0 12,4A8,8 0 0,0 4,12A8,8 0 0,0 12,20M12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22C6.47,22 2,17.5 2,12A10,10 0 0,1 12,2M9,14H15A1,1 0 0,1 16,15A1,1 0 0,1 15,16H9A1,1 0 0,1 8,15A1,1 0 0,1 9,14Z" /></svg>
			</label>

        <label for="sad">
			<input type="radio" name="rating" class="sad" id="sad" value="2" />
			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="100%" height="100%" viewBox="0 0 24 24"><path d="M20,12A8,8 0 0,0 12,4A8,8 0 0,0 4,12A8,8 0 0,0 12,20A8,8 0 0,0 20,12M22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12A10,10 0 0,1 12,2A10,10 0 0,1 22,12M15.5,8C16.3,8 17,8.7 17,9.5C17,10.3 16.3,11 15.5,11C14.7,11 14,10.3 14,9.5C14,8.7 14.7,8 15.5,8M10,9.5C10,10.3 9.3,11 8.5,11C7.7,11 7,10.3 7,9.5C7,8.7 7.7,8 8.5,8C9.3,8 10,8.7 10,9.5M12,14C13.75,14 15.29,14.72 16.19,15.81L14.77,17.23C14.32,16.5 13.25,16 12,16C10.75,16 9.68,16.5 9.23,17.23L7.81,15.81C8.71,14.72 10.25,14 12,14Z" /></svg>
			</label>

        <label for="super-sad">
			<input type="radio" name="rating" class="super-sad" id="super-sad" value="1" />
			<svg viewBox="0 0 24 24"><path d="M12,2C6.47,2 2,6.47 2,12C2,17.53 6.47,22 12,22A10,10 0 0,0 22,12C22,6.47 17.5,2 12,2M12,20A8,8 0 0,1 4,12A8,8 0 0,1 12,4A8,8 0 0,1 20,12A8,8 0 0,1 12,20M16.18,7.76L15.12,8.82L14.06,7.76L13,8.82L14.06,9.88L13,10.94L14.06,12L15.12,10.94L16.18,12L17.24,10.94L16.18,9.88L17.24,8.82L16.18,7.76M7.82,12L8.88,10.94L9.94,12L11,10.94L9.94,9.88L11,8.82L9.94,7.76L8.88,8.82L7.82,7.76L6.76,8.82L7.82,9.88L6.76,10.94L7.82,12M12,14C9.67,14 7.69,15.46 6.89,17.5H17.11C16.31,15.46 14.33,14 12,14Z" /></svg>
			</label>

      </form>
    </div>
 </div>
 </div> 


      <!-- <input type="radio" name="rating" value="3" /> 3 <input type="radio"
      name="rating" value="4" /> 4 <input type="radio" name="rating" value="5" /> 5</p></div> -->
    <!-- <p><label for="review">Review</label>-->
  <br> <textarea placeholder="Write review here.." name="desc" class="review-field"></textarea>
      <br> <span class="ERR"> <?php echo $Err ;?></span>
       <span class="ERR1"> <?php echo $Err1 ;?></span>
       <p><input type="submit" name="reviewing" value="Submit Review">
       <a href="purchase.php">Continue Shopping</a></p>
    <!-- <input type="hidden" name="product_type" value="actual_product_type" id="product_type">
    <input type="hidden" name="product_id" value="actual_product_id" id="product_id"> -->
</fieldset>
 </form>
 <h1 id="header" class="text-success">See Previous Reviews</h1>
  
    
    <div class="container list-article">
        
    <div class="clearfix"></div>
    <div class="row">
    <div class="col-xs-12 article-wrapper">
 
        <?php
        $ID=$NAME;
        $rev = mysqli_query($Conn, "SELECT description,user_name FROM review WHERE Seller_id='$ID'" );
    //     if($rev)

        while($row=mysqli_fetch_array($rev)) 
        {   
        
                    $Desc=$row['description']; $u_name =$row['user_name'];
                    // echo $ID;
                    //  $rows = mysqli_fetch_assoc($fetch_rev);
                    //   $sum=number_format((float) $rows['avg_rev'], 2, '.', ''); 
                      ?>
                     
                        <!-- <a href=""class="more">more</a> -->
                        <article>
                          
                        <h6><?php echo $u_name.":"?></h6>
                        <p><?php echo $Desc?></p>
                      </article>
                      <?php
                }
                      ?>
    </div>
    
  </div>
</div>
</body>
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
</html>