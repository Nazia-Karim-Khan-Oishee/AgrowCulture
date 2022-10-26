<?php
  include('Config.php');
  error_reporting(0);
  
  session_start();
  $Suser_name = $_SESSION['user_name'];
  if(isset($_POST['apply']))
  {
    // echo "comes here";
  $_SESSION['check_list']=$_POST['check_list'];
  // echo "Hello, world";
  
  // if(!empty($_POST['check_list'])) {
  //   // $_SESSION['check_list']='check_list'];
  
  //   // $_SESSION['check_list'] = $_POST['check_list'];
    
  // //       foreach($_POST['check_list'] as $selected){
            
  // // }
  // }

  }
if(isset($_POST['submit']))
{
  
  $user_name = $_POST['user_name'];
      $date = $_POST['Date'];
  $Bank_Acc = $_POST['Bank_Acc'];
  // echo "<script>alert('$Suser_name')</script>";
  $check_query = mysqli_query($Conn, "SELECT * FROM users where user_name ='$user_name'");
$rowCount = mysqli_num_rows($check_query);
if ($rowCount <= 0 || $user_name!=$Suser_name) {

// //   //$UserErr = "Invalid User";
// //   $_POST['Provided_Amount'] = "";
// //   $_POST['Field'] = "";
  $_POST['user_name'] = "";
  $_POST['Bank_Acc'] = "";
  $_POST['Date'] = "";

             ?>
                    <script>
                         window.location.replace("InvalidUser.php");
                  </script>                 
                   <?php    
 }
 else{
  if (!empty($_POST['check_list'])) {


   foreach($_SESSION['check_list'] as $selected)
 {

  $sql2 = "UPDATE funding SET Status = 'A' where Funding_ID='$selected'";
  $result = mysqli_query($Conn,$sql2);
  // $array=array();
  // array_push($array,$selected);
              // $_SESSION;
  if($result)
  {
      // $row=mysqli_fetch_array($result);
      // echo  "$row[Funding_ID]";
      // echo "selected.";
          // echo $selected."</br>";
      }
  
// }
//    $SESSION['array'] =$array
   // echo "<script>alert('Wow!.')</script>";
 
  $sql2 = "SELECT * FROM funding where Funding_ID='$selected'";
  $result = mysqli_query($Conn,$sql2);
   //  echo "<script>alert('here!.')</script>";
 
  $row=mysqli_fetch_assoc($result);
 //  echo "<script>alert('ASSOC!.')</script>";
 
  $Field= $row['Field']; $Amount= $row['Requested_Amount'];
  $query = "INSERT INTO investment ( user_name, Field, Bank_Acc, Provided_Amount,  Status, Date) 
    VALUES ('$user_name', '$Field', '$Bank_Acc', '$Amount' ,  'D', '$date')";
    $connect = mysqli_query($Conn,$query);
   //  echo "<script>alert( 'Wow! User Registration Completed.')</script>";
    
   }
   ?>
   <script>
         window.location.replace("InvestmentAccepted.php");
   </script>
 <?php    
 }
 else 
 {
  $_POST['user_name'] = "";
  $_POST['Bank_Acc'] = "";
  $_POST['Date'] = "";
  ?>
  <script>
        window.location.replace("InvestmentError.php");
  </script>
  <?php
 }
}
}
//   if (isset($_POST['submit'])) {
  //     $user_name = $_POST['user_name'];
  //     $date = $_POST['Date'];
  //  header("Location: dashboard.php");
// $Bank_Acc = $_POST['Bank_Acc'];
// $check_query = mysqli_query($Conn, "SELECT * FROM users where user_name ='$user_name'");
// $rowCount = mysqli_num_rows($check_query);
// if ($rowCount <= 0) {

// // //   //$UserErr = "Invalid User";
// // //   $_POST['Provided_Amount'] = "";
// // //   $_POST['Field'] = "";
//   $_POST['user_name'] = "";
//   $_POST['Bank_Acc'] = "";
//   $_POST['Date'] = "";

//               
//                     <script>
//                          window.location.replace("InvalidUser.php");
//                   </script>                 
//                    <?php    
//  }
//  else 
//  {
//   echo "<script>alert('Wow!.')</script>";

//    foreach($_SESSION['check_list'] as $selected)
//    {
//      $sql2 = "SELECT * FROM funding where Funding_ID='$selected'";
//      $result = mysqli_query($Conn,$sql2);
//      $row=mysqli_fetch_array($result);
//      $Field= $row['Field']; $Amount= $row['Requested_Amount'];
//      echo "<script>alert('Wow! User Registration Completed.')</script>";
//       $query = "INSERT INTO investment ( user_name, Field, Bank_Acc, Provided_Amount,  Status, Date) 
//  VALUES ('$user_name', '$Field', '$Bank_Acc', '$Amount',  'D', '$date')";
//   $connect = mysqli_query($Conn,$query);
//         // echo  "$row[Funding_ID]";
//             // echo $selected."</br>";
//         }
//     //     unset($_SESSION['check_list']);
//     //     
//     //     <script>
//     //         window.location.replace("FundingAccepted.php");
//     //     </script>
//     // <?php    
    
