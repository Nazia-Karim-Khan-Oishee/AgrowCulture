<?php 

include 'Config.php';

error_reporting(0);

session_start();
$user_name = $_SESSION['user_name'];



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="FundingListCSS.css">
    <title>Log In</title>
    <script>
      if(window.history.replaceState){
        window.history.replaceState(null,null,window.location.href);
      }
    </script>
</head>
<body>
<div class="contain">
    <div class="navbar">
              
        <nav>
            <ul>
                <li><a href="getstartedpage.php">HOME</a></li>
                <li><a href="about us.php">ABOUT US</a></li>
                <li><a href="INDEX.php">LOG IN</a></li>
            </ul>
        </nav>
    </div>
    </div>
<div class="container">
   <div class="contact-box">
    <!-- <div class="left"></div> -->
    <div class="right">
<!-- <p> Phsical Alignments</p> -->
<b>FIELD : </b><br>
<!-- ///// -->
<form action="" method="POST" autocomplete="off" class="sign-up-form">

                    <!-- <h6>lhk</h6> -->
                    <input type="radio" name="Field" value="Crops" required /> Crops
                    <input type="radio"  name="Field" value="Poultry" required /> Poultry<br>
                    <input type="radio"  name="Field" value="Fisheries" required /> Fisheries
                    <input type="radio"  name="Field" value="Farming" required /> Farming<br>
                    <input type="radio" name="Field" value="Machineries" required /> Machineries
                    
                    <br> <br><input type="submit" name="submit" value="Filter" class="sign-btn" ><br><br>
</form>
    <?php if (isset($_POST['submit'])) 
    {
        $Field = $_POST['Field'];
        $sql = "select * from funding where Field='$Field' and Status='P'";
        //echo "HEllo";
        $result2 = mysqli_query($Conn,$sql);
        $i = 0;
        if($result2->num_rows <= 0)
        {
            echo"NO MATCH";
        }
        else {
            ?>
            <form action="investmentform.php" method="POST" autocomplete="off" class="sign-up-form">
<?php
            while($db_row2 = mysqli_fetch_array($result2)){
                ?>
                <input type="checkbox" name="check_list[]" value="<?php echo $db_row2["Funding_id"] ?>" ><label></label>
                <label><?php echo 'Requested for '. $db_row2["Requested_Amount"] ."<br>";?></label> 
    
    <!-- // $quantity=$row3['Quantity'];$product=$row['Produuct'];$date=$row3['Date'];
    echo $db_row2["Funding_id"] . -->

   <?php  $i++; 
}?>

<br> <input  type="submit" value="INVEST" name="apply"  class="sign-btn" ><br> 
            </form>
<?php
}
    }
?>
<!-- ////////// -->
<!-- </form> -->


<!-- <form action="" method="POST" autocomplete="off" class="sign-up-form">
</form>
</form> -->

    <!-- <form action="{next_page}" method="POST" autocomplete="off" class="sign-up-form">
</form>    -->
</div>
   </div>
    </div>
    <footer>
        <div class="row">
            <div class="col">
                <h3>AGROWCULTURE</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta laudantium harum nulla deserunt consequatur nam, exercitationem velit. Accusamus eveniet asperiores atque qui delectus facilis necessitatibus ipsam quidem mollitia sapiente! Quos.</p>
            </div>
            <div class="col">
                <h5>Address <div class="underline"><span></span></div></h5>
                <p>Islamic University of Technology</p>
                <p>Boardbazar,Gazipur</p>
            </div>
            <div class="col">
                <h5>Links <div class="underline"><span></span></div></h5>
                <ul>
                    <li><a href="getstartedpage.html">HOME</a></li>
                    <li><a href="4optionss.html">SERVICES</a></li>
                    <li><a href=""></a>ABOUT US</li>
                    <li><a href=""></a>CONTACTS</li>

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
            <p class="copyright">2022 Copyright © Agrowculture. | Legal | Privacy Policy | Design by Namiha</p>
            
        </div> 
        </footer> 
</body>   
</html>