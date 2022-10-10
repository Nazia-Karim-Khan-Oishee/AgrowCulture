<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Funding Form</title>
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
              <a href="#" class="toggle"><h3>APPLY NOW!</h3></a>
            </form>

            <form action="index.html" autocomplete="off" class="sign-up-form">
              <div class="logo">
               
                <h4>AGROWCULTURE</h4>
              </div>

              <div class="heading">
                <h2>Get Started</h2>
                <a href="#" class="toggle">GO BACK</a>
              </div>

              <div class="actual-form">
                <div class="input-wrap">
                  <input
                    type="text"
                    minlength="4"
                    class="input-field"
                    autocomplete="off"
                    required
                  />
                  <label>Name</label>
                </div>

                <div class="input-wrap">
                  <input
                    type="email"
                    class="input-field"
                    autocomplete="off"
                    required
                  />
                  <label>Email</label>
                </div>

                <div class="input-wrap">
                  
                  <input
                    type="date"
                    minlength="4"
                    class="input-field"
                    autocomplete="off"
                    required
                  />
                  <label>Date of Birth</label>
                </div>
                <div class="input-wrap">
                  <input
                    type="number"
                    minlength="4"
                    class="input-field"
                    autocomplete="off"
                    required
                  />
                  <label>ID/Passport number</label>
                </div>
                <div class="input-wrap">
                  <input
                    type="text"
                    minlength="4"
                    class="input-field"
                    autocomplete="off"
                    required
                  />
                  <label>Purpose of Funding</label>
                </div>

                <input type="submit" value="Apply" class="sign-btn" />

                <p class="text">
                  By Applying, I agree to the
                  <a href="#">Terms of Services</a> and
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