// }
//   }
//   $query = "INSERT INTO investment (, user_name, Field, Bank_Acc, Provided_Amount, Current_Amount, Status, Date) 
// VALUES ('$user_name', '$Field', '$Bank_Acc', '$Provided_Amount', '$Provided_Amount', 'p', '$date')";
//  $connect = mysqli_query($Conn,$query);
//  if($connect)
//  {
//    //echo "<script>alert('Verify account done, you may sign in now')</script>";
//    $_POST['user_name'] = "";
//   $_POST['Field'] = "";
//   $_POST['Bank_Acc'] = "";
//   $_POST['Provided_Amount'] = "";
//   $_POST['Date'] = "";
//   

// }
// else{
//   //echo "<script>alert(' in now')</script>";
//   $_POST['user_name'] = "";
//   $_POST['Field'] = "";
//   $_POST['Bank_Acc'] = "";
//   $_POST['Provided_Amount'] = "";
//   $_POST['Date'] = "";
// 
//                         window.location.replace("SomethingWentWrong.php");
//                     </script>

// }
// }
// }
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
    <title>Funding Form</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="fundingform.css" />
  </head>
  <body>
    <main>
      <div class="box">
        <div class="inner-box">
          <div class="forms-wrap">
            <form action="" autocomplete="off" class="sign-in-form">
              <div class="logo">
            

              <div class="heading">
                <h2>Welcome!</h2>
                <h4>Invest NOW</h4>
                
              </div>

              <div class="actual-form">
                </div>
              </div>
              <a href="#" class="toggle"><h3>APPLY NOW!</h3></a>
            </form>

            <form action="" method="POST" autocomplete="off" class="sign-up-form">
              <div class="logo">
               
               
              </div>
              <h4>AGROWCULTURE</h4>

              <div class="heading">
            
               <a href="#" class="toggle">GO BACK</a> 
              </div>

             <br> <div class="actual-form">
                <div class="input-wrap">
                  <b>User Name</b>: </b>
                  <input
                    type="text" name="user_name"
                    minlength="4"
                    class="input-field"
                    autocomplete="off"
                    required
                  />
                  
                </div>
                <script>
                $(document).ready(function(){
                  
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
                  <input
                    type="date" name="Date"
                    id="dateControl"
                    minlength="4"
                    class="input-field"
                    autocomplete="off"
                    required
                  />
                  <label></label>
                </div>
              <!--  <div class="input-wrap">
                  <input
                    type="email"
                    class="input-field"
                    autocomplete="off"
                    required
                  />
                  <label>Email</label>
                </div> -->
               

                <div class="input-wrap">
                  <b>Bank Account : </b>
                  <input
                    type="text"
                   name="Bank_Acc"
                    class="input-field"
                    autocomplete="off"
                    required
                  />
               
                </div>
                  <!-- <div class="input-wrap">
                    <b>Provided Amount : </b>
                    <input
                      type="number" name="Provided_Amount"
                      minlength="4"
                      class="input-field"
                      autocomplete="off"
                      required
                    />
                    <br> -->
                    
                  <!-- <h6>lkjigydt</h6>
                  <h6>klahd</h6> -->
                <!-- <div class="input-wrap">
                    <b>FIELD : </b><br> 
                    <h6>lhk</h6>
                <input
                  type="radio"
                   name= "Field"
                   value="Crops"
                  required
                />   Crops
                <input
                type="radio"
                 name= "Field"
                 value="fisheries"
                required
              />   Fisheries
                <input
                type="radio"
                 name= "Field"
                 value="Poultry"
                required
              />   Poultry<br>
              
              <h6>kkhs</h6>
              <h6>klahd</h6>
                </div> -->
                <!-- </div> -->
             

              <br><br> <br> <input type="submit" name="submit" value="Apply" class="sign-btn" />

                <p class="text">
                  By Applying, I agree to the <a href="#">Terms of Services</a> and
<a href="#">Privacy Policy</a>
                </p>
              </div>
            </form>
          </div>

          <div class="carousel">
            <div class="images-wrapper">
              <img src="fundingformimg1.jpg" class="image img-1 show" alt="" />
              <img src="fundingformimg3.jpg" class="image img-2" alt="" />
              <img src="fundingformimg2.jpg" class="image img-3" alt="" />
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
                  <li><a href="getstartedpage.php">HOME</a></li>
                  <li><a href="4optionss.php">SERVICES</a></li>
                  <li><a href="about us.php"></a>ABOUT US</li>
                  <li><a href="#"></a>CONTACTS</li>

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