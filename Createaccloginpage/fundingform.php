  <?php
  include('Config.php');
  error_reporting(0);

  session_start();

 // echo "<script>alert('Verify account done, you may sign in now')</script>";
  if (isset($_POST['submit'])) {
    //echo "<script>alert('you may sign in now')</script>";
    $user_name = $_POST['user_name'];
    $Field = $_POST['Field'];
    $Bank_Acc = $_POST['Bank_Acc'];
    $Requested_Amount = $_POST['Requested_Amount'];
    $date = $_POST['Date'];
    // $date = str_replace('/', '-', $var);
    // //echo date('Y-m-d', strtotime($date));
    //$Date =  date('Y-m-d', strtotime($date));
    // $sql = "SELECT SUM(Current_Amount) AS value_sum FROM investment";
    // $result = mysqli_query($Conn, $sql);
    // $row = mysqli_fetch_assoc($result);
    // $sum = $row['value_sum'];
    //echo '$sum'; 
    $check_query = mysqli_query($Conn, "SELECT * FROM users where user_name ='$user_name'");
    $rowCount = mysqli_num_rows($check_query);
    if ($rowCount <= 0) {
      //$UserErr = "Invalid User";
      $_POST['user_name'] = "";
      $_POST['Field'] = "";
      $_POST['Bank_Acc'] = "";
      $_POST['Requested_Amount'] = "";
      $_POST['Date'] = "";
      ?>
                    <script>
                        window.location.replace("InvalidUser.php");
                    </script>
                <?php    
    } 
    else {
      // if ($sum-$Requested_Amount >= 0) {
      //   $sql1 = "SELECT * FROM  investment WHERE Status='P'";
      //   // $sql = "SELECT * FROM users WHERE user_name = '$user_name'";
      //   $result = mysqli_query($Conn, $sql1);
      //   while ($row = mysqli_fetch_array($result)) {
      //     $checkbalance = $row['Current_Amount'] - $Requested_Amount;
      //     if ($checkbalance <= 0) {
      //       $Investment_id = $row['Investment_id'];
      //       $rem_request = $Requested_Amount - $row['Current_Amount	']; //0/greater than 0
      //       $sql3 = "UPDATE investment set Current_Amount='0' WHERE Investment_id='$Investment_id'";
      //       $result3 = mysqli_query($Conn, $sql3);
      //       $sql2 = "UPDATE investment set Status='F' WHERE Investment_id='$Investment_id' ";
      //       $result2 = mysqli_query($Conn, $sql2);
      //     } else if ($checkbalance > 0) {
      //       $Investment_id = $row['Investment_id'];
      //       $rem_request = $Requested_Amount - $row['Current_Amount	']; //0
      //       $sql3 = "UPDATE investment set Current_Amount='$checkbalance' WHERE Investment_id='$Investment_id'";
      //       $result3 = mysqli_query($Conn, $sql3);
      //       $sql2 = "UPDATE investment set Status='P' WHERE Investment_id='$Investment_id' ";
      //       $result2 = mysqli_query($Conn, $sql2);
      //     }
      //     if ($rem_request == 0) {
      //       break;
      //     }

          //   if ($row['Status'] == 'p') {
          //     echo "<script>alert('you may sign in now')</script>";
          //     $Investment_id = $row['Investment_id'];
          //     //$sql2 = "UPDATE investment set Status='C' WHERE Investment_id='$Investment_id' ";
          //     //$result2 = mysqli_query($Conn, $sql2);
          //     $Money = $row['Provided_Amount'];
          //     $NewMoney = $Money - 1;
          //     $sql3 = "UPDATE investment set Provided_Amount='$NewMoney' WHERE Investment_id='$Investment_id'";
          //     $result3 = mysqli_query($Conn, $sql3);
          //   }
          //   echo $row['Field'];
          //   $Money = "";
          //   $NewMoney = "";
          //   echo "<script>alert('Verify account done, you may sign in now')</script>";
          // }
        
        $query="INSERT INTO funding (Funding_id, user_name, Field, Bank_Acc, Requested_Amount, Status, Date) 
        VALUES (NULL, '$user_name', '$Field', '$Bank_Acc', '$Requested_Amount', 'P', '$date')";
        $connect = mysqli_query($Conn, $query );
        //echo "<script>alert(' now')</script>";
            if($connect){

                    //$ACMessage="YOUR REQUEST IS ACCEPTED.FUNDS WILL BE TRANSFARRED TO YOUR ACCOUNT SOON.";
                    $_POST['user_name'] = "";
                    $_POST['Field'] = "";
                    $_POST['Bank_Acc'] = "";
                    $_POST['Requested_Amount'] = "";
                    $_POST['Date'] = ""; 
                    ?>
                    <script>
                        window.location.replace("FundingAccepted.php");
                    </script>
                <?php       
                           }
            else
            {
              //$ACMessage="SOMETHING WENT WRONG.PLEASE TRY AGAIN LATER";
              $_POST['user_name'] = "";
              $_POST['Field'] = "";
              $_POST['Bank_Acc'] = "";
              $_POST['Requested_Amount'] = "";
              $_POST['Date'] = ""; 
              ?>
              <script>
                  window.location.replace("SomethingWentWrong.php");
              </script>
              <?php 
            }
      } 
    }

  ?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
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
            <form action="index.html" autocomplete="off" class="sign-in-form">
              <div class="logo">


                <div class="heading">
                  <h2>Welcome!</h2>
                  <h4>Apply now and get funded</h4>

                </div>

                <div class="actual-form">
                </div>
              </div>
              <a href="#" class="toggle">
                <h3>APPLY NOW!</h3>
              </a>
            </form>

            <form action="" method="POST" autocomplete="off" class="sign-up-form">
              <div class="logo">


              </div>
              <h4>AGROWCULTURE</h4>

              <div class="heading">

                <a href="#" class="toggle">GO BACK</a>
              </div>

              <br>
              <div class="actual-form">
                <div class="input-wrap">
                  <b>USER_NAME : </b>
                  <!--<span class="error"> <?php echo $Message; ?></span>-->
                  
                  <input type="text" name="user_name" minlength="4" class="input-field" autocomplete="off" required />
                  <!-- //<span class="error"> <?php echo $UserErr; ?></span> -->

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
                <script>
                  $(document).ready(function() {

                    var dtToday = new Date();
                    var month = dtToday.getMonth() + 1;
                    var day = dtToday.getDate();
                    var year = dtToday.getFullYear();
                    if (month < 10)
                      month = '0' + month.toString();
                    if (day < 10)
                      day = '0' + day.toString;
                    var maxDate = year + '-' + month + '-' + day;
                    $('#dateControl').attr('min', maxDate);

                  })
                </script>

                <div class="input-wrap">
                  <b>DATE : </b>
                  <input type="date" name="Date" id="dateControl" minlength="4" class="input-field" autocomplete="off" required />
                  <label></label>
                </div>



                <div class="input-wrap">
                  <b>Bank Account : </b>
                  <input type="text" name="Bank_Acc" class="input-field" autocomplete="off" required />

                </div>
                <div class="input-wrap">
                  <b>Requested Amount : </b>
                  <input type="number" name="Requested_Amount" minlength="4" class="input-field" autocomplete="off" required />
                  <br>

                  <h6>lkjigydt</h6>
                  <h6>klahd</h6>
                  <div class="input-wrap">
                    <b>FIELD : </b><br>
                    <h6>lhk</h6>
                    <input type="radio" name="Field" name="Field" value="Crops" required /> Crops
                    <input type="radio" name="Field" value="Machinaries" required /> Machineries<br>
                    <h6>kkhs</h6>
                    <h6>klahd</h6>
                  </div>
                </div>


                <br><br> <br> <input type="submit" name="submit" value="Apply" class="sign-btn" ><span class="error"> <?php echo $Message; ?></span>


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
          <h5>Address <div class="underline"><span></span></div>
          </h5>
          <p>Islamic University of Technology</p>
          <p>Boardbazar,Gazipur</p>
        </div>
        <div class="col">
          <h5>Links <div class="underline"><span></span></div>
          </h5>
          <ul>
            <li><a href="getstartedpage.php">HOME</a></li>
            <li><a href="4optionss.php">SERVICES</a></li>
            <li><a href="about us.php"></a>ABOUT US</li>
            <li><a href="#"></a>CONTACTS</li>

          </ul>
        </div>

        <ul class="social_icon">
          <li><a href="#">
              <ion-icon name="logo-facebook"></ion-icon>
            </a></li>
          <li><a href="#">
              <ion-icon name="logo-twitter"></ion-icon>
            </a></li>
          <li><a href="#">
              <ion-icon name="logo-instagram"></ion-icon>
            </a></li>
          <li><a href="#">
              <ion-icon name="logo-linkedin"></ion-icon>
            </a></li>
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