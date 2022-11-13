<?php
    include 'Config.php';
    error_reporting(0);
    session_start();
    if(isset($_POST['apply']))
    {
        $value = $_POST['apply'];
        $_SESSION['product_id']=$value;
//         $value2=$_SESSION['product_id'];
//    echo "<script>alert($value2)</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title>Product</title>
        <link rel="stylesheet" href="product.css">
        <link rel="stylesheet" href="purchase.css">
         <link rel="stylesheet" href="purchasestyle.css"> 
        
        
    </head>
    <body>
        <nav class="navbar">
            <div class="nav">
                <h1>AGROWCULTURE</h1>
                <div class="nav-items">
                <div class="cart">
                    <a href="dashboard.php"><img src="user.png" alt=""></a>
                    <a href="cart.php"><img src="cart.png" alt=""><span>0</span></a>
                </div> 
                </div>
            </div>
            <ul class="links-container">
            <li class="link-item"><a href="#" class="link">HOME</a></li>
            <li class="link-item"><a href="#" class="link">SERVICES</a></li>
            <li class="link-item"><a href="vegetables.php" class="link">VEGETABLES</a></li>
            <li class="link-item"><a href="fruits.php" class="link">FRUITS</a></li>
            <li class="link-item"><a href="fish.php" class="link">FISH</a></li>
            <li class="link-item"><a href="meat.php" class="link">MEAT</a></li>
            </ul>
         </nav>
       <!-- product detail -->
    <section class="product-section">
        <?php    
            // image fetching
            $selected_product=$_SESSION['product_id'];
            $img = mysqli_query($Conn, "SELECT image FROM sell WHERE Seller_id = '$selected_product'");
            while ($row = mysqli_fetch_array($img)) 
            {     
                echo "<img src='images/".$row['image']."' style = 'width:400px;height:400px;' >";   
            } 
        ?>
        <div class="product-detail">
            <?php
                //information fetching  
                $field = mysqli_query($Conn, "SELECT Seller_id, product_name, user_name FROM sell WHERE Seller_id = '$selected_product'");
                while ($row = mysqli_fetch_array($field)) 
                {     
                    echo "<h2 class='product-title'>".($row['product_name'])."</h2><br>";
                    echo "<h3 >Seller ID: ".($row['Seller_id'])."</h3><br>";
                    echo "<button name='add' value=$NAME class='button-68'  role='button'>Add to cart</button>";          
                }
            ?>
            <button><a class="add-cart" href="#">Add to cart</a></button>
            <div class="ratings">
                <img src="fill_star.png" class="star" alt="">
                <img src="fill_star.png" class="star" alt="">
                <img src="fill_star.png" class="star" alt="">
                <img src="fill_star.png" class="star" alt="">
                <img src="fill_star.png" class="star" alt="">
                <span class="rating-count">4,023 reviews</span>
            </div>
        
            <div class="btn-container">
            </div>
        </div>
    </section>
    
    <!-- <section class="detail-des">
        <h1 class="section-title">details</h1>
        <p class="des">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nemo accusantium, modi nihil fugiat atque voluptas accusamus quae tempora culpa unde a ut sapiente minus laboriosam repellendus? Minima rerum qui hic est in soluta impedit itaque provident, exercitationem vel magnam perspiciatis esse? Quasi vero nihil ducimus assumenda obcaecati fugiat maxime officiis quaerat asperiores architecto sed, iure sapiente, sint ipsam laudantium at a nemo deserunt quod in repudiandae, sunt reiciendis. Cumque quod ullam ipsam sunt a expedita earum laboriosam ea deleniti iusto eligendi quis labore similique, harum iure! Repudiandae architecto corporis excepturi ipsum aspernatur neque! Aperiam doloribus, dicta ullam, architecto non, nam possimus numquam excepturi magnam vero sunt nihil quia alias tempora laborum dolor rem nobis? Debitis sint, consectetur quos a expedita, excepturi incidunt nam voluptatibus optio aut, alias in magnam aliquam autem inventore non nostrum itaque fuga cumque voluptatem possimus voluptas! Ipsa accusamus sint quia suscipit totam commodi natus ratione id? <br><br> Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eveniet laboriosam iusto sunt inventore nam eos pariatur dolores in, nostrum asperiores optio quod quis voluptatibus consectetur sed repudiandae id magni cupiditate voluptatum cum nobis? Quibusdam nam reiciendis maxime veniam at magnam quisquam tempora officiis ipsam asperiores, dolore fugit est officia velit fuga dolor quos pariatur repellendus molestias non! Rerum cupiditate labore necessitatibus veritatis est saepe, perferendis quasi exercitationem obcaecati sunt nam, quia eligendi neque autem sint quisquam, natus omnis optio. Velit eum aut, odit aliquam corrupti sequi commodi ipsum iste. Quasi corporis sit repellat. Debitis, atque eius tempore, unde perferendis dolores consectetur totam omnis esse labore ab reiciendis? Quia debitis similique, ut architecto assumenda non id corrupti nihil, dignissimos accusamus consequatur nobis asperiores voluptatem. Molestias voluptas repellat beatae commodi, hic voluptate, dolor nemo soluta doloribus, placeat aspernatur eum. Dignissimos aspernatur a repellat, iste itaque, laudantium aperiam necessitatibus mollitia, pariatur molestiae ratione.</p>

    </section> -->

    
    <!-- add review form -->
    <section class="add-review-section">
        <h1 class="section-title">add a review</h1>
        <input type="text" class="review-headline" placeholder="review headline">
        <textarea placeholder="review" class="review-field"></textarea>
        <p class="rating-text">how much you liked the product</p>
        <div class="star-container">
            <img src="no_fill_star.png" class="rating-star" alt="">
        <img src="no_fill_star.png" class="rating-star" alt="">
        <img src="no_fill_star.png" class="rating-star" alt="">
        <img src="no_fill_star.png" class="rating-star" alt="">
        <img src="no_fill_star.png" class="rating-star" alt="">
    </div>
    <button class="add-review-btn">add review</button>
    </section>
    <script src="review.js"></script>
    <!-- review section -->
    <!-- review section -->
    <section class="review-section">
    <h1 class="section-title">Reviews</h1>
    <div class="review-container">
    <div class="review-card">
    <div class="user-dp" data-rating="4.9"><img src="user 1.png" alt=""></div>
    <h2 class="review-title">best quality more than my expectation</h2>
    <p class="review">Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt placeat ipsum quasi vitae, maxime ipsam.</p>
    </div>
    <div class="review-card">
    <div class="user-dp" data-rating="4.9"><img src="user 2.png" alt=""></div>
    <h2 class="review-title">on time delivery with best packaging</h2>
    <p class="review">Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt placeat ipsum quasi vitae, maxime ipsam.</p>
    </div>
    <div class="review-card">
    <div class="user-dp" data-rating="4.9"><img src="user.png" alt=""></div>
    <h2 class="review-title">very helpful customer support</h2>
    <p class="review">Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt placeat ipsum quasi vitae, maxime ipsam.</p>
    </div>
    <div class="review-card">
    <div class="user-dp" data-rating="4.9"><img src="user.png" alt=""></div>
    <h2 class="review-title">very easy to refund/return products</h2>
    <p class="review">Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt placeat ipsum quasi vitae, maxime ipsam.</p>
    </div>
    </div>
    </section>
    <script src="cart.js"></script>
</body>
</html>