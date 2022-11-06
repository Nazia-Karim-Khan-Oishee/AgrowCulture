<?php 

include 'Config.php';
error_reporting(0);

session_start();

$user_name = $_SESSION['user_name'];

//$user_name = $_SESSION['user_name'];
    $sql = "SELECT * FROM  funding WHERE user_name= '$user_name'";
    $result =mysqli_query($Conn,$sql);
    if($result->num_rows <= 0)
    {
        $Message = "No Records To Show.";
    }
    else{
        $query3 = "SELECT * FROM funding WHERE user_name= '$user_name' and Status= 'P' ";
        $con3 = mysqli_query($Conn, $query3);
        if($con3->num_rows==0)
        {
            $Message = "All of your requests have been approved.";
        }
        else {
        $query = "SELECT SUM(Requested_Amount) AS value_sum FROM funding WHERE user_name= '$user_name'  and Status= 'P'";
        $con = mysqli_query($Conn, $query);
    $rows = mysqli_fetch_assoc($con);
        $sum = $rows['value_sum'];

    // $rows3 = mysqli_fetch_assoc($con3);
    //     $query3 = "SELECT SUM(Requested_Amount) AS valuesum FROM funding WHERE user_name= '$user_name'";
    // $con3 = mysqli_query($Conn, $query3);
    // $rows3 = mysqli_fetch_assoc($con3);
    // $sum3 = $rows3['valuesum'];
        $Message="";
        $c=0;
            while($row3 = mysqli_fetch_array($con3))
            {
                $c++;
                // $amount=$row3['Requested_Amount'];;
                // $Message= "$Message"."Your request for BDT $amount is pending."."<br>";

           }
           $Message= "Your $c request for net BDT $sum is pending."."<br>";

    }
}
    $sql2 = "SELECT * FROM  investment WHERE user_name= '$user_name'";
    $result2 =mysqli_query($Conn,$sql2);
    if($result2->num_rows <= 0)
    {
        $Message2 = "No Records To Show.";
    }
    else{
    $query = "SELECT SUM(Provided_Amount) AS value_sum FROM investment WHERE user_name= '$user_name'";
    $con = mysqli_query($Conn, $query);
    $rows = mysqli_fetch_assoc($con);
    $sum = $rows['value_sum'];
    // $query2 = "SELECT SUM(Provided_Amount) AS balance FROM investment WHERE user_name= '$user_name'";
    // $con2 = mysqli_query($Conn, $query2);
    // $rows2 = mysqli_fetch_assoc($con2);
    // $sum2 = $rows2['balance'];
    // $invested=$sum2-$sum;
        // $Message2="\n";
        //     while($row2 = mysqli_fetch_array($result2))
        //     {
                //$amount=$row2['Requested_Amount']-$row2['Current_Amount'];$
                // $Message2= "BDT $sum has been invested from your balance BDT $sum2"."."." "."Your current balance is BDT $sum.";
                $Message2= "You have invested BDT $sum.";

           // }
    }
            // echo $user_name;

    $sql3 = "SELECT * FROM  sell WHERE user_name= '$user_name'";
    $result3 =mysqli_query($Conn,$sql3);
    if($result3->num_rows <= 0)
    {
        $Message3 = "No Records To Show.";
    }
    else{
        $Message3="";
            while($row3 = mysqli_fetch_array($result3))
            {

                $quantity=$row3['Quantity'];$product=$row3['Field'];$date=$row3['Date'];
                $Message3= "You last provided  $quantity kg of  $product on  $date."."<br>";

            }
    }
    $sql4 = "SELECT * FROM  purchase WHERE user_name= '$user_name'";
    $result4 =mysqli_query($Conn,$sql4);
    if($result4->num_rows <= 0)
    {
        $Message4 = "No Records To Show.";
    }
    else{
       // $Message4="\n";
       // $row4 = mysqli_fetch_array($result4);

            while($row4 = mysqli_fetch_array($result4))
            {

                $date=$row4['Date'];
                $Message4= "<br>"."You last purchased from us on $date."." \n";

           }
    }
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/0ba00a17f9.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="dashboard.css" />
    <title>Dashboard</title>
