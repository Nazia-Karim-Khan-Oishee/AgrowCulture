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
                $Err="Your review has been submitted. ";

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
<script>
      if(window.history.replaceState){
        window.history.replaceState(null,null,window.location.href);
      }
    </script>
</head>
<body>
<form action="" method="post" accept-charset="utf-8">
    <fieldset><legend>Review This Seller</legend>	
    <p><label for="rating">Rating</label>
    <input type="radio" name="rating" value="1" /> 1 <input type="radio" name="rating" value="2" /> 2
      <input type="radio" name="rating" value="3" /> 3 <input type="radio"
      name="rating" value="4" /> 4 <input type="radio" name="rating" value="5" /> 5</p>
    <!-- <p><label for="review">Review</label><textarea name="review" rows="8" cols="40">
       </textarea></p> -->
       <span color=red> <?php echo $Err ;?><a href="purchase.php">Continue Shopping</a></span>
    <p><input type="submit" name="reviewing" value="Submit Review"></p>
    <!-- <input type="hidden" name="product_type" value="actual_product_type" id="product_type">
    <input type="hidden" name="product_id" value="actual_product_id" id="product_id"> -->
</fieldset>
</form>
</body>
</html>