<?php 

include 'Config.php';
error_reporting(0);

session_start();

$user_name = $_SESSION['user_name'];
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
                <a href="about us.php" class="list-group-item list-group-item-action bg-transparent second-text active"><i class="fa-solid fa-address-card"></i> About Us</a>
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
                        <a href="#"></a><div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h2>Exposure</h2>
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

                    <div class="col-md-3">
                        <a href="#"> <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                
                                <h2>Investment</h2>
                            </div>
                            <i class="fas fa-chart-line fs-1 primary-text border rounded-full secondary-bg p-3"></i>
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
                    <input
                      type="text"
                      minlength="4"
                      id="funding"
                      name="funding"
                      class="input-field"
                      autocomplete="off"
                      required
                    />
                    
                  </div>
                  <div class="input-wrap">
                    Selling : 
                    <input
                      type="text"
                      minlength="4"
                      id="Info"
                      name="Info"
                      class="input-field"
                      autocomplete="off"
                      required
                    />
                    
                  </div>
                  <div class="input-wrap">
                    Purchase : 
                    <input
                      type="text"
                      minlength="4"
                      id="Info"
                      name="Info"
                      class="input-field"
                      autocomplete="off"
                      required
                    />
                    
                  </div>
                  <div class="input-wrap">
                   Investment : 
                    <input
                      type="text"
                      minlength="4"
                      id="Info"
                      name="Info"
                      class="input-field"
                      autocomplete="off"
                      required
                    />
                    
                  </div>
                              
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
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta laudantium harum nulla deserunt consequatur nam, exercitationem velit. Accusamus eveniet asperiores atque qui delectus facilis necessitatibus ipsam quidem mollitia sapiente! Quos.</p>
            </div>
            <div class="col2">
                <h5>Address <div class="underline"><span></span></div></h5>
                <p>Islamic University of Technology</p>
                <p>Boardbazar,Gazipur</p>
            </div>
            <div class="col2">
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