</head>

<body>

    <div class="d-flex" id="wrapper">
        
        <!-- Sidebar -->
        <div class="bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom">AGROWCULTURE</div>
            <div class="list-group list-group-flush my-3">
                <a href="dashboard.php" class="list-group-item list-group-item-action bg-transparent second-text active"><i
                        class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
                        <a href="getstartedpage.php" class="list-group-item list-group-item-action bg-transparent second-text active"><i class="fa-solid fa-house-user"></i> Home</a>
                        
               
                <a href="4optionss.php" class="list-group-item list-group-item-action bg-transparent second-text active"><i class="fa-solid fa-list"></i> Services</a>
                <a href="aboutus.php" class="list-group-item list-group-item-action bg-transparent second-text active"><i class="fa-solid fa-address-card"></i> About Us</a>
                <a href="logout.php" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"><i
                        class="fas fa-power-off me-2"></i>Logout</a>
                        
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">Dashboard</h2>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user me-2"></i><?php echo $_SESSION['user_name']; ?>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                                <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        
            <div class="container-fluid px-4">
                <div class="row g-3 my-2">
                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                               <a href="fundingform.php" class="Link"><h2>Funding</h2></a>
                            </div>
                            <i class="fas fa-gift fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <a href="FUNDING_LIST.php"> <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                
                                <h2>Investment</h2>
                            </div>
                            <i class="fas fa-chart-line fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                        </a>
                    </div>
                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                            <a href="sell.php"><h2>Sell</h2>
                            </div>
                            <i
                                class="fas fa-hand-holding-usd fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </a>
                    </div>

                    <div class="col-md-3">
                        <a href="#"></a><div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                
                                <h2>Purchase</h2>
                            </div>
                            <i class="fas fa-truck fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                        </a>
                    </div>

                   
                </div>

                <div class="row my-5">
                   
                    <div class="col">
                        <div class="container">
                            <div class="title">User History</div>
                        <div class="table bg-white rounded shadow-sm  table-hover">
                     
             
                  
                </div>
                <div class="input-wrap">
                    Funding : 
                    <!-- <input
                      type="text"
                      minlength="4"
                      id="funding"
                      name="funding"
                      class="input-field"
                      autocomplete="off"
                      required
                    />   -->
                    <span > <?php echo $Message;?></span>

                    
                  </div>
                  <div class="input-wrap">
                    Investment : 
                    <!-- <input
                      type="text"
                      minlength="4"
                      id="Info"
                      name="Info"
                      class="input-field"
                      autocomplete="off"
                      required
                      />   -->
                      <span > <?php echo $Message2;?></span>
                    
                  </div>

                  <div class="input-wrap">
                   Selling : 
                    <!-- <input
                      type="text"
                      minlength="4"
                      id="Info"
                      name="Info"
                      class="input-field"
                      autocomplete="off"
                      required
                      />  < -->
                        <span > <?php echo $Message3;?></span>
                    
                  </div>
                  
                  <div class="input-wrap">
                    Purchase : 
                    <!-- <input
                      type="text"
                      minlength="4"
                      id="Info"
                      name="Info"
                      class="input-field"
                      autocomplete="off"
                      required
                      />   -->
                      <span > <?php echo $Message4;?></span>
                              
                            </div>
                        </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->
    </div>
      

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };
    </script>
    <footer>
        <div class="row2">
            <div class="col2">
                <h3>AGROWCULTURE</h3>
                <p>Agrowculture is a platform created to expand the exposure of the people working in the agricultural sector. On a single platform, Agrowculture connects these people with funders and customers by eliminating intermediaries. It also enables Bangladesh agriculture financing. Anyone can connect through Agrowculture to help finance our farmers.</p>
            </div>
            <div class="col2">
                <h5>Address <div class="underline"><span></span></div></h5>
                <p>Islamic University of Technology</p>
                <p>Boardbazar,Gazipur</p>
            </div>
            <div class="col2">
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
            <p class="copyright">2022 Copyright © Agrowculture. | Legal | Privacy Policy | Design by Namiha</p>
            
        </div> 
        </footer>
</body>

</html>