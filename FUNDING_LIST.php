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
        window.history.replaceState(null, null, window.location.href);
      }
    </script>
</head>
<body>
    

<div class="navbar">
        <nav>
   
            <ul>
                 <li><div class="zoom"><a href="getstartedpage.php">HOME<hr></a></div></li> 
                  <li><div class="zoom"><a href="4optionss.php">SERVICES<hr></a></div></li> 
                  <li><div class="zoom"><a href="dashboard.php">DASHBOARD<hr></a></div></li>
                    <!--<li><div class="zoom"><a href="dashboard.php">DASHBOARD</a></div></li> -->
            </ul>
           
        </nav>
        </div>
<div class="container">
    
   <div class="contact-box">
    <!-- <div class="left"></div> -->
    <div class="right">
<!-- <p> Phsical Alignments</p> -->
<h4 class="field">CHOOSE A FIELD: </h4><br>
<!-- ///// -->
<form action="" method="POST" autocomplete="off" class="sign-up-form">

                    <!-- <h6>lhk</h6> -->
                    <input type="radio" name="Field" value="Crops" required /> Crops<br>
                    <input type="radio"  name="Field" value="Poultry" required /> Poultry<br>
                    <input type="radio"  name="Field" value="Fisheries" required /> Fisheries<br>
                    <input type="radio"  name="Field" value="Farming" required /> Farming<br>
                    <input type="radio" name="Field" value="Machineries" required /> Machineries<br>
                    
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
                <p>AgrowCulture is a platform created to expand the exposure of the people working in the agricultural sector. On a single platform, AgrowCulture connects these people with funders and customers by eliminating intermediaries. It also enables Bangladesh agriculture financing. Anyone can connect through AgrowCulture to help finance our farmers.</p>
            </div>
            <div class="col">
                <h5>Address <div class="underline"><span></span></div></h5>
                <p>Islamic University of Technology</p>
                <p>Boardbazar, Gazipur</p>
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
            </div><br>
            <!-- <hr> -->
            <p class="copyright">2022 Copyright © AgrowCulture. | Legal | Privacy Policy | Design by Namiha</p>
            
        </div> 
        </footer> 
</body>   
</html>