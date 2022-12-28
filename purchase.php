<?php 
//     if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
//     $url = "https://";   
// else  
//     $url = "http://";   
// // Append the host(domain name, ip) to the URL.   
// $url.= $_SERVER['HTTP_HOST'];   

// // Append the requested resource location to the URL   
// $url.= $_SERVER['REQUEST_URI'];    
 
// echo $url;  
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title>Purchase</title>
        <link rel="stylesheet" href="purchase.css">
    </head>
    <body>
     <nav class="navbar">
        <div class="nav">
            <h1>AGROWCULTURE</h1>
            <div class="nav-items">
                <a href="dashboard.php"><img src="user.png" alt=""></a>  <a href="#"><img src="cart.png" alt=""></a>
            </div>
        </div>
        <ul class="links-container">
        <li class="link-item"><a href="getstartedpage.php" class="link">HOME</a></li>
        <li class="link-item"><a href="4optionss.php" class="link">SERVICES</a></li>
        <li class="link-item"><a href="vegetables.php" class="link">VEGETABLES</a></li>
        <li class="link-item"><a href="crops.php" class="link">CROPS</a></li>
        <li class="link-item"><a href="fruits.php" class="link">FRUITS</a></li>
        <li class="link-item"><a href="fish.php" class="link">FISH</a></li>
        <li class="link-item"><a href="meat.php" class="link">MEAT</a></li>
        </ul>
     </nav>
     <div class="bg">
<div class="main">

    <!--cards -->
   
   <div class="card">
   
   <div class="image">
      <img src="pexels-pixabay-219794.jpg">
   </div>
   <div class="title">
 
   </div>
   <div class="des">

  <a href="vegetables.php"><button><h4><b>VEGETABLES</b></h4></button></di></a>
   </div>
   </div>

   <div class="card">
   
    <div class="image">
       <img src="pexels-jane-doan-1092730.jpg">
    </div>
    <div class="title">
    
    </div>
    <div class="des">
   
    <a href="fruits.php"><button><h4><b>FRUITS</b></h4></button></a>
    </div>
    </div>
    <div class="card">
   
        <div class="image">
           <img src="pexels-energepiccom-3650159.jpg" height="30%">
        </div>
        <div class="title">
       
        </div>
        <div class="des">
      
        <a href="fish.php"><button><h4><b>FISH</b></h4></button></a>
        </div>
        </div>
        <div class="card">

        <div class="image">
            <img src="kyle-mackie-QH8SHBARVVk-unsplash.jpg" height="70%">
         </div>
         <div class="title">
    
         </div>
         <div class="des">
    
         <a href="meat.php"><button><h4><b>MEAT</b></h4></button></a>
         </div>
         </div>
         <div class="card">
        <div class="image">
            <img src="pexels-skyler-ewing-10201880.jpg" height="250px">
         </div>
         <div class="title">
    
         </div>
         <div class="des">
    
         <a href="meat.php"><button><h4><b>MEAT</b></h4></button></a>
         </div>
         </div>
       
            </div>
        </div>
        
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</div>    
</div> 
<footer>
<div class="row">
    <div class="col">
        <h3>AGROWCULTURE</h3>
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
            <li><a href="aboutus.php">ABOUT US</a</li>
            <li><a href="aboutus.php">CONTACTS</a</li>

        </ul>
    </div>

    <ul class="social_icon">
        <li><a href="#"><ion-icon name="logo-facebook"></ion-icon></a></li>
        <li><a href="#"><ion-icon name="logo-twitter"></ion-icon></a></li>
        <li><a href="#"><ion-icon name="logo-instagram"></ion-icon></a></li>
        <li><a href="#"><ion-icon name="logo-linkedin"></ion-icon></a></li>
      </ul>
    </div>
</footer>
    </body>
</html>