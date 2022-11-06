<?php
    include('Config.php');
    error_reporting(0);

    session_start();
    $Suser_name = $_SESSION['user_name'];

    if(isset($_POST['submit']))
    {
      $Get_image_name = $_FILES['image']['name'];
      $user_name = $_POST['user_name'];
      $Field = $_POST['Field'];
      $Bank_Acc = $_POST['Bank_Acc'];
      $Quantity =$_POST['Quantity'];
      $date = $_POST['Date'];
      $image_Path = "images/".basename($Get_image_name);
      $product_name = $_POST['product_name'];
      $unit_price = $_POST['unit_price'];
      // $var = $_POST['Date'];
      // $date = str_replace('/', '-', $var);
      // $Date =  date('Y-m-d', strtotime($date));
      //$file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
      //echo "<script>alert('Wow! User Registration Completed.')</script>";
      
      //$result = mysqli_query($Conn, $sql);
      //$row = mysqli_fetch_assoc($result);
      //$sum = $row['value_sum'];
      $check_query = mysqli_query($Conn, "SELECT * FROM users where user_name ='$user_name'");
      $rowCount = mysqli_num_rows($check_query);
      if($rowCount <= 0 || $user_name!=$Suser_name)
      {
        $UserErr = "Invalid User";
        unset($user_name);
        unset($Field);
        unset($Bank_Acc);
        unset($Quantity);
        unset($date);
        unset($image);
        unset($product_name);
        unset($unit_price);
        $_POST['user_name'] = "";
        $_POST['Field'] = "";
        $_POST['Bank_Acc'] = "";
        $_POST['Quantity'] = "";
        $_POST['Date'] = "";
        $_POST['image'] = "";
        $_POST['product_name'] = "";
        $_POST['unit_price'] = "";
        ?>
        <script>
          window.location.replace("InvalidUser.php");
          </script>
        <?php  
      }
      else
      {
        //$sql1 = "SELECT * FROM sell WHERE Status='p'";
        //$result = mysqli_query($Conn, $sql1);
        //$res = mysqli_query($con, $query);
        //$sql = "INSERT INTO sell (imagename, contact) VALUES ('$Get_image_name', 'USA')";
        $query =  "INSERT INTO sell (Seller_id, user_name, Field, product_name, unit_price, Quantity, Bank_Acc, image, Status,Date) VALUES (NULL, '$user_name', '$Field','$product_name','$unit_price','$Quantity','$Bank_Acc', '$Get_image_name','p','$date')";
        $connect = mysqli_query($Conn, $query);
        
        if($connect)
        {
          move_uploaded_file($_FILES['image']['tmp_name'], $image_Path);
          $ACMessage="Your request is accepted. We will display it to our Purchase page soon!";
          unset($user_name);
          unset($Field);
          unset($Bank_Acc);
          unset($Quantity);
          unset($date);
          unset($image);
          unset($product_name);
          unset($unit_price);
          $_POST['user_name'] = "";
          $_POST['Field'] = "";
          $_POST['Bank_Acc'] = "";
          $_POST['Quantity'] = "";
          $_POST['Date'] = ""; 
          $_POST['image'] = "";
          $_POST['product_name'] = "";
          $_POST['unit_price'] = "";
          //echo "<script>alert('connect hoise')</script>";
          ?>
          <script>
              window.location.replace("FundingAccepted.php");
          </script>
          <?php   
        }
        else
        {
          $ACMessage = "Something went wrong. Please try again later.";
          unset($user_name);
          unset($Field);
          unset($Bank_Acc);
          unset($Quantity);
          unset($date);
          unset($image);
          unset($product_name);
          unset($unit_price);
          $_POST['user_name'] = "";
          $_POST['Field'] = "";
          $_POST['Bank_Acc'] = "";
          $_POST['image'] = "";
          $_POST['Quantity'] = "";
          $_POST['Date'] = "";
          $_POST['product_name'] = "";
          $_POST['unit_price'] = "";
          ?>
          <script>
              window.location.replace("SomethingWentWrong.php");
          </script>
          <?php
          //echo "<script>alert('coonnect hoy na ken baal')</script>";
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
      <meta charset="UTF-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title>Selling Form</title>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      <link rel="stylesheet" href="sell.css" />
    </head>
    <body>
      <main>
        <div class="box">
          <div class="inner-box">
            <div class="forms-wrap">
              <form action="index.html" autocomplete="off" class="sign-in-form">
                <div class="logo">
                  <!-- Heading -->
                  <div class="heading">
                    <h2>Welcome!</h2><br>
                    <h4>START SELLING WITH ONE CLICK!</h4>  
                  </div>
                  <div class="actual-form"></div>
                </div>
                <a href="#" class="toggle"><h3><u>SELL!</u></h3></a>
              </form>
              
              <form action="" method="POST" autocomplete="off" class="sign-up-form" enctype="multipart/form-data">
                <div class="logo"></div>
                <h4>AGROWCULTURE</h4>
                <div class="heading">
                 <a href="#" class="toggle">GO BACK</a> 
                </div>
    
                <div class="actual-form">
                  <!-- username -->
                  <div class="input-wrap"> 
                    <b>user_name : </b>    
                    <input type="text" name = "user_name" minlength="4" class="input-field" autocomplete="off" required/>                
                  </div>
                   <!-- Product Type -->
                  <div class="input-wrap">
                    <b>Product Type: </b>
                    <br>
                    <input type="radio" name="Field" value="Vegetables" required /> Vegetables
                    <input type="radio" name="Field" value="Fish" required /> Fish<br>
                    <input type="radio" name="Field" value="Fruits" required /> Fruits
                    <input type="radio" name="Field" value="Meat" required /> Meat<br><br>
                  </div>
                  <br>
                  <br>
                  <!-- Product Name -->
                  <div class="input-wrap">
                      <b>Product Name : </b>
                      <input type="text" name="product_name" class="input-field" autocomplete="off" required>  
                  </div>
                  <!-- Unit Price -->
                  <div class="input-wrap">
                      <b>Unit price : </b>
                      <input type="text" name="unit_price" class="input-field" autocomplete="off" required>  
                  </div>
                  <!-- Image -->
                  <div class="input-wrap">
                      <b>Product Image : </b>
                      <input type="file" name="image" id="file" required/>                
                  </div>
                  <br>
                  <!-- Quantity -->
                  <div class="input-wrap">
                      <b>Quantity : </b>
                      <input type="text" name="Quantity" class="input-field" autocomplete="off" required>  
                  </div>
                  <!-- Bank Account -->
                  <div class="input-wrap">
                    <b>Bank Account : </b>
                    <input type="text" name = "Bank_Acc" class="input-field" autocomplete="off" required>
                  </div>
                  <!-- Date -->
                   <script>
                  $(document).ready(function()
                  {
                      var dtToday = new Date();
                      var month = dtToday.getMonth() +1;
                      var day = dtToday.getDate();
                      var year = dtToday.getFullYear();
                      if(month<10)
                      month='0' + month.toString();
                      if(day<10)
                      day='0' + day.toString;
                      var maxDate= year + '-'+ month + '-' +day;
                      $('#dateControl').attr('min',maxDate);
                  })
                  </script>
                
                  <div class="input-wrap">
                      <b>DATE : </b>
                      <input type="date" name="Date" id="dateControl" minlength="4" class="input-field" autocomplete="off" required />
                      <label></label>
                  </div> 
                  
                  <input type="submit" name="submit" value="Apply" class="sign-btn" />
                </div>
              </form>
            </div>
            <div class="carousel">
              <div class="images-wrapper">
                <img src="fundingformimg1.jpg" class="image img-1 show" alt=""/>
                <img src="fundingformimg3.jpg" class="image img-2" alt=""/>
                <img src="fundingformimg2.jpg" class="image img-3" alt=""/>
              </div>
              <div class="text-slider">
                <div class="text-wrap">
                  <div class="text-group">
                    <h2>Approach Investors for Funding</h2>
                    <h2>Connect with interested Investors</h2>
                    <h2>Let it Take wings!</h2>
                  </div>
                </div>
                <div class="bullets">
                  <span class="active" data-value="1"></span>
                  <span data-value="2"></span>
                  <span data-value="3"></span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>
                
      <!-- Javascript file -->
      <footer>
        <div class="row">
            <div class="col">
                <h1>AGROWCULTURE</h1>
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
                    <li><a href="aboutus.php">ABOUT US</a></li>
                    <li><a href="aboutus.php">CONTACTS</a></li>
                
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
                
                
        </div> 
        </footer> 
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
      <script src="fundinform.js"></script> 
    </body>
</html>