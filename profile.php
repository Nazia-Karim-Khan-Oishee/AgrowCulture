<?php 

include 'Config.php';
error_reporting(0);

session_start();
if (!isset($_SESSION['user_name'])) 
{
    header("Location: INDEX.php");
}
if(isset($_SESSION['Just_Set']) && $_SESSION['Just_Set']==true)
{
    //echo "<script>alert('Wow! User Registration Completed.')</script>";
    header("Location: dashboard.php");
    $SESSION['Just_Set'] = false;
}
$user_name = $_SESSION['user_name'];
$query = "SELECT * FROM users WHERE user_name = '$user_name'";
$req = mysqli_query($Conn , $query);
$row = mysqli_fetch_assoc($req);
$Name= $row['Name'];
$user_name = $row['user_name'];
$email = $row['email'];
$MobileNumber = $row['MobileNumber'];


    ?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/0ba00a17f9.js" crossorigin="anonymous"></script>
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
    
    <link rel="stylesheet" type="text/css" href="userprofile.css">
    <title>User Profile</title>
  </head>
  <body class="bg-right">
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-md-10 col-11 mx-auto">
              <h1>AGROWCULTURE</h1>   
              <ul class="breadcrumb">
                
                <li><a href="getstartedpage.php">Home</a></li>
                <li><a href="4optionss.php">Services</a></li>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="logout.php" class=" bg-transparent text-danger fw-bold"><i  class="fas fa-power-off me-2"></i>Logout</a></li>
               
              </ul>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 d-md-block">
                        <div class ="card bg-common card-left">
                            <div class="card-body">
                              <nav class="nav d-md-block d-none">
                                
                                      <a  class="nav-link" aria-current="page" href="profile.php"><i class="fa-solid fa-user mr-1"></i>  Profile</a>
                                      
                                      <a  class="nav-link" href="ChangePassandMobile.php"><i class="fa-solid fa-user-shield mr-1"></i> Security</a>
                                  </nav>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-8">
                      <div class="card">
                        <div class="card-header border-bottom mb-3 d-md-none">
                          <ul class="nav nav-tabs card-header-tabs nav-fill">
                            <li class="nav-item">
                              <a  class="nav-link" aria-current="page" href="#profile"><i class="fa-solid fa-user mr-1"></i> </a>
                            </li>
                            
                            <li class="nav-item">
                              <a  class="nav-link" href="#security"><i class="fa-solid fa-user-shield mr-1"></i> </a>
                            </li>
                          </ul>
                        </div>

                        <div class="card-body  border-0">
                                  <h6>PROFILE INFORMATION</h6>
                                  <hr>
                                  <form>
                                  <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" autocomplete="off" placeholder="<?php echo $Name ?>" value="<?php echo $Name ?>">
                                    <label for="exampleFormControlInput1" class="form-label">User Name</label>
                                    <input type="text" class="form-control" id="name" name="name" autocomplete="off" placeholder="<?php echo $user_name ?>" value="<?php echo $user_name ?>">
                                    <label for="exampleFormControlInput1" class="form-label">Email</label>
                                    <input type="text" class="form-control" id="name" name="name" autocomplete="off" placeholder="<?php echo $email ?>" value="<?php echo $email ?>">
                                    <label for="exampleFormControlInput1" class="form-label">Mobile Number</label>
                                    <input type="text" class="form-control" id="name" name="name" autocomplete="off" placeholder="<?php echo $MobileNumber ?>" value="<?php echo $MobileNumber?>">
                                  </div>
                                </form>
                          
                  

                        </div>
                      </div>
                    </div>
                  </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>

