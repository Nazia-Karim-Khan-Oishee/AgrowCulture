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
    <link rel="stylesheet" href="Log in.css">
    <title>Log In</title>
    <script>
      if(window.history.replaceState){
        window.history.replaceState(null,null,window.location.href);
      }
    </script>
</head>
<body>

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
                <label><?php echo 'Requested for'. $db_row2["Requested_Amount"] ."<br>";?></label> 
    
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
</body>   
</